<x-navbar>

    <div class="main-content flex-1 mt-16 mx-12">
        <h1 class="text-blue-500 font-bold text-lg">Usuarios</h1>
        @csrf
        <a href="autor/create" type="button" class="btn btn-outline-primary">AÑADIR USUARIO</a>


        <table class="table table-striped">
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
                <td class="col-md-2"><a href="{{$autor->profile_photo_path}}"><img class="rounded-circle" src="{{$autor->profile_photo_url}}" alt="No image" width="30%" height="30%"></a></td>
                <td>{{$autor->created_at}}</td>

                <td>
                <div class="row">
                    <div class="col-md-3 col-sm-1 gx-1">
                        <a href="autor/{{$autor ->id}}" type="button" class="btn btn-primary btn-sm">Detalle</a>
                        {{-- @if (Auth::user()->can('update', $libro)) --}}
                    </div>
                    <div class="col-md-3 col-sm-1 gx-1">
                            <a href="autor/{{$autor ->id}}/edit" type="button" class="btn btn-success btn-sm">Editar</a>
                    </div>
                        {{-- @endif --}}
                        {{-- @if (Auth::user()->can('delete', $libro)) --}}
                    <div class="col-md-3 col-sm-1 gx-1">
                        <form action="/autor/{{$autor ->id}}" method="post">
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

</x-navbar>
