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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();

            #relación 1:1 con users
            $table->unsignedBigInteger('user_id')->unique()->nullable();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade') //si se borra el user de la tabla users, el valor de la talba 'admins' también se borra
                ->onUpdate('cascade'); //si se actualiza el user de la tabla users, el valor se actualiza en modo cascada.
            #fin relación 1:1

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
