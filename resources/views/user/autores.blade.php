<x-navbar>

    <div class="container mt-5">
        <h1 class="text-black-50 fs-3 mt-3">Autores</h1>
        <div class="row align-items-center">
                @foreach( $autores as $autor)
                <div class="col-sm-2">
                    <div class="card text-center border-white  ">
                    <img src="{{ $autor->profile_photo_url}}" alt="" class="card-img-top rounded-circle mt-3 w-75 mx-auto ">
                        @if($autor->id === auth()->user()->id)
                            <a class="card-title text-decoration-none " href="/perfil"><p class="text-black-50 fs-5">{{$autor->name}}</p></a>
                        @else
                            <a class="card-title text-decoration-none  " href="autores/{{$autor->id}}"><p class="text-black-50 fs-5">{{$autor->name}}</p></a>
                    @endif
                    </div>
                </div>
                @endforeach

        </div>
    </div>


</x-navbar>
