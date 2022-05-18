<x-navbar>

    <div class="container-md ">
        <h1 class="text-blue-500 font-bold text-lg mt-3">Usuarios</h1>
        @csrf
        <a href="autores/create" type="button" class="btn btn-outline-primary">AÑADIR USUARIO</a>


        <div class="table-responsive">
            <table class="table  table-striped ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fotografia</th>
                    <th>Creado</th>
                    <th>Acción</th>
                    {{-- <th>Sobre mi</th> --}}

                </tr>
            </thead>
            <tbody>

                @foreach($autores as $autor)
                <tr>
                    <td>{{$autor->id}}</td>
                    <td>{{$autor->name}}</td>
                    <td>{{$autor->email}}</td>
                    <td><a href="/autores/{{$autor->id}}"><img class="rounded-circle" width="50px" src="{{$autor->profile_photo_url}}" alt="No image"></a></td>
                    <td>{{$autor->created_at}}</td>

                    <td>
                    <div class="row gx-1">
                        <div class="col-lg-4 col-md-12 col-sm-12  ">
                            <a href="autores/{{$autor ->id}}" type="button" class="btn btn-primary btn-sm ">Detalle</a>
                            {{-- @if (Auth::user()->can('update', $libro)) --}}
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">
                                <a href="autores/{{$autor ->id}}/edit" type="button" class="btn btn-success btn-sm">Editar</a>
                        </div>
                            {{-- @endif --}}
                            {{-- @if (Auth::user()->can('delete', $libro)) --}}
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <form action="/autores/{{$autor ->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Eliminar"  class="btn btn-danger btn-sm">
                            </form>
                        </div>
                            {{-- @endif --}}
                    </div>


                    </td>
                </tr>


            @endforeach

            </tbody>
        </table>
    </div>
</div>

</x-navbar>
