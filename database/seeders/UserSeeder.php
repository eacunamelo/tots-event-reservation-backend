<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@tots.com'],
            [
                'name' => 'Admin TOTS',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'user@tots.com'],
            [
                'name' => 'User TOTS',
                'password' => Hash::make('user123'),
                'role' => 'user',
            ]
        );
    }
}
