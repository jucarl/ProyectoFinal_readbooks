<?php

namespace App\Http\Controllers;


use App\Models\Libro;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;





class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const BUFFER = 10;

    public function index(Request $request)
    {
        $libros = Libro::orderBy('titulo', 'ASC')->get(); //eager loading
        $categoria = Categoria::all();
        $autor = User::all();
        if (auth()->user()->is_admin == 1)
            return view('admin.indiceLibros', compact('libros', 'categoria', 'autor'));
        else
            return view('user.libros', compact('libros', 'categoria', 'autor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categorias = Categoria::all();
        return view('Admin.nuevoLibro', compact('categorias'));
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
            'descripcion' => ['required', 'min:5'],
            'tema' => 'required|exists:categorias,nombre',
            'portada_libro' => 'image|required',
            'archivo_libro' => 'required|mimes:pdf'
        ]);

        $libro = new Libro(); #Instancia clase
        $datoautor = User::where('name', $request->autor)->value('name');
        $datocateogria = Categoria::where('nombre', $request->tema)->value('id');


        $libro->titulo = $request->titulo; #Invocar atributos (col dentro de tabla)
        $libro->$datoautor;
        $libro->isbn = $request->isbn;
        $libro->fecha_publicacion = $request->publicacion;
        $libro->paginas = $request->paginas;
        $libro->descripcion = $request->descripcion;
        $libro->categoria_id = $datocateogria;

        //Almacenar la imagen si se añade
        if ($request->hasFile('portada_libro')); {
            $imagenes = $request->file('portada_libro');
            $imgname = $libro->titulo . time() . '.' . $imagenes->getClientOriginalExtension();
            $imagenes = $imagenes->storeAs('public/portadas', $imgname);
            $url = Storage::url($imagenes);

            $libro->portada = $url; //URL para la BD
        }

        //Almacenar el libro si se añade
        if ($request->hasFile('archivo_libro')); {
            $archivo = $request->file('archivo_libro');
            $filename = $libro->titulo . time() . '.' . $archivo->getClientOriginalExtension();
            $archivo = $archivo->storeAs('public/libros', $filename);
            $url2 = Storage::url($archivo);

            $libro->archivo_libro = $url2; //URL para la BD
        }

        //primero guardamos el libro
        $libro->save();

        //luego la relación
        $userID = auth()->user()->id;
        $libro->autor()->attach($userID);
        //Redireccionar

        return redirect('/libros')->with('success','Libro añadido exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        $categoria = Categoria::all();
        return view('Admin.detalleLibro', compact('libro', 'categoria'))->with('success', '');
    }



    //funcion para mostrar los libros del usuario actual
    public function showMyBooks()
    {

        $authorids = User::all()->lists('id');
        $allBooks = Libro::autor($authorids)->get();
        //dd($allBooks);
        return view('user.perfil', compact('libros'));
    }

    public function showRecents()
    {
        if (auth()->user()->is_admin == 1)
        {


            $totalibros = Libro::count();
            $totalusuarios = User::count();
            $totalcategorias = Categoria::count();
            $nuevosusuarios = User::where('created_at',date('Y-m-d H:i:s'))->count();
            $nuevoslibros = Libro::where('created_at',date('Y-m-d H:i:s'))->count();

            $mes = date("n");
            for ($i=3;$i>=0;$i--)
                $librosMes[$i] = Libro::whereMonth('created_at',$mes--)->count();

            $mes = date("n");
            for ($i=3;$i>=0;$i--)
                $UsuariosMes[$i] = User::whereMonth('created_at',$mes--)->count();

            $categoriasMes = DB::table('categorias')
                            ->join('libros','categorias.id','=','libros.categoria_id')
                            ->selectRaw('categorias.nombre,count(libros.id) as usuarios' )
                            ->groupBy('categorias.nombre')
                            ->orderBy('usuarios', 'desc')
                            ->get();

            //$categoriasMes = (array) $queryCategorias;
            //dd($categoriasMes);
            //dd($totalibros,$totalusuarios,$totalcategorias);
            return view('admin',compact('totalibros','totalusuarios','totalcategorias','nuevosusuarios','nuevoslibros','librosMes','UsuariosMes','categoriasMes'));
        }
        $descubrir = Libro::inRandomOrder()->limit(5)->get();
        $libros = Libro::whereDate('created_at', '<=', date('Y-m-d H:i:s'))->orderBy('created_at', 'desc')->limit(5)->get();
        //dd($libros,date('Y-m-d H:i:s'));
        $categoria = Categoria::all();
        return view('user.index', compact('libros', 'categoria','descubrir'))->with('success', '');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        $this->authorize('update', $libro);
        $categorias = Categoria::all();
        return view('Admin.nuevoLibro', compact('libro', 'categorias'));
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
        $this->authorize('update', [$libro, $request->autor]);

        $request->validate([
            'titulo' => 'required|min:5|max:100',
            'autor' => 'required|exists:users,name',
            'isbn' => 'required',
            'publicacion' => 'required',
            'paginas' => 'required',
            'descripcion' => ['required', 'min:5'],
            'tema' => 'required|exists:categorias,nombre',
            'portada_libro' => 'image',
            'archivo_libro' => 'mimes:pdf'
        ]);

        // $libro = new Libro(); #Instancia clase
        $datoautor = User::where('name', $request->autor)->value('name');
        $datocateogria = Categoria::where('nombre', $request->tema)->value('id');

        $libro->titulo = $request->titulo; #Invocar atributos (col dentro de tabla)
        $libro->$datoautor;
        $libro->isbn = $request->isbn;
        $libro->fecha_publicacion = $request->publicacion;
        $libro->paginas = $request->paginas;
        $libro->descripcion = $request->descripcion;
        $libro->categoria_id = $datocateogria;

        //Almacenar la imagen si se añade
        if ($request->hasFile('portada_libro')) {
            Storage::disk('local')->delete($libro->portada);
            $imagenes = $request->file('portada_libro');
            $imgname = $libro->titulo . time() . '.' . $imagenes->getClientOriginalExtension();
            $imagenes = $imagenes->storeAs('public/portadas', $imgname);
            $url = Storage::url($imagenes);

            $libro->portada = $url; //URL para la BD
        }

        //Almacenar el libro si se añade
        if ($request->hasFile('archivo_libro')) {
            Storage::disk('local')->delete($libro->archivo_libro);
            $archivo = $request->file('archivo_libro');
            $filename = $libro->titulo . time() . '.' . $archivo->getClientOriginalExtension();
            $archivo = $archivo->storeAs('public/libros', $filename);
            $url2 = Storage::url($archivo);

            $libro->archivo_libro = $url2; //URL para la BD
        }
        //Guardar BD
        $libro->save();

        //Redireccionar
        return redirect('/libros')->with('success', 'Libro actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        $this->authorize('delete', $libro);
        Storage::disk('local')->delete($libro->portada);
        $libro->delete();
        return redirect()->back()->with('info', 'Libro eliminado');
    }

}
