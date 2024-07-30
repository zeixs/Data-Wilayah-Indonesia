<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    public function run(): void
    {
        Region::firstOrCreate([
            'code' => 10,
            'name' => 'SUMATERA'
        ]);
        Region::firstOrCreate([
            'code' => 20,
            'name' => 'RIAU'
        ]);
        Region::firstOrCreate([
            'code' => 30,
            'name' => 'JAWA'
        ]);
        Region::firstOrCreate([
            'code' => 50,
            'name' => 'NUSA TENGGARA'
        ]);
        Region::firstOrCreate([
            'code' => 60,
            'name' => 'KALIMANTAN'
        ]);
        Region::firstOrCreate([
            'code' => 70,
            'name' => 'SULAWESI'
        ]);
        Region::firstOrCreate([
            'code' => 80,
            'name' => 'MALUKU'
        ]);
        Region::firstOrCreate([
            'code' => 90,
            'name' => 'PAPUA'
        ]);
    }
}
