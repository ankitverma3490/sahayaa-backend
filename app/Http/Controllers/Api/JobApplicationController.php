<?php

namespace App\Http\Controllers\Api;

use App\Models\Job;
use App\Models\QuitJob;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\LeaveType;
use App\Models\LeaveRequest;
use App\Models\User;
use App\Traits\ImageUpload;
use App\Models\Notification;

class JobApplicationController extends Controller
{
    use ImageUpload;

    // public function approvedJob(Request $request)
    // {

    //     // find user approved job application
    //     $application = JobApplication::where('user_id',Auth::guard('api')->user()->id)
    //         ->where('application_status', 'accepted')
    //         ->with('job.creator')
    //         ->first();

    //     if (!$application) {
    //         return response()->json([
    //             "message" => "No approved job found",
    //             "data" => null
    //         ], 404);
    //     }

    //     $job = $application->job;
    //     $employer = $job->creator;

    //     // accepted date (use created_at or a specific column if exists)
    //     $acceptedDate = $application->updated_at ?? now();

    //     // next pay date (7 days after acceptance)
    //     $nextPayDate = Carbon::parse($acceptedDate)->addDays(7)->format('F d, Y');

    //     // STATIC KEYS LIKE IMAGE
    //     $response = [

    //         "employer" => $employer->name ?? "Unknown Employer",
    //         "role" => $job->title ?? "Job Role",
    //         "joined_date" => Carbon::parse($acceptedDate)->format('F d, Y'),

    //         "salary_summary" => [
    //             "current_monthly_salary" => $job->compensation ?? 0,
    //             "next_pay_date" => $nextPayDate,
    //         ],

    //         "attendance_summary" => [
    //             "present_days" => 20,
    //             "late_arrivals" => 2,
    //             "absent_days" => 0
    //         ],

    //         "leave_balance" => [
    //             "annual" => 15,
    //             "sick" => 7,
    //             "casual" => 3
    //         ],

    //         "job_details" => [
    //             "job_id" => $job->id,
    //             "application_id" => $application->id,
    //             "application_status" => "accepted",
    //             "city" => $job->city ?? "",
    //             "state" => $job->state ?? "",
    //             "street_address" => $job->street_address ?? "",
    //             "commitment_type" => $job->commitment_type ?? "",
    //             "compensation_type" => $job->compensation_type ?? "",
    //         ]
    //     ];

    //     return response()->json([
    //         "message"   => "Approved job fetched successfully",
    //         "data"      => $response
    //     ]);
    // }

    public function approvedJob(Request $request)
    {
        $applications = JobApplication::where('user_id', Auth::guard('api')->user()->id)
            ->where('application_status', 'accepted')
            ->with('job.creator')
            ->get(); // <-- GET MULTIPLE

        if ($applications->isEmpty()) {
            return response()->json([
                "message" => "No approved job found",
                "data" => []
            ], 404);
        }

        $response = [];

        foreach ($applications as $application) {

            $job = $application->job ? $application->job->toArray() : [];
            $employer = $application->job && $application->job->creator
                ? $application->job->creator->toArray()
                : [];

            $acceptedDate = $application->updated_at ?? now();
            $nextPayDate = \Carbon\Carbon::parse($acceptedDate)->addDays(7)->format('F d, Y');

            $response[] = [
                "employer" => $employer['name'] ?? "Unknown Employer",
                "role" => $job['title'] ?? "Job Role",
                "joined_date" => \Carbon\Carbon::parse($acceptedDate)->format('F d, Y'),

                "salary_summary" => [
                    "current_monthly_salary" => $job['compensation'] ?? 0,
                    "next_pay_date" => $nextPayDate,
                ],

                "attendance_summary" => [
                    "present_days" => 20,
                    "late_arrivals" => 2,
                    "absent_days" => 0
                ],

                "leave_balance" => [
                    "annual" => 15,
                    "sick" => 7,
                    "casual" => 3
                ],

                "job_details" => [
                    "job_id" => $job['id'] ?? null,
                    "application_id" => $application->id,
                    "application_status" => "accepted",
                    "city" => $job['city'] ?? "",
                    "state" => $job['state'] ?? "",
                    "street_address" => $job['street_address'] ?? "",
                    "commitment_type" => $job['commitment_type'] ?? "",
                    "compensation_type" => $job['compensation_type'] ?? "",
                ]
            ];
        }

        return response()->json([
            "message" => "Approved jobs fetched successfully",
            "data" => $response
        ]);
    }


