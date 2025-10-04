<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // First user
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        // Second user
        \App\Models\User::factory()->create([
            'name' => 'Second User',
            'email' => 'anass@test.com',
            'password' => Hash::make('1234'),
        ]);
    }
}
