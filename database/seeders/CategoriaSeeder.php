<?php

namespace Database\Seeders;

use App\Models\categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert(['nombre' => 'Acción',],);
        DB::table('categorias')->insert(['nombre' => 'Aventura',],);
        DB::table('categorias')->insert(['nombre' => 'Ciencia Ficción',],);
        DB::table('categorias')->insert(['nombre' => 'Clásicos',],);
        DB::table('categorias')->insert(['nombre' => 'Espiritual',],);
        DB::table('categorias')->insert(['nombre' => 'Fantasía',],);
        DB::table('categorias')->insert(['nombre' => 'Historia',],);
        DB::table('categorias')->insert(['nombre' => 'Humor',],);
        DB::table('categorias')->insert(['nombre' => 'Misterio',],);
        DB::table('categorias')->insert(['nombre' => 'No Ficción',],);
        DB::table('categorias')->insert(['nombre' => 'Paranormal',],);
        DB::table('categorias')->insert(['nombre' => 'Poesía',],);
        DB::table('categorias')->insert(['nombre' => 'Romance',],);
        DB::table('categorias')->insert(['nombre' => 'Suspenso',],);
        DB::table('categorias')->insert(['nombre' => 'Terror',],);
        DB::table('categorias')->insert(['nombre' => 'Otro',],);
        
    }
}
//Pendiente añadir mas categorias
