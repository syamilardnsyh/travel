<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(['name' => 'admin', 'email' => 'admin@gmail.com', 'status' => 'active', 'role' => 'admin', 'password' => 'admin']);
        User::create(['name' => 'staff', 'email' => 'staff@gmail.com', 'status' => 'active', 'role' => 'staff', 'password' => 'staff']);
        User::create(['name' => 'costumer', 'email' => 'costumer@gmail.com', 'status' => 'active', 'role' => 'costumer', 'password' => 'costumer']);
    }
}