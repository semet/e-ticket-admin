<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordRequest extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = ['user_id'];
}
