<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Job;
use App\Models\Attendance; 
use App\Models\SubscriptionUser; 
use Carbon\Carbon; 
use Illuminate\Support\Facades\Validator;
use App\Models\Salary;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Role::where('slug', 'staff')->first();
        $houseOwner = Role::where('slug', 'householder')->first();
        $staffDataCount = User::where('user_role_id', $staff->id)->count();
        $houseOwnerDataCount = User::where('user_role_id', $houseOwner->id)->count();
        $openJobCount = Job::where('status', 'open')->count();
        $presentAttendanceCount = Attendance::where('date', Carbon::today())->where('status', 'present')->count();
        $absentAttendanceCount = Attendance::where('date', Carbon::today())->where('status', 'absent')->count();
        
        $leaveCount = Attendance::where('date', Carbon::today())->where('status', 'leave')->count();
        $totalAttendance = $presentAttendanceCount + $absentAttendanceCount + $leaveCount;
        $attendanceRate = $totalAttendance > 0  ? round(($presentAttendanceCount / $totalAttendance) * 100, 2) : 0;
        
        
        $data = [
            'staff_count' => $staffDataCount,
            'job_count' => $openJobCount,
            'house_owner_count' => $houseOwnerDataCount,
            'present_attendance_count' => $presentAttendanceCount,
            'absent_attendance_count' => $absentAttendanceCount,
            'leave' => $leaveCount,
            'overall_attendance_rate' => $attendanceRate
        ];
        return response()->json([
            'status' => 'success',
            'data' => $data,
            'message' => 'Dashboard data retrieved successfully'
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
        //
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

    public function report(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'type' => 'required|in:monthly,yearly',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }
        
        $type = $request->type;
        
        // Date filter
        if ($type == 'monthly') {
            $startDate = Carbon::now()->startOfMonth();
            $endDate   = Carbon::now()->endOfMonth();
        } else {
            $startDate = Carbon::now()->startOfYear();
            $endDate   = Carbon::now()->endOfYear();
        }
        

        $staff = Role::where('slug', 'staff')->first();
        $houseOwner = Role::where('slug', 'householder')->first();

        $staffDataCount = User::where('user_role_id', $staff->id)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();
        
        $houseOwnerDataCount = User::where('user_role_id', $houseOwner->id)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();

        $openJobCount = Job::where('status', 'open')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();

        $memberSubscriptionRevenue = SubscriptionUser::whereBetween('created_at', [$startDate, $endDate])->sum('amount');
        $memberSalarySum = Salary::whereBetween('payment_date', [$startDate, $endDate])->where('status', 'paid')->sum('amount');
        
        $presentAttendanceCount = Attendance::whereBetween('date', [$startDate, $endDate])
            ->where('status', 'present')
            ->count();

        $absentAttendanceCount = Attendance::whereBetween('date', [$startDate, $endDate])
            ->where('status', 'absent')
            ->count();
        
        $leaveCount = Attendance::whereBetween('date', [$startDate, $endDate])
            ->where('status', 'leave')
            ->count();
        $totalAttendance = $presentAttendanceCount + $absentAttendanceCount + $leaveCount;
        $attendanceRate = $totalAttendance > 0  ? round(($presentAttendanceCount / $totalAttendance) * 100, 2) : 0;
        
        $revenueOverview = [];
        if ($type == 'monthly') {
            $revenues = SubscriptionUser::selectRaw('DATE(created_at) as date, SUM(amount) as total')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->where('payment_status', 'paid')
                ->groupBy('date')
                ->orderBy('date')
                ->get();
            foreach ($revenues as $revenue) {
                $revenueOverview[] = [
                    'label' => Carbon::parse($revenue->date)->format('d M'),
                    'revenue' => (float) $revenue->total
                ];
            }
        } else {
            $startDate = Carbon::now()->startOfYear();
            $endDate = Carbon::now()->endOfYear();
            $revenues = SubscriptionUser::selectRaw('MONTH(created_at) as month, SUM(amount) as total')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->where('payment_status', 'paid')
                ->groupBy('month')
                ->orderBy('month')
                ->get();
            foreach ($revenues as $revenue) {
                $revenueOverview[] = [
                    'label' => Carbon::create()->month($revenue->month)->format('M'),
                    'revenue' => (float) $revenue->total
                ];
            }
        }
            
        $data = [
            'staff_count' => $staffDataCount,
            'job_count' => $openJobCount,
            'house_owner_count' => $houseOwnerDataCount,
            'present_attendance_count' => $presentAttendanceCount,
            'absent_attendance_count' => $absentAttendanceCount,
            'leave' => 0,
            'overall_attendance_rate' => $attendanceRate,
            'member_subscription_revenue' => $memberSubscriptionRevenue,
            'member_salary_paid' => $memberSalarySum,
            'chartdata' =>  [
                'revenue_overview' => $revenueOverview
            ]
        ];
        return response()->json([
            'status' => 'success',
            'data' => $data,
            'message' => 'Report data retrieved successfully'
        ]);
    }
}
