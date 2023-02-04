<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationPicture extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'destination_id',
        'image'
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
