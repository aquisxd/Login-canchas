<?php

namespace Database\Factories;
use  Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombres' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName(),
            'dni' => $this->faker->unique()->numerify('########'),
            'fecha_nacimiento' => $this->faker->date('Y-m-d'), // Asumiendo que quieres una fecha en formato YYYY-MM-DD
            'genero' => $this->faker->randomElement(['Masculino', 'Femenino']), // Ejemplo de géneros
            'celular' => $this->faker->phoneNumber(),
            'correo' => $this->faker->unique()->safeEmail(), // Cambié address() por email() para obtener un correo electrónico
            'direccion' => $this->faker->address(), // Corregí 'direcion' a 'direccion'
            
        ];
    }
}
 