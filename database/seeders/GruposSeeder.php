<?php

namespace Database\Seeders;

use App\Models\Grupo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GruposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $letras = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'Z'];

        // Puedes ajustar la cantidad de grados que deseas crear por cada letra
        $cantidadGradosPorLetra = 6;

        foreach ($letras as $letra) {
            for ($i = 1; $i <= $cantidadGradosPorLetra; $i++) {
                Grupo::create([
                    'grado' => $i,
                    'grupo' => $letra,
                ]);
            }
        }
    }
    
}
