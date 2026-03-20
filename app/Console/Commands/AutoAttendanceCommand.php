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
        
        // Get all users with is_attendance = 1
        $users = User::with('parentUserId')->where('user_role_id', '2')->get();
        $markedCount = 0;
        $errors = [];
        
        foreach ($users as $user) {
            try {
                // Check if attendance already exists for today
                $existingAttendance = Attendance::where('staff_id', $user->id)
                    ->where('date', $today)
                    ->first();
                
                if ($existingAttendance) {
                    $this->info("Attendance already exists for user {$user->id} on {$today}");
                    continue;
                }
                
                // Determine status based on check-in time (7 AM check-in is considered present)
                $status = 'absent';
                if($user->parentUserId){
                    if($user->parentUserId->auto_attendence == "1" || $user->parentUserId->auto_attendence == 1){
                        $status = 'present';
                    } else {
                        $status = 'absent';
                    }
                }
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
                $this->info("Auto-marked attendance for user {$user->id} - {$user->name}");
                
            } catch (\Exception $e) {
                $errors[] = "Failed to mark attendance for user {$user->id}: " . $e->getMessage();
                $this->error("Error for user {$user->id}: " . $e->getMessage());
            }
        }
        
        $this->info("Auto-attendance marking completed. Marked: {$markedCount}, Errors: " . count($errors));
        
        if (!empty($errors)) {
            // Log errors if needed
            \Log::error('Auto-attendance errors: ', $errors);
        }
        
        return 0;
    }
}