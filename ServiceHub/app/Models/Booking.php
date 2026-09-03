<?php

namespace App\Models;

use App\Enums\Bookings\BookingStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'service_id',
    'starts_at',
])]
class Booking extends Model
{
    protected function casts(): array
    {
        return [
            'status' => BookingStatus::class,
        ];
    }
}
