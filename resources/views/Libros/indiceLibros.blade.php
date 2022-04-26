<x-navbar>

    <div class="main-content flex-1 mt-16 mx-12">
        <h1 class="text-blue-500 font-bold text-lg">Catalogo de Libros</h1>
        @csrf
        <a href="libros/create" type="button" class="btn btn-outline-primary">AÑADIR LIBRO</a>


        <table class="table table-striped">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Autor</th>
                <th>ISBN</th>
                <th>Fecha de Publicación</th>
                <th>Páginas</th>
                <th>Descripción</th>
                <th>Tema</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($libros as $libro)
            <tr>
                <td>{{$libro->titulo}}</td>
                <td>{{$libro->name}}</td>
                <td>{{$libro->isbn}}</td>
                <td>{{$libro->fecha_publicacion}}</td>
                <td>{{$libro->paginas}}</td>
                <td>{{$libro->descripcion}}</td>
                <td>{{$libro->categoria_id}}</td>
                <td>
                    <div class="d-grid gap-2 d-md-block">
                        <a href="libros/{{$libro ->id}}" type="button" class="btn btn-primary btn-sm">Detalle</a>
                        <a href="libros/{{$libro ->id}}/edit" type="button" class="btn btn-success btn-sm">Editar</a>
                        <form action="/libros/{{$libro ->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Eliminar"  class="btn btn-danger btn-sm">
                        </form>
                    </div>


                    </td>
            </tr>

        </tbody>

        @endforeach
    </table>
</div>

</x-navbar>
