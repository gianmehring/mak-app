<?php

namespace Database\Seeders;

use App\Models\Accesorio;
use App\Models\Articulo;
use App\Models\Bijouterie;
use App\Models\Foto;
use App\Models\Lenceria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $accesorios = Accesorio::factory(10)->create();
        foreach ($accesorios as $accesorio) {
            Articulo::factory(1)->create([
                'articuloable_id' => $accesorio->id,
                'articuloable_type' => Accesorio::class,
            ]);

            Foto::factory(1)->create([
                'fotoable_id' => $accesorio->id,
                'fotoable_type' => Accesorio::class,
            ]);

            $accesorio->articulo->etiquetas()->attach([
                rand(1, 15), 
                rand(16, 30),
            ]);
        }

        $bijouteries = Bijouterie::factory(10)->create();
        foreach ($bijouteries as $bijouterie) {
            Articulo::factory(1)->create([
                'articuloable_id' => $bijouterie->id,
                'articuloable_type' => Bijouterie::class,
            ]);

            Foto::factory(1)->create([
                'fotoable_id' => $bijouterie->id,
                'fotoable_type' => Bijouterie::class,
            ]);

            $bijouterie->articulo->etiquetas()->attach([
                rand(1, 15), 
                rand(16, 30),
            ]);
        }

        $lencerias = Lenceria::factory(10)->create();
        foreach ($lencerias as $lenceria) {
            Articulo::factory(1)->create([
                'articuloable_id' => $lenceria->id,
                'articuloable_type' => Lenceria::class,
            ]);

            Foto::factory(1)->create([
                'fotoable_id' => $lenceria->id,
                'fotoable_type' => Lenceria::class,
            ]);

            $lenceria->articulo->etiquetas()->attach([
                rand(1, 15), 
                rand(16, 30),
            ]);
        }
    }
}
