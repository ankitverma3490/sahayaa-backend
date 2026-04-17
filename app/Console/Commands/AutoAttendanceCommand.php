<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Attendance;
use Carbon\Carbon;


class AutoAttendanceCommand extends Command
{
    protected $signature = 'attendance:auto-mark';
    protected $description = 'Automatically mark attendance for users with is_attendance = 1';

    public function handle()
    {
        // Use IST timezone so date/day matches India time
        $today = Carbon::now('Asia/Kolkata')->toDateString();
        $todayDayName = strtolower(Carbon::now('Asia/Kolkata')->format('l')); // e.g. 'monday'

        // Get all active hired staff (same filter as household dashboard)
        $users = User::with(['userWorkInfo'])
            ->where('user_role_id', '2')
            ->where('is_active', 1)
            ->where('is_deleted', 0)
            ->where('is_staff_added', 1)
            ->get();

        $markedCount = 0;
        $errors = [];

        foreach ($users as $user) {
            try {
                // Employer = added_by (primary) or parent_user_id (fallback)
                $employerId = $user->added_by ?? $user->parent_user_id ?? null;
                if (!$employerId) {
                    $this->info("User {$user->id} has no employer, skipping (not hired).");
                    continue;
                }

                // Check employer's auto_attendence setting
                $employer = User::find($employerId);
                $autoEnabled = $employer && (
                    $employer->auto_attendence == "1" ||
                    $employer->auto_attendence == 1 ||
                    $employer->auto_attendence === true
                );
                if (!$autoEnabled) {
                    $this->info("Auto attendance OFF for employer of user {$user->id}, skipping.");
                    continue;
                }

                // Check if today is a working day for this staff
                $workingDays = array_map('strtolower', $user->userWorkInfo?->working_days ?? []);
                if (!empty($workingDays) && !in_array($todayDayName, $workingDays)) {
                    $this->info("Today ({$todayDayName}) is not a working day for user {$user->id}, skipping.");
                    continue;
                }

                // Check if attendance already exists for today
                $existingAttendance = Attendance::where('staff_id', $user->id)
                    ->where('date', $today)
                    ->first();

                if ($existingAttendance) {
                    $this->info("Attendance already exists for user {$user->id} on {$today}");
                    continue;
                }

                // Mark present
                Attendance::create([
                    'staff_id'       => $user->id,
                    'date'           => $today,
                    'check_in_time'  => '07:00:00',
                    'status'         => 'present',
                    'description'    => 'Auto-marked by system at 7 AM',
                    'processed_by'   => 1,
                ]);

                $markedCount++;
                $this->info("Auto-marked attendance for user {$user->id} - {$user->name}");

            } catch (\Exception $e) {
                $errors[] = "Failed to mark attendance for user {$user->id}: " . $e->getMessage();
                $this->error("Error for user {$user->id}: " . $e->getMessage());
                \Log::error("Auto-attendance error for user {$user->id}: " . $e->getMessage());
            }
        }

        $this->info("Auto-attendance completed. Marked: {$markedCount}, Errors: " . count($errors));

        if (!empty($errors)) {
            \Log::error('Auto-attendance errors: ', $errors);
        }

        return 0;
    }
}
