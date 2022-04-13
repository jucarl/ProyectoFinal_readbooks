<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    public function categoria()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function autor()
    {
        return $this->belongsToMany('App\Models\User');
    }

}
