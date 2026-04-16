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
        $today = Carbon::now()->toDateString();
        $currentTime = Carbon::now()->format('H:i:s');
        $todayDayName = strtolower(Carbon::now()->format('l')); // e.g. 'monday'

        // Get all users with is_attendance = 1
        $users = User::with(['parentUserId', 'userWorkInfo'])->where('user_role_id', '2')->get();
        $markedCount = 0;
        $errors = [];

        foreach ($users as $user) {
            // try {
                // Skip staff who haven't been hired yet (no parent/employer assigned)
                if (!$user->parent_user_id) {
                    $this->info("User {$user->id} has no employer, skipping (not hired).");
                    continue;
                }

                // Check auto attendance - parent ki setting hi check karein
                $autoAttEnabled = false;
                if ($user->parentUserId) {
                    $autoAttEnabled = ($user->parentUserId->auto_attendence == "1" || $user->parentUserId->auto_attendence == 1);
                }
                if (!$autoAttEnabled) {
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

                $status = 'present';
                // Create attendance record
                $attendance = Attendance::create([
                    'staff_id' => $user->id,
                    'date' => $today,
                    'check_in_time' => '07:00:00', // Fixed 7 AM check-in
                    'status' => $status,
                    'description' => 'Auto-marked by system at 7 AM',
                    'processed_by' => 1 // Assuming admin/system user ID
                ]);
                
                $markedCount++;
                // $this->info("Auto-marked attendance for user {$user->id} - {$user->name}");
                // \Log::error('Auto-attendance errors: ', $attendance);
            // } catch (\Exception $e) {
            //     dd($e->getMessage());
            //     $errors[] = "Failed to mark attendance for user {$user->id}: " . $e->getMessage();
            //     $this->error("Error for user {$user->id}: " . $e->getMessage());
            // }
        }
        
        // $this->info("Auto-attendance marking completed. Marked: {$markedCount}, Errors: " . count($errors));
        
        if (!empty($errors)) {
            // Log errors if needed
            \Log::error('Auto-attendance errors: ', $errors);
        }
        
        return 0;
    }
}