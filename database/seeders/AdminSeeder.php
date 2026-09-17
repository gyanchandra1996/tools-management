<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',

            'email' => 'admin@gmail.com',

            'mobile' => '9999999999',

            'password' => Hash::make('admin@12345'),

            'role' => 'admin',
        ]);
    }
}