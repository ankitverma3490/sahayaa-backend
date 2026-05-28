<?php

use App\Models\Subscription;
use App\Models\SubscriptionUser;

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

$kernel->bootstrap();

header('Content-Type: text/plain');

echo "=== ALL SUBSCRIPTION PLANS ===\n";
$plans = Subscription::all();
foreach ($plans as $plan) {
    echo "ID: {$plan->id} | Name: {$plan->name} | Price: {$plan->price} | Validity: {$plan->validity} | Role: {$plan->role}\n";
}

echo "\n=== ACTIVE SUBSCRIPTIONS ===\n";
$subs = SubscriptionUser::where('status', 'active')->get();
echo "Total Active Subscriptions: " . count($subs) . "\n";
foreach ($subs as $sub) {
    echo "Sub ID: {$sub->id} | User ID: {$sub->user_id} | Plan ID: {$sub->subscription_id} | End Date: {$sub->end_date}\n";
}
