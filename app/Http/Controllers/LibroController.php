<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use App\Models\Categoria;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::all();//eager loading

        return view('libros.indiceLibros',compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('libros.nuevoLibro',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //Validacion y limpieza
          $request->validate([
            'titulo' => 'required|min:5|max:100',
            'autor' => 'required',
            'editorial' => 'required',
            'publicacion' => 'required',
            'paginas' => 'required',
            'descripcion' => ['required','min:5'],
            'tema' => 'required',
        ]);

        $libro = new Libro(); #Instancia clase
        $libro->titulo = $request->titulo; #Invocar atributos (col dentro de tabla)
        $libro->autor = $request->user_id;
        $libro->editorial = $request->editorial;
        $libro->publicacion = $request->publicacion;
        $libro->paginas = $request->paginas;
        $libro->descripcion = $request->descripcion;
        $libro->tema = $request->tema;

        //Guardar BD
        $libro->save();

        //Redireccionar
        return redirect('/libros');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        return view('libros.detalleLibro',compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        return view('libros.nuevoLibro', compact('libro'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'titulo' => 'required|min:5|max:100',
            'autor' => 'required',
            'editorial' => 'required',
            'publicacion' => 'required',
            'paginas' => 'required',
            'descripcion' => ['required','min:5'],
            'tema' => 'required',
        ]);

       // $libro = new Libro(); #Instancia clase
        $libro->titulo = $request->titulo; #Invocar atributos (col dentro de tabla)
        $libro->autor = $request->autor;
        $libro->editorial = $request->editorial;
        $libro->publicacion = $request->publicacion;
        $libro->paginas = $request->paginas;
        $libro->descripcion = $request->descripcion;
        $libro->tema = $request->tema;

        //Guardar BD
        $libro->save();

        //Redireccionar
        return redirect('/libros');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect('/libros');
    }
}
