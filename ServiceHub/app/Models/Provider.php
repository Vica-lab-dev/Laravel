<?php

namespace App\Models;

use App\Enums\Providers\ProviderStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
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
}
