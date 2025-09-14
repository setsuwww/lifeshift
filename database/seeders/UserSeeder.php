<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'Admin',
        ]);

        // Coordinator
        User::create([
            'name' => 'Coordinator',
            'email' => 'coordinator@example.com',
            'password' => Hash::make('password123'),
            'role' => 'Coordinator',
        ]);

        // User
        User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('password123'),
            'role' => 'User',
        ]);
    }
}
