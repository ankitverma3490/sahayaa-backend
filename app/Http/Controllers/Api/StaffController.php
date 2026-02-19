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
        //
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
        
        // ✅ Check limit
        if ($subscription->user_limit >= $plan->subscription_limit) {
            return response()->json([
                'success' => false,
                'message' => 'Monthly AI limit exceeded.'
            ]);
        }
        
        try {

            // 🔹 AI Generate Filters
            $ai = new AiFilterService();
            $filters = $ai->generateFilters($request->all());

            if (!is_array($filters)) {
                return response()->json([
                    'success' => false,
                    'message' => 'AI returned invalid format'
                ]);
            }

            // 🔹 Apply Filters
            $query = User::with('userWorkInfo')
                ->where('user_role_id', 2);

            if (!empty($filters['name'])) {
                $query->where('name', 'like', '%' . $filters['name'] . '%');
            }

            if (!empty($filters['email'])) {
                $query->where('email', 'like', '%' . $filters['email'] . '%');
            }

            if (!empty($filters['status'])) {
                $query->where('status', $filters['status']);
            }

            if (!empty($filters['salary']) && is_array($filters['salary'])) {

                $query->whereHas('userWorkInfo', function ($q) use ($filters) {

                    foreach ([
                        'gt' => '>',
                        'gte' => '>=',
                        'lt' => '<',
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

            // ✅ Increment only after success
            $subscription->increment('user_limit');

            return response()->json([
                'success' => true,
                'ai_filters' => $filters,
                'remaining_limit' =>
                    $plan->subscription_limit - ($subscription->used_limit + 1),
                'data' => $data
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ]);
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


}
