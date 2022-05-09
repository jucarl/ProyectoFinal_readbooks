<x-navbar>
    <!--Encabezado: foto, usuario, portada -->
    <div class="container row mt-3 gx-4 gx-lg-5 align-items-center">

        <div class="col-md-6">
            <img src="{{$librosautor->profile_photo_url}}" class="card-img-top mb-5 mb-md-0 rounded-circle">
        </div>

        <div class="col-md-6">
             <h1 class="display-5 fw-bolder">{{ $librosautor->name}}</h1>
                <div class="user-info">
                    <p><i class="fas fa-envelope mr-2"></i> {{$librosautor->email}}</p>
                    {{--<p><i class="fas fa-clock mr-2"></i> {{$autor->created_at? $autor->created_at->diffForHumans(): ''}} </p>--}}
                </div>
             <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus ipsam minima ea iste laborum vero?</p>

            
        </div>


        {{--Libros del autor seleccionado--}}
        <div class="mt-5 py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5" >
                <h2 class="fw-bolder mb-4">Obras</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">
                @foreach( $librosautor->Libros as $libro)

                    <div class="col-mb-5" >

                        <div class="card h-100" id="contLibro">
                            <a class="text-decoration-none" href="{{$libro->archivo_libro}}"{{$libro->archivo_libro}}>
                                <img src="{{$libro->portada}}" alt="" class="card-img-top" id="Libro" >
                                <p class="card-title text-center text-secondary ">{{$libro->titulo}}</p>
                                <p class="sinopsis w-75">{{$libro->descripcion}}</p>
                            </a>
                        </div>

                    </div>

                @endforeach

                </div>


            </div>
        </div>

    </div>

</x-navbar>
