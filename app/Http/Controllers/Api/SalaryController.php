<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Models\Transaction;
use Carbon\Carbon;
use App\Models\LeaveRequest;
use App\Models\Attendance;
use App\Models\UserWorkInfo;
class SalaryController extends Controller
{
    /**
     * Get staff salary information
     */
    // public function getStaffSalary($user_id): JsonResponse
    // {
    //     try {
    //         $user = User::where('id', $user_id)
    //             ->where('user_role_id', 2)
    //             ->first();

    //         if (!$user) {
    //             return response()->json([
    //                 'status' => false,
    //                 'message' => 'Staff member not found'
    //             ], 404);
    //         }
    //         $acceptedApplication = JobApplication::where('user_id', $user_id)
    //             ->where('application_status', 'accepted')
    //             ->first();

    //         if (!$acceptedApplication) {
    //             return response()->json([
    //                 'status' => false,
    //                 'message' => 'User does not have any accepted job applications'
    //             ], 400);
    //         }
    //         $job = $acceptedApplication->job;
    //          $lastMonth = Carbon::now()->subMonth()->format('F Y');
    //     $lastMonthPayment = Payment::where('staff_id', $user_id)
    //         ->where('salary_period', 'like', '%' . $lastMonth . '%')
    //         ->orderBy('created_at', 'desc')
    //         ->first();
    //         $salaryData = [
    //             'staff_member' => $user,
    //             'salary_details' => [
    //                 'base_salary' => [
    //                     'monthly_salary' => $job->compensation ?? 2500.00,
    //                     'period' => date('F-Y'),
    //                 ],
    //                 'adjustments' => [
    //                     'performance_bonus' => 0.00,
    //                     'overtime_pay' => 0.00,
    //                     'tax_deduction' => 0.00,
    //                     'advance_payment' => 0.00
    //                 ],
    //                   'last_month_salary' => $lastMonthPayment ? [
    //             'payment_id' => $lastMonthPayment->payment_id,
    //             'base_salary' => (float) $lastMonthPayment->base_salary,
    //             'performance_bonus' => (float) $lastMonthPayment->performance_bonus,
    //             'overtime_pay' => (float) $lastMonthPayment->overtime_pay,
    //             'tax_deduction' => (float) $lastMonthPayment->tax_deduction,
    //             'advance_payment' => (float) $lastMonthPayment->advance_payment,
    //             'net_salary' => (float) $lastMonthPayment->net_salary,
    //             'payment_method' => $lastMonthPayment->payment_mode,
    //             'salary_period' => $lastMonthPayment->salary_period,
    //             'payment_status' => $lastMonthPayment->status,
    //             'paid_date' => $lastMonthPayment->updated_at->format('Y-m-d H:i:s')
    //         ] : null,

            
    //                 'net_salary' => $job->compensation ?? 0.00,
    //                 'payment_method' => 'Cash'
    //             ]
    //         ];
    //         $baseSalary = $salaryData['salary_details']['base_salary']['monthly_salary'];
    //         $adjustments = $salaryData['salary_details']['adjustments'];
    //         $netSalary = $baseSalary + $adjustments['performance_bonus'] + $adjustments['overtime_pay'] + 
    //                     $adjustments['tax_deduction'] + $adjustments['advance_payment'];
            
    //         $salaryData['salary_details']['net_salary'] = $netSalary;
    //         return response()->json([
    //             'status' => true,
    //             'message' => 'Staff salary data retrieved successfully',
    //             'data' => $salaryData
    //         ]);

    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Failed to retrieve salary data: ' . $e->getMessage()
    //         ], 500);
    //     }
    // }


