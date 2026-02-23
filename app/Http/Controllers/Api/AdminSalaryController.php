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

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string'
        ]);

        if(!in_array($request->status, ['paid', 'unpaid', 'pending'])) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid status'
            ], 400);
        }
        
        $salary = Salary::findOrFail($id);
        $salary->status = $request->status;
        $salary->save();
        
        return response()->json([
            'status' => true,
            'message' => 'Salary updated successfully',
            'data' => $salary
        ], 200);
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'staff_id' => 'required|exists:users,id',
            'houseowner_id' => 'required|exists:users,id',
            'basic_salary' => 'required|numeric',
            'performative_allowance' => 'nullable|numeric',
            'over_time_allowance' => 'nullable|numeric',
            'tax' => 'nullable|numeric',
            'advance_payment' => 'nullable|numeric',
            'status' => 'required|in:pending,paid',
            'payment_mode' => 'nullable|string'
        ]);
        
        // Calculate Net Salary (Secure Way)
        $netSalary =
            $request->basic_salary
            + ($request->performative_allowance ?? 0)
            + ($request->over_time_allowance ?? 0)
            - ($request->tax ?? 0)
            - ($request->advance_payment ?? 0);
        
        $salary = Salary::create([
            'staff_id' => $request->staff_id,
            'houseowner_id' => $request->houseowner_id,
            'basic_salary' => $request->basic_salary,
            'performative_allowance' => $request->performative_allowance ?? 0,
            'over_time_allowance' => $request->over_time_allowance ?? 0,
            'tax' => $request->tax ?? 0,
            'advance_payment' => $request->advance_payment ?? 0,
            'net_salary' => $netSalary,
            'payment_mode' => $request->payment_mode,
            'status' => $request->status,
            'payment_date' => now()->toDateString(), // auto today
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Salary created successfully',
            'data' => $salary
        ]);
    }

}
