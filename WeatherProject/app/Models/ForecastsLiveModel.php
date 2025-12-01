<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForecastsLiveModel extends Model
{
    protected $table = 'forecasts_live';

    protected $fillable = [
        'city_id',
        'temperature',
        'forecast_date',
    ];
}
