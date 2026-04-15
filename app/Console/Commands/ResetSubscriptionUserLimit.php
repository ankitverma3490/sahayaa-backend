<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SubscriptionUser;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Subscription;


class ResetSubscriptionUserLimit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscriptions:reset-user-limit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset monthly user limit for subscriptions';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Resetting subscription user limits...');
        
        $users = User::where('status', 'active')->get();
        $resetCount = 0;
        $errors = [];
        
        foreach ($users as $user) {
            try {
                // Get user's active subscription
                $subscriptionUser = SubscriptionUser::where('user_id', $user->id)
                    ->where('status', 'active')
                    ->first();
                
                if (!$subscriptionUser) {
                    continue; // Skip if no active subscription
                }
                
                // CRITICAL FIX: Check if subscription exists
                $subscription = Subscription::find($subscriptionUser->subscription_id);
                
                if (!$subscription) {
                    $this->error("Subscription not found for subscription_id: {$subscriptionUser->subscription_id}");
                    continue;
                }
                
                // Reset user_limit to 0
                $subscriptionUser->update(['user_limit' => 0]);
                
                $resetCount++;
                $this->info("Reset limit for user {$user->id}");
                
            } catch (\Exception $e) {
                $errors[] = "Failed to reset limit for user {$user->id}: " . $e->getMessage();
                $this->error("Error for user {$user->id}: " . $e->getMessage());
                \Log::error("Subscription reset error for user {$user->id}: " . $e->getMessage());
            }
        }
        
        $this->info("User limits reset successfully. Reset: {$resetCount}, Errors: " . count($errors));
        
        if (!empty($errors)) {
            \Log::error('Subscription reset errors: ', $errors);
        }
        
        return 0;
    }

        return Command::SUCCESS;
    }
}
