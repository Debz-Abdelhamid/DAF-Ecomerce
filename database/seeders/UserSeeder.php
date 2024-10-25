<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            [
                'name' => 'admin',
                'username' => 'admin23i',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'status' => 'active',
                'password' => Hash::make('password'),

            ],

            [
                'name' => 'vendor',
                'username' => 'vendor23i',
                'email' => 'superadmin@gmail.com',
                'role' => 'vendor',
                'status' => 'active',
                'password' => Hash::make('password'),
            ],

            [
                'name' => 'user',
                'username' => 'user23i',
                'email' => 'user@gmail.com',
                'role' => 'user',
                'status' => 'active',
                'password' => Hash::make('password')
            ],

        ]);
    }
}
