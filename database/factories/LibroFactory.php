<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Libro;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
   /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Libro::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->word(),
            'ISBN' => $this->faker->isbn10(),
            'fecha_publicacion' => $this->faker->year(),
            'paginas' => $this->faker->randomNumber(4),
            'descripcion' => $this->faker->paragraph(),
            'categoria_id' => $this->faker->numberBetween(1, 16),
            'portada' => '/storage/portadas/Libro.png',
            'archivo_libro' => '/storage/libros/Prueba.pdf',
        ];
    }
}
