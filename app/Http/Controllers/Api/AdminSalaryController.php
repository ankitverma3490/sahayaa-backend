<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salary;

class AdminSalaryController extends Controller
{
    public function index(Request $request)
    {
        $query = Salary::with('staff');

        // Filter by month (format: 2026-02)
        if ($request->month) {
            $query->whereYear('payment_date', substr($request->month, 0, 4))
                  ->whereMonth('payment_date', substr($request->month, 5, 2));
        }
        
        // Filter by status
        if ($request->status) {
            $query->where('status', $request->status);
        }

        // Filter by staff name
        if ($request->name) {
            $query->whereHas('staff', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->name . '%');
            });
        }
        
        $salaries = $query->orderBy('payment_date', 'desc')->paginate(10);
        
        return response()->json([
            'status' => true,
            'message' => 'Salaries retrieved successfully',
            'data' => $salaries
        ], 200);
    }
}
