<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\Libro;
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
    public function create(Categoria $categoria)
    {
        return view('Admin.nuevaCategoria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required',
            'descripcion' => 'required',
        ]);

        $categoria = new categoria;
        $categoria->timestamps = false;
        $categoria->nombre = $request->input('Nombre');
        $categoria->descripcion = $request->input('descripcion');
        $categoria->save();

        return redirect('categorias');
    }

    /**
     * Display the specified resource.
     *
     * @param  str  $nombre
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {

        $nombre = Categoria::where('id',$id)->first()->nombre;
        $libros = Libro::where('categoria_id',$id)->get();
        //dd($libros,$id);
        return view('user.categoria')->with(compact('libros','nombre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categorias)
    {
        return view('Admin.nuevaCategoria',compact('categorias'));
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
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->back()->with('success', 'Usuario eliminado');
    }
}
