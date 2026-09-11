<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Category;
use App\Models\Provider;
use App\Models\ProviderException;
use App\Models\Review;
use App\Models\Service;
use App\Models\User;
use App\Models\WorkingHour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $customers = User::factory()->count(count: 10)->create();
        User::factory()->count(count: 10)->admin()->create();
        $services = collect();
        $providers = Provider::factory()->count(count: 10)->create();
        $categories = Category::factory()->count(count: 10)->create();


        foreach ($providers as $provider) {
            WorkingHour::factory()->count(count: 5)->forProvider($provider)->create();
            ProviderException::factory()->count(count: 2)->forProvider($provider)->create();
            $providerServices = Service::factory()->count(count: 10)->forProvider($provider)->create();

            $services = $services->merge($providerServices);
        }

        foreach ($services as $service) {
            $categoriesIds = $categories->random(rand(1, 3))->pluck(value: 'id')->toArray();

            $service->categories()->sync($categoriesIds);
        }

        $customer = $customers->random();
        $service = $services->random();

        $booking = Booking::factory()->forUser($customer)->forService($service)->completed()->create();

        Review::factory()->forBooking($booking)->create();
    }
}
