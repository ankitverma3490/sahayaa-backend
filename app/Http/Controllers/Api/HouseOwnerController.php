<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HouseOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $status = $request->query('status');
        // Admin
        if (Auth::user()->user_role_id == 1) {
            $role = Role::where('slug', 'householder')->firstOrFail();
            $query = User::where('user_role_id', $role->id);
            // 🔍 Search filter
            if (!empty($search)) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
                });
            }
            // 🟢 Status filter
            if (!empty($status)) {
                $query->where('status', $status);
            }
            $users = $query->latest()->get();
        } else {
            $users = User::where('id', Auth::id())->get();
        }

        return response()->json([
            'success' => true,
            'message' => 'Householders retrieved successfully',
            'data' => $users
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
        $role = Role::where('slug', 'householder')->first();
        $house = User::where('id', $id)->where('user_role_id', $role->id)->first();
        return response()->json([
            'success' => true,
            'data' => $house
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
        $house = User::where('id', $id)->first();
        $house->delete();
        return response()->json([
            'success' => true,
            'message' => 'House owner deleted successfully'
        ]);
    }
}
