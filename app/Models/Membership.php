<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'duration_in_month',
        'price',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];
}
