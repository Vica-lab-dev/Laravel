<?php

namespace App\Models;

use App\Enums\Providers\ProviderStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
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
    use HasUuids;
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

    public function service(): HasMany
    {
        return $this->hasMany(related: Service::class);
    }
}
