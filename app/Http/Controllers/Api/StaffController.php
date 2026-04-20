<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;
use App\Models\Attendance;
use App\Models\LeaveType;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use OpenAI\Laravel\Facades\OpenAI;
use App\Services\Admin\AiFilterService;
use Illuminate\Support\Facades\Auth;
use App\Models\JobApplication;
use App\Models\Job;
use App\Models\Salary;
use App\Models\SubscriptionUser;
use App\Models\Subscription;


class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id'
        ]);

        // If validation fails, return a 422 response with errors
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $role = Role::where('slug', 'staff')->first();
        $query = User::where('user_role_id', $role->id)->where('added_by', $request->user_id);
        // 🔍 Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        // 🧩 User type / status filter
        if ($request->filled('user_type')) {
            $query->where('status', $request->user_type);
        }
        $staff = $query->latest()->paginate(10);
        return response()->json([
            'success' => true,
            'message' => 'Staff retrieved successfully',
            'data'    => $staff,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::where('slug', 'staff')->first();
        $staff = User::where('id', $id)->where('user_role_id', $role->id)->first();
        if(empty($staff)) {
            return response()->json([
                'success' => false,
                'message' => 'Staff not found'
            ], 404);
        }
        return response()->json([
            'success' => true,
            'data' => $staff
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }
        $user->delete();
        return response()->json([
            'success' => true,
            'message' => 'Staff deleted successfully'
        ]);
    }

    public function updateStatus(Request $request, int $id)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:block,repost',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], 422);
        }

        // Find staff/user
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Staff not found',
            ], 404);
        }

        // Update status
        $user->update([
            'status' => $request->status,
        ]);

        return response()->json([
            'status'  => 'success',
            'data'    => $user,
            'message' => 'Staff status updated successfully',
        ]);
    }

    public function getAttendance(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'id'    => 'required|exists:users,id',
            'month' => 'required|integer|min:1|max:12',
            'year'  => 'required|integer|min:2000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $staff = User::find($request->id);

        // Get first and last date of given month
        $startDate = Carbon::create($request->year, $request->month, 1)->startOfMonth();
        $endDate   = Carbon::create($request->year, $request->month, 1)->endOfMonth();

        // Get attendance records for that month
        $attendance = Attendance::whereBetween('date', [$startDate, $endDate])
            ->where('staff_id', $staff->id)
            ->pluck('status', 'date'); // key = date, value = status

        $period = CarbonPeriod::create($startDate, $endDate);

        $result = [];

        foreach ($period as $date) {
            $formattedDate = $date->format('Y-m-d');

            $result[] = [
                'date' => $formattedDate,
                'status' => $attendance->has($formattedDate)
                    ? $attendance[$formattedDate]
                    : 'absent'
            ];
        }

        return response()->json([
            'status' => true,
            'message' => 'Attendance retrieved successfully',
            'data' => $result
        ], 200);
    }

    public function getAiData(Request $request)
    {
        // Query is optional - if empty, return all staff without AI filtering
        $request->validate([
            'query' => 'nullable|string'
        ]);

        $queryText = trim((string) $request->input('query', ''));

        try {
            // 🔹 Base query - all staff with their work info and addresses
            $baseQuery = User::with(['userWorkInfo', 'addresses'])
                ->where('user_role_id', 2);

            // If no query text, just return all staff (no AI, no subscription needed)
            if ($queryText === '') {
                $data = $baseQuery->get();
                return response()->json([
                    'success' => true,
                    'ai_filters' => null,
                    'data' => $data,
                ]);
            }

            // 🔹 AI path - check subscription
            $subscription = SubscriptionUser::where('user_id', auth()->id())->first();
            $plan = $subscription ? Subscription::find($subscription->subscription_id) : null;

            // Subscription limit check - fall back to non-AI list instead of hard failure
            $canUseAi = $subscription && $plan
                && $subscription->user_limit < $plan->subscription_limit;

            if (!$canUseAi) {
                // Still return staff list; just skip AI filtering
                $data = $baseQuery->get();
                return response()->json([
                    'success' => true,
                    'ai_filters' => null,
                    'message' => !$subscription
                        ? 'No active subscription - showing all staff.'
                        : 'AI search limit reached - showing all staff.',
                    'data' => $data,
                ]);
            }

            // 🔹 AI Generate Filters
            try {
                $ai = new AiFilterService();
                $filters = $ai->generateFilters($request->all());
            } catch (\Throwable $aiErr) {
                \Log::warning('AI filter service failed, falling back to all staff: ' . $aiErr->getMessage());
                $filters = null;
            }

            if (!is_array($filters)) {
                // AI returned invalid data - return all staff as fallback
                $data = $baseQuery->get();
                return response()->json([
                    'success' => true,
                    'ai_filters' => null,
                    'message' => 'AI filter unavailable - showing all staff.',
                    'data' => $data,
                ]);
            }

            // 🔹 Apply Filters
            $query = $baseQuery;

            if (!empty($filters['name'])) {
                $query->where(function ($q) use ($filters) {
                    $q->where('name', 'like', '%' . $filters['name'] . '%')
                      ->orWhere('first_name', 'like', '%' . $filters['name'] . '%')
                      ->orWhere('last_name', 'like', '%' . $filters['name'] . '%');
                });
            }

            if (!empty($filters['email'])) {
                $query->where('email', 'like', '%' . $filters['email'] . '%');
            }

            if (!empty($filters['status'])) {
                $query->where('status', $filters['status']);
            }

            if (!empty($filters['gender'])) {
                $query->where('gender', $filters['gender']);
            }

            if (!empty($filters['location'])) {
                $query->where('location', $filters['location']);
            }

            if (!empty($filters['salary']) && is_array($filters['salary'])) {

                $query->whereHas('userWorkInfo', function ($q) use ($filters) {

                    foreach ([
                        'gt' => '>',
                        '$gt' => '>',
                        'gte' => '>=',
                        'lt' => '<',
                        '$lt' => '<',
                        'lte' => '<=',
                        'eq' => '='
                    ] as $key => $operator) {

                        if (!empty($filters['salary'][$key])) {
                            $q->where('salary', $operator, $filters['salary'][$key]);
                        }
                    }
                });
            }

            $data = $query->get();

            // If AI filters were too strict and nothing found, fall back to unfiltered list
            if ($data->isEmpty()) {
                $data = User::with(['userWorkInfo', 'addresses'])
                    ->where('user_role_id', 2)
                    ->get();
            }

            // ✅ Increment only after success
            $subscription->increment('user_limit');

            return response()->json([
                'success' => true,
                'ai_filters' => $filters,
                'remaining_limit' => $plan->subscription_limit - ($subscription->user_limit + 1),
                'data' => $data
            ]);

        } catch (\Exception $e) {
            \Log::error('getAiData failed: ' . $e->getMessage());
            // Last-resort fallback - try to return all staff so UI isn't empty
            try {
                $data = User::with(['userWorkInfo', 'addresses'])
                    ->where('user_role_id', 2)
                    ->get();
                return response()->json([
                    'success' => true,
                    'ai_filters' => null,
                    'message' => 'AI search failed - showing all staff.',
                    'data' => $data,
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to load staff. Please try again.',
                    'error' => $e->getMessage()
                ]);
            }
        }
    }


    public function getJobs() {
        $id = Auth::user()->id;
        $staff = User::find($id);
        if (!$staff) {
            return response()->json([
                'success' => false,
                'message' => 'Staff member not found'
            ], 404);
        }

        $jobs = JobApplication::where('user_id', $staff->id)->where('application_status', 'accepted')->get();

        return response()->json([
            'success' => true,
            'message' => 'Jobs retrieved successfully',
            'data' => $jobs
        ]);
    }  
    
    
    public function getStaffList(Request $request)
    {
        $role = Role::where('slug', 'staff')->first();
        $query = User::where('user_role_id', $role->id);
        // 🔍 Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        // 🧩 User type / status filter
        if ($request->filled('user_type')) {
            $query->where('status', $request->user_type);
        }
        $staff = $query->latest()->paginate(10);
        return response()->json([
            'success' => true,
            'message' => 'Staff retrieved successfully',
            'data'    => $staff,
        ]);
    }


    public function getJobByStaffAiData(Request $request)
    {
        $request->validate([
            'query' => 'required|string'
        ]);

        $subscription = SubscriptionUser::where('user_id', auth()->id())->first();

        if (!$subscription) {
            return response()->json([
                'success' => false,
                'message' => 'No active subscription found.'
            ]);
        }

        $plan = Subscription::find($subscription->subscription_id);

        if (!$plan) {
            return response()->json([
                'success' => false,
                'message' => 'Subscription plan not found.'
            ]);
        }

        // ✅ Check AI limit
        if ($subscription->user_limit >= $plan->subscription_limit) {
            return response()->json([
                'success' => false,
                'message' => 'Monthly AI limit exceeded.'
            ]);
        }

        try {

            /*
            |--------------------------------------------------------------------------
            | Generate AI Filters
            |--------------------------------------------------------------------------
            */

            $ai = new AiFilterService();
            $filters = $ai->generateFilters($request->all(), 'job');

            if (!is_array($filters)) {
                return response()->json([
                    'success' => false,
                    'message' => 'AI returned invalid format'
                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | Map AI Filters
            |--------------------------------------------------------------------------
            */

            if (isset($filters['salary']['greater_than'])) {
                $filters['compensation']['gt'] = $filters['salary']['greater_than'];
            }

            if (isset($filters['salary']['less_than'])) {
                $filters['compensation']['lt'] = $filters['salary']['less_than'];
            }

            if (isset($filters['location'])) {
                $filters['city'] = $filters['location'];
            }

            if (isset($filters['title'])) {
                $filters['title'] = $filters['title'];
            }

            /*
            |--------------------------------------------------------------------------
            | Start Query
            |--------------------------------------------------------------------------
            */

            $query = Job::query();
            // dd($filters,$query->get());
            /*
            |--------------------------------------------------------------------------
            | Text Filters
            |--------------------------------------------------------------------------
            */

            if (!empty($filters['title'])) {
                $query->where('title', 'like', '%' . $filters['title'] . '%');
            }

            if (!empty($filters['city'])) {
                $query->where('city', 'like', '%' . $filters['city'] . '%');
            }

            if (!empty($filters['state'])) {
                $query->where('state', 'like', '%' . $filters['state'] . '%');
            }

            if (!empty($filters['salary']) && is_array($filters['salary'])) {

                $operator = $filters['salary']['operator'] ?? '=';
                $value = $filters['salary']['value'] ?? null;

                if ($value !== null) {

                    $allowedOperators = ['>', '<', '>=', '<=', '=', '!='];

                    if (in_array($operator, $allowedOperators)) {
                        $query->where('compensation', $operator, $value);
                    }
                }
            }

            if (!empty($filters['salary']) && is_array($filters['salary'])) {

                $salary = $filters['salary'];

                if (isset($salary['$gt'])) {
                    $query->where('compensation', '>', $salary['$gt']);
                }

                if (isset($salary['$gte'])) {
                    $query->where('compensation', '>=', $salary['$gte']);
                }

                if (isset($salary['$lt'])) {
                    $query->where('compensation', '<', $salary['$lt']);
                }

                if (isset($salary['$lte'])) {
                    $query->where('compensation', '<=', $salary['$lte']);
                }

                if (isset($salary['$eq'])) {
                    $query->where('compensation', '=', $salary['$eq']);
                }
            }

            /*
            |--------------------------------------------------------------------------
            | Compensation Filter
            |--------------------------------------------------------------------------
            */

            if (!empty($filters['compensation']) && is_array($filters['compensation'])) {

                $comp = $filters['compensation'];

                if (!empty($comp['gt'])) {
                    $query->where('compensation', '>', $comp['gt']);
                }

                if (!empty($comp['gte'])) {
                    $query->where('compensation', '>=', $comp['gte']);
                }

                if (!empty($comp['lt'])) {
                    $query->where('compensation', '<', $comp['lt']);
                }

                if (!empty($comp['lte'])) {
                    $query->where('compensation', '<=', $comp['lte']);
                }

                if (!empty($comp['eq'])) {
                    $query->where('compensation', '=', $comp['eq']);
                }
            }

            /*
            |--------------------------------------------------------------------------
            | Job Details
            |--------------------------------------------------------------------------
            */

            if (!empty($filters['commitment_type'])) {
                $query->where('commitment_type', $filters['commitment_type']);
            }

            if (!empty($filters['preferred_hours'])) {
                $query->where('preferred_hours', $filters['preferred_hours']);
            }

            if (!empty($filters['preferred_days'])) {
                $query->where('preferred_days', $filters['preferred_days']);
            }

            /*
            |--------------------------------------------------------------------------
            | Boolean Filters
            |--------------------------------------------------------------------------
            */

            $booleanFields = [
                'childcare_experience',
                'cooking_required',
                'driving_license_required',
                'first_aid_certified',
                'pet_care_required'
            ];

            foreach ($booleanFields as $field) {
                if (isset($filters[$field])) {
                    $query->where($field, $filters[$field] ? 1 : 0);
                }
            }

            /*
            |--------------------------------------------------------------------------
            | Expected Compensation
            |--------------------------------------------------------------------------
            */

            if (!empty($filters['expected_compensation'])) {
                $query->where('expected_compensation', '<=', $filters['expected_compensation']);
            }

            $data = $query->get();

            // ✅ Increase usage
            $subscription->increment('user_limit');

            return response()->json([
                'success' => true,
                'ai_filters' => $filters,
                'remaining_limit' => $plan->subscription_limit - ($subscription->user_limit + 1),
                'data' => $data
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }


}
