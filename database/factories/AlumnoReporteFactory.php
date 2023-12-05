<?php

namespace Database\Factories;

use App\Models\AlumnoReporte;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlumnoReporteFactory extends Factory
{
    protected $model = AlumnoReporte::class;

    public function definition()
    {
        return [
            'descripcion' => $this->faker->sentence,
            'matricula' => $this->faker->word,
            'fecha' => now(),
            'usuario_id' => $this->faker->numberBetween(1, 500), // Puedes ajustar el rango según la cantidad de usuarios
            'reporte_id' => $this->faker->randomElement([1, 2, 3]), // Puedes definir tus tipos de reporte
        ];
    }
}
