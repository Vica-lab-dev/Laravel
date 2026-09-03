<?php

namespace App\Models;

use App\Enums\Services\ServiceStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable([
    'name',
    'description',
    'price',
    'duration',
])]
class Service extends Model
{
    protected function casts(): array
    {
        return [
            'status' => ServiceStatus::class,
        ];
    }

    public function provider(): BelongsTo
    {
        return $this->belongsTo(related: Provider::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(related: Category::class);
    }
}
