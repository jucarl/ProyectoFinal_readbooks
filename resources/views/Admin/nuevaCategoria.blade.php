<x-navbar>
    <div class="container-md ">
        <div class="col-lg-11">

        @isset($categorias)
            
            <h2 class="mt-3">Editar Categoría</h2>
        @else
            <h2 class="mt-3">Añadir Nueva Categoría</h2>
        @endisset
        </div>
        {{-- <div class="col-lg-1">
            <a class="btn btn-primary" href="{{ url('categorias') }}"> Volver</a>
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

    @isset($categorias)
    <form action="/categorias/{{$categorias->id}}" method="post" class="" enctype="multipart/form-data"> <!----actualizar-->
        @method ('PATCH')
    @else
    <form action="{{ route('categorias.store')}}" method="POST">
    @endisset
        @csrf
        <div class="form-group">
            <label class="text-gray-700" for="Nombre">Nombre de la Categoría:</label>
            <input type="text" class="form-control" id="Nombre" placeholder="Ingresa el nombre" name="Nombre" value="{{isset($categorias) ? $categorias->nombre : '' }}">
        </div>
        <div class="form-group">
            <label class="text-gray-700" for="descripcion">Descripción:</label><br>
            <textarea class="form-control" id="descripcion" name="descripcion" cols="10" rows="4" placeholder="Descripción" value="{{isset($categorias) ? $categorias->descripcion : '' }}">{{isset($categorias) ? $categorias->descripcion: ''}}</textarea>
        </div>
        <button type="submit" class="btn btn-outline-info mt-5">Guardar</button>
    </form>

    <div>
</x-navbar>
