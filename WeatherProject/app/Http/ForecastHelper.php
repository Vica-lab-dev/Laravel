<?php

namespace App\Http;
use App\Models\ForecastsModel;

class ForecastHelper
{
    const PROBABILITY_ICONS = 'fa-droplet';


    public static function getProbabilityIcon($probability)
    {
        if ($probability !== null) {
            return self::PROBABILITY_ICONS;
        }
    }
    const WEATHER_ICONS =
        [
            "rainy" => "fa-cloud-rain",
            "snowy" => "fa-snowflake",
            "sunny" => "fa-sun",
            "cloudy" => "fa-cloud"
        ];

    public static function getIconByWeatherType($type)
    {

        if(in_array($type, self::WEATHER_ICONS))
        {
            return self::WEATHER_ICONS[$type];
        }
        return "fa-sun";
    }

    public static function getColorByTemperature($temperature)
    {
        if ($temperature <= 0) {
            $color = 'lightblue';
        } else if ($temperature >= 1 && $temperature <= 15) {
            $color = 'blue';
        } else if ($temperature > 15 && $temperature <= 25) {
            $color = 'green';
        } else {
            $color = 'red';
        }

        return $color;
    }
}
