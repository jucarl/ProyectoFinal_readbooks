<x-navbar>

    <div >
        <h1 >Detalles libro</h1>

        <table  class="table table-striped">
            <tr >
                <th>Titulo</th>
                <th>Autor</th>
                <th>Editorial</th>
                <th>Fecha de Publicacion</th>
                <th>Páginas</th>
                <th>Descripción</th>
                <th>Tema</th>
                <th>Portada</th>
            </tr>
                <tr>
                    <td>{{$libro -> titulo}}</td>
                    <td>{{$libro -> autor->name}}</td>
                    <td>{{$libro -> isbn}}</td>
                    <td>{{$libro -> fecha_publicacion}}</td>
                    <td>{{$libro -> paginas}}</td>
                    <td>{{$libro -> descripcion}}</td>
                    <td>{{$libro -> categoria->nombre}}</td>
                    <td><a href="{{url($libro->portada)}}"><img src="{{url($libro->portada)}}" alt="" width="20 px"></a></td>
                </tr>
        </table>
    </div>
</x-navbar>
