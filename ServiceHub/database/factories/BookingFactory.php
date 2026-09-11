<?php

namespace Database\Factories;

use App\Enums\Bookings\BookingStatus;
use App\Models\Booking;
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
        return [
            'user_id' => User::factory(),
            'status' => fake()->randomElement([
                'pending',
                'confirmed',
                'completed',
                'cancelled',
            ]),
        ];
    }

    public function completed()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => BookingStatus::COMPLETED,
            ];
        });
    }

    public function forUser(User $user): static
    {
        return $this->state([
            'user_id' => $user->id,
        ]);
    }

    public function forService(Service $service): static
    {
        $startsAt = fake()->dateTimeBetween(startDate: 'today', endDate: '+30 days');
        $endsAt = Carbon::instance($startsAt)->addMinutes($service->duration);

        return $this->state([
            'service_id' => $service->id,
            'provider_id' => $service->provider_id,
            'price' => $service->price,
            'starts_at' => $startsAt,
            'ends_at' => $endsAt,
        ]);
    }
}
