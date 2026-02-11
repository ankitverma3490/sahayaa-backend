<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Attendance;
use Carbon\Carbon;
use App\Models\JobApplication;
use App\Models\Salary;

class GenerateMonthlySalary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'salary:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate monthly salary for all staff';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $startOfMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
        $endOfMonth = Carbon::now()->endOfMonth()->format('Y-m-d');

        $staffMembers = User::where('user_role_id', 3) // staff role
                            ->where('status', 'active') // optional
                            ->get();
        foreach ($staffMembers as $staff) {
            $attendanceRecords = Attendance::where('staff_id', $staff->id)->whereBetween('date', [$startOfMonth, $endOfMonth])->get();
            if ($attendanceRecords->isNotEmpty()) {
                
                $jobApplication = JobApplication::where('user_id', $staff->id)->where('application_status', 'accepted')->first();
                if ($jobApplication) {
                    $compensation = $jobApplication->expected_salary / 22; // or get from Job model
                    $dailyCompensation = $compensation * $attendanceRecords->count(); // Calculate based on attendance
                } else {
                    $dailyCompensation = 0; // Default if no job application found
                }
                Salary::updateOrCreate(
                [
                    'staff_id' => $staff->id,
                    'payment_date' => Carbon::now()->endOfMonth()->format('Y-m-d'),
                ],
                [
                    'houseowner_id' => $staff->parent_user_id,
                    'amount' => $dailyCompensation,
                    'status' => 'pending',
                ]
            );
                // Process attendance records to calculate salary
            }
        }
        return Command::SUCCESS;
    }
}
