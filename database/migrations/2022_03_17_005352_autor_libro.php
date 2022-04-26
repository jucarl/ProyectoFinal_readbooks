<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autor_libro', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('libro_id');
            $table->timestamps();

            $table->foreign('users_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade'); //Si borro un usuario borro todos los libros

            $table->foreign('libro_id')
                  ->references('id')
                  ->on('libros')
                  ->onDelete('cascade');
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autor_libro');
    }
};
