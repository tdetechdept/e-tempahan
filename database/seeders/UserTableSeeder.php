<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            'name' => 'Super Admin',
            'role' => 'SuperAdmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'id' => 2,
            'name' => 'Admin',
            'role' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'id' => 3,
            'name' => 'Pengguna',
            'role' => 'User',
            'email' => 'pengguna@gmail.com',
            'password' => Hash::make('password')
        ]);
    }
}
