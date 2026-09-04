<?php

namespace App\Models;

use App\Enums\Bookings\BookingStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
#[Fillable([
    'service_id',
    'starts_at',
])]
class Booking extends Model
{
    use HasFactory;
    protected function casts(): array
    {
        return [
            'status' => BookingStatus::class,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(related: User::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(related: Service::class);
    }

    public function provider(): BelongsTo
    {
        return $this->belongsTo(related: Provider::class);
    }

    public function review(): HasOne
    {
        return $this->hasOne(related: Review::class);
    }
}
