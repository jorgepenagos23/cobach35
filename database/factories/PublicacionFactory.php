<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Publicacion>
 */
class PublicacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            

            'titulo' => $this->faker->sentence,
            'descripcion' => $this->faker->paragraph,
            'fecha' => $this->faker->date,
            'nombre' => $this->faker->randomElement(['administrador', 'orientador', 'director', 'estudiante', 'subdirector']),

        ];
    }
}
