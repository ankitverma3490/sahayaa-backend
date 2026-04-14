<?php

namespace App\Http\Controllers\Api;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SettingController extends Controller
{
    /**
     * Handle both GET and POST for notification settings
     */
 public function handleNotification(Request $request)
{
    if ($request->isMethod('post')) {
        $request->validate([
            'value' => 'required|in:0,1',
        ]);
        $setting = Setting::firstOrNew(['key' => 'notification_title']);
        $setting->value = $request->value;
        $setting->title = 'Notification Title';
        $setting->description = 'Control notification settings';
        $setting->save();
        return response()->json([
            'success' => true,
            'message' => 'Notification setting updated successfully',
            'data' => [
                'key' => $setting->key,
                'value' => $setting->value,
            ],
        ]);
    }
    $notificationSetting = Setting::where('key', 'notification_title')->first();
    return response()->json([
        'success' => true,
        'data' => $notificationSetting ?: [
            'key' => 'notification_title',
            'value' => '0', // default value
            'title' => 'Notification Title',
            'description' => 'Control notification settings',
        ],
    ]);
}
   public function handleAutoPresent(Request $request)
{
    $user = Auth::guard('api')->user();
    
    if (!$user) {
        return response()->json([
            'success' => false,
            'message' => 'User not authenticated',
        ], 401);
    }
    
    if ($request->isMethod('post')) {
        $request->validate([
            'value' => 'required|in:0,1',
        ]);
                $user->is_attendance = $request->value;
        $user->save();
        
        return response()->json([
            'success' => true,
            'message' => 'Auto-present setting updated successfully',
            'data' => [
                'user_id' => $user->id,
                'is_attendance' => $user->is_attendance,
            ],
        ]);
    }
        return response()->json([
        'success' => true,
        'data' => [
            'user_id' => $user->id,
            'is_attendance' => $user->is_attendance ?? '0', // default to 0 if null
        ],
    ]);
}
    /**
     * Get all settings (optional)
     */
    public function getAllSettings()
    {
        $settings = Setting::all();
        
        return response()->json([
            'success' => true,
            'data' => $settings
        ]);
    }


    public function store(Request $request)
    {
        
        $request->validate([
            'settings' => 'required|array',
            'settings.*.key' => 'required|string',
            'settings.*.value' => 'nullable',
        ]);

        $data = [];

        foreach ($request->settings as $item) {
            $setting = Setting::updateOrCreate(
                ['key' => $item['key']],
                [
                    'value' => $item['value'] ?? null,
                    'title' => $item['title'] ?? null,
                    'description' => $item['description'] ?? null,
                    'input_type' => $item['input_type'] ?? 'text',
                    'editable' => $item['editable'] ?? 1,
                    'weight' => $item['weight'] ?? null,
                ]
            );

            $data[] = $setting;
        }

        return response()->json([
            'success' => true,
            'message' => 'Settings saved successfully',
            'data' => $data
        ]);
    }
}