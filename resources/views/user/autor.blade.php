<x-navbar>
    <!--Encabezado: foto, usuario, portada -->
    <div class="container row mx-auto  align-items-center ">

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
            @include('user.mercadopago')


        </div>


        {{--Libros del autor seleccionado--}}
        <div class="mt-5 py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Obras</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">
                    @foreach( $librosautor->Libros as $libro)


                    <div class="col-lg-3 col-md-4 col-sm-6">

                        <div class="card h-100" id="contLibro">
                            <a class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal{{$libro->id}}"> {{---href="{{$libro->archivo_libro}}"{{$libro->archivo_libro}}>--}}
                                <img src="{{$libro->portada}}" alt="" class="card-img-top" id="Libro">
                                <p class="card-title text-center text-secondary ">{{$libro->titulo}}</p>
                            </a>
                        </div>
                    </div>

                    {{-- MODEL: Ventana Emergente para detalle de libros --}}
                    @include('user.modelDetallesLibro')



                    @endforeach




                </div>
            </div>
        </div>


    </div>

</x-navbar>
