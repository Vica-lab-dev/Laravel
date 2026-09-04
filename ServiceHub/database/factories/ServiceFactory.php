<?php

namespace Database\Factories;

use App\Models\Provider;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Haircut',
                'Beard Trim',
                'Hair Coloring',
                'Massage',
                'Facial Treatment',
                'Manicure',
                'Pedicure',
                'Dental Cleaning',
                'Car Wash',
                'Oil Change',
            ]),
            'description' => fake()->sentence(),
            'price' => fake()->randomElement([
                500, 800, 1000, 1200, 1500,
                2000, 2500, 3000, 4000, 5000,
                7500, 10000, 15000,
            ]),
            'duration' => fake()->randomElement([
                30, 60, 90,
            ]),
            'provider_id' => Provider::factory(),
        ];
    }
}
