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
        return $this->belongsTo('App\Models\Category');
    }

    public function autor()
    {
        return $this->belongsTo('App\Models\User');
    }

}
