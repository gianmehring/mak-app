<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Etiqueta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if(Storage::exists('public/articulos')){
            Storage::deleteDirectory('public/articulos');
        }
        Storage::makeDirectory('public/articulos');

        \App\Models\User::factory(10)->create();

        Admin::factory(1)->create();
        Etiqueta::factory(30)->create();
        $this->call(ArticuloSeeder::class);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
