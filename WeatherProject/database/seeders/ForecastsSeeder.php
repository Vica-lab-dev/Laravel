<?php

namespace Database\Seeders;

use App\Models\CitiesModel;
use App\Models\ForecastModel;
use App\Models\ForecastsLiveModel;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForecastsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = CitiesModel::all();

        foreach ($cities as $city)
        {
            $userWeather = ForecastModel::where('city_id', $city->id)->first();
            if ($userWeather !== null)
            {
                $this->command->error("This city already exists");
                continue;
            }

            ForecastModel::create([
                'city_id' => $city->id,
                "temperature" => rand(15, 30)
            ]);
        }
    }
}
