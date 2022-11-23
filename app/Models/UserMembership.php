<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMembership extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'membership_id',
        'membership_log',
        'status',
        'activated_at',
        'stopped_at',
        'expired_at'
    ];

    protected $casts = [
        'membership_log' => 'json'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
