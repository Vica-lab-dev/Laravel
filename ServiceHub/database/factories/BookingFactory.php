<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Provider;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $service = Service::factory()->create();
        $startsAt = fake()->dateTimeBetween(startDate: 'today', endDate: '+30 days');
        $endsAt = Carbon::instance($startsAt)->addMinutes($service->duration);

        return [
            'user_id' => User::factory(),
            'service_id' => $service->id,
            'provider_id' => $service->provider_id,
            'starts_at' => $startsAt,
            'ends_at' => $endsAt,
            'price' => $service->price,
            'status' => fake()->randomElement([
                'pending',
                'confirmed',
                'completed',
                'cancelled',
            ]),
        ];
    }
}
