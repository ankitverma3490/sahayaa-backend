<?php

namespace App\Http\Controllers\Api;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
 public function index(Request $request): JsonResponse
{
    $user = Auth::guard('api')->user();
    
    $jobs = Job::withCount('applications')
              ->when($user, function ($query) use ($user) {
                  $query->addSelect([
                      'is_applied' => JobApplication::selectRaw('COUNT(*)')
                          ->whereColumn('job_id', 'jobs.id')
                          ->where('user_id', $user->id)
                  ]);
              })
              ->orderBy('created_at', 'desc')
              ->get();
    
    if (!$user) {
        $jobs->each(function ($job) {
            $job->is_applied = 0;
        });
    } else {
        $jobs->each(function ($job) {
            $job->is_applied = $job->is_applied > 0 ? 1 : 0;
        });
    }

    return response()->json([
        'status' => 'success',
        'data' => $jobs,
        'message' => 'Jobs retrieved successfully'
    ]);
}
      public function authBaseList(Request $request): JsonResponse
    {
        $user = Auth::guard('api')->user();
        
            $jobs = Job::withCount('applications')
                    ->where('created_by',$user->id)
                      ->orderBy('created_at', 'desc')
                      ->get();
        

        return response()->json([
            'status' => 'success',
            'data' => $jobs,
            'message' => 'Jobs retrieved successfully'
        ]);
    }

    public function store(Request $request): JsonResponse
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'compensation' => 'nullable|numeric',
            'expected_compensation' => 'nullable|numeric',
            'compensation_type' => 'required|in:monthly,hourly,yearly',
            'street_address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip_code' => 'required|string',
            'commitment_type' => 'required|in:full-time,part-time,flexible',
            'preferred_hours' => 'nullable|string',
            'preferred_days' => 'nullable|string',
            'childcare_experience' => 'boolean',
            'cooking_required' => 'boolean',
            'driving_license_required' => 'boolean',
            'first_aid_certified' => 'boolean',
            'pet_care_required' => 'boolean',
            'additional_requirements' => 'nullable|string',
            'required_skills' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }
        $job = Job::create(array_merge($validator->validated(), [
            'created_by' => Auth::guard('api')->user()->id,
            'status' => 'pending'
        ]));

        return response()->json([
            'status' => 'success',
            'data' => $job,
            'message' => 'Job created successfully'
        ], 201);
    }

    public function show($id): JsonResponse
    {
        $job = Job::with(['creator', 'applications.user'])->find($id);

        if (!$job) {
            return response()->json([
                'status' => 'error',
                'message' => 'Job not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $job,
            'message' => 'Job retrieved successfully'
        ]);
    }

    public function update(Request $request, $id): JsonResponse
    {

        $job = Job::find($id);

        if (!$job) {
            return response()->json([
                'status' => 'error',
                'message' => 'Job not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'compensation' => 'nullable|numeric',
            'expected_compensation' => 'nullable|numeric',
            'compensation_type' => 'sometimes|required|in:monthly,hourly,yearly',
            'street_address' => 'sometimes|required|string',
            'city' => 'sometimes|required|string',
            'state' => 'sometimes|required|string',
            'zip_code' => 'sometimes|required|string',
            'commitment_type' => 'sometimes|required|in:full-time,part-time,flexible',
            'preferred_hours' => 'nullable|string',
            'preferred_days' => 'nullable|string',
            'status' => 'sometimes|required|in:pending,open,closed',
            'childcare_experience' => 'boolean',
            'cooking_required' => 'boolean',
            'driving_license_required' => 'boolean',
            'first_aid_certified' => 'boolean',
            'pet_care_required' => 'boolean',
            'additional_requirements' => 'nullable|string',
            'required_skills' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $job->update($validator->validated());

        return response()->json([
            'status' => 'success',
            'data' => $job,
            'message' => 'Job updated successfully'
        ]);
    }

    public function deleteJob($id): JsonResponse
    {
       
        $job = Job::find($id);

        if (!$job) {
            return response()->json([
                'status' => 'error',
                'message' => 'Job not found'
            ], 404);
        }

        $job->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Job deleted successfully'
        ]);
    }

    public function updateStatus(Request $request, $id): JsonResponse
    {
       

        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,open,closed'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $job = Job::find($id);

        if (!$job) {
            return response()->json([
                'status' => 'error',
                'message' => 'Job not found'
            ], 404);
        }

        $job->update(['status' => $request->status]);

        return response()->json([
            'status' => 'success',
            'data' => $job,
            'message' => 'Job status updated successfully'
        ]);
    }
}