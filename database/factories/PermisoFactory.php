<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permiso>
 */
class PermisoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        
            'nombre' => $this->faker->randomElement(['CrearPublicacion','BorrarPublicacion','EditarPublicacion','SubirHojasExcel','CambiarContrasenas'])

        ];
    }
}
