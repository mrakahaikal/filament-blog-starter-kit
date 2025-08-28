<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Raka Haikal',
            'email' => 'raka@example.com',
            'password' => bcrypt('icikiwir'),
            'email_verified_at' => now()
        ]);
    }
}
