<?php


namespace Database\Seeders;

use App\Models\WeatherModel;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserWeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city = $this->command->getOutput()->ask('What is your city?');
        if ($city === null) {
            $this->command->getOutput()->error("You did not specify a valid city!");
        }

        $temperature = $this->command->getOutput()->ask('What is your temperature?');
        if ($temperature === null) {
            $this->command->getOutput()->error("You did not specify a temperature!");
        }

        WeatherModel::create([
            'city' => $city,
            'temperature' => $temperature,
        ]);

        $this->command->getOutput()->info("The weather for your city is entered in the Forecast table");
    }
}
