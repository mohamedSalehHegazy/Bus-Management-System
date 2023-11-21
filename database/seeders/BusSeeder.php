<?php

namespace Database\Seeders;

use App\Models\Bus;
use App\Models\Seat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bus = Bus::firstOrCreate(
            [
                'plate_number' => 'ABC 123',
            ],
            [
                'plate_number' => 'ABC 123',
                'capacity' => 12,
            ]
        );

        // seats creation
        for ($i = 0; $i < 12; $i++) {
            Seat::create(
                [
                    'serial_no' => Str::random(3) . '-' . rand(000, 999),
                    'bus_id' => $bus->id
                ]
            );
        }
    }
}
