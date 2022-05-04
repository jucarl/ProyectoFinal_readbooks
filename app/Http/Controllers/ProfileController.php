<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $libros = Libro::where('autor_id',$id); //Todos los libros del usuario loggeado

        return view('user.profile',compact('libros'));
    }
}
