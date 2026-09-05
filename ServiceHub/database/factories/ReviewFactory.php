<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rating' => fake()->numberBetween(int1: 1,int2: 5),
            'comment' => fake()->realText(),
        ];
    }

    public function forBooking(Booking $booking): static
    {
        return $this->state([
            'booking_id' => $booking->id,
            'user_id' => $booking->user_id,
        ]);
    }
}
