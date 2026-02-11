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

    /**
     * Retrieve a list of jobs that the authenticated user has created.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function authBaseList(Request $request): JsonResponse
    {
        $perPage = min($request->get('per_page', 10), 50);

        $query = Job::withCount('applications')
            ->where('created_by', Auth::user()->id);

        // 🔍 Filter by Job Title
        if ($request->filled('title')) {
            $query->where('title', 'LIKE', '%' . $request->title . '%');
        }

        // 📍 Filter by city
        if ($request->filled('city')) {
            $query->where('city', 'LIKE', '%' . $request->city . '%');
        }

        $jobs = $query
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        return response()->json([
            'status'  => 'success',
            'message' => 'Jobs retrieved successfully',
            'data'    => $jobs,
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

    /**
     * Delete a job
     *
     * @param int $id The ID of the job to delete
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        // Check if the job exists
        $job = Job::find($id);
        if (!$job) {
            return response()->json([
                'status' => 'error',
                'message' => 'Job not found'
            ], 404);
        }

        // Delete the job
        $job->delete();

        // Return a success response
        return response()->json([
            'status' => 'success',
            'message' => 'Job deleted successfully'
        ]);
    }

    /**
     * Update the status of a job
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function updateStatus(Request $request, int $id): JsonResponse
    {
        // Validate the request body
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,open,closed,paused'
        ]);

        // If validation fails, return a 422 response with errors
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        // Find the job by ID
        $job = Job::find($id);

        // If the job is not found, return a 404 response
        if (!$job) {
            return response()->json([
                'status' => 'error',
                'message' => 'Job not found'
            ], 404);
        }

        // Update the job status
        $job->update(['status' => $request->status]);

        // Return a successful response with the updated job
        return response()->json([
            'status' => 'success',
            'data' => $job,
            'message' => 'Job status updated successfully'
        ]);
    }

    public function joblist(Request $request)
    {
        $user = Auth::user();
        $jobs = Job::orderBy('created_at', 'desc')->paginate(10);
        
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
            'message' => 'Jobs retrieved successfully',
            'data' => $jobs
        ]);
    }
    

}