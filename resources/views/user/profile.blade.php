<x-navbar>
    <!--Encabezado: foto, usuario, portada -->
    <div class="container">


        <div class="mx-auto pt-5" style="width: 50%;" >
            <img src="{{auth()->user()->profile_photo_url}}" class="img-fluid rounded-circle" alt="20x20" data-holder-rendered="true" width="50%">
            <h1 class="text-center pt-3">{{ auth()->user()->name}}</h1>

        </div>
        <div class="user-info">
                            <h5 class="my-3">{{Auth::user()->name}}</h5>
                            <p><i class="fas fa-envelope mr-2"></i> {{Auth::user()->email}}</p>
                            <p><i class="fas fa-clock mr-2"></i> {{Auth::user()->created_at? Auth::user()->created_at->diffForHumans(): ''}} </p>
                        </div>

        <div class="container pt-5" >

            <div class="row row-cols-auto">
            @foreach( $librosautor->Libros as $libro)

            <div class="col-sm-4" >
          
                <a href="{{$libro->archivo_libro}}"{{$libro->archivo_libro}}>
                    <img src="{{$libro->portada}}" alt="" class="img-fluid" >
                </a>

            </div>

            @endforeach

            </div>


        </div>

    </div>

</x-navbar>
