<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class NotificationShortcutController extends Controller
{
    public function getNotifications(Request $request)
    {
        // Mock notifications for now, or fetch from DB if there's a notifications table
        $notifications = [
            ['id' => 1, 'message' => "System updated to v1.1", 'type' => "System", 'date' => now()->subHours(2)->format('Y-m-d H:i A'), 'priority' => "Low"],
            ['id' => 2, 'message' => "5 new KYC verifications pending", 'type' => "Verification", 'date' => now()->subHours(5)->format('Y-m-d H:i A'), 'priority' => "High"],
            ['id' => 3, 'message' => "Subscription revenue crossed ,110,000", 'type' => "Billing", 'date' => now()->subDay()->format('Y-m-d H:i A'), 'priority' => "Medium"],
        ];

        return response()->json([
            'success' => true,
            'data' => $notifications
        ]);
    }

    public function sendNotification(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'type' => 'required|in:push,whatsapp,promotional',
            'audience' => 'required|string'
        ]);

        // Logic to dispatch notifications based on audience
        // For now, we just mock the success response since third party APIs are not provided
        Log::info("Admin sending " . $request->type . " notification: " . $request->title . " to " . $request->audience);

        return response()->json([
            'success' => true,
            'message' => ucfirst($request->type) . ' notification sent successfully to ' . $request->audience
        ]);
    }
}