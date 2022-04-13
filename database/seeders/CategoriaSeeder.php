<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['nombre' => 'Acción']);
        Category::create(['nombre' => 'Aventura']);
        Category::create(['nombre' => 'Historia']);
        Category::create(['nombre' => 'Novela Romantica']);
        Category::create(['nombre' => 'Novela Grafica']);
    }
}
//Pendiente añadir mas categorias