<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'rating',
    'comment',
])]
class Review extends Model
{
    public function booking(): BelongsTo
    {
        return $this->belongsTo(related: Booking::class);
    }
}
