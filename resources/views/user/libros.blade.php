<x-navbar>

    <div class="py-5 px-5 bg-light">
        <h1 class="text-blue-500 font-bold text-lg ">Catalogo de Libros</h1>

        {{--Libros del autor loggeado--}}

            <div class="container mt-5" >
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 row-cols-xl-6">
                    @foreach($libros as $libro)

                    <div class="col mt-4">

                            <div class="card shadow h-100 " >
                                <a class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal{{$libro->id}}">
                                    <img src="{{$libro->portada}}" alt="" class="card-img-top" id="Libro" > </a>

                                        <h5 class="card-title text-center text-secondary text-truncate " title="{{$libro->titulo}}">{{$libro->titulo}}</h5>

                                        <p class="card-text px-3 pb-2">{{$libro->categoria->nombre}}</p>



                            </div>

                        </div>
                        @include('user.modelDetallesLibro')

                    @endforeach

                </div>


            </div>

    </div>

</x-navbar>
