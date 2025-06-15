<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'AdminAPI',
            'email' => 'admin@localhost',
            'password' => Hash::make('admin123123'), // Jangan lupa pakai Hash
        ]);
    }
}
