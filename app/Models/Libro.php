<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Libro extends Model
{
    use softDeletes;
    use HasFactory;



    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function autor()
    {
        return $this->belongsToMany(User::class);
    }

    //accesor, nombre del libro en mayusculas
    public function titulomayus():Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtoupper($value),
        );
    }

    public function scopeAuthorIds($query, $ids)
    {
        return $query->whereIn('user_id', $ids);
    }



}
