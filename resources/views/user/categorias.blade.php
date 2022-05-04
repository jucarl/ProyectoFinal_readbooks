<x-navbar>

    <h1 class="text-blue-500 font-bold text-lg">Categorías</h1>

    @foreach( $categorias as $categoria )
        <div>
            <a href="categoria/{{$categoria->nombre}}"><h4>{{$categoria->nombre}}</h3></a>

        </div>
    @endforeach



</x-navbar>