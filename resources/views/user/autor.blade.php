<x-navbar>
    <!--Encabezado: foto, usuario, portada -->
    <div class="container row gx-4 gx-lg-5 align-items-center ">

        <div class="col-12 col-md-6 mt-5">
            <img src="{{$librosautor->profile_photo_url}}" class="card-img-top w-50 float-md-end mb-5  rounded-circle">
        </div>

        <div class="col-md-6">
             <h1 class="display-5 fw-bolder">{{ $librosautor->name}}</h1>
                <div class="user-info">
                    <p><i class="fas fa-envelope mr-2"></i> {{$librosautor->email}}</p>
                    {{--<p><i class="fas fa-clock mr-2"></i> {{$autor->created_at? $autor->created_at->diffForHumans(): ''}} </p>--}}
                </div>
             <p class="lead">{{$librosautor->about_me}}</p>


        </div>


        {{--Libros del autor seleccionado--}}
        <div class="mt-5 py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5" >
                <h2 class="fw-bolder mb-4">Obras</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">
                @foreach( $librosautor->Libros as $libro)


                    <div class="col-mb-5" >

                        <div class="card h-100" id="contLibro">
                            <a class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal"> {{---href="{{$libro->archivo_libro}}"{{$libro->archivo_libro}}>--}}
                                <img src="{{$libro->portada}}" alt="" class="card-img-top" id="Libro" >
                                <p class="card-title text-center text-secondary ">{{$libro->titulo}}</p>
                                <p class="sinopsis w-75">{{$libro->descripcion}}</p>
                            </a>
                        </div>
                    </div>



                @endforeach

                {{-- MODEL: Ventana Emergente para detalle de libros --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detalles de la obra</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                                {{-- Detalles del libro --}}
                                <div class="card " style="max-width: 540px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="{{$libro->portada}}" class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$libro->titulo}}</h5>
                                                <p class="card-text">{{$libro->descripcion}}</p>
                                                <p class="card-text"><small class="text-muted">{{$libro->categoria->nombre}}</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="{{$libro->archivo_libro}}"{{$libro->archivo_libro}} type="button" class="btn btn-primary" >Leer obra</a>
                          </div>
                        </div>
                    </div>
                </div>

            </div>
            </div>
        </div>


    </div>

</x-navbar>
