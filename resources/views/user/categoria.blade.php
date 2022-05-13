<x-navbar>
    <!--Encabezado: foto, usuario, portada -->
    {{-- {{dd($libros)}} --}}
    <div class="py-5 px-5 bg-light">
        <h1 class="text-blue-500 font-bold text-lg ">{{$nombre}}</h1>
        @isset($libros)

            <div class="container mt-5" >
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 row-cols-xl-6">

                    @foreach ($libros as $libro)
                        <div class="col" >

                            <div class="card shadow" >
                                <h5 class="card-title text-center text-cute text-truncate mt-2 " title="{{$libro->titulo}}">{{$libro->titulo}}</h5>
                                <div class="card-body py-2">
                                        <a class="text-decoration-none" href="{{$libro->archivo_libro}}"{{$libro->archivo_libro}}>
                                            <img src="{{$libro->portada}}" alt="" class="card-img-top px-3" id="Libro" > </a>
                                        @foreach ($libro->autor as $autor)
                                            <a class="text-decoration-none" href="autores/{{$autor->id}}"><p class="card-subtitle text-secondary  my-2">{{$autor->name}}</p></a>
                                        @endforeach

                                        {{-- <div class="description">{{$libro->descripcion}}</div> --}}
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        @else
            <h1>Esta categoria aún no tiene libros :c</h1>

        @endisset

</x-navbar>

