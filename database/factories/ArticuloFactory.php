<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Articulo>
 */
class ArticuloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nombre = $this->faker->unique()->word(20);
        return [
            //
            'nombre' => $nombre, 
            'slug' => Str::slug($nombre),
            'descripcion' => $this->faker->text(250), 
            'cantidad' => $this->faker->randomNumber(3), 
            'status' => $this->faker->randomElement(['1', '2']), 
            'admin_id' => Admin::all()->random()->id,
        ];
    }
}
