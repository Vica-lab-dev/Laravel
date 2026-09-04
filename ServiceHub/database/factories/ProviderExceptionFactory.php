<?php

namespace Database\Factories;

use App\Models\Provider;
use App\Models\ProviderException;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProviderException>
 */
class ProviderExceptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startTime = fake()->boolean(chanceOfGettingTrue: 70)
            ? fake()->dateTimeBetween(startDate: '08:00', endDate: '18:00')
            : null;
        $endTime = $startTime
            ? Carbon::instance($startTime)->addHours(fake()->numberBetween(int1: 1, int2: 4))
            : null;

        return [
            'provider_id' => Provider::factory(),
            'exception_date' => fake()->date(),
            'start_time' => $startTime?->format(format: 'H:i:s'),
            'end_time' => $endTime?->format(format: 'H:i:s'),
        ];
    }
}
