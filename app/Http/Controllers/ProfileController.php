<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
         $libros = Libro::all();//eager loading

        return view('user.profile',compact('libros'));
    }
}
