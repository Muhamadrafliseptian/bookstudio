<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "nama" => "Administrator",
            "email" => "admin@gmail.com",
            "password" => bcrypt("password"),
            "no_hp"=> "087708770877",
            "level" => "0"
        ]);
        User::create([
            "nama" => "Fernando",
            "email" => "fernando@gmail.com",
            "password" => bcrypt("password"),
            "no_hp"=> "089808980898",
            "level" => "1"
        ]);
        User::create([
            "nama" => "rafli",
            "email" => "rafli@gmail.com",
            "password" => bcrypt("password"),
            "no_hp"=> "089108910891",
            "level" => "1"
        ]);
    }
}
