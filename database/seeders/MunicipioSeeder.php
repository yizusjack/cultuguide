<?php

namespace Database\Seeders;

use App\Models\Municipio;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Municipio::create(['nombre' =>'Guadalajara']);
        Municipio::create(['nombre' =>'Zapopan']);
        Municipio::create(['nombre' =>'Tonalá']);
        Municipio::create(['nombre' =>'Tlaquepaque']);
        Municipio::create(['nombre' =>'Tlajomulco']);
    }
}
