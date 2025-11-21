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
        $name = $this->command->ask('What is your name?');
        $email = $this->command->ask('What is your email?');
        $password = $this->command->getOutput()->ask('What is your password?', 12345);

        if(User::where('email', $email)->exists())
        {
            $this->command->getOutput()->error("User with email $email already exists!");
        }

        $this->command->getOutput()->progressStart($amount);

        for($i = 0; $i < $amount; $i++)
        {
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
            ]);

            $this->command->getOutput()->progressAdvance(1);
        }

        $this->command->getOutput()->progressFinish();
    }
}
