<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LibroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        //return parent::toArray($request); retornar todos los datos de la colección
        return [
            'titulo' => $this->titulo,
            'autor' => $this->autor,
            'isbn' => $this->isbn,
            'fecha_publicacion' => $this->publicacion,
            'paginas' => $this-> paginas,
            'descripcion' => $this-> descripcion,
            'categoria' => $this->categoria()->get(),
            'fecha' => $this->created_at,
        ];
    }
}
