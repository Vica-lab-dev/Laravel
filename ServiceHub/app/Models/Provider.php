<?php

namespace App\Models;

use App\Enums\Providers\ProviderStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'name',
    'description',
    'phone',
    'address',
    'city',
    'latitude',
    'longitude',
    ])]

class Provider extends Model
{
    use HasUuids, HasFactory;
    protected function casts(): array
    {
        return [
            'status' => ProviderStatus::class,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(related: User::class);
    }

    public function services(): HasMany
    {
        return $this->hasMany(related: Service::class);
    }

    public function workingHours(): HasMany
    {
        return $this->hasMany(related: WorkingHour::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(related: Booking::class);
    }

    public function exceptions(): HasMany
    {
        return $this->hasMany(related: ProviderException::class);
    }
}
