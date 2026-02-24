<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Termination;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class TerminationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terminations = Termination::with(['user','approver'])
            ->latest()
            ->paginate(10);

        return response()->json([
            'success' => true,
            'message' => 'Termination list',
            'data' => $terminations
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
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'reason' => 'required|string',
            'termination_date' => 'required|date',
            'notice_period_days' => 'nullable|integer|min:0',
            'status' => 'nullable|in:pending,approved,rejected',
            'remarks' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }
        
        $termination = Termination::create($request->all());

        Notification::create([
            'user_id' => $termination->user_id,
            'title' => 'Termination Request',
            'message' => 'Your termination request has been submitted.',
            'status' => 'unread',
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Termination created successfully',
            'data' => $termination
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $termination = Termination::findOrFail($id);
        return response()->json([
            'success' => true,
            'message' => 'Termination details',
            'data' => $termination
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
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'reason' => 'required|string',
            'termination_date' => 'required|date',
            'notice_period_days' => 'nullable|integer|min:0',
            'status' => 'nullable|in:pending,approved,rejected',
            'remarks' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $termination = Termination::findOrFail($id);
        $termination->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Termination updated successfully',
            'data' => $termination
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $termination = Termination::findOrFail($id);
        $termination->delete();
        return response()->json([
            'success' => true,
            'message' => 'Termination deleted successfully'
        ]);
    }
}
