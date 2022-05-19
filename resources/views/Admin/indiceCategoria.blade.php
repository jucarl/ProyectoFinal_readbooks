<x-navbar>

    <div class="container-md ">
        <h1 class="text-blue-500 font-bold text-lg mt-3">Catalogo de Categorías</h1>
        @include('alert')
        @csrf
        <a href="categorias/create" type="button" class="btn btn-outline-primary">AÑADIR CATEGORIA</a>

        <div class="table-responsive">
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




                        <td>

                            <div>
                                <div class="row ">
                                    <div class="col-lg-3 col-md-6 col-sm-12 ">
                                        <a href="categorias/{{$categoria->nombre}}/edit" type="button" class="btn btn-success btn-sm">Editar</a>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 ">
                                        <form action="/categorias/{{$categoria->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
                                        </form>
                                    </div>
                                </div>

                            </div>



                        </td>

                    </tr>

                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

</x-navbar>