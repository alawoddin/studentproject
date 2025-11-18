<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

       DB::table('users')->insert([
    'name' => 'Admin',
    'email' => 'admin@gmail.com',
    'photo' => 'image.jpg',
    'password' => Hash::make('123'),
    'two_factor_code' => rand(100000, 999999),
    'two_factor_expires_at' => now()->addMinutes(5),
]);


        // DB:table('users')->insert([
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'photo' => 'image.jpg',
        //     'password' => Hash::make('123'),
        // ]);
    }
}