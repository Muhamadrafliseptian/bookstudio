<?php

namespace Database\Seeders;

use App\Models\Fasilitas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fasilitas::create([
            "id_fasilitas" => "fls_1",
            "nama" => "mic"
        ]);
        Fasilitas::create([
            "id_fasilitas" => "fls_2",
            "nama" => "gitar"
        ]);
        Fasilitas::create([
            "id_fasilitas" => "fls_3",
            "nama" => "speaker"
        ]);
    }
}
