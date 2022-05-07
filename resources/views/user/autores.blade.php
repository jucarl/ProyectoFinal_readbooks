<x-navbar>

    <h1 class="text-blue-500 font-bold text-lg">Autores</h1>

    @foreach( $autores as $autor )
        <div>

            <a href="autores/{{$autor->id}}"><h4>{{$autor->name}}</h3></a>

        </div>
    @endforeach



</x-navbar>
