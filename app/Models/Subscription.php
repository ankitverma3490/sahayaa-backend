<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscriptions';

    protected $fillable = [
        'subscription_name',
        'description',
        'price',
        'validity',
        'type',
        'razorpay_order_id',
        'extra'
    ];

    protected $casts = [
        'extra' => 'array', // JSON column as array
    ];
}
