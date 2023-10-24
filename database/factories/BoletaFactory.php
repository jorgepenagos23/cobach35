<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Boleta>
 */
class BoletaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {     return [
        'alumno_id' => function () {
            return \App\Models\Alumno::factory()->create()->id;
        },
        'numero_boleta' => $this->faker->unique()->word,
        'nombre' => $this->faker->name,
        'calificacion_parcial_1' => $this->faker->randomFloat(2, 0, 100),
        'calificacion_parcial_2' => $this->faker->randomFloat(2, 0, 100),
        'calificacion_parcial_3' => $this->faker->randomFloat(2, 0, 100),
        'materias_recursadas' => $this->faker->numberBetween(0, 5),
        'promedio' => $this->faker->randomFloat(2, 0, 100),
        'observaciones' => $this->faker->text,
    ];
    }
}
