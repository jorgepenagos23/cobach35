<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contenido;

class ContenidoSeeder extends Seeder
{
    public function run()
    {
        Contenido::create([
            'descripcion' => 'Este es el contenido predeterminado',
            // Otros campos que puedas tener...
        ]);
    }
}
