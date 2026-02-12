<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
}
