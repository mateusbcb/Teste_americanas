<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome'          => $this->faker->catchPhrase(),
            'endereco'      => $this->faker->address(),
            'logotipo'      => 'user-0.svg',
            'website'       => $this->faker->url(),
            'created_at'    => now(),
            'updated_at'    => now(),
        ];
    }
}
