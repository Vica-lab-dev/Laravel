<?php

namespace Database\Factories;

use App\Enums\Working_Hours\WorkingDay;
use App\Models\Provider;
use App\Models\WorkingHour;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<WorkingHour>
 */
class WorkingHourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start_time = fake()->dateTimeBetween(startDate: '09:00', endDate: '10:00');
        $end_time = (clone $start_time)->modify(modifier: '+8 hours');

        return [
            'day' => fake()->randomElement(WorkingDay::cases())->value,
            'start_time' => $start_time->format(format: 'H:i'),
            'end_time' => $end_time->format(format: 'H:i'),
        ];
    }

    public function forProvider(Provider $provider): static
    {
        return $this->state([
            'provider_id' => $provider->id,
        ]);
    }
}
