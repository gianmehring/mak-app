<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bijouterie>
 */
class BijouterieFactory extends Factory
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
            'acero' => $this->faker->randomElement(['blanco', 'quirurgico']), 
            'bijouterie' => $this->faker->randomElement(['aros', 'argolla', 'cadenas', 'collares', 'dijes', 'abridores', 'pulseras', 'tobilleras', 'anillos', 'esclavas', 'macrame', 'piercing', 'perforadora descartable', 'perforadora reutilizable', 'etc']), 
            'largo' => $this->faker->randomDigit(),
            'diametro' => $this->faker->randomDigit(),
            'talle' => $this->faker->randomDigit(),
        ];
    }
}
