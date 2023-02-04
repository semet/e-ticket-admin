<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'price',
        'status',
        'type',
        'seat_count',
        'thumbnail',
        'description',
        'location',
        'longitude',
        'latitude',
        'map_url'
    ];

    public function pictures()
    {
        return $this->hasMany(DestinationPicture::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
