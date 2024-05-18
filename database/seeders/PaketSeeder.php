<?php

namespace Database\Seeders;

use App\Models\Paket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Paket::create([
            "id_paket" => "PKT-1",
            "name" => "paket 1 Jam",
            "amount" => "100000",
            "duration_start" => "0",
            "duration_end" => "60"
        ]);
        Paket::create([
            "id_paket" => "PKT-2",
            "name" => "paket 2 Jam",
            "amount" => "150000",
            "duration_start" => "0",
            "duration_end" => "120"
        ]);
        Paket::create([
            "id_paket" => "PKT-3",
            "name" => "paket 3 Jam",
            "amount" => "200000",
            "duration_start" => "0",
            "duration_end" => "180"
        ]);
    }
}
