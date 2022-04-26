<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Libro extends Model
{
    use softDeletes;

    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria','categoria_id');
    }

    public function autor()
    {
        return $this->belongsTo('App\Models\User','autor_id');
    }



}
