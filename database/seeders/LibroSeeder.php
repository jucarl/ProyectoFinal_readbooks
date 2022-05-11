<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Libro;


class LibroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Libro::factory()->times(20)->forcategoria(['nombre' => 'Otro',])->hasautor(1, ['name' => 'Editor']) ->create();


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
