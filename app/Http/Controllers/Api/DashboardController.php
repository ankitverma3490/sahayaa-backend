<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Job;

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
        

        
        $data = [
            'staff_count' => $staffDataCount,
            'job_count' => $openJobCount,
            'house_owner_count' => $houseOwnerDataCount,
            'present_attendance_count' => $presentAttendanceCount,
            'absent_attendance_count' => $absentAttendanceCount,
            'leave' => 0,
            'overall_attendance_rate' => 88
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
}
