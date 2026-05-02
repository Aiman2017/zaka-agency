<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'aymanalraidy2025@gmail.com'],
            [
                'name'     => 'Ayman Al-Raidi',
                'role'     => 'superadmin',
                'password' => Hash::make('password'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin@zaka-agency.com'],
            [
                'name'     => 'Admin',
                'role'     => 'admin',
                'password' => Hash::make('password'),
            ]
        );
    }
}
