<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    public function libros()
    {
        return $this->hasMany('App\Models\Libro');
    }
}
