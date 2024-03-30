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
            "nama" => "Studio 12m x 4m"
        ]);
        Fasilitas::create([
            "id_fasilitas" => "fls_2",
            "nama" => "Mirror 12m x 4m"
        ]);
        Fasilitas::create([
            "id_fasilitas" => "fls_3",
            "nama" => "Vinyl"
        ]);
        Fasilitas::create([
            "id_fasilitas" => "fls_4",
            "nama" => "Mic"
        ]);
        Fasilitas::create([
            "id_fasilitas" => "fls_5",
            "nama" => "Speaker BMB Bluetooth"
        ]);
        Fasilitas::create([
            "id_fasilitas" => "fls_6",
            "nama" => "AC"
        ]);
        Fasilitas::create([
            "id_fasilitas" => "fls_7",
            "nama" => "Wallfan"
        ]);
        Fasilitas::create([
            "id_fasilitas" => "fls_8",
            "nama" => "Lighting"
        ]);
    }
}
