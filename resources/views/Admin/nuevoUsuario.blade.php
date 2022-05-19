<x-navbar>

    <div class="container-md ">
        <div class="col-lg-11">
            @isset($user)
            <h2 class="mt-3">Editar Usuario</h2>
            @else
            <h2 class="mt-3">Añadir Usuario</h2>
            @endisset
        </div>
        {{-- <div class="col-lg-1">
            <a class="btn btn-primary" href="{{ url('autores') }}"> Volver</a>
        </div> --}}

        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Formato de entrada no valido<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @isset($user)
            <form action="/autores/{{$user->id }}" method="post" class="" enctype="multipart/form-data"> <!----actualizar-->
                    @method ('PATCH')
            @else
            <form action="{{ route('autores.store') }}" method="POST">
        @endisset
            @csrf
            <div class="form-group">
            <label class="text-gray-700" for="name">Nombre:</label>
            <input class="form-control" type="text" name="name"  value="{{isset($user) ? $user->name : '' }}" />

            </div>

            <div class="form-group">
            <label class="text-gray-700" for="email">Email:</label>
            <input class="form-control" type="email" name="email" value="{{isset($user) ? $user->email : '' }}" />
            </div>

            <div class="form-group">
            <label class="text-gray-700" for="password">Contraseña:</label>
            <input class="form-control" type="password" name="password" />

            </div>

            <div class="form-group">
            <label class="text-gray-700" for="password_confirmation">Confirma Contraseña:</label>
            <input class="form-control" type="password" name="password_confirmation" />

            </div>

            <div class="form-group mt-3">
                <input  class="form-check-input " type="checkbox" name="is_admin" value=1 />
                <label class="text-gray-700" for="is_admin">Otorgar rol de administrador</label>

            </div>

            <button type="submit" class="btn btn-outline-info mt-4">Enviar</button>
        </form>

    <div>
</x-navbar>
