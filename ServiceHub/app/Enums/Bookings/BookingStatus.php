<?php

namespace App\Enums\Bookings;

enum BookingStatus: string
{
    case pending = 'pending';
    case confirmed = 'confirmed';
    case rejected = 'rejected';
    case cancelled = 'cancelled';
    case completed = 'completed';
}
