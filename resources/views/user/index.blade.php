<x-navbar>
    @php ($user = auth()->user()->name)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">

                    <div class="card-body">

                        <div class="row justify-content-center">
                            <form class="form-inline col-md-6 justify-content-center" action="search" method="GET">
                                <input type="text" class="form-control mx-sm-3 mb-2" name="search">
                                <button type="submit" class="btn btn-secondary mb-2"></button>
                            </form>
                        </div>

                        {{--Banner--}}
                        <div class="row justify-content-center">
                            <h3>Buen dia {{$user}} </h3>
                            <figure>
                                <img class="img-fluid" src="/storage/assets/img/banner.png" alt="">
                            </figure>
                        </div>

                        <div class="mt-5 py-5 bg-light">
                            <div class="container px-4 px-lg-5 mt-5">
                                <h2 class="fw-bolder mb-4">Continuar Leyendo (Pendiente descubrir como poner estos)</h2>
                                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">
                                    @foreach( $libros as $libro)

                                        <div class="col-mb-5">

                                            <div class="card h-100" id="contLibro">
                                                <a class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal{{$libro->id}}">
                                                    <img src="{{$libro->portada}}" alt="" class="card-img-top" id="Libro">
                                                    <p class="card-title text-center text-secondary ">{{$libro->titulo}}</p>

                                                </a>
                                            </div>

                                        </div>

                                        @include('user.modelDetallesLibro')
                                    @endforeach

                                </div>


                            </div>
                        </div>
                        <div class="mt-5 py-5 bg-light">
                            <div class="container px-4 px-lg-5 mt-5">
                                <h2 class="fw-bolder mb-4">Subidos Recientemente</h2>
                                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">
                                    @foreach( $libros as $libro)

                                        <div class="col-mb-5">

                                            <div class="card h-100" id="contLibro">
                                                <a class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal{{$libro->id}}">
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
                </div>
</x-navbar>
