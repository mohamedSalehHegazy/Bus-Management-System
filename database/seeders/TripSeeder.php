<?php

namespace Database\Seeders;

use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trip::create([
            'departure_at' => now()->addDay(),
            'arrive_at' => now()->addDay()->addHours(3),
            'available_seats' => 12,
            'bus_id' => 1,
            'departure_city_id' => 1,
            'arrival_city_id' => 5,
        ]);

        Trip::create([
            'departure_at' => now()->addDay(),
            'arrive_at' => now()->addDay()->addHour(),
            'available_seats' => 12,
            'bus_id' => 1,
            'departure_city_id' => 1,
            'arrival_city_id' => 3,
        ]);

        Trip::create([
            'departure_at' => now()->addDay(),
            'arrive_at' => now()->addDay()->addHours(2),
            'available_seats' => 12,
            'bus_id' => 1,
            'departure_city_id' => 1,
            'arrival_city_id' => 4,
        ]);

        Trip::create([
            'departure_at' => now()->addDay()->addHour(),
            'arrive_at' => now()->addDay()->addHours(2),
            'available_seats' => 12,
            'bus_id' => 1,
            'departure_city_id' => 3,
            'arrival_city_id' => 4,
        ]);

        Trip::create([
            'departure_at' => now()->addDay()->addHours(2),
            'arrive_at' => now()->addDay()->addHours(3),
            'available_seats' => 12,
            'bus_id' => 1,
            'departure_city_id' => 4,
            'arrival_city_id' => 5,
        ]);
    }
}
