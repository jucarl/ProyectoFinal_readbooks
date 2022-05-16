<x-navbar>

    <div class="main-content flex-1 mt-16 mx-12">
        <h1 class="text-blue-500 font-bold text-lg">Catalogo de Categorias</h1>
        @csrf
        <a href="libros/create" type="button" class="btn btn-outline-primary">AÑADIR CATEGORIA</a>


        <table class="table table-striped table-md">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Imagen</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>

            @foreach($categorias as $categoria)
                <tr>
                    <td>{{$categoria->id}}</td>
                    <td>{{$categoria->nombre}}</td>
                    <td>{{$categoria->descripcion}}</td>
                    <td><a href="{{$categoria->img}}">image</a></td>




                <td class="">

                    <div class="container">
                        <div class="row ">
                            <div class="col-md-3 col-sm-1 gx-1">
                                <a href="libros/{{$categoria->id}}/edit" type="button" class="btn btn-success btn-sm">Editar</a>
                            </div>
                            <div class="col-md-3 col-sm-1 gx-1">
                                <form action="/libros/{{$categoria->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Eliminar"  class="btn btn-danger btn-sm">
                                </form>
                            </div>
                            <div class="col-md-0 gx-0">
                            </div>
                        </div>

                    </div>



                </td>

            </tr>

            @endforeach
        </tbody>

    </table>
</div>

</x-navbar>