    public function index(Request $request): JsonResponse
    {
        $user = Auth::guard('api')->user();
        
       // if ($user->isAdmin()) {
            $applications = JobApplication::with(['job', 'user'])
                         ->orderBy('created_at', 'desc')
                         ->get();
        // } else {
        //     $applications = $user->jobApplications()
        //                  ->with(['job'])
        //                  ->orderBy('created_at', 'desc')
        //                  ->get();
        // }

        return response()->json([
            'status' => 'success',
            'data' => $applications,
            'message' => 'Applications retrieved successfully'
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'job_id' => 'required|exists:jobs,id',
            // 'cover_letter' => 'required|string|min:10|max:5000',
            'expected_salary' => 'nullable|numeric|min:0|max:9999999.99',
            'available_from' => 'required|date|after_or_equal:today',
            'is_advance' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Get authenticated user
            $user = Auth::guard('api')->user();
            if (!$user) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unauthenticated'
                ], 401);
            }

            $jobId = $request->job_id;

            // Check if job exists and is open
            $job = Job::find($jobId);
            if (!$job) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Job not found'
                ], 404);
            }

            if ($job->status !== 'open') {
                return response()->json([
                    'status' => 'error',
                    'message' => 'This job is not currently accepting applications'
                ], 400);
            }

            // Check for existing application
            $existingApplication = JobApplication::where('job_id', $jobId)
                                            ->where('user_id', $user->id)
                                            ->first();

            if ($existingApplication) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'You have already applied for this job'
                ], 400);
            }

            // Create application
            $application = JobApplication::create([
                'job_id' => $jobId,
                'user_id' => $user->id,
                'cover_letter' => $request->cover_letter ?? '',
                'expected_salary' => $request->expected_salary,
                'available_from' => $request->available_from,
                'is_advance' => $request->boolean('is_advance'),
                'application_status' => 'pending',
            ]);
            
            // Get job details
            $job = Job::find($jobId);
            
            // Send notification to house owner
            if ($job && $job->created_by) {
                Notification::create([
                    'user_id' => $job->created_by,
                    'title' => 'New Job Application',
                    'message' => $user->name . ' has applied for the job: ' . $job->title,
                    'type' => 'job_application',
                    'is_read' => 0
                ]);
            }
            
            // Send notification to staff
            Notification::create([
                'user_id' => $user->id,
                'title' => 'Application Submitted',
                'message' => 'Your application for ' . ($job ? $job->title : 'the job') . ' has been submitted successfully',
                'type' => 'job_application',
                'is_read' => 0
            ]);

            return response()->json([
                'status' => 'success',
                'data' => $application->load('job'),
                'message' => 'Application submitted successfully'
            ], 201);

        } catch (\Exception $e) {
            \Log::error('Job application error: ' . $e->getMessage());
            
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to submit application. Please try again.'
            ], 500);
        }
    }

    public function updateApplicationStatus(Request $request, $id): JsonResponse
    {
       
        $validator = Validator::make($request->all(), [
            'application_status' => 'required|in:pending,reviewed,accepted,rejected'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $application = JobApplication::find($id);

        if (!$application) {
            return response()->json([
                'status' => 'error',
                'message' => 'Application not found'
            ], 404);
        }

        $application->update(['application_status' => $request->application_status]);
        
        // Get job and user details
        $job = Job::find($application->job_id);
        $staff = User::find($application->user_id);
        
        if ($request->application_status == "accepted") {
            $user = User::find($application->user_id);
            $user->update([
                'is_staff_added' => 1,
                'added_by' => Auth::guard('api')->user()->id
            ]);
            
            // Send notification to staff
            if ($staff) {
                Notification::create([
                    'user_id' => $staff->id,
                    'title' => 'Application Accepted',
                    'message' => 'Congratulations! Your application for ' . ($job ? $job->title : 'the job') . ' has been accepted',
                    'type' => 'job_application_accepted',
                    'is_read' => 0
                ]);
            }
        }

        if ($request->application_status == "rejected") {
            $user = User::find($application->user_id);

            $user->update([
                'is_staff_added' => 0,
                'added_by' => null
            ]);
            
            // Send notification to staff
            if ($staff) {
                Notification::create([
                    'user_id' => $staff->id,
                    'title' => 'Application Rejected',
                    'message' => 'Your application for ' . ($job ? $job->title : 'the job') . ' has been rejected',
                    'type' => 'job_application_rejected',
                    'is_read' => 0
                ]);
            }
        }

        return response()->json([
            'status' => 'success',
            'data' => $application,
            'message' => 'Application status updated successfully'
        ]);
    }

    public function getJobApplications($jobId): JsonResponse
    {
      
        $applications = JobApplication::with('user')
                         ->where('job_id', $jobId)
                         ->orderBy('created_at', 'desc')
                         ->get();

        return response()->json([
            'status' => 'success',
            'data' => $applications,
            'message' => 'Job applications retrieved successfully'
        ]);
    }

    public function destroy($id): JsonResponse
    {
        $application = JobApplication::find($id);

        if (!$application) {
            return response()->json([
                'status' => 'error',
                'message' => 'Application not found'
            ], 404);
        }
      
        $application->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Application deleted successfully'
        ]);
    }

    public function requestQuitJob(Request $request)
    {
        $request->validate([
            "job_id" => "required|exists:jobs,id",
            "end_date" => "required|date",
            "reason" => "required|string"
        ]);
        $userId =  Auth::guard('api')->user()->id;
        $quit = QuitJob::create([
            "job_id" => $request->job_id,
            "user_id" => $userId,
            "end_date" => $request->end_date,
            "reason" => $request->reason,
            "status" => "pending"
        ]);
        
        // Get job and house owner details
        $job = Job::find($request->job_id);
        $staff = Auth::guard('api')->user();
        
        // Send notification to house owner
        if ($job && $job->created_by) {
            Notification::create([
                'user_id' => $job->created_by,
                'title' => 'Job Quit Request',
                'message' => $staff->name . ' has requested to quit the job: ' . $job->title,
                'type' => 'job_quit',
                'is_read' => 0
            ]);
        }
        
        // Send notification to staff
        Notification::create([
            'user_id' => $userId,
            'title' => 'Quit Request Submitted',
            'message' => 'Your quit request for ' . ($job ? $job->title : 'the job') . ' has been submitted successfully',
            'type' => 'job_quit',
            'is_read' => 0
        ]);
        
        return response()->json([
            "message" => "Quit request submitted successfully",
            "data" => $quit
        ], 201);
    }


    public function applyLeave(Request $request)
    {
        $request->validate([
            "houseowner_id" => "required|exists:users,id",
            "leave_type_id" => "required|exists:leave_types,id",
            "start_date" => "required|date",
            "end_date" => "required|date",
            "reason" => "required|string",
            "supporting_document" => "nullable|file|mimes:jpg,jpeg,png,pdf|max:2048"
        ]);

        $user = Auth::guard('api')->user();

        $filePath = null;

        if ($request->hasFile('supporting_document')) {
                $directory = "uploads/leave_documents";
                // if (!file_exists(public_path($directory))) mkdir(public_path($directory), 0755, true);
                // $image = $request->file('supporting_document');
                // $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                // $image->move(public_path($directory), $fileName);
                // $path = $directory . '/' . $fileName;
                // if ($user->image && file_exists(public_path($user->image))) unlink(public_path($user->image));
                $path = $this->uploadCloudary($request,"supporting_document",$directory);
                $filePath = $path;
        }
        $leave = LeaveRequest::create([
            "user_id" => $user->id,
            'houseowner_id' => $request->houseowner_id,
            "leave_type_id" => $request->leave_type_id,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "reason" => $request->reason,
            "status" => "pending",
            "supporting_document" => $filePath,
            "created_by" => $user->id
        ]);

        Notification::create([
            'user_id' => $user->id,
            'title' => 'Apply Leave',
            'message' => 'Your have apply leave request successfully.',
            'status' => 'unread',
        ]);

        return response()->json([
            "status" => true,
            "message" => "Leave request submitted successfully",
            "data" => $leave
        ], 201);
    }



    public function leaveList(Request $request)
    { 
        // 1. Logged in API user ID
        $user = Auth::user();
        // 2. Get all job IDs created by this user
        if($user->user_role_id == 2){
            $leaveRequests = LeaveRequest::with(['user', 'leaveType'])
            ->whereIn('created_by', $user->id)
            ->orderBy('id', 'desc')
            ->get();
        } elseif($user->user_role_id == 1){
            $leaveRequests = LeaveRequest::with(['user', 'leaveType'])->orderBy('id', 'desc')
            ->get();
        } else {
            $leaveRequests = LeaveRequest::with(['user', 'leaveType'])
            ->where('houseowner_id', $user->id)
            ->orderBy('id', 'desc')
            ->get();
        }
        return response()->json([
            'status' => true,
            'message' => 'Leave requests fetched successfully',
            'data' => $leaveRequests
        ], 200);
    }
    /**
     * Approve Leave Request
     */
    public function approve($id)
    {
        $leave = LeaveRequest::find($id);
        if (!$leave) {
            return response()->json([
                'status' => false,
                'message' => 'Leave request not found'
            ], 404);
        }
        $leave->status = 'approved';
        $leave->save();

        Notification::create([
            'user_id' => $leave->user_id,
            'title' => 'Leave Approved',
            'message' => 'Your leave request has been approved.',
            'status' => 'unread',
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Leave request approved successfully',
            'data' => $leave
        ], 200);
    }

    /**
     * Reject Leave Request
     */
    public function reject($id)
    {
        $leave = LeaveRequest::find($id);
        if (!$leave) {
            return response()->json([
                'status' => false,
                'message' => 'Leave request not found'
            ], 404);
        }
        $leave->status = 'rejected';
        $leave->save();

        Notification::create([
            'user_id' => $leave->user_id,
            'title' => 'Leave Rejected',
            'message' => 'Your leave request has been rejected.',
            'status' => 'unread',
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Leave request rejected successfully',
            'data' => $leave
        ], 200);
    }



    public function leaveTypeList()
    {
        $types = LeaveType::all();

        return response()->json([
            "status" => true,
            "message" => "Leave type list fetched successfully",
            "data" => $types
        ], 200);
    }



}