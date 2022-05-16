<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\Libro;
use App\Models\User;
use App\Models\Categoria as ModelsCategoria;
use Database\Seeders\CategoriaSeeder;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categorias = Categoria::orderBy('nombre', 'ASC')->get();
        if(auth()->user()->is_admin == 1) //si es admin
            return view('Admin.indiceCategoria',compact('categorias'));
        else
            return view('user.categorias', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  str  $nombre
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$nombre)
    {

        $idcategoria = Categoria::where('nombre',$nombre)->first()->id;
        $libros = Libro::where('categoria_id',$idcategoria)->get();
        //dd($libros,$idcategoria);
        return view('user.categoria')->with(compact('libros','nombre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
