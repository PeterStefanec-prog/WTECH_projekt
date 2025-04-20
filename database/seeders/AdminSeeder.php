<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@example.com'], // podmienka
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'password' => Hash::make('12345'),
                'is_admin' => true,
            ]
        );

    }
}
