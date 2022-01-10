<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'sobrenome' => $this->faker->lastName(),
            'prontuario' => $this->faker->randomNumber(),
            'empresa' => $this->faker->company(),
            'email' => $this->faker->email(),
            'telefone' => $this->faker->tollFreePhoneNumber(),
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }
}
