<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\User;
use App\Models\Notification;
use App\Models\StaffAdvance;
use App\Models\AdvanceTransaction;
use App\Models\UserWorkInfo;
use Illuminate\Support\Facades\DB;


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
        $oldStatus = $salary->status;
        $salary->status = $request->status;
        $salary->save();
        
        // Send notification to staff when salary is marked as paid
        if ($request->status === 'paid' && $oldStatus !== 'paid') {
            $staff = User::find($salary->staff_id);
            if ($staff) {
                Notification::create([
                    'user_id' => $staff->id,
                    'title' => 'Salary Paid',
                    'message' => 'Your salary of ₹' . number_format($salary->net_salary, 2) . ' has been paid',
                    'type' => 'salary_paid',
                    'is_read' => 0
                ]);
            }
        }
        
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

        // ✅ Calculate Net Salary
        $netSalary =
            $request->basic_salary
            + ($request->performative_allowance ?? 0)
            + ($request->over_time_allowance ?? 0)
            - ($request->tax ?? 0)
            - ($request->advance_payment ?? 0);
        
        // ✅ Create Salary
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
            'payment_date' => now()->toDateString(),
        ]);

        // ✅ CRITICAL FIX: Update UserWorkInfo with new base salary to ensure consistency
        UserWorkInfo::updateOrCreate(
            ['user_id' => $request->staff_id],
            ['salary' => $request->basic_salary]
        );
        
        // Send notification to staff if salary is marked as paid
        if ($request->status === 'paid') {
            $staff = User::find($request->staff_id);
            if ($staff) {
                Notification::create([
                    'user_id' => $staff->id,
                    'title' => 'Salary Paid',
                    'message' => 'Your salary of ₹' . number_format($netSalary, 2) . ' has been paid',
                    'type' => 'salary_paid',
                    'is_read' => 0
                ]);
            }
        }
        
        // ✅ Auto-deduct from StaffAdvance table (installment / full logic)
        // Process oldest active advance first (FIFO)
        $employerId = auth()->id();
        $remainingToDeduct = (float)($request->advance_payment ?? 0);

        if ($remainingToDeduct > 0) {
            $activeAdvances = StaffAdvance::where('staff_id', $request->staff_id)
                ->where('employer_id', $employerId)
                ->where('status', 'active')
                ->orderBy('created_at', 'asc') // oldest first
                ->get();

            foreach ($activeAdvances as $advance) {
                if ($remainingToDeduct <= 0) break;

                // How much to deduct from this advance
                $deductFromThis = min($remainingToDeduct, (float)$advance->remaining_balance);
                $balanceAfter   = $advance->remaining_balance - $deductFromThis;

                // Record transaction
                AdvanceTransaction::create([
                    'advance_id'      => $advance->id,
                    'staff_id'        => $advance->staff_id,
                    'employer_id'     => $employerId,
                    'deducted_amount' => $deductFromThis,
                    'balance_after'   => $balanceAfter,
                    'salary_id'       => $salary->id,
                    'note'            => 'Salary deduction (' . ucfirst($advance->deduction_type) . ')',
                ]);

                // Update advance balance
                $advance->remaining_balance = $balanceAfter;
                if ($balanceAfter <= 0) {
                    $advance->status = 'closed';
                }
                $advance->save();

                $remainingToDeduct -= $deductFromThis;
            }

            // Also update legacy advance_withdraw_amount on users table
            $user = User::find($request->staff_id);
            if ($user) {
                $user->advance_withdraw_amount = max(0, $user->advance_withdraw_amount - ($request->advance_payment ?? 0));
                $user->advance_withdraw_added_by = $employerId;
                $user->save();
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Salary created successfully',
            'data' => $salary
        ]);
    }

}
