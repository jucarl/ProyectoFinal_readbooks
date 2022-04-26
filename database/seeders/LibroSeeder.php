<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LibroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('libros')->insert([
            'titulo' => 'Ejemplo1',
            
            'ISBN' => 'QW23WE',
            'fecha_publicacion' => 1999,
            'paginas' => 333,
            'descripcion' => 'Es un libro de ejemplo',
            
            'portada' => 'Casual.jpg',
        ]);
    }
}
