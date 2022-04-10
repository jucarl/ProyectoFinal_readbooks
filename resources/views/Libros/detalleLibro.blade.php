<x-navbar>

    <div class="main-content flex-1 mt-16 mx-12">
        <h1 class="text-blue-500 font-bold text-lg">Detalles libro</h1>

        <table  class="table-fixed w-full  mt-12">
            <tr class=" border bg-gray-200">
                <th>Titulo</th>
                <th>Autor</th>
                <th>Editorial</th>
                <th>Fecha de Publicacion</th>
                <th>Páginas</th>
                <th>Descripción</th>
                <th>Tema</th>
            </tr>
                <tr>
                    <td class="border px-4 py-2">{{$libro -> titulo}}</td>
                    <td class="border px-4 py-2">{{$libro -> autor}}</td>
                    <td class="border px-4 py-2">{{$libro -> editorial}}</td>
                    <td class="border px-4 py-2">{{$libro -> publicacion}}</td>
                    <td class="border px-4 py-2">{{$libro -> paginas}}</td>
                    <td class="border px-4 py-2">{{$libro -> descripcion}}</td>
                    <td class="border px-4 py-2">{{$libro -> tema}}</td>
                </tr>
        </table>
    </div>
</x-navbar>
