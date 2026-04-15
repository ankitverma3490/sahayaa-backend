<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use SoftDeletes;

    protected $table = 'subscriptions';

    protected $fillable = [
        'subscription_name',
        'description',
        'price',
        'validity',
        'type',
        'razorpay_order_id',
        'extra',
        'role_id',
        'subscription_limit',
        'job_limit'
    ];

    protected $casts = [
        'extra' => 'array', // JSON column as array
    ];

    /**
     * Get the role that this subscription belongs to
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
