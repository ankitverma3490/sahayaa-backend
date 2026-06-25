<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JobApplyLimitPurchase;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Razorpay\Api\Api as RazorpayApi;

class JobApplyLimitController extends Controller
{
    /**
     * Get current staff's job apply limit status
     */
    public function status(): \Illuminate\Http\JsonResponse
    {
        $user = Auth::guard('api')->user();

        $freeLimit = (int) (Setting::where('key', 'job_apply_free_limit')->value('value') ?? 3);
        $price     = (float) (Setting::where('key', 'job_apply_limit_price')->value('value') ?? 49);

        // Count actual applications (not a stale counter)
        $applyCount   = \App\Models\JobApplication::where('user_id', $user->id)->count();
        $extraLimit   = (int) ($user->job_apply_extra_limit ?? 0);
        $totalAllowed = $freeLimit + $extraLimit;
        $remaining    = max(0, $totalAllowed - $applyCount);

        return response()->json([
            'status'        => 'success',
            'data'          => [
                'free_limit'     => $freeLimit,
                'extra_limit'    => $extraLimit,
                'total_allowed'  => $totalAllowed,
                'apply_count'    => $applyCount,
                'remaining'      => $remaining,
                'limit_exceeded' => $applyCount >= $totalAllowed,
                'price_per_slot' => $price,
            ],
        ]);
    }

    /**
     * Create Razorpay order for purchasing an extra application slot
     */
    public function createOrder(): \Illuminate\Http\JsonResponse
    {
        $user  = Auth::guard('api')->user();
        $price = (float) (Setting::where('key', 'job_apply_limit_price')->value('value') ?? 49);

        try {
            $razorpayKey    = config('services.razorpay.key');
            $razorpaySecret = config('services.razorpay.secret');

            $api = new RazorpayApi($razorpayKey, $razorpaySecret);

            $orderData = [
                'receipt'         => 'job_limit_' . $user->id . '_' . time(),
                'amount'          => (int) ($price * 100), // in paise
                'currency'        => 'INR',
                'notes'           => [
                    'user_id'  => $user->id,
                    'purpose'  => 'job_apply_limit',
                ],
            ];

            $razorpayOrder = $api->order->create($orderData);

            // Save pending purchase record
            $purchase = JobApplyLimitPurchase::create([
                'user_id'             => $user->id,
                'razorpay_order_id'   => $razorpayOrder->id,
                'amount'              => $price,
                'extra_limit_granted' => 1,
                'status'              => 'pending',
            ]);

            return response()->json([
                'status' => 'success',
                'data'   => [
                    'order_id'        => $razorpayOrder->id,
                    'amount'          => (int) ($price * 100),
                    'currency'        => 'INR',
                    'razorpay_key'    => $razorpayKey,
                    'purchase_id'     => $purchase->id,
                    'name'            => 'Sahayya',
                    'description'     => 'Extra Job Application Slot',
                    'prefill_name'    => $user->first_name . ' ' . $user->last_name,
                    'prefill_email'   => $user->email ?? '',
                    'prefill_contact' => $user->phone_number ?? '',
                ],
            ]);
        } catch (\Exception $e) {
            Log::error('Job limit order creation failed: ' . $e->getMessage());
            return response()->json([
                'status'  => 'error',
                'message' => 'Failed to create payment order. Please try again.',
            ], 500);
        }
    }

