<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'exception_date',
    'start_time',
    'end_time',
])]
class ProviderException extends Model
{
    use HasFactory;
    public function provider(): BelongsTo
    {
        return $this->belongsTo(related: Provider::class);
    }
}
