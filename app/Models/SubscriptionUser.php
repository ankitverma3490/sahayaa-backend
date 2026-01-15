<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubscriptionUser extends Model
{
    protected $table = 'subscription_users';

    protected $fillable = [
        'user_id',
        'subscription_id',
        'role',
        'transaction_id',
        'type',
        'order_id',
        'order_number',
        'reference_id',
        'amount',
        'currency',
        'payment_mode',
        'payment_status',
        'payment_response',
        'for_entry',
        'start_date',
        'end_date',
        'status'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'payment_response' => 'array',
    ];

    /**
     * Get the user that owns the subscription
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the subscription plan
     */
    public function subscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class);
    }

    /**
     * Check if subscription is active
     */
    public function isActive(): bool
    {
        return $this->status === 'active' && 
               $this->end_date && 
               $this->end_date->isFuture();
    }
}