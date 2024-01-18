<?php


namespace Database\Seeders;

use App\Models\BoletaParcial1;
use Illuminate\Database\Seeder;
use App\Models\Calificacion;

class CalificacionesSeeder extends Seeder
{
    public function run()
    {
        $datos = [
            [
                'MATRICULA' => '123456COBACH',
                'NOMBRE_ALUMNO' => 'Alumno de Prueba',
                'ESPANOL1' => 85,
                'ESPANOL2' => 90,
                'ESPANOL3' => 88,
                'MATEMATICAS1' => 75,
                'MATEMATICAS2' => 92,
                'MATEMATICAS3' => 87,
                'INGLES1' => 89,
                'INGLES2' => 91,
                'INGLES3' => 83,
                'HISTORIA1' => 78,
                'HISTORIA2' => 84,
                'HISTORIA3' => 79,
                'LITERATURA1' => 93,
                'LITERATURA2' => 86,
                'LITERATURA3' => 88,
                'ORIENTACION1' => 85,
                'ORIENTACION2' => 87,
                'ORIENTACION3' => 91,
                'FISICA1' => 89,
                'FISICA2' => 92,
                'FISICA3' => 86,
                'BIOLOGIA1' => 84,
                'BIOLOGIA2' => 88,
                'BIOLOGIA3' => 87,
                'CIVICO1' => 91,
                'CIVICO2' => 89,
                'CIVICO3' => 92,
                'SISTEMA1' => 86,
                'SISTEMA2' => 84,
                'SISTEMA3' => 88,
                'PROMEDIO' => 0, // Ajusta el valor del promedio según tu lógica específica
                'OBSERVACIONES' => 'Excelente rendimiento',
            ],
            // Agrega más datos según sea necesario
        ];

        foreach ($datos as $dato) {
            BoletaParcial1::create($dato);
        }
    }
}
