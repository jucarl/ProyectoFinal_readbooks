<x-navbar>

    <div class="main-content flex-1 mt-16 mx-12">
        <h1 class="text-blue-500 font-bold text-lg">Catalogo de Libros</h1>
        @csrf
        <a href="libros/create" class="block  text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded my-2">AÑADIR LIBRO</a>


        <table class="table-fixed w-full ">
        <thead>
            <tr class=" border bg-gray-200">
                <th>Titulo</th>
                <th>Autor</th>
                <th>Editorial</th>
                <th>Fecha de Publicación</th>
                <th>Páginas</th>
                <th>Descripción</th>
                <th>Tema</th>
                <th class="w-3/12">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($libros as $libro)
            <tr>
                <td class="border px-4 py-2">{{$libro->titulo}}</td>
                <td class="border px-4 py-2">{{$libro->autor}}</td>
                <td class="border px-4 py-2">{{$libro->editorial}}</td>
                <td class="border px-4 py-2">{{$libro->publicacion}}</td>
                <td class="border px-4 py-2">{{$libro->paginas}}</td>
                <td class="border px-4 py-2">{{$libro->descripcion}}</td>
                <td class="border px-4 py-2">{{$libro->tema}}</td>
                <td class="border px-4 py-2 flex flex-wrap">
                        <a href="libros/{{$libro ->id}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">Detalle</a>
                        <a href="libros/{{$libro ->id}}/edit" class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-2 rounded">Editar</a>
                        <form action="/libros/{{$libro ->id}}" method="post" class="bg-green-500 hover:bg-green-700 text-white py-2 px-2 rounded">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Eliminar" class="font-bold ">
                        </form>


                    </td>
            </tr>

        </tbody>

        @endforeach
    </table>
</div>

</x-navbar>
