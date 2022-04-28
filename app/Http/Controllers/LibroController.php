<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;

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
        $categoria = categoria::all();
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
        $autor = User::all();
          //Validacion y limpieza
          $validatedData = $request->validate([
            'titulo' => 'required|min:5|max:100',
            'autor' => 'required|exists:users,name',
            'isbn' => 'required',
            'publicacion' => 'required',
            'paginas' => 'required',
            'descripcion' => ['required','min:5'],
            'tema' => 'required|exists:categorias,nombre',
            'portada_libro' => 'image|required',
            'archivo_libro' => 'required|mimes:pdf'
        ]);

        $libro = new Libro(); #Instancia clase
        $datoautor =User::where('name',$request->autor)->value('name');
        $datocateogria =Categoria::where('nombre',$request->tema)->value('id');


        $libro->titulo = $request->titulo; #Invocar atributos (col dentro de tabla)
        $libro -> $datoautor;
        $libro->isbn = $request->isbn;
        $libro->fecha_publicacion = $request->publicacion;
        $libro->paginas = $request->paginas;
        $libro->descripcion = $request->descripcion;
        $libro->categoria_id = $datocateogria;

        //Almacenar la imagen si se añade
        if($request->hasFile('portada_libro'));
        {
            $imagenes = $request->file('portada_libro');
            $imgname = $libro->titulo.time().'.'.$imagenes->getClientOriginalExtension();
            $imagenes= $imagenes->storeAs('public/portadas',$imgname);
            $url = Storage::url($imagenes); 

            $libro->portada = $url; //URL para la BD
        }

        //Almacenar el libro si se añade
        if($request->hasFile('archivo_libro'));
        {
            $archivo = $request->file('archivo_libro');
            $filename = $libro->titulo.time().'.'.$archivo->getClientOriginalExtension();
            $archivo = $archivo->storeAs('public/libros',$filename);
            $url2 = Storage::url($archivo); 

            $libro->archivo_libro = $url2; //URL para la BD
        }


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
            'autor' => 'required|exists:users,name',
            'isbn' => 'required',
            'publicacion' => 'required',
            'paginas' => 'required',
            'descripcion' => ['required','min:5'],
            'tema' => 'required|exists:categorias,nombre',
            'portada' => 'image|required',
            'archivo_libro' => 'required|mimes:pdf'
        ]);

       // $libro = new Libro(); #Instancia clase
       $datoautor =User::where('name',$request->autor)->value('name');
       $datocateogria =Categoria::where('nombre',$request->tema)->value('id');

        $libro->titulo = $request->titulo; #Invocar atributos (col dentro de tabla)
        $libro -> $datoautor;
        $libro->isbn = $request->isbn;
        $libro->fecha_publicacion = $request->publicacion;
        $libro->paginas = $request->paginas;
        $libro->descripcion = $request->descripcion;
        $libro->categoria_id = $datocateogria;
        //$libro->portada = $request->file('portada_libro');;
        
         //Almacenar la imagen si se añade
         if($request->hasFile('portada_libro'));
         {
            Storage::disk('local')->delete($libro->portada);
             $imagenes = $request->file('portada_libro');
             $imgname = $libro->titulo.time().'.'.$imagenes->getClientOriginalExtension();
             $imagenes= $imagenes->storeAs('public/portadas',$imgname);
             $url = Storage::url($imagenes); 
 
             $libro->portada = $url; //URL para la BD
         }
 
         //Almacenar el libro si se añade
         if($request->hasFile('archivo_libro'));
         {
            Storage::disk('local')->delete($libro->archivo_libro);
             $archivo = $request->file('archivo_libro');
             $filename = $libro->titulo.time().'.'.$archivo->getClientOriginalExtension();
             $archivo = $archivo->storeAs('public/libros',$filename);
             $url2 = Storage::url($archivo); 
 
             $libro->archivo_libro = $url2; //URL para la BD
         }
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
        Storage::disk('local')->delete($libro->portada);
        $libro->delete();
        return redirect('/libros');
    }
}
