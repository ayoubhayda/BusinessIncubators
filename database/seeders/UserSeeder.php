<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan make:seeder UserSeeder
     * php artisan db:seed --class=UserSeeder
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'superAdmin',
            'email' => 'superAdmin@test.com',
            'password' => Hash::make('123456789'),
            'role' => 1,
        ]);
    }
}
