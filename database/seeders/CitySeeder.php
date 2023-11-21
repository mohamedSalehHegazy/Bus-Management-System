<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::firstOrCreate(
            [
                'name' => 'Cairo',
            ],
            [
                'name' => 'Cairo',
            ]
        );

        City::firstOrCreate(
            [
                'name' => 'Giza',
            ],
            [
                'name' => 'Giza',
            ]
        );

        City::firstOrCreate(
            [
                'name' => 'AlFayyum',
            ],
            [
                'name' => 'AlFayyum',
            ]
        );

        City::firstOrCreate(
            [
                'name' => 'AlMinya',
            ],
            [
                'name' => 'AlMinya',
            ]
        );

        City::firstOrCreate(
            [
                'name' => 'Asyut',
            ],
            [
                'name' => 'Asyut',
            ]
        );
    }
}
