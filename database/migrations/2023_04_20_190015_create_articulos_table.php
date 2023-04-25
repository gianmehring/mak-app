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
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            
            $table->string('nombre');
            $table->string('slug');
            $table->text('descripcion')->nullable();
            $table->integer('cantidad')->default(0);
            $table->enum('status', [1, 2])->default(1); //1 = borrador | 2 = publicado
            #claves en la tabla
            #relación 1:1 con admins
            $table->unsignedBigInteger('admin_id')->nullable();
                $table->foreign('admin_id')
                    ->references('id')->on('admins')
                    ->onDelete('set null')
                    ->onUpdate('cascade');
            #fin relación 1:1
            #fin claves en la tabla

            $table->unsignedBigInteger('articuloable_id');
            $table->string('articuloable_type');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulos');
    }
};
