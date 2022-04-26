<?php

namespace Database\Seeders;

use App\Models\categoria;
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
        categoria::create(['nombre' => 'Acción']);
        categoria::create(['nombre' => 'Aventura']);
        categoria::create(['nombre' => 'Historia']);
        categoria::create(['nombre' => 'Novela Romantica']);
        categoria::create(['nombre' => 'Novela Grafica']);
    }
}
//Pendiente añadir mas categorias
