<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Accesorio>
 */
class AccesorioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'accesorio' => $this->faker->randomElement(['bandolera', 'llaveros', 'billetera', 'pilusos', 'etc']), 
            'alto' => $this->faker->randomDigit(),
            'largo' => $this->faker->randomDigit(),
            'profundidad' => $this->faker->randomDigit(),
        ];
    }
}
