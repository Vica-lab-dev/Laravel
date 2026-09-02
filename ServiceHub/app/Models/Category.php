<?php

namespace App\Models;

use App\Enums\Categories\CategoryStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'name',
    'slug',
    'description',
])]
class Category extends Model
{
    protected function casts(): array
    {
        return [
            'status' => CategoryStatus::class,
        ];
    }
}