    public function getStaffSalary($user_id): JsonResponse
{
    try {
        $user = User::where('id', $user_id)
            ->where('user_role_id', 2)
            ->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Staff member not found'
            ], 404);
        }

        // Try to get salary from accepted job application first
        $acceptedApplication = JobApplication::where('user_id', $user_id)
            ->where('application_status', 'accepted')
            ->first();

        // If no accepted job application, get salary from UserWorkInfo (staff update form)
        if (!$acceptedApplication) {
            $userWorkInfo = UserWorkInfo::where('user_id', $user_id)->first();
            if (!$userWorkInfo || !$userWorkInfo->salary) {
                return response()->json([
                    'status' => false,
                    'message' => 'User does not have any accepted job applications and no salary information is available'
                ], 400);
            }

            // Use salary from UserWorkInfo
            $baseSalary = (float) $userWorkInfo->salary;
            $jobCompensation = $baseSalary;
        } else {
            // Use salary from accepted job application
            $job = $acceptedApplication->job;
            $jobCompensation = $job->compensation ?? 0.00;
            $baseSalary = (float) $jobCompensation;
        }

        // Get last month payment
        $lastMonth = Carbon::now()->subMonth()->format('F Y');
        $lastMonthPayment = Payment::where('staff_id', $user_id)
            ->where('salary_period', 'like', '%' . $lastMonth . '%')
            ->orderBy('created_at', 'desc')
            ->first();

        // Get pay frequency from UserWorkInfo if available
        $payFrequency = 'Monthly'; // Default
        if (isset($userWorkInfo) && $userWorkInfo->pay_frequency) {
            $payFrequency = $userWorkInfo->pay_frequency;
        } elseif ($acceptedApplication && $acceptedApplication->job) {
            // You might want to add pay_frequency to job or job_application if needed
            $payFrequency = $acceptedApplication->job->pay_frequency ?? 'Monthly';
        }

        $salaryData = [
            'staff_member' => $user,
            'salary_details' => [
                'base_salary' => [
                    'monthly_salary' => $baseSalary,
                    'period' => date('F Y'),
                    'pay_frequency' => $payFrequency,
                    'source' => $acceptedApplication ? 'job_application' : 'staff_record'
                ],
                'adjustments' => [
                    'performance_bonus' => 0.00,
                    'overtime_pay' => 0.00,
                    'tax_deduction' => 0.00,
                    'advance_payment' => 0.00
                ],
                'last_month_salary' => $lastMonthPayment ? [
                    'payment_id' => $lastMonthPayment->payment_id,
                    'base_salary' => (float) $lastMonthPayment->base_salary,
                    'performance_bonus' => (float) $lastMonthPayment->performance_bonus,
                    'overtime_pay' => (float) $lastMonthPayment->overtime_pay,
                    'tax_deduction' => (float) $lastMonthPayment->tax_deduction,
                    'advance_payment' => (float) $lastMonthPayment->advance_payment,
                    'net_salary' => (float) $lastMonthPayment->net_salary,
                    'payment_method' => $lastMonthPayment->payment_mode,
                    'salary_period' => $lastMonthPayment->salary_period,
                    'payment_status' => $lastMonthPayment->status,
                    'paid_date' => $lastMonthPayment->updated_at->format('Y-m-d H:i:s')
                ] : null,
                'net_salary' => $baseSalary,
                'payment_method' => 'Cash'
            ]
        ];

        // Calculate net salary including adjustments
        $adjustments = $salaryData['salary_details']['adjustments'];
        $netSalary = $baseSalary + $adjustments['performance_bonus'] + $adjustments['overtime_pay'] + 
                    $adjustments['tax_deduction'] + $adjustments['advance_payment'];
        
        $salaryData['salary_details']['net_salary'] = $netSalary;

        return response()->json([
            'status' => true,
            'message' => 'Staff salary data retrieved successfully',
            'data' => $salaryData
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Failed to retrieve salary data: ' . $e->getMessage()
        ], 500);
    }
}
    /**
     * Update staff salary information
     */
   public function updateStaffSalary(Request $request, $user_id): JsonResponse
{
    try {
        $user = User::where('id', $user_id)
            ->where('user_role_id', 2)
            ->first();
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Staff member not found'
            ], 404);
        }
        $validator = Validator::make($request->all(), [
            'base_salary' => 'required|numeric|min:0',
            'performance_bonus' => 'required|numeric|min:0',
            'overtime_pay' => 'required|numeric|min:0',
            // 'tax_deduction' => 'required|numeric',
            'advance_payment' => 'required|numeric',
            'payment_method' => 'required|in:Cash,UPI,Bank Transfer'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }
        $baseSalary = $request->base_salary;
        $performanceBonus = $request->performance_bonus;
        $overtimePay = $request->overtime_pay;
        $taxDeduction = $request->tax_deduction;
        $advancePayment = $request->advance_payment;
        $netSalary = $baseSalary + $performanceBonus + $overtimePay + $taxDeduction + $advancePayment;
        $paymentId = 'PAY_' . strtoupper(uniqid());
        $orderId = 'SAL_' . strtoupper(uniqid());
        $transactionId = 'TXN_' . strtoupper(uniqid());
        $payment = Payment::create([
            'user_id' => Auth::guard('api')->user()->id,
            'staff_id' => $user_id,
            'amount' => $netSalary,
            'payment_id' => $paymentId,
            'order_id' => $orderId,
            'status' => 'pending',
            'payment_mode' => $request->payment_method,
            'base_salary' => $baseSalary,
            'performance_bonus' => $performanceBonus,
            'overtime_pay' => $overtimePay,
            'tax_deduction' => $taxDeduction,
            'advance_payment' => $advancePayment,
            'net_salary' => $netSalary,
            'salary_period' => date('F-Y')
        ]);
        $transaction = Transaction::create([
            'user_id' => $user_id,
            'transaction_id' => $transactionId,
            'type' => 'salary',
            'order_id' => $orderId,
            'order_number' => $orderId,
            'reference_id' => $paymentId,
            'amount' => $netSalary,
            'currency' => 'USD',
            'payment_mode' => $request->payment_method,
            'payment_status' => 'pending',
            'created_by' => Auth::guard('api')->user()->id,
            'payment_response' => json_encode([
                'base_salary' => $baseSalary,
                'performance_bonus' => $performanceBonus,
                'overtime_pay' => $overtimePay,
                'tax_deduction' => $taxDeduction,
                'advance_payment' => $advancePayment,
                'net_salary' => $netSalary,
                'period' => date('F-Y')
            ]),
            'for_entry' => 'salary_payment'
        ]);
        $salaryData = [
            'staff_member' => [
                'id' => $user->id,
                'name' => $user->first_name . ' ' . $user->last_name,
                'email' => $user->email,
                'phone' => $user->phone_number,
            ],
            'salary_details' => [
                'base_salary' => [
                    'monthly_salary' => (float) $baseSalary,
                    'period' => date('F-Y')
                ],
                'adjustments' => [
                    'performance_bonus' => (float) $performanceBonus,
                    'overtime_pay' => (float) $overtimePay,
                    'tax_deduction' => (float) $taxDeduction,
                    'advance_payment' => (float) $advancePayment
                ],
                'net_salary' => (float) $netSalary,
                'payment_method' => $request->payment_method
            ],
            'payment_info' => [
                'payment_id' => $paymentId,
                'order_id' => $orderId,
                'transaction_id' => $transactionId,
                'status' => 'pending'
            ]
        ];

        return response()->json([
            'status' => true,
            'message' => 'Salary updated and payment processed successfully',
            'data' => $salaryData
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Failed to update salary: ' . $e->getMessage()
        ], 500);
    }
}

