<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin TOTS',
            'email' => 'admin@tots.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Usuario Demo',
            'email' => 'user@tots.com',
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Eustabio Rodrigues',
            'email' => 'eustabiorodrigues@example.com',
            'password' => Hash::make('user123'),
            'role' => 'user'
        ]);
    }
}
