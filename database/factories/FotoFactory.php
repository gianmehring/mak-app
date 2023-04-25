<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Foto>
 */
class FotoFactory extends Factory
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
            'url' => 'articulos/' . $this->faker->image('public/storage/articulos', 640 /*ancho*/, 480 /*alto*/, null, false),
        ];
    }
}
