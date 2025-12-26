<?php

namespace App\Console\Commands;

use App\Models\CitiesModel;
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


    }
}

//c75cacc81cad4b86a99125310252212