public function getEarningsSummary(Request $request)
{
    try {
        $validator = Validator::make($request->all(), [
            'job_id' => 'sometimes|exists:jobs,id',
            'month' => 'sometimes|date_format:Y-m'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }
        
        $user = Auth::user();
        $jobId = $request->job_id;
        $month = $request->month ?? date('Y-m');
        $monthName = date('F Y', strtotime($month));
        // Get approved job applications
        $applications = JobApplication::where('user_id', $user->id)
            ->where('application_status', 'accepted')
            ->with(['job.creator'])
            ->when($jobId, function($query) use ($jobId) {
                return $query->where('job_id', $jobId);
            })
            ->get();

        if ($applications->isEmpty()) {
            return response()->json([
                "status" => false,
                "message" => "No approved jobs found",
                "data" => []
            ], 404);
        }
        
        $response = [];
        
        foreach ($applications as $application) {
            $job = $application->job ? $application->job->toArray() : [];
            $employer = $application->job && $application->job->creator 
                ? $application->job->creator->toArray() 
                : [];

            // Get salary payments for this user and job
            $paymentsQuery = Payment::where('staff_id', $user->id);

            // Get current month payments
            $currentMonthPayments = (clone $paymentsQuery)
                ->where('salary_period', 'like', '%' . $monthName . '%')
                ->get();

            // Calculate totals for current month
            $totalBaseSalary = $currentMonthPayments->sum('base_salary');
            $totalPerformanceBonus = $currentMonthPayments->sum('performance_bonus');
            $totalOvertimePay = $currentMonthPayments->sum('overtime_pay');
            $totalTaxDeduction = $currentMonthPayments->sum('tax_deduction');
            $totalAdvancePayment = $currentMonthPayments->sum('advance_payment');
            $totalNetSalary = $currentMonthPayments->sum('net_salary');

            // If no payments for current month, use job compensation as base
            if ($currentMonthPayments->isEmpty()) {
                $totalBaseSalary = $job['compensation'] ?? 0;
                $totalNetSalary = $totalBaseSalary;
            }

            // Get payment history (last 3 months)
            $paymentHistory = (clone $paymentsQuery)
                // ->where('status', 'completed')
                ->orderBy('created_at', 'desc')
                ->get()
                ->map(function($payment) {
                    return [
                        'month' => $payment->salary_period,
                        'paid_on' => $payment->updated_at->format('d/m/Y'),
                        'amount' => $payment->net_salary
                    ];
                });
            $startDate = date('Y-m-01', strtotime($month));
            $endDate = date('Y-m-t', strtotime($month));
            
            $attendanceRecords = Attendance::where('staff_id', $user->id)
                ->whereBetween('date', [$startDate, $endDate])
                ->get();

            $presentDays = $attendanceRecords->where('status', 'present')->count();
            $lateArrivals = $attendanceRecords->where('status', 'late')->count();
            $absentDays = $attendanceRecords->where('status', 'absent')->count();
            
            // Calculate total working days in the month (excluding weekends)
            $totalWorkingDays = $this->getWorkingDays($startDate, $endDate);
            
            // Calculate absent days from total working days
            $actualAbsentDays = $totalWorkingDays - ($presentDays + $lateArrivals);

            $acceptedDate = $application->updated_at ?? now();
            $nextPayDate = \Carbon\Carbon::parse($acceptedDate)->addDays(7)->format('d/m/Y');

            $earningsSummary = [
                "employer" => $employer['name'] ?? "Unknown Employer",
                "job_id" => $job['id'] ?? null,
                "role" => $job['title'] ?? "Job Role",

                "total_payable_amount" => $totalNetSalary,
                "payment_date" => $nextPayDate,

                "earnings_breakdown" => [
                    "base_salary" => [
                        "amount" => $totalBaseSalary,
                        "included" => $totalBaseSalary > 0
                    ],
                    "performance_bonus" => [
                        "amount" => $totalPerformanceBonus,
                        "included" => $totalPerformanceBonus > 0
                    ],
                    "overtime_pay" => [
                        "amount" => $totalOvertimePay,
                        "included" => $totalOvertimePay > 0
                    ]
                ],

                "deductions" => [
                    "provident_fund" => [
                        "amount" => 0, // You can add this to your payment model
                        "included" => false
                    ],
                    "income_tax" => [
                        "amount" => abs($totalTaxDeduction), // Make positive for display
                        "included" => $totalTaxDeduction != 0
                    ],
                    "advance_repayment" => [
                        "amount" => abs($totalAdvancePayment), // Make positive for display
                        "included" => $totalAdvancePayment != 0
                    ]
                ],

                "payment_history" => $paymentHistory,

                "salary_summary" => [
                    "current_monthly_salary" => $job['compensation'] ?? 0,
                    "next_pay_date" => $nextPayDate,
                ],

                "attendance_summary" => [
                    "present_days" => $presentDays,
                    "late_arrivals" => $lateArrivals,
                    "absent_days" => $actualAbsentDays > 0 ? $actualAbsentDays : $absentDays,
                    "total_working_days" => $totalWorkingDays,
                    "attendance_percentage" => $totalWorkingDays > 0 ? 
                        round((($presentDays + $lateArrivals) / $totalWorkingDays) * 100, 2) : 0
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

            $response[] = $earningsSummary;
        }


        return response()->json([
            "status" => true,
            "message" => "Earnings summary fetched successfully",
            "data" => $response
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Failed to fetch earnings summary: ' . $e->getMessage()
        ], 500);
    }
}

private function getWorkingDays($startDate, $endDate)
{
    $start = Carbon::parse($startDate);
    $end = Carbon::parse($endDate);
    
    $workingDays = 0;
    
    while ($start->lte($end)) {
        if ($start->isWeekday()) {
            $workingDays++;
        }
        $start->addDay();
    }
    
    return $workingDays;
}

    /**
     * Get all staff members (for dropdown selection)
     */
    public function getStaffMembers(): JsonResponse
    {
        try {
            $staffMembers = User::where('user_role_id', 2)
                ->whereHas('jobApplications', function($query) {
                    $query->where('application_status', 'accepted');
                })
                ->select('id', 'first_name', 'last_name', 'email', 'phone_number')
                ->get()
                ->map(function($user) {
                    return [
                        'id' => $user->id,
                        'name' => $user->first_name . ' ' . $user->last_name,
                        'email' => $user->email,
                        'phone' => $user->phone_number
                    ];
                });

            return response()->json([
                'status' => true,
                'message' => 'Staff members retrieved successfully',
                'data' => $staffMembers
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve staff members: ' . $e->getMessage()
            ], 500);
        }
    }


        public function getRecentPayments(Request $request): JsonResponse
    {         $user = Auth::guard('api')->user();
        try {

            $validator = Validator::make($request->all(), [
                'limit' => 'nullable|integer|min:1|max:100',
                'page' => 'nullable|integer|min:1',
                'status' => 'nullable|in:success,failed,pending',
                'payment_mode' => 'nullable|string',
                'date_from' => 'nullable|date',
                'date_to' => 'nullable|date|after_or_equal:date_from',
                'staff_id' => 'nullable|exists:users,id',
                'user_id' => 'nullable|exists:users,id'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validator->errors()
                ], 422);
            }

            $limit = $request->limit ?? 20;
            $page = $request->page ?? 1;
            $offset = ($page - 1) * $limit;

            // Build query for payments without join first to avoid collation issues
            $paymentsQuery = Payment::with(['user', 'staff'])->where('user_id',$user->id)
                ->select('payments.*');

            // Apply filters
            if ($request->filled('status')) {
                $paymentsQuery->where('payments.status', $request->status);
            }

            if ($request->filled('payment_mode')) {
                $paymentsQuery->where('payments.payment_mode', $request->payment_mode);
            }

            if ($request->filled('staff_id')) {
                $paymentsQuery->where('payments.staff_id', $request->staff_id);
            }

            if ($request->filled('user_id')) {
                $paymentsQuery->where('payments.user_id', $request->user_id);
            }

            if ($request->filled('date_from')) {
                $paymentsQuery->whereDate('payments.created_at', '>=', $request->date_from);
            }

            if ($request->filled('date_to')) {
                $paymentsQuery->whereDate('payments.created_at', '<=', $request->date_to);
            }

            // Get total count for pagination
            $total = $paymentsQuery->count();

            // Get paginated results
            $payments = $paymentsQuery->orderBy('payments.created_at', 'desc')
                ->offset($offset)
                ->limit($limit)
                ->get();

            // Get all order_ids and payment_ids for batch transaction query
            $orderIds = $payments->pluck('order_id')->filter()->toArray();
            $paymentIds = $payments->pluck('payment_id')->filter()->toArray();

            // Get related transactions in one query to avoid N+1 problem
            $transactions = Transaction::whereIn('order_id', $orderIds)
                ->orWhereIn('reference_id', $paymentIds)
                ->get()
                ->groupBy(function($transaction) {
                    return $transaction->order_id ?? $transaction->reference_id;
                });

            // Transform data with transaction details
            $paymentData = $payments->map(function($payment) use ($transactions) {
                // Find transactions for this payment
                $paymentTransactions = collect();
                
                if ($payment->order_id && isset($transactions[$payment->order_id])) {
                    $paymentTransactions = $transactions[$payment->order_id];
                } elseif ($payment->payment_id && isset($transactions[$payment->payment_id])) {
                    $paymentTransactions = $transactions[$payment->payment_id];
                }

                return [
                    'payment_id' => $payment->id,
                    'payment_reference' => $payment->payment_id,
                    'order_id' => $payment->order_id,
                    'amount' => (float) $payment->amount,
                    'net_salary' => (float) $payment->net_salary,
                    'status' => $payment->status,
                    'payment_mode' => $payment->payment_mode,
                    'salary_period' => $payment->salary_period,
                    'created_at' => $payment->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $payment->updated_at->format('Y-m-d H:i:s'),
                    
                    // Salary breakdown
                    'salary_breakdown' => [
                        'base_salary' => (float) $payment->base_salary,
                        'performance_bonus' => (float) $payment->performance_bonus,
                        'overtime_pay' => (float) $payment->overtime_pay,
                        'tax_deduction' => (float) $payment->tax_deduction,
                        'advance_payment' => (float) $payment->advance_payment,
                    ],
                    
                    // User details (admin who processed payment)
                    'processed_by' => $payment->user ? [
                        'id' => $payment->user->id,
                        'name' => $payment->user->first_name . ' ' . $payment->user->last_name,
                        'email' => $payment->user->email,
                        'phone' => $payment->user->phone_number,
                    ] : null,
                    
                    // Staff details (who received payment)
                    'staff_member' => $payment->staff ? [
                        'id' => $payment->staff->id,
                        'name' => $payment->staff->first_name . ' ' . $payment->staff->last_name,
                        'email' => $payment->staff->email,
                        'phone' => $payment->staff->phone_number,
                    ] : null,
                    
                    // Transaction details
                    'transactions' => $paymentTransactions->map(function($transaction) {
                        return [
                            'transaction_id' => $transaction->id,
                            'transaction_reference' => $transaction->transaction_id,
                            'type' => $transaction->type,
                            'order_number' => $transaction->order_number,
                            'reference_id' => $transaction->reference_id,
                            'amount' => (float) $transaction->amount,
                            'currency' => $transaction->currency,
                            'payment_mode' => $transaction->payment_mode,
                            'payment_status' => $transaction->payment_status,
                            'for_entry' => $transaction->for_entry,
                            'created_at' => $transaction->created_at->format('Y-m-d H:i:s'),
                            'invoice_pdf_url' => $transaction->invoice_pdf_url,
                            'payment_response' => $transaction->payment_response ? 
                                json_decode($transaction->payment_response, true) : null
                        ];
                    })
                ];
            });

            $pagination = [
                'current_page' => (int) $page,
                'per_page' => (int) $limit,
                'total' => $total,
                'last_page' => ceil($total / $limit),
                'from' => $offset + 1,
                'to' => $offset + $payments->count()
            ];

            return response()->json([
                'status' => true,
                'message' => 'Recent payments retrieved successfully',
                'data' => $paymentData,
                'pagination' => $pagination
            ]);

        } catch (\Exception $e) {
            \Log::error('Failed to retrieve payments: ' . $e->getMessage());
            \Log::error('File: ' . $e->getFile() . ' Line: ' . $e->getLine());
            
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve payments. Please try again later.',
                'error' => config('app.debug') ? $e->getMessage() : 'Internal server error'
            ], 500);
        }
    }


    public function getTodayActiveStaff(Request $request): JsonResponse
{
    try {
        // Validation for optional parameters
        $validator = Validator::make($request->all(), [
            'limit' => 'nullable|integer|min:1|max:100',
            'page' => 'nullable|integer|min:1',
            'search' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $limit = $request->limit ?? 20;
        $page = $request->page ?? 1;
        $offset = ($page - 1) * $limit;
        $today = Carbon::today();

        // Get current authenticated user (the one who added the staff)
        $authUser = Auth::guard('api')->user();
        if (!$authUser) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthenticated'
            ], 401);
        }

        // Build query for staff members
        $staffQuery = User::where('user_role_id', 2)
            ->where('added_by', $authUser->id)
            ->where('is_staff_added', 1)
            ->where('is_active', 1)
            ->where('is_deleted', 0)
            ->with(['lastExp', 'userWorkInfo']);

        // Apply search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $staffQuery->where(function($query) use ($search) {
                $query->where('first_name', 'like', "%{$search}%")
                      ->orWhere('last_name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('phone_number', 'like', "%{$search}%");
            });
        }

        // Get total count for pagination
        $total = $staffQuery->count();

        // Get paginated results
        $staffMembers = $staffQuery->orderBy('first_name', 'asc')
            ->offset($offset)
            ->limit($limit)
            ->get();

        // Get all staff IDs for batch queries
        $staffIds = $staffMembers->pluck('id')->toArray();

        // Get approved leave requests for today in one query
        $todayLeaves = LeaveRequest::whereIn('user_id', $staffIds)
            ->where('status', 'approved')
            ->whereDate('start_date', '<=', $today)
            ->whereDate('end_date', '>=', $today)
            ->get()
            ->keyBy('user_id');

        // Get today's attendance records for all staff in one query
        $todayAttendance = Attendance::whereIn('staff_id', $staffIds)
            ->whereDate('date', $today)
            ->get()
            ->keyBy('staff_id');
        $activeStaffData = $staffMembers->map(function($staff) use ($todayLeaves, $todayAttendance, $today) {
            $hasApprovedLeave = $todayLeaves->has($staff->id);
            $hasAttendance = $todayAttendance->has($staff->id);
            
            // Get leave details if exists
            $leaveDetails = null;
            if ($hasApprovedLeave) {
                $leave = $todayLeaves->get($staff->id);
                $leaveDetails = [
                    'leave_id' => $leave->id,
                    'leave_type' => $leave->leaveType ? $leave->leaveType->name : null,
                    'start_date' => $leave->start_date,
                    'end_date' => $leave->end_date,
                    'reason' => $leave->reason,
                    'supporting_document_url' => $leave->supporting_document_url
                ];
            }

            // Get attendance details if exists
            $attendanceDetails = null;
            if ($hasAttendance) {
                $attendance = $todayAttendance->get($staff->id);
                $attendanceDetails = [
                    'attendance_id' => $attendance->id,
                    'staff_id' => $attendance->staff_id,
                    'status' => $attendance->status,
                    'check_in_time' => $attendance->check_in_time,
                    'late_minutes' => $attendance->late_minutes,
                    'description' => $attendance->description,
                    'date' => $attendance->date,
                    'processed_by' => $attendance->processed_by
                ];
            }

            return [
                'staff' => $staff,
                'name' => $staff->first_name . ' ' . $staff->last_name,
                'first_name' => $staff->first_name,
                'last_name' => $staff->last_name,
                'email' => $staff->email,
                'phone_number' => $staff->phone_number,
                'image' => $staff->image,
                'is_active_today' => !$hasApprovedLeave,
                'status' => !$hasApprovedLeave ? 'active' : 'on_leave',
                'is_attendance' => $hasAttendance,
                'attendance_status' => $hasAttendance ? $todayAttendance->get($staff->id)->status : null,
                'last_work_experience' => $staff->lastExp,
                'work_info' => $staff->userWorkInfo,
                'leave_details' => $leaveDetails,
                'attendance_details' => $attendanceDetails,
                'created_at' => $staff->created_at->format('Y-m-d H:i:s')
            ];
        });

        // Separate active and on-leave staff
        $activeStaff = $activeStaffData->where('is_active_today', true)->values();
        $onLeaveStaff = $activeStaffData->where('is_active_today', false)->values();

        // Calculate attendance stats for active staff
        $attendanceStats = [
            'present' => $activeStaff->where('attendance_status', 'present')->count(),
            'absent' => $activeStaff->where('attendance_status', 'absent')->count(),
            'late' => $activeStaff->where('attendance_status', 'late')->count(),
            'not_marked' => $activeStaff->where('is_attendance', false)->count()
        ];

        $pagination = [
            'current_page' => (int) $page,
            'per_page' => (int) $limit,
            'total' => $total,
            'last_page' => ceil($total / $limit),
            'from' => $offset + 1,
            'to' => $offset + $staffMembers->count()
        ];

        $stats = [
            'total_staff' => $total,
            'active_today' => $activeStaff->count(),
            'on_leave_today' => $onLeaveStaff->count(),
            'date' => $today->format('Y-m-d'),
            'attendance_summary' => $attendanceStats
        ];

        return response()->json([
            'status' => true,
            'message' => 'Today\'s active staff list retrieved successfully',
            'data' => [
                'stats' => $stats,
                'active_staff' => $activeStaff,
                'on_leave_staff' => $onLeaveStaff
            ],
            'pagination' => $pagination
        ]);

    } catch (\Exception $e) {
        \Log::error('Failed to retrieve today\'s active staff: ' . $e->getMessage());
        
        return response()->json([
            'status' => false,
            'message' => 'Failed to retrieve staff list. Please try again later.',
            'error' => config('app.debug') ? $e->getMessage() : 'Internal server error'
        ], 500);
    }
}


