<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHouseholdInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'residence_type',
        'number_of_rooms',
        'languages_spoken',
        'adults_count',
        'children_count',
        'elderly_count',
        'special_requirements'
    ];

    protected $casts = [
        'languages_spoken' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}