    /**
     * Verify Razorpay payment and grant extra limit
     */
    public function verifyPayment(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'razorpay_order_id'   => 'required|string',
            'razorpay_payment_id' => 'required|string',
            'razorpay_signature'  => 'required|string',
        ]);

        $user = Auth::guard('api')->user();

        try {
            $razorpayKey    = config('services.razorpay.key');
            $razorpaySecret = config('services.razorpay.secret');

            $api = new RazorpayApi($razorpayKey, $razorpaySecret);

            // Verify signature
            $attributes = [
                'razorpay_order_id'   => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature'  => $request->razorpay_signature,
            ];

            $api->utility->verifyPaymentSignature($attributes);

            // Find the purchase record
            $purchase = JobApplyLimitPurchase::where('razorpay_order_id', $request->razorpay_order_id)
                ->where('user_id', $user->id)
                ->where('status', 'pending')
                ->first();

            if (!$purchase) {
                return response()->json(['status' => 'error', 'message' => 'Purchase record not found.'], 404);
            }

            // Update purchase record
            $purchase->update([
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature'  => $request->razorpay_signature,
                'status'              => 'success',
            ]);

            // Grant extra limit to user
            $user->increment('job_apply_extra_limit', $purchase->extra_limit_granted);

            $freeLimit    = (int) (Setting::where('key', 'job_apply_free_limit')->value('value') ?? 3);
            $applyCount   = \App\Models\JobApplication::where('user_id', $user->id)->count();
            $extraLimit   = (int) ($user->fresh()->job_apply_extra_limit ?? 0);
            $totalAllowed = $freeLimit + $extraLimit;
            $remaining    = max(0, $totalAllowed - $applyCount);

            return response()->json([
                'status'  => 'success',
                'message' => 'Payment verified successfully! You now have 1 extra application slot.',
                'data'    => [
                    'extra_limit'   => $extraLimit,
                    'total_allowed' => $totalAllowed,
                    'remaining'     => $remaining,
                ],
            ]);
        } catch (\Razorpay\Api\Errors\SignatureVerificationError $e) {
            // Mark purchase as failed
            JobApplyLimitPurchase::where('razorpay_order_id', $request->razorpay_order_id)
                ->where('user_id', $user->id)
                ->update(['status' => 'failed']);

            Log::error('Razorpay signature verification failed: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Payment verification failed. Please contact support.'], 400);
        } catch (\Exception $e) {
            Log::error('Job limit verify payment error: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'An error occurred during payment verification.'], 500);
        }
    }

    // =====================================================
    // ADMIN METHODS
    // =====================================================

    /**
     * Get admin settings for job apply limits
     */
    public function adminGetSettings(): \Illuminate\Http\JsonResponse
    {
        $freeLimit = Setting::where('key', 'job_apply_free_limit')->first();
        $price     = Setting::where('key', 'job_apply_limit_price')->first();

        return response()->json([
            'status' => 'success',
            'data'   => [
                'free_limit'       => (int) ($freeLimit?->value ?? 3),
                'price_per_slot'   => (float) ($price?->value ?? 49),
                'free_limit_setting'  => $freeLimit,
                'price_setting'       => $price,
            ],
        ]);
    }

    /**
     * Update admin settings for job apply limits
     */
    public function adminUpdateSettings(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'free_limit'     => 'required|integer|min:1|max:100',
            'price_per_slot' => 'required|numeric|min:1',
        ]);

        Setting::updateOrCreate(
            ['key' => 'job_apply_free_limit'],
            [
                'value'       => $request->free_limit,
                'title'       => 'Free Job Application Limit',
                'description' => 'Number of job applications a staff can submit for free',
                'updated_at'  => now(),
            ]
        );

        Setting::updateOrCreate(
            ['key' => 'job_apply_limit_price'],
            [
                'value'       => $request->price_per_slot,
                'title'       => 'Job Apply Extra Limit Price (INR)',
                'description' => 'Price in INR to purchase 1 extra job application slot',
                'updated_at'  => now(),
            ]
        );

        return response()->json([
            'status'  => 'success',
            'message' => 'Settings updated successfully.',
        ]);
    }

    /**
     * Get statistics for admin panel
     */
    public function adminStats(): \Illuminate\Http\JsonResponse
    {
        $totalPurchases   = JobApplyLimitPurchase::where('status', 'success')->count();
        $totalRevenue     = JobApplyLimitPurchase::where('status', 'success')->sum('amount');
        $totalSlotsGranted = JobApplyLimitPurchase::where('status', 'success')->sum('extra_limit_granted');

        $recentPurchases = JobApplyLimitPurchase::with('user')
            ->where('status', 'success')
            ->orderBy('created_at', 'desc')
            ->take(50)
            ->get()
            ->map(function ($p) {
                return [
                    'id'                  => $p->id,
                    'user_name'           => $p->user ? ($p->user->first_name . ' ' . $p->user->last_name) : 'Unknown',
                    'user_phone'          => $p->user->phone_number ?? '',
                    'razorpay_payment_id' => $p->razorpay_payment_id,
                    'amount'              => $p->amount,
                    'extra_limit_granted' => $p->extra_limit_granted,
                    'created_at'          => $p->created_at,
                ];
            });

        // Monthly stats (last 6 months)
        $monthlyStats = JobApplyLimitPurchase::where('status', 'success')
            ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as purchases, SUM(amount) as revenue')
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupByRaw('YEAR(created_at), MONTH(created_at)')
            ->orderByRaw('YEAR(created_at) DESC, MONTH(created_at) DESC')
            ->get();

        return response()->json([
            'status' => 'success',
            'data'   => [
                'total_purchases'    => $totalPurchases,
                'total_revenue'      => $totalRevenue,
                'total_slots_granted' => $totalSlotsGranted,
                'recent_purchases'   => $recentPurchases,
                'monthly_stats'      => $monthlyStats,
            ],
        ]);
    }

    /**
     * Get all staff with their limit info (for admin)
     */
    public function adminStaffLimits(Request $request): \Illuminate\Http\JsonResponse
    {
        $freeLimit = (int) (Setting::where('key', 'job_apply_free_limit')->value('value') ?? 3);

        $query = User::where('user_role_id', 2) // staff role
            ->select('id', 'first_name', 'last_name', 'phone_number', 'job_apply_extra_limit')
            ->orderBy('id', 'desc');

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->search . '%')
                  ->orWhere('last_name', 'like', '%' . $request->search . '%')
                  ->orWhere('phone_number', 'like', '%' . $request->search . '%');
            });
        }

        $staff = $query->paginate(20)->through(function ($s) use ($freeLimit) {
            $totalAllowed = $freeLimit + (int)$s->job_apply_extra_limit;
            $applyCount   = \App\Models\JobApplication::where('user_id', $s->id)->count();
            return [
                'id'             => $s->id,
                'name'           => $s->first_name . ' ' . $s->last_name,
                'phone'          => $s->phone_number,
                'apply_count'    => $applyCount,
                'extra_limit'    => (int) $s->job_apply_extra_limit,
                'total_allowed'  => $totalAllowed,
                'remaining'      => max(0, $totalAllowed - $applyCount),
                'limit_exceeded' => $applyCount >= $totalAllowed,
            ];
        });

        return response()->json([
            'status' => 'success',
            'data'   => $staff,
        ]);
    }
}
