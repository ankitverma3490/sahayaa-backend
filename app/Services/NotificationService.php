<?php

namespace App\Services;

use App\Models\Notification;
use App\Models\UserDeviceToken;
use App\Http\Controllers\Controller;

class NotificationService extends Controller
{
    /**
     * Send notification (in-app + FCM push)
     *
     * @param int    $userId   Recipient user ID
     * @param string $title    Notification title
     * @param string $message  Notification body
     * @param string $type     Notification type (job_application, leave_approved, etc.)
     * @param array  $extra    Extra data: job_id, application_id, skip_push
     * @return Notification|null
     */
    public static function send($userId, $title, $message, $type = 'general', $extra = [])
    {
        try {
            // 1. Create in-app notification record
            $notification = Notification::create([
                'user_id'         => $userId,
                'title'           => $title,
                'message'         => $message,
                'type'            => $type,
                'job_id'          => $extra['job_id'] ?? null,
                'application_id'  => $extra['application_id'] ?? null,
                'status'          => 'unread',
            ]);
        } catch (\Exception $e) {
            \Log::error('NotificationService DB create failed: ' . $e->getMessage());
            $notification = null;
        }

        // 2. Send FCM push notification (skip if requested)
        if (empty($extra['skip_push'])) {
            try {
                $deviceToken = UserDeviceToken::where('user_id', $userId)->value('device_token');
                if ($deviceToken) {
                    $controller = new static();
                    $controller->send_push_notification(
                        $deviceToken,
                        'android',
                        $message,
                        $title,
                        $type,
                        array_merge(
                            ['user_id' => (string) $userId],
                            isset($extra['job_id']) ? ['job_id' => (string) $extra['job_id']] : [],
                            isset($extra['application_id']) ? ['application_id' => (string) $extra['application_id']] : []
                        )
                    );
                }
            } catch (\Exception $e) {
                \Log::warning("FCM push failed for user $userId: " . $e->getMessage());
            }
        }

        return $notification;
    }

    /**
     * Send notification to multiple users
     */
    public static function sendToMany($userIds, $title, $message, $type = 'general', $extra = [])
    {
        foreach ($userIds as $userId) {
            self::send($userId, $title, $message, $type, $extra);
        }
    }

    /**
     * Send broadcast notification to all users (or filtered by role)
     */
    public static function broadcast($title, $message, $type = 'broadcast', $roleId = null)
    {
        $query = \App\Models\User::select('id');
        if ($roleId) {
            $query->where('user_role_id', $roleId);
        }
        $userIds = $query->pluck('id')->toArray();
        self::sendToMany($userIds, $title, $message, $type);
    }
}
