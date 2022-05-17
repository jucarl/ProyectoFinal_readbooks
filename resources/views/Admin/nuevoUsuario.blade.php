<!DOCTYPE html>
<html>
<div class="row">
    <div class="col-lg-11">
        @isset($user)
        <h2>Editar Usuario</h2>
        @else
        <h2>Añadir Usuario</h2>
        @endisset
    </div>
    <div class="col-lg-1">
        <a class="btn btn-primary" href="{{ url('autores') }}"> Volver</a>
    </div>
</div>
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
    <label for="name">Nombre:</label>
    <input type="text" name="name"  value="{{isset($user) ? $user->name : '' }}" />
    
    </div>

    <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" name="email" value="{{isset($user) ? $user->email : '' }}" />
    </div>

    <div class="form-group">
    <label for="password">Contraseña:</label>
    <input type="password" name="password" />
    
    </div>

    <div class="form-group">
    <label for="password_confirmation">Confirma Contraseña:</label>
    <input type="password" name="password_confirmation" />
    
    </div>

    <div class="form-group">
         <label for="is_admin">Otorgar rol de administrador</label>
         <input type="checkbox" name="is_admin" value=1 />
   
    </div>

    <button type="submit">Enviar</button>
</form>

</html>