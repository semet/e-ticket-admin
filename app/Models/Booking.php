<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'destination_id',
        'user_id',
        'schedule_id',
        'number',
        'date',
        'status',
        'type',
        'snap_token'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
    public function passengers()
    {
        return $this->hasMany(Passenger::class);
    }
}
