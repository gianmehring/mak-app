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
        Schema::create('bijouteries', function (Blueprint $table) {
            $table->id();

            $table->string('acero'); // select: quirurgico, blanco
            $table->string('bijouterie');  // select... poder agregar items
            $table->double('largo', 11, 3)->default(0);
            $table->double('diametro', 11, 3)->default(0);
            $table->double('talle', 11, 3)->default(0);
            
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
        Schema::dropIfExists('bijouteries');
    }
};
