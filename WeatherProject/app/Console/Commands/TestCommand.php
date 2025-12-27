<?php

namespace App\Console\Commands;

use App\Models\CitiesModel;
use App\Models\ForecastsModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-command {city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $city = $this->argument('city');
        $dbCity = CitiesModel::where(['name' => $city])->first();
        if($dbCity === null)
        {
            $dbCity = CitiesModel::create(['name' => $city]);
        }

        $response = Http::get(env("WEATHER_API_URL")."v1/forecast.json", [
            'key' => env("WEATHER_API_KEY"),
            'q' => $city,
            'aqi' => "no",
        ]);

        $jsonResponse = $response->json();
        if(isset($jsonResponse['error']))
        {
            $this->output->error($jsonResponse['error']['message']);
        }

        if($dbCity->todaysForecast !== null)
        {
            $this->output->comment('Command finished');
            return;
        }

        $forecastDay = $jsonResponse['forecast']['forecastday'][0];

        $forecast_date = $forecastDay['date'];
        $temperature = $forecastDay['day']['avgtemp_c'];
        $weather_type = $forecastDay['day']['condition']['text'];
        $probability = $forecastDay['day']['daily_chance_of_rain'];

        $forecast =
            [
                "city_id" => $dbCity->id,
                "temperature" => $temperature,
                "forecast_date" => $forecast_date,
                "weather_type" => strtolower($weather_type),
                "probability" => $probability,
        ];

        ForecastsModel::create($forecast);
        $this->output->comment('Added forecast');
    }
}

