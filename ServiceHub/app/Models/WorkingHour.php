<?php

namespace App\Models;

use App\Enums\Working_Hours\WorkingDay;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'day',
    'start_time',
    'end_time',
])]
class WorkingHour extends Model
{
    use HasFactory;
    protected function casts(): array
    {
        return [
            'day' => WorkingDay::class,
        ];
    }

    public function provider(): BelongsTo
    {
        return $this->belongsTo(related: Provider::class);
    }
}
