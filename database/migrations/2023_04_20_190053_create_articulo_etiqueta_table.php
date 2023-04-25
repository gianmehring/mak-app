<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articulo_etiqueta', function (Blueprint $table) {
            $table->id();

            #claves en la tabla
            #relación N:M con articulos
            $table->unsignedBigInteger('articulo_id')->nullable();
            $table->foreign('articulo_id')
                ->references('id')->on('articulos')
                ->onDelete('cascade') 
                ->onUpdate('cascade'); 

            #relación N:M con etiquetas
            $table->unsignedBigInteger('etiqueta_id');
            $table->foreign('etiqueta_id')
                ->references('id')->on('etiquetas')
                ->onDelete('cascade') 
                ->onUpdate('cascade'); 
            
            #fin relación N:M
            #fin claves en la tabla

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulo_etiqueta');
    }
};
