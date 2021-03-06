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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            //$table->string('autor', 80);
            //$table->string('editorial', 90);
            $table->string('isbn')->nullable(); //Puede quedar sin ISBN
            $table->unsignedinteger('fecha_publicacion'); //lo cambié a año, es mas facil
            $table->unsignedinteger('paginas');
            $table->text('descripcion');
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->string('portada')->nullable(); //Aqui va el nombre del archivo que es la portada
            $table->string('archivo_libro')->nullable(); //Aqui va el nombre del archivo que es el libro
            $table->timestamps();
            $table->softDeletes(); //Timestamp para softdeletes (se añade librería en models/libro) 

            //Llaves foraneas para la categoría y el autor/usuario
            $table->foreign('categoria_id')
            ->references('id')
            ->on('categorias')
            ->onDelete('set null');
      

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('libros');
    }
};
