<?php
// SeccionesTableSeeder.php

use Illuminate\Database\Seeder;
use App\Models\Seccion;
use App\Models\Contenido;
use Database\Seeders\ContenidoSeeder;

class SeccionesTableSeeder extends Seeder
{
    public function run()
    {
        // Llamar al seeder ContenidoSeeder
        $this->call(ContenidoSeeder::class);

        // Obtener el contenido recién creado
        $contenidoInicio = Contenido::latest()->first();

        // Crear una sección y asignar el contenido
        Seccion::create([
            'nombre' => 'Bienvenida',
            // Otros campos...
            'contenido_id' => $contenidoInicio->id, // Asignar el contenido a la sección
        ]);

        // Puedes repetir el proceso para otras secciones si es necesario
    }
}
