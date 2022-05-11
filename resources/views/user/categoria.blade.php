<x-navbar>
    <!--Encabezado: foto, usuario, portada -->
    <div class="container row mt-3 gx-4 gx-lg-5 align-items-center">
    @foreach ($libros as $libro) 
        <h1 class="text-black-50 fs-3 mt-3">{{$libro->titulo}}</h1>
        <div class="content">
                <a href="{{url($libro->portada)}}"><img src="{{url($libro->portada)}}" alt="No image" width="100 px"></a></td>
                <a class="title"  href="{{$libro->archivo_libro}}">{{$libro->titulo}}</a>
                @foreach ($libro->autor as $autor)
                <a class="username" href="/autores/{{$autor->name}}">{{$autor->name}}</a>
                @endforeach    
            <div class="description">{{$libro->descripcion}}</div>
        </div>
    @endforeach

</x-navbar>

