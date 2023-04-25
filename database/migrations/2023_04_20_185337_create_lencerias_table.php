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
        Schema::create('lencerias', function (Blueprint $table) {
            $table->id();
            
            $table->string('lenceria');  // select... poder agregar items
            $table->integer('talle')->default(0);
            $table->string('genero'); // select: hombre, mujer, unisex
            
            //La tabla "articulos" por el momento no existe
            #claves en la tabla
            #relación 1:1 con articulos
            // $table->unsignedBigInteger('articulo_id');//->unique(); #->unique() DEBE IR. COMENTADO PARA PODER USAR LOS FACTORY
            // $table->foreign('articulo_id')
            //     ->references('id')->on('articulos')
            //     ->onDelete('cascade')
            //     ->onUpdate('cascade');
            #fin relación 1:1

            $table->timestamps();
            //$table->softDeletes(); //borrado lógico
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lencerias');
    }
};
