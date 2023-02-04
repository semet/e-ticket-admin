<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    protected $fillable = [
        'name',
        'username',
        'email',
        'phone',
        'email_verified_at'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function verificationCode(): HasOne
    {
        return $this->hasOne(EmailVerification::class);
    }
}
