<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            [
                'email' => 'passenger@test.com',
            ],
            [
                'name' => 'Mohamed Saleh',
                'email' => 'passenger@test.com',
                'password' => bcrypt('12345678'),
            ]
        );
    }
}
