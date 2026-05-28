<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use App\Models\Attendance;
use App\Models\LeaveType;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use OpenAI\Laravel\Facades\OpenAI;
use App\Services\Admin\AiFilterService;
use App\Models\JobApplication;
use App\Models\Job;
use App\Models\Salary;
use App\Models\SubscriptionUser;
use App\Models\Subscription;
use Illuminate\Support\Facades\Schema;
use App\Models\UserWorkInfo;


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
            'status' => 'required|in:block,active',
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

        $staffId = $request->id ?: Auth::id();
        $staff = User::find($staffId);

        if (!$staff) {
            return response()->json([
                'status' => false,
                'message' => 'Staff member not found',
            ], 404);
        }

        // Get first and last date of given month, with defaults if missing
        $year = (int)($request->year ?: date('Y'));
        $month = (int)($request->month ?: date('m'));

        try {
            $startDate = Carbon::create($year, $month, 1)->startOfMonth();
            $endDate   = Carbon::create($year, $month, 1)->endOfMonth();
        } catch (\Exception $e) {
            $startDate = Carbon::now()->startOfMonth();
            $endDate   = Carbon::now()->endOfMonth();
        }

        // Get attendance records for that month
        $attendance = Attendance::whereBetween('date', [$startDate, $endDate])
            ->where('staff_id', $staff->id)
            ->get()
            ->mapWithKeys(function ($item) {
                // Ensure the date key is a string in Y-m-d format to match CarbonPeriod iteration
                $dateKey = $item->date instanceof \Carbon\Carbon 
                    ? $item->date->format('Y-m-d') 
                    : \Carbon\Carbon::parse($item->date)->format('Y-m-d');
                return [$dateKey => $item->status];
            });

        $period = CarbonPeriod::create($startDate, $endDate);

        $result = [];

        foreach ($period as $date) {
            $formattedDate = $date->format('Y-m-d');

            $result[] = [
                'date' => $formattedDate,
                'status' => isset($attendance[$formattedDate])
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
            'query' => 'nullable|string',
            'query_text' => 'nullable|string',
        ]);

        // Accept both 'query' and 'query_text' params
        $queryText = trim((string) ($request->input('query_text') ?: $request->input('query', '')));

        try {
            // 🔹 Base query - all staff with their work info and addresses
            $baseQuery = User::with(['userWorkInfo', 'addresses', 'kycInformation'])
                ->where('user_role_id', 2)
                ->where('is_job_seeking', 1);

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
                // Even without AI, apply basic role/location filter from query text
                $data = $this->applyBasicFilters($baseQuery, $queryText)->get();
                return response()->json([
                    'success' => true,
                    'ai_filters' => null,
                    'message' => !$subscription
                        ? 'No active subscription - showing filtered staff.'
                        : 'AI search limit reached - showing filtered staff.',
                    'data' => $data,
                ]);
            }

            // 🔹 AI Generate Filters
            $aiFilterService = new AiFilterService();
            $filters = $aiFilterService->generateFilters(['query' => $queryText]);
            
            \Log::info('Applied AI Filters:', ['filters' => $filters, 'query' => $queryText]);
            
            // ✅ Fix: Use user_role_id instead of non-existent role() scope
            $query = User::where('user_role_id', 2)
                ->with(['userWorkInfo', 'addresses', 'kycInformation'])
                ->where('is_job_seeking', 1);

            if (!empty($filters['name'])) {
                $name = $filters['name'];
                $query->where(function ($q) use ($name) {
                    $q->where('first_name', 'like', '%' . $name . '%')
                      ->orWhere('last_name', 'like', '%' . $name . '%');
                });
            }

            if (!empty($filters['gender'])) {
                $query->where('gender', $filters['gender']);
            }

            if (!empty($filters['location'])) {
                $loc = $filters['location'];
                $query->where(function($q) use ($loc) {
                    // Check current addresses
                    $q->whereHas('addresses', function ($sub) use ($loc) {
                        $sub->where('city', 'like', '%' . $loc . '%')
                          ->orWhere('state', 'like', '%' . $loc . '%');
                    })
                    // OR check preferred work location
                    ->orWhereHas('userWorkInfo', function ($sub) use ($loc) {
                        $sub->where('preferred_work_location', 'like', '%' . $loc . '%');
                    })
                    // OR check User table current_city
                    ->orWhere('current_city', 'like', '%' . $loc . '%');
                });
            }
            // Removed automatic restriction to owner's city here to allow broader AI results 
            // as per client request. Staff can be ready to work anywhere.

            if (!empty($filters['role'])) {
                $role = strtolower(trim($filters['role']));
                
                // Role aliases — map AI output to possible DB values
                $roleAliases = [
                    'driver' => ['driver', 'Driver', 'Driver / Chauffeur', 'Chauffeur'],
                    'cook' => ['cook', 'Cook', 'chef', 'Chef', 'Cook / Chef', 'Chef / Baker'],
                    'chef' => ['chef', 'Chef', 'cook', 'Cook', 'Cook / Chef', 'Chef / Baker'],
                    'maid' => ['maid', 'Maid', 'House Cleaner', 'house cleaner', 'House Cleaner / Maid', 'cleaner'],
                    'house cleaner' => ['House Cleaner', 'house cleaner', 'Maid', 'House Cleaner / Maid'],
                    'nanny' => ['nanny', 'Nanny', 'Baby Sitter', 'baby sitter', 'Baby Sitter / Nanny', 'Babysitter'],
                    'baby sitter' => ['Baby Sitter', 'baby sitter', 'Nanny', 'Baby Sitter / Nanny'],
                    'housekeeper' => ['housekeeper', 'Housekeeper'],
                    'gardener' => ['gardener', 'Gardener'],
                    'security' => ['security', 'Security', 'Security Guard', 'guard', 'Guard'],
                    'nurse' => ['nurse', 'Nurse', 'Nurse / Caretaker', 'caretaker'],
                    'tutor' => ['tutor', 'Tutor', 'teacher', 'Teacher'],
                    'plumber' => ['plumber', 'Plumber'],
                    'electrician' => ['electrician', 'Electrician'],
                    'carpenter' => ['carpenter', 'Carpenter'],
                    'painter' => ['painter', 'Painter'],
                    'sweeper' => ['sweeper', 'Sweeper'],
                    'laundry' => ['laundry', 'Laundry', 'Laundry / Ironing'],
                    'dog walker' => ['dog walker', 'Dog Walker', 'Pet Walker'],
                    'attendant' => ['attendant', 'Attendant', 'Personal Attendant'],
                    'pet caretaker' => ['pet caretaker', 'Pet Caretaker', 'caretaker', 'Caretaker'],
                ];
                
                $searchValues = $roleAliases[$role] ?? [$role, ucfirst($role), strtoupper($role)];
                
                $query->whereHas('userWorkInfo', function ($q) use ($role, $searchValues) {
                    $q->where(function($inner) use ($role, $searchValues) {
                        foreach ($searchValues as $val) {
                            $inner->orWhereRaw("LOWER(primary_role) LIKE ?", ['%' . strtolower($val) . '%']);
                        }
                    });
                });
            }

            if (!empty($filters['salary']) && is_array($filters['salary'])) {
                $salary = $filters['salary'];
                $query->whereHas('userWorkInfo', function ($q) use ($salary) {
                    if (isset($salary['gt'])) $q->where('salary', '>', $salary['gt']);
                    if (isset($salary['lt'])) $q->where('salary', '<', $salary['lt']);
                });
            }

            if (!empty($filters['experience'])) {
                $exp = (int) $filters['experience'];
                $query->whereHas('userWorkInfo', function ($q) use ($exp) {
                    $q->where('total_experience', '>=', $exp);
                });
            }

            if (!empty($filters['languages']) && is_array($filters['languages'])) {
                $langs = $filters['languages'];
                $query->whereHas('userWorkInfo', function ($q) use ($langs) {
                    $q->where(function ($inner) use ($langs) {
                        foreach ($langs as $lang) {
                            $inner->orWhere('languages_spoken', 'like', '%' . $lang . '%');
                        }
                    });
                });
            }

            if (!empty($filters['skills']) && is_array($filters['skills'])) {
                $skills = $filters['skills'];
                $query->whereHas('userWorkInfo', function ($q) use ($skills) {
                    $q->where(function ($inner) use ($skills) {
                        foreach ($skills as $skill) {
                            $inner->orWhere('skills', 'like', '%' . $skill . '%')
                                  ->orWhere('primary_role', 'like', '%' . $skill . '%')
                                  ->orWhere('additional_info', 'like', '%' . $skill . '%');
                        }
                    });
                });
            }

            if (!empty($filters['general_keywords']) && is_array($filters['general_keywords'])) {
                $keywords = $filters['general_keywords'];
                $query->where(function ($q) use ($keywords) {
                    foreach ($keywords as $kw) {
                        $q->where(function ($inner) use ($kw) {
                            $inner->orWhere('first_name', 'like', '%' . $kw . '%')
                                  ->orWhere('last_name', 'like', '%' . $kw . '%')
                                  ->orWhereHas('userWorkInfo', function ($sub) use ($kw) {
                                      $sub->where('primary_role', 'like', '%' . $kw . '%')
                                          ->orWhere('skills', 'like', '%' . $kw . '%')
                                          ->orWhere('additional_info', 'like', '%' . $kw . '%')
                                          ->orWhere('education', 'like', '%' . $kw . '%');
                                  });
                        });
                    }
                });
            }

            // ✅ If query was provided but AI didn't find any filters, use basic keyword fallback
            if (empty($filters['role']) && empty($filters['name']) && empty($filters['location']) && empty($filters['gender']) && empty($filters['salary']) && empty($filters['experience']) && empty($filters['languages']) && empty($filters['skills']) && empty($filters['general_keywords'])) {
                $data = $this->applyBasicFilters($baseQuery, $queryText)->get();
                return response()->json([
                    'success' => true,
                    'ai_filters' => $filters,
                    'message' => 'Showing keyword-matched results.',
                    'data' => $data
                ]);
            }

            $data = $query->get();
            $subscription->increment('user_limit');

            return response()->json([
                'success' => true,
                'ai_filters' => $filters,
                'remaining_limit' => $plan->subscription_limit - ($subscription->user_limit),
                'data' => $data
            ]);

        } catch (\Exception $e) {
            \Log::error('getAiData failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'AI search failed. Please try a simpler search or check your internet connection.',
                'error' => $e->getMessage(),
                'data' => [] // Return empty data on failure during search to avoid showing everyone
            ]);
        }
    }

    /**
     * Apply basic keyword filters without AI (fallback when no subscription)
     */
    private function applyBasicFilters($query, $queryText)
    {
        $queryLower = strtolower($queryText);
        
        // Common role keywords
        $roleMap = [
            'driver' => ['driver', 'driving', 'chauffeur'],
            'cook' => ['cook', 'chef', 'cooking'],
            'maid' => ['maid', 'house cleaner', 'cleaner', 'cleaning'],
            'nanny' => ['nanny', 'babysitter', 'baby sitter', 'childcare'],
            'housekeeper' => ['housekeeper', 'housekeeping'],
            'gardener' => ['gardener', 'gardening'],
            'security' => ['security', 'guard', 'watchman'],
            'nurse' => ['nurse', 'nursing', 'caretaker'],
            'tutor' => ['tutor', 'teacher'],
            'plumber' => ['plumber', 'plumbing'],
            'electrician' => ['electrician', 'electrical'],
            'carpenter' => ['carpenter', 'carpentry'],
            'painter' => ['painter', 'painting'],
            'sweeper' => ['sweeper', 'sweeping'],
            'laundry' => ['laundry', 'washing', 'ironing'],
            'dog walker' => ['dog walker', 'pet walker'],
            'attendant' => ['attendant', 'helper', 'assistant'],
        ];

        $matchedRole = null;
        foreach ($roleMap as $role => $keywords) {
            foreach ($keywords as $kw) {
                if (str_contains($queryLower, $kw)) {
                    $matchedRole = $role;
                    break 2;
                }
            }
        }

        if ($matchedRole) {
            $roleAliases = [
                'driver' => ['driver', 'Driver', 'Driver / Chauffeur'],
                'cook' => ['cook', 'Cook', 'chef', 'Chef', 'Cook / Chef'],
                'maid' => ['maid', 'Maid', 'House Cleaner', 'House Cleaner / Maid'],
                'nanny' => ['nanny', 'Nanny', 'Baby Sitter', 'Baby Sitter / Nanny'],
                'housekeeper' => ['housekeeper', 'Housekeeper'],
                'gardener' => ['gardener', 'Gardener'],
                'security' => ['security', 'Security', 'Security Guard'],
                'nurse' => ['nurse', 'Nurse', 'Nurse / Caretaker'],
                'tutor' => ['tutor', 'Tutor', 'teacher', 'Teacher'],
                'plumber' => ['plumber', 'Plumber'],
                'electrician' => ['electrician', 'Electrician'],
                'carpenter' => ['carpenter', 'Carpenter'],
                'painter' => ['painter', 'Painter'],
                'sweeper' => ['sweeper', 'Sweeper'],
                'laundry' => ['laundry', 'Laundry', 'Laundry / Ironing'],
                'dog walker' => ['dog walker', 'Dog Walker'],
                'attendant' => ['attendant', 'Attendant', 'Personal Attendant'],
            ];
            $searchValues = $roleAliases[$matchedRole] ?? [$matchedRole, ucfirst($matchedRole)];
            
            $query->whereHas('userWorkInfo', function ($q) use ($searchValues) {
                $q->where(function($inner) use ($searchValues) {
                    foreach ($searchValues as $val) {
                        $inner->orWhereRaw("LOWER(primary_role) LIKE ?", ['%' . strtolower($val) . '%']);
                    }
                });
            });
        }

        // Location keywords - words that are not role/stop words
        $stopWords = ['find', 'me', 'a', 'an', 'the', 'in', 'at', 'near', 'for', 'with', 'show', 'good', 'best', 'experienced', 'professional', 'male', 'female', 'city'];
        $allRoleKeywords = array_merge(...array_values($roleMap));
        
        $words = array_filter(explode(' ', $queryLower), function($w) use ($stopWords, $allRoleKeywords) {
            return strlen($w) > 2 && !in_array($w, $stopWords) && !in_array($w, $allRoleKeywords);
        });

        if (!empty($words)) {
            $locationWord = array_values($words)[0];
            $query->where(function($q) use ($locationWord) {
                $q->whereHas('addresses', function ($sub) use ($locationWord) {
                    $sub->where('city', 'like', '%' . $locationWord . '%')
                      ->orWhere('state', 'like', '%' . $locationWord . '%');
                })->orWhereHas('userWorkInfo', function ($sub) use ($locationWord) {
                    $sub->where('preferred_work_location', 'like', '%' . $locationWord . '%');
                });
            });
        } elseif (!$matchedRole) {
            // ✅ If no role and no location found in basic filter, force empty results
            $query->where('id', 0); 
        }

        return $query;
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
        try {
            // user_role_id = 2 is staff — use direct ID instead of Role lookup to avoid null
            $query = User::where('user_role_id', 2);
            
            if (auth()->check() && auth()->user()->user_role_id != 1) {
                $query->where('added_by', auth()->id());
            }

            // 🔍 Search
            if ($request->filled('search')) {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('first_name', 'like', "%{$search}%")
                      ->orWhere('last_name', 'like', "%{$search}%")
                      ->orWhere('name', 'like', "%{$search}%");
                });
            }

            // 🧩 Status filter
            if ($request->filled('user_type')) {
                $query->where('status', $request->user_type);
            }

            $staff = $query->with(['userWorkInfo', 'addresses'])->latest()->paginate(50);

            return response()->json([
                'success' => true,
                'message' => 'Staff retrieved successfully',
                'data'    => $staff,
            ]);
        } catch (\Exception $e) {
            \Log::error('getStaffList failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve staff list',
                'error' => $e->getMessage()
            ], 500);
        }
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

            // Only show open/active jobs
            $query = Job::where('status', 'open');

            // Keep title for fallback if all filters return 0 results
            $titleFilter = $filters['title'] ?? null;

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

            // Boolean fields only applied if explicitly set to true (not inferred)
            $booleanFields = [
                'childcare_experience',
                'cooking_required',
                'driving_license_required',
                'first_aid_certified',
                'pet_care_required'
            ];

            foreach ($booleanFields as $field) {
                if (isset($filters[$field]) && $filters[$field] === true) {
                    $query->where($field, 1);
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

            // If strict filters returned nothing, fall back to title-only on open jobs
            if ($data->isEmpty() && $titleFilter) {
                $data = Job::where('status', 'open')
                    ->where('title', 'like', '%' . $titleFilter . '%')
                    ->get();
            }

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

    /*
    |--------------------------------------------------------------------------
    | Staff Availability & Hire Me Methods
    |--------------------------------------------------------------------------
    */

    public function updateAvailability(Request $request)
    {
        try {
            $user = Auth::user();
            if (!$user) return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);

            $isAvailable = filter_var($request->input('is_available', false), FILTER_VALIDATE_BOOLEAN);
            $isJobSeeking = filter_var($request->input('is_job_seeking', false), FILTER_VALIDATE_BOOLEAN);

            $updateData = [];

            // Only update if columns exist (safety check)
            if (Schema::hasColumn('users', 'is_available')) {
                $updateData['is_available'] = $isAvailable;
            }
            
            if (Schema::hasColumn('users', 'is_job_seeking')) {
                $updateData['is_job_seeking'] = $isJobSeeking;
            }

            // If both columns missing, fallback to is_active (old logic)
            if (empty($updateData)) {
                $updateData['is_active'] = $isAvailable ? 1 : 0;
            }

            $user->update($updateData);

            return response()->json([
                'success' => true,
                'message' => 'Availability updated successfully',
                'data' => [
                    'is_available' => (bool)$isAvailable,
                    'is_job_seeking' => (bool)$isJobSeeking,
                    'is_active' => (bool)$user->is_active,
                    'status' => $isAvailable ? 'active' : 'paused'
                ]
            ], 200);
        } catch (\Exception $e) {
            \Log::error('updateAvailability error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Internal server error during update',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getAvailabilityStatus()
    {
        $user = Auth::user();
        if (!$user) return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);

        $isAvailable = Schema::hasColumn('users', 'is_available') ? (bool)$user->is_available : (bool)$user->is_active;
        $isJobSeeking = Schema::hasColumn('users', 'is_job_seeking') ? (bool)$user->is_job_seeking : (bool)$user->is_active;

        return response()->json([
            'success' => true,
            'data' => [
                'is_available' => $isAvailable,
                'is_job_seeking' => $isJobSeeking,
                'status' => $isAvailable ? 'active' : 'paused'
            ]
        ]);
    }

    public function optInHireMe(Request $request)
    {
        $user = Auth::user();
        if (!$user) return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);

        // Update profile with hire me details if provided
        $updateData = [
            'is_active' => 1,
            'status' => 'active'
        ];

        if ($request->filled('city')) $updateData['current_city'] = $request->city;
        if ($request->filled('experience')) $updateData['years_of_experience'] = $request->experience;

        if (Schema::hasColumn('users', 'is_available')) $updateData['is_available'] = true;
        if (Schema::hasColumn('users', 'is_job_seeking')) $updateData['is_job_seeking'] = true;

        $user->update($updateData);

        // Also update UserWorkInfo if role or city is provided
        if ($request->filled('role') || $request->filled('city')) {
            $workInfoData = [];
            if ($request->filled('role')) $workInfoData['primary_role'] = $request->role;
            if ($request->filled('city')) $workInfoData['preferred_work_location'] = $request->city;

            UserWorkInfo::updateOrCreate(
                ['user_id' => $user->id],
                $workInfoData
            );
        }

        return response()->json([
            'success' => true,
            'message' => 'You are now listed for hire',
            'data' => [
                'status' => 'active',
                'is_available' => true,
                'is_job_seeking' => true
            ]
        ]);
    }

    public function pauseHireMe()
    {
        $user = Auth::user();
        $user->update(['is_active' => 0, 'status' => 'paused']);
        
        if (Schema::hasColumn('users', 'is_available')) $user->update(['is_available' => false]);
        if (Schema::hasColumn('users', 'is_job_seeking')) $user->update(['is_job_seeking' => false]);

        return response()->json([
            'success' => true,
            'message' => 'Profile paused',
            'data' => ['status' => 'paused']
        ]);
    }

    public function deactivateHireMe()
    {
        $user = Auth::user();
        $user->update(['is_active' => 0, 'status' => 'inactive']);

        if (Schema::hasColumn('users', 'is_available')) $user->update(['is_available' => false]);
        if (Schema::hasColumn('users', 'is_job_seeking')) $user->update(['is_job_seeking' => false]);

        return response()->json([
            'success' => true,
            'message' => 'Profile deactivated',
            'data' => ['status' => 'inactive']
        ]);
    }


    public function getActiveTodayUser()
    {
        try {
            $user = Auth::guard('api')->user();
            if (!$user) {
                return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
            }

            // Get all staff members hired by this user (accepted, approved, active, or hired applications)
            $hiredStatuses = ['accepted', 'approved', 'active', 'hired'];
            
            $hiredStaffIds = JobApplication::whereIn('application_status', $hiredStatuses)
                ->whereHas('job', function($query) use ($user) {
                    $query->where('created_by', $user->id);
                })
                ->pluck('user_id')
                ->toArray();

            // Also include staff added directly by this user (if any) or where is_staff_added is 1
            $directlyAddedStaffIds = User::where('user_role_id', 2)
                ->where(function($query) use ($user) {
                    $query->where('added_by', $user->id)
                          ->orWhere('is_staff_added', 1); // Broaden to find any staff flagged as added
                })
                ->where('added_by', $user->id) // Re-narrow to ensure it's THIS user's staff
                ->pluck('id')
                ->toArray();

            $allStaffIds = array_unique(array_merge($hiredStaffIds, $directlyAddedStaffIds));

            if (empty($allStaffIds)) {
                return response()->json([
                    'success' => true,
                    'active_staff' => [],
                    'status' => ['date' => now()->toDateString()]
                ]);
            }

            $today = now()->toDateString();

            $staffMembers = User::with(['attendance_details' => function($query) use ($today) {
                    $query->where('date', $today);
                }, 'userWorkInfo'])
                ->whereIn('id', $allStaffIds)
                ->get()
                ->map(function($staff) use ($user, $today) {
                    $attendance = $staff->attendance_details->first();

                    // Lazy auto-attendance fallback: If the employer has auto-attendance enabled, 
                    // and no record exists, dynamically create it to cover for missed crons or late toggles.
                    $autoEnabled = $user->auto_attendence == "1" || $user->auto_attendence == 1 || $user->auto_attendence === true;
                    if (!$attendance && $autoEnabled) {
                        $rawDays = $staff->userWorkInfo?->working_days ?? ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
                        $workingDays3 = array_map(fn($d) => substr(strtolower($d), 0, 3), $rawDays);
                        $today3 = substr(strtolower(now()->format('l')), 0, 3);
                        
                        if (in_array($today3, $workingDays3)) {
                            try {
                                $attendance = \App\Models\Attendance::create([
                                    'staff_id'      => $staff->id,
                                    'date'          => $today,
                                    'check_in_time' => '07:00:00',
                                    'status'        => 'present',
                                    'description'   => 'Auto-marked by system (Dynamic)',
                                    'processed_by'  => 1,
                                ]);
                            } catch (\Exception $e) {
                                // Silent fail if duplicate insertion happens concurrently
                            }
                        }
                    }

                    return [
                        'id' => $staff->id,
                        'name' => $staff->first_name . ' ' . $staff->last_name,
                        'first_name' => $staff->first_name,
                        'last_name' => $staff->last_name,
                        'image' => $staff->image ? (str_contains($staff->image, 'http') ? $staff->image : url($staff->image)) : null,
                        'staff' => $staff, // Include full staff object for frontend compatibility
                        'attendance_details' => $attendance ?: [
                            'status' => 'absent', // Default to absent if no record for today
                            'date' => $today
                        ]
                    ];
                });

            return response()->json([
                'success' => true,
                'active_staff' => $staffMembers,
                'status' => [
                    'date' => $today
                ]
            ]);

        } catch (\Exception $e) {
            \Log::error('getActiveTodayUser failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch active staff',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
