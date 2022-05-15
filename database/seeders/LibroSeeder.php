<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Libro;
use App\Models\categoria;
use App\Models\User;


class LibroSeeder extends Seeder
{

    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Libro::factory()->count(1000)->create();  //Esto solo crea libros mas no la relación, no se porque
        //Libro::factory()->count(2)->hascategoria(['nombre' => 'Otro',])->hasautores(1, ['name' => 'Editor']) ->create();


        // DB::table('libros')->insert(
        //     [
        //         'titulo' => 'Ejemplo1',
        //         'ISBN' => 'QW23WE34er',
        //         'fecha_publicacion' => 1999,
        //         'paginas' => 333,
        //         'descripcion' => 'Es un libro de ejemplo',
        //         'categoria_id' => 1,
        //         'portada' => 'Casual.jpg',
        //     ]
        // );
    }
}
