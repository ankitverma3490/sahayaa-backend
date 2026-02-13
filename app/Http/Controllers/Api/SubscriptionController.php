<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\SubscriptionUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Notification;
use Carbon\Carbon;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;
use Illuminate\Http\JsonResponse;


class SubscriptionController extends Controller
{
    

    public function index(Request $request)
    {
        $query = Subscription::query();
        if ($request->has('type') && !is_null($request->type)) {
            $query->where('type', $request->type);
        }

        if ($request->has('validity') && !is_null($request->validity)) {
            $query->where('validity', $request->validity);
        }
        $subscriptions = $query->get();
        return response()->json([
            'status' => true,
            'message' => 'Subscriptions fetched successfully',
            'data' => $subscriptions
        ]);
    }

    // Store new subscription
    public function store(Request $request)
    {
        $data = $request->validate([
            'subscription_name' => 'required|string|max:150',
            'description'       => 'nullable|string',
            'price'             => 'required|numeric',
            'validity'          => 'required',
            'type'              => 'required|in:monthly,yearly,quarterly',
            'razorpay_order_id' => 'nullable',
            'role_id'           => 'required|exists:roles,id',
            'extra'             => 'nullable'
        ]);

        $subscription = Subscription::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Subscription created successfully',
            'data' => $subscription
        ], 201);
    }

    // Update subscription
    public function update(Request $request, $id)
    {
        $subscription = Subscription::findOrFail($id);

        $data = $request->validate([
            'subscription_name' => 'sometimes|string|max:150',
            'description'       => 'nullable|string',
            'price'             => 'sometimes|numeric',
            'validity'          => 'sometimes',
            'type'              => 'sometimes|in:monthly,yearly,quarterly',
            'razorpay_order_id' => 'nullable|string',
            'role_id'           => 'required|exists:roles,id',
            'extra'             => 'nullable|array'
        ]);

        $subscription->update($data);

        return response()->json([
            'status' => true,
            'message' => 'Subscription updated successfully',
            'data' => $subscription
        ]);
    }


    public function destroy($id)
    {
        $subscription = Subscription::find($id);
        if (!$subscription) {
            return response()->json([
                'status' => false,
                'message' => 'Subscription not found'
            ], 404);
        }
        $subscription->delete();
        return response()->json([
            'status' => true,
            'message' => 'Subscription deleted successfully'
        ]);
    }

     public function show($id)
    {
        $subscription = Subscription::find($id);

        if (!$subscription) {
            return response()->json([
                'status' => false,
                'message' => 'Subscription not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Subscription details fetched successfully',
            'data' => $subscription
        ]);
    }


    public function createSubscriptionOrder(Request $request)
    {
        
        $request->validate([
            'subscription_id' => 'required|exists:subscriptions,id',
        ]);
        $user = Auth::user();
        $subscription = Subscription::find($request->subscription_id);
        if(!$subscription){
            return response()->json([
                'status' => false,
                'message' => 'Subscription not found'
            ], 404);
        }
        // Check if user already has an active subscription
        $activeSubscription = SubscriptionUser::where('user_id', $user->id)
            ->where('status', 'active')
            ->where('end_date', '>', now())
            ->first();
        if ($activeSubscription) {
            return response()->json([
                'status' => false,
                'message' => 'You already have an active subscription'
            ], 400);
        }

        try {
            $api_key = config('services.razorpay.key');
            $api_secret = config('services.razorpay.secret');
            
            $razorpayData = [
                "amount" => (int) $subscription->price * 100, // in paise
                "currency" => "INR",
                "receipt" => "sub_" . uniqid(),
                "payment_capture" => 1
            ];
            $api = new Api($api_key, $api_secret);
            $order = $api->order->create($razorpayData);
            // Create subscription user record
            $subscriptionUser = SubscriptionUser::create([
                'user_id' => $user->id,
                'subscription_id' => $subscription->id,
                'order_id' => $order['id'],
                'order_number' => 'SUB' . time() . $user->id,
                'amount' => $subscription->price,
                'currency' => 'INR',
                'payment_status' => 'pending',
                'role' => $user->user_role_id,
                'type' => 'credit',
                'start_date' => now(),
                'end_date' => now()->addDays($subscription->validity),
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Order created successfully',
                'order_id' => $order['id'],
                'amount' => $subscription->price,
                'currency' => 'INR',
                'subscription_user_id' => $subscriptionUser->id,
                'razorpay_key' => $api_key,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to create order: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Verify subscription payment
     */
    public function verifySubscriptionPayment(Request $request)
    {
        $request->validate([
            'razorpay_order_id' => 'required',
            'razorpay_payment_id' => 'required',
            'razorpay_signature' => 'required',
            'subscription_user_id' => 'required',
        ]);
        $user = Auth::guard('api')->user();
        $subscriptionUser = SubscriptionUser::find($request->subscription_user_id);
        
        try {
            DB::beginTransaction();
            // Verify signature
            $generated_signature = hash_hmac(
                'sha256',
                $request->razorpay_order_id . "|" . $request->razorpay_payment_id,
                config('services.razorpay.secret')
            );

            if ($generated_signature !== $request->razorpay_signature) {
                DB::rollBack();
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid payment signature'
                ], 400);
            }

            // Get subscription details
            $subscription = Subscription::find($subscriptionUser->subscription_id);

            // Calculate start and end dates
            $startDate = now();
            $endDate = now()->addDays($subscription->validity);

            // Update subscription user record
            $subscriptionUser->update([
                'transaction_id' => $request->razorpay_payment_id,
                'payment_id' => $request->razorpay_payment_id,
                'payment_status' => 'completed',
                'payment_mode' => 'razorpay',
                'payment_response' => $request->all(),
                'status' => 'active',
                'start_date' => $startDate,
                'end_date' => $endDate,
            ]);

            // Update user role if needed
            if ($subscriptionUser->role !== 'user') {
                $user->update(['role' => $subscriptionUser->role]);
            }

            // Send notifications
            $this->sendSubscriptionNotifications($user, $subscriptionUser);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Payment verified successfully and subscription activated.',
                'subscription' => $subscriptionUser->load('subscription'),
                'valid_until' => $endDate->format('Y-m-d H:i:s'),
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Payment verification failed: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get user's current subscription
     */
    public function getCurrentSubscription()
    {
        $user = Auth::guard('api')->user();

        $subscription = SubscriptionUser::with('subscription')
            ->where('user_id', $user->id)
            ->where('status', 'active')
            // ->where('end_date', '>', now())
            ->latest()
            ->first();

        return response()->json([
            'status' => true,
            'subscription' => $subscription,
            'is_active' => $subscription ? true : false,
        ]);
    }

    /**
     * Get user's subscription history
     */
    public function getSubscriptionHistory()
    {
        $user = Auth::user();

        if($user->user_role_id == 1) {
            $subscriptions = SubscriptionUser::with('subscription')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        } else {
            $subscriptions = SubscriptionUser::with('subscription')
                ->where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
    
        return response()->json([
            'status' => true,
            'subscriptions' => $subscriptions,
        ]);
    }

    /**
     * Get subscription user details
     */
    public function getSubscriptionUser($id)
    {
        $subscriptionUser = SubscriptionUser::with('subscription')
            ->where('id', $id)
            ->first();

        return response()->json([
            'status' => true,
            'data' => $subscriptionUser,
            'message' => 'Subscription user details fetched successfully'
        ]);
    }

    /**
     * Send subscription notifications
     */
    private function sendSubscriptionNotifications($user, $subscriptionUser)
    {
        // Send notification to user
        Notification::create([
            'user_id' => $user->id,
            'title' => 'Subscription Activated',
            'message' => 'Your subscription #' . $subscriptionUser->order_number . ' has been activated successfully. Valid until ' . $subscriptionUser->end_date->format('d M, Y'),
            'status' => 'unread',
        ]);

        // Send notification to admin (user_id = 1 or your admin user ID)
        Notification::create([
            'user_id' => 1, // Admin user ID
            'title' => 'New Subscription',
            'message' => 'User ' . $user->name . ' has purchased subscription #' . $subscriptionUser->order_number,
            'status' => 'unread',
        ]);
    }

    public function subscriptionByRole(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role_id' => 'required|exists:roles,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 400);
        }

        $role = Role::where('id', $request->role_id)->first();
        if (!$role) {
            return response()->json([
                'status' => false,
                'message' => 'Role not found'
            ], 404);
        }
        $subscriptions = Subscription::where('role_id', $request->role_id)
            ->orderBy('created_at', 'desc')
            ->get();
        
        return response()->json([
            'status' => true,
            'data' => $subscriptions,
            'message' => 'Subscriptions fetched successfully'
        ]);
    }
}
