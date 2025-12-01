<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForecastsLiveModel extends Model
{
    protected $table = 'forecast_live';

    protected $fillable = [
        'city_id',
        'temperature',
        'forecast_date',
    ];
}
