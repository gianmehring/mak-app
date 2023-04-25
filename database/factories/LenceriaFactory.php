<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lenceria>
 */
class LenceriaFactory extends Factory
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
            'lenceria' => $this->faker->randomElement(['conjunto', 'colaless', 'boxer', 'medias', 'vedetina']), 
            'talle' => $this->faker->randomDigit(),
            'genero' => $this->faker->randomElement(['hombre', 'mujer', 'unisex']),
        ];
    }
}
