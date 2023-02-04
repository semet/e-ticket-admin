<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'booking_id',
        'nik',
        'name',
        'email',
        'is_claimed'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
