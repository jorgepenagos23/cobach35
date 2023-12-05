<?php

namespace Database\Seeders;
use App\Models\AlumnoReporte;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;

class AlumnoReporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\AlumnoReporte::factory(2)->create();

    }

}
