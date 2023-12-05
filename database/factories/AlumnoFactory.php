<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Alumno;
use App\Models\User;

class AlumnoFactory extends Factory
{
    protected $model = Alumno::class;

    public function definition()
    {
        // Genera la matrícula única para UserFactory
        $matricula = User::factory()->create()->matricula;
        

        return [
            'n' => $this->faker->unique()->numberBetween(1, 100),
            'grado' => $this->faker->numberBetween(1, 6),
            'grupo' => $this->faker->randomLetter,
            'matricula' => $matricula, // Utiliza la matrícula generada en UserFactory
            'nombre_completo' => $this->faker->name,
            'curp' => $this->faker->regexify('[A-Z]{4}[0-9]{6}[H,M][A-Z]{5}[0-9]{2}'),
            'observaciones' => $this->faker->sentence,
        ];
    }
}
