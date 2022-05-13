<x-navbar>

    <div class="py-5 px-5 bg-light">
        <h1 class="text-blue-500 font-bold text-lg ">Catalogo de Libros</h1>

        {{--Libros del autor loggeado--}}

            <div class="container mt-5" >
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 row-cols-xl-6">
                    @foreach($libros as $libro)

                        <div class="col" >

                            <div class="card shadow" >
                                <a class="text-decoration-none" href="{{$libro->archivo_libro}}"{{$libro->archivo_libro}}>
                                    <img src="{{$libro->portada}}" alt="" class="card-img-top px-3 py-2" id="Libro" > </a>
                                    <div class="card-body py-2">
                                        <h5 class="card-title text-center text-cute text-truncate " title="{{$libro->titulo}}">{{$libro->titulo}}</h5>
                                        @foreach($libro->autor as $autor)
                                            <a class="text-decoration-none" href="autores/{{$autor->id}}"><p class="card-subtitle text-secondary">{{$autor->name}}</p></a>
                                        @endforeach
                                        {{-- <p class="card-text">{{$libro->descripcion}}</p> --}}
                                        <p class="card-text">{{$libro->categoria->nombre}}</p>
                                    </div>


                            </div>

                        </div>

                    @endforeach

                </div>


            </div>

    </div>

</x-navbar>
