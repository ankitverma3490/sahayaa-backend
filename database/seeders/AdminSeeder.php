<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => "Admin",
            'slug' => "admin",
        ]);

        DB::table('roles')->insert([
            'name' => "HouseHolder",
            'slug' => "householder",
        ]);

        DB::table('roles')->insert([
            'name' => "Staff",
            'slug' => "staff",
        ]);

        DB::table('users')->insert([
            'user_role_id' => "1",
            'name' => "admin",
            'email' => "admin@yopmail.com",
            'phone_number' => "7878787888",
            'is_active' => "1",
            'password' => Hash::make('Admin@123'),
        ]);

        DB::table('users')->insert([
            'user_role_id' => "2",
            'name' => "householder",
            'email' => "householder@yopmail.com",
            'phone_number' => "7878787878",
            'is_active' => "1",
            'password' => Hash::make('Householder@123'),
        ]);

        DB::table('users')->insert([
            'user_role_id' => "3",
            'name' => "Staff",
            'email' => "staff@yopmail.com",
            'phone_number' => "7878787874",
            'is_active' => "1",
            'password' => Hash::make('Staff@123'),
        ]);

            
    
    }
}
