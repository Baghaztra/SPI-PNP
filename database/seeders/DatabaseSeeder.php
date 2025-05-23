<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12qwaszx'),
            'role' => "super-admin",
            'status' => 1,
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'test@example.com',
            'password' => Hash::make('1'),
            'status' => 1,
        ]);
    }
}
