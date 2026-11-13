<?php

namespace App\Models;

use App\Enums\Categories\CategoryStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'name',
    'slug',
    'description',
])]
class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected function casts(): array
    {
        return [
            'status' => CategoryStatus::class,
        ];
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(related: Service::class);
    }
}
