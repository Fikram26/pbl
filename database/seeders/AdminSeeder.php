<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Login;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Login::create([
            'name' => 'Admin',
            'email' => 'entrepreneuer@gmail.com',
            'password' => Hash::make('farmuldiang'),
            'role' => 'admin'
        ]);
    }
} 