/**
 * Get staff dashboard summary
 */
public function getStaffDashboard(Request $request): JsonResponse
{
    try {
        $user = Auth::guard('api')->user();
        
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthenticated'
            ], 401);
        }

        // Get current date information
        $currentDate = Carbon::now();
        $today = $currentDate->format('Y-m-d');
        $currentMonth = $currentDate->format('Y-m');
        $lastMonth = $currentDate->subMonth()->format('Y-m');
        
        // Get staff information
        $staffInfo = [
            'name' => $user->first_name . ' ' . $user->last_name,
            'greeting' => 'Ready for a productive day!',
            'date' => $currentDate->format('l, F j, Y')
        ];

        // Attendance Summary (Last 30 Days)
        $thirtyDaysAgo = Carbon::now()->subDays(30)->format('Y-m-d');
        
        $attendanceRecords = Attendance::where('staff_id', $user->id)
            ->whereBetween('date', [$thirtyDaysAgo, $today])
            ->get();

        $presentDays = $attendanceRecords->where('status', 'present')->count();
        $lateDays = $attendanceRecords->where('status', 'late')->count();
        $absentDays = $attendanceRecords->where('status', 'absent')->count();
        
        $totalWorkingDays = $presentDays + $lateDays + $absentDays;
        $leaveDays = $absentDays; // Assuming absent days are leave days

        $attendanceSummary = [
            'last_30_days' => [
                'days_present' => $presentDays + $lateDays, // Both present and late count as present
                'total_days' => 30,
                'leaves_taken' => $leaveDays,
                'attendance_percentage' => $totalWorkingDays > 0 ? 
                    round((($presentDays + $lateDays) / 30) * 100, 2) : 0
            ]
        ];

        // Earnings Summary (Current Month)
        $monthStart = date('Y-m-01');
        $monthEnd = date('Y-m-t');
        
        $currentMonthPayments = Payment::where('staff_id', $user->id)
            ->where('salary_period', 'like', '%' . date('F Y') . '%')
            // ->where('status', 'completed')
            ->get();

        $totalEarnings = $currentMonthPayments->sum('net_salary');
        
        // If no payments found, get base salary from accepted job
        if ($currentMonthPayments->isEmpty()) {
            $acceptedJob = JobApplication::where('user_id', $user->id)
                ->where('application_status', 'accepted')
                ->with('job')
                ->first();
            
            if ($acceptedJob && $acceptedJob->job) {
                $totalEarnings = $acceptedJob->job->compensation ?? 0;
            }
        }

        $earningsSummary = [
            'total_earnings' => (float) $totalEarnings,
            'currency' => 'INR',
            'period' => 'this month',
            'trend' => 'up' // You can calculate this by comparing with previous month
        ];

        // Leave Requests (Last Month)
        $lastMonthStart = Carbon::now()->subMonth()->startOfMonth()->format('Y-m-d');
        $lastMonthEnd = Carbon::now()->subMonth()->endOfMonth()->format('Y-m-d');
        
        $leaveRequestsLastMonth = LeaveRequest::where('user_id', $user->id)
            ->whereBetween('start_date', [$lastMonthStart, $lastMonthEnd])
            ->get();

        $leaveSummary = [
            'last_month' => [
                'total_requests' => $leaveRequestsLastMonth->count(),
                'approved_requests' => $leaveRequestsLastMonth->where('status', 'approved')->count(),
                'pending_requests' => $leaveRequestsLastMonth->where('status', 'pending')->count(),
                'rejected_requests' => $leaveRequestsLastMonth->where('status', 'rejected')->count()
            ]
        ];

        // New Job Matches
        $newJobMatches = JobApplication::where('user_id', $user->id)
            ->where('application_status', 'pending')
            ->with('job')
            ->limit(3)
            ->get()
            ->map(function($application) {
                return [
                    'job_id' => $application->job_id,
                    'title' => $application->job->title ?? 'Job Title',
                    'employer' => $application->job->creator->name ?? 'Employer',
                    'compensation' => $application->job->compensation ?? 0,
                    'location' => ($application->job->city ?? '') . ', ' . ($application->job->state ?? ''),
                    'applied_date' => $application->created_at->format('M j, Y')
                ];
            });

        // Today's Attendance Status
        $todayAttendance = Attendance::where('staff_id', $user->id)
            ->whereDate('date', $today)
            ->first();

        $todayStatus = [
            'has_attendance' => !is_null($todayAttendance),
            'status' => $todayAttendance ? $todayAttendance->status : 'not_marked',
            'check_in_time' => $todayAttendance ? $todayAttendance->check_in_time : null,
            'late_minutes' => $todayAttendance ? $todayAttendance->late_minutes : 0
        ];

        // Upcoming Leaves
        $upcomingLeaves = LeaveRequest::where('user_id', $user->id)
            ->where('status', 'approved')
            ->whereDate('start_date', '>=', $today)
            ->orderBy('start_date', 'asc')
            ->limit(2)
            ->get()
            ->map(function($leave) {
                return [
                    'leave_id' => $leave->id,
                    'leave_type' => $leave->leaveType->name ?? 'Leave',
                    'start_date' => $leave->start_date,
                    'end_date' => $leave->end_date,
                    'reason' => $leave->reason,
                    'duration_days' => Carbon::parse($leave->start_date)->diffInDays($leave->end_date) + 1
                ];
            });

        // Recent Payments
        $recentPayments = Payment::where('staff_id', $user->id)
            // ->where('status', 'completed')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get()
            ->map(function($payment) {
                return [
                    'payment_id' => $payment->id,
                    'amount' => (float) $payment->net_salary,
                    'period' => $payment->salary_period,
                    'payment_date' => $payment->updated_at->format('M j, Y'),
                    'payment_method' => $payment->payment_mode,
                    'status' => $payment->status
                ];
            });

        // Compile dashboard data
        $dashboardData = [
            'staff_info' => $staffInfo,
            'attendance_summary' => $attendanceSummary,
            'earnings_summary' => $earningsSummary,
            'leave_summary' => $leaveSummary,
            'job_matches' => [
                'count' => $newJobMatches->count(),
                'jobs' => $newJobMatches
            ],
            'today_status' => $todayStatus,
            'upcoming_leaves' => $upcomingLeaves,
            'recent_payments' => $recentPayments,
            'quick_actions' => [
                'apply_leave' => true,
                'view_jobs' => true,
                'view_attendance' => true,
                'view_earnings' => true
            ]
        ];

        return response()->json([
            'status' => true,
            'message' => 'Staff dashboard data retrieved successfully',
            'data' => $dashboardData
        ]);

    } catch (\Exception $e) {
        \Log::error('Failed to retrieve staff dashboard: ' . $e->getMessage());
        
        return response()->json([
            'status' => false,
            'message' => 'Failed to retrieve dashboard data. Please try again later.',
            'error' => config('app.debug') ? $e->getMessage() : 'Internal server error'
        ], 500);
    }
    
    }

    
}