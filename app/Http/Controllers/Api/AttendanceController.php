<?php
// app/Http/Controllers/Api/AttendanceController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $attendance = Attendance::query();

        if ($request->has('start_date') && $request->has('end_date')) {
            $attendance->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        if ($request->has('staff_id')) {
            $attendance->where('staff_id', $request->staff_id);
        }

        if ($request->has('status')) {
            $attendance->where('status', $request->status);
        }

        $data = $attendance->orderBy('date', 'desc')->get();

        return response()->json([
            'status' => true,
            'data' => $data
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'staff_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'status' => 'required|in:present,absent,late',
            'check_in_time' => 'required_if:status,present,late|nullable',
            'late_minutes' => 'required_if:status,late|nullable|integer|min:1',
            'leave_id' => 'required_if:status,absent|nullable',
            'description' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();

        // try {
            // $existing = Attendance::where('staff_id', $request->staff_id)
            //     ->where('date', $request->date)
            //     ->first();

            // if ($existing) {
            //     return response()->json([
            //         'status' => false,
            //         'message' => 'Attendance already exists for this staff on the selected date'
            //     ], 400);
            // }

            $attendanceData = [
                'staff_id' => $request->staff_id,
                'date' => $request->date,
                'status' => $request->status,
                'description' => $request->description,
                'processed_by' => Auth::guard('api')->user()->id
            ];

            if ($request->status == 'present' || $request->status == 'late') {
                $attendanceData['check_in_time'] = $request->check_in_time;
            }

            if ($request->status == 'late') {
                $attendanceData['late_minutes'] = $request->late_minutes;
            }

            if ($request->status == 'absent') {
                $attendanceData['leave_id'] = $request->leave_id;
            }

            $attendance = Attendance::create($attendanceData);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Attendance created successfully',
                'data' => $attendance
            ], 201);

        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Failed to create attendance'
        //     ], 500);
        // }
    }

    public function show($id): JsonResponse
    {
        $attendance = Attendance::find($id);

        if (!$attendance) {
            return response()->json([
                'status' => false,
                'message' => 'Attendance not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $attendance
        ], 200);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'staff_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'status' => 'required|in:present,absent,late',
            'check_in_time' => 'required_if:status,present,late|nullable',
            'late_minutes' => 'required_if:status,late|nullable|integer|min:1',
            'leave_id' => 'required_if:status,absent|nullable',
            'description' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();

        try {
            $attendance = Attendance::find($id);

            if (!$attendance) {
                return response()->json([
                    'status' => false,
                    'message' => 'Attendance not found'
                ], 404);
            }

            $existing = Attendance::where('staff_id', $request->staff_id)
                ->where('date', $request->date)
                ->where('id', '!=', $id)
                ->first();

            if ($existing) {
                return response()->json([
                    'status' => false,
                    'message' => 'Attendance already exists for this staff on the selected date'
                ], 400);
            }

            $attendanceData = [
                'staff_id' => $request->staff_id,
                'date' => $request->date,
                'status' => $request->status,
                'description' => $request->description,
                'processed_by' => Auth::guard('api')->user()->id
            ];

            if ($request->status == 'present' || $request->status == 'late') {
                $attendanceData['check_in_time'] = $request->check_in_time;
            } else {
                $attendanceData['check_in_time'] = null;
            }

            if ($request->status == 'late') {
                $attendanceData['late_minutes'] = $request->late_minutes;
            } else {
                $attendanceData['late_minutes'] = null;
            }

            if ($request->status == 'absent') {
                $attendanceData['leave_id'] = $request->leave_id;
            } else {
                $attendanceData['leave_id'] = null;
            }

            $attendance->update($attendanceData);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Attendance updated successfully',
                'data' => $attendance
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Failed to update attendance'
            ], 500);
        }
    }

    public function destroy($id): JsonResponse
    {
        DB::beginTransaction();

        try {
            $attendance = Attendance::find($id);

            if (!$attendance) {
                return response()->json([
                    'status' => false,
                    'message' => 'Attendance not found'
                ], 404);
            }

            $attendance->delete();

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Attendance deleted successfully'
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Failed to delete attendance'
            ], 500);
        }
    }
}