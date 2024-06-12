<?php

namespace Database\Seeders;

use App\Models\Saran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Saran::create([
            "id_saran" => "SRN-1",
            "nama" => "anonym",
            "email" => "joyr4496@gmail.com",
            "isi_saran" => "tolong ac nya supaya lebih dingin",
        ]);
    }
}
