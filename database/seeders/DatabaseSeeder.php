<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin123@gmail.com'],
            [
                'name' => 'System Admin',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'phone' => '01711223344',
                'address' => 'Sector 1, Uttara, Dhaka',
                'sector' => 'Sector 1',
                'road' => 'Road 1'
            ]
        );

        User::updateOrCreate(
            ['email' => 'collector@smartbin.com'],
            [
                'name' => 'Waste Collector Joe',
                'password' => Hash::make('password'),
                'role' => 'waste_collector',
                'phone' => '01811223344',
                'sector' => 'Sector 3',
                'road' => 'Road 12',
                'address' => 'Sector 3, Road 12, Uttara, Dhaka',
            ]
        );

        User::updateOrCreate(
            ['email' => 'citizen@smartbin.com'],
            [
                'name' => 'Citizen John',
                'password' => Hash::make('password'),
                'role' => 'user',
                'phone' => '01911223344',
                'sector' => 'Sector 4',
                'road' => 'Road 8',
                'address' => 'Sector 4, Road 8, Uttara, Dhaka',
            ]
        );
    }
}
