<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amount = $this->command->ask('How many users would you like to create?', 3);
        $password = $this->command->getOutput()->ask('What is your password?', 12345);
        dd($password);

        $faker = Factory::create(); //sr_rs je na cirilici imena kada pokrenemo seed,prazno je eng.

        $this->command->getOutput()->progressStart($amount);

        for($i = 0; $i < $amount; $i++)
        {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make($password),
            ]);

            $this->command->getOutput()->progressAdvance(1);
        }

        $this->command->getOutput()->progressFinish();
    }
}
