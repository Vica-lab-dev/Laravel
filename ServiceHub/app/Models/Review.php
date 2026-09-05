<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'rating',
    'comment',
])]
class Review extends Model
{
    use HasFactory;
    public function booking(): BelongsTo
    {
        return $this->belongsTo(related: Booking::class);
    }

    public function user(): BelongsTo
    {
        return $this->BelongsTo(related: User::class);
    }
}
