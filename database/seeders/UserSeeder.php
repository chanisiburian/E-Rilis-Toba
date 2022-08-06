<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'level_id' => 1,
                'nama' => 'Admin',
                'email' => 'admin@gmail.com',
                'username' => 'admin',
                'telepon' => '99999999',
                'password' => Hash::make('admin'),
                'remember_token' => Str::random(50),
                'status' => 1
            ],
            [
                'level_id' => 2,
                'nama' => 'User',
                'email' => 'user@gmail.com',
                'username' => 'user',
                'telepon' => '99999999',
                'password' => Hash::make('user'),
                'remember_token' => Str::random(50),
                'status' => 1
            ],
        ]);
    }
}
