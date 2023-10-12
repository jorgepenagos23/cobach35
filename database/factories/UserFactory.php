<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
use Faker\Generator as Faker;


class UserFactory extends Factory
{
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        
        $matricula = $this->generateMatricula($faker);

        $roles = ['administrador', 'orientador', 'director','subdirector', 'estudiante']; // Lista de roles disponibles

        return [
            'nombre' => $faker->name,
            'email' => $faker->unique()->userName . '@cobach.com',
             'email_verified_at' => now(),
            'password' => 'cobach23',
            'remember_token' => Str::random(10),
            'matricula' => $matricula,
            'rol' => $faker->randomElement($roles), // Asigna un rol aleatorio a cada usuario
        ];
    }

    private function generateMatricula($faker)
    {
        $parte1 = 'COBACH';
        $parte2 = $faker->numberBetween(100, 999);
        $parte3 = $faker->numberBetween(10, 99);
        $parte4 = 'MCSCGYA';
        $parte5 = $faker->unique()->randomLetter();
        $parte6 = $faker->unique()->randomNumber(1);

        return $parte1 . $parte2 . $parte3 . $parte4 . $parte5 . $parte6;
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
