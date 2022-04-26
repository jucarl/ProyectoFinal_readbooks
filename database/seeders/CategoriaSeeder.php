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
        DB::table('categorias')->insert([
        'nombre' => 'Acción',
    ]);

    DB::table('categorias')->insert([
        'nombre' => 'Aventura',
    ]);

    DB::table('categorias')->insert([
        'nombre' => 'Historia',
    ]);

    DB::table('categorias')->insert([
        'nombre' => 'Novela Romantica',
    ]);



    }
}
//Pendiente añadir mas categorias
