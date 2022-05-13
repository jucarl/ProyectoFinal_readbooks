<x-navbar>

    <h1 class="text-black-50 fs-3 mt-3">Categorías</h1>

    <div class="row align-items-center">
        @foreach( $categorias as $categoria )
            <div class="col-sm-2">
                <div class="card text-center border-white mt-3 shadow-sm bg-cute bg-gradient ">

                    <img src="" alt="" class="card-img-top rounded-circle mt-3 w-75 mx-auto ">
                    <a class="card-title text-decoration-none  " href="categorias/{{$categoria->nombre}}"><p class="text-black-50 fs-5">{{$categoria->nombre}}</p></a>

                </div>
            </div>
        @endforeach

    </div>


</x-navbar>
