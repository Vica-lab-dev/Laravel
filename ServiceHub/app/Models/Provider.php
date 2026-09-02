<?php

namespace App\Models;

use App\Enums\Providers\ProviderStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
