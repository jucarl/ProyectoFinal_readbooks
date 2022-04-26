<x-navbar>
    <div class="FormAddLibro">
        @isset($libro)
            <h1 class="">Editar Libro</h1>
        @else
        <h1 class="">Agregar Libro</h1>
        @endisset
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror --}}


        @isset($libro)
        <form action="/libros/{{$libro->id }}" method="post" class="grid grid-cols-1 gap-1 mt-6 sm:grid-cols-1"> <!----actualizar-->
            @method ('PATCH')
        @else
        <form action="/libros" method="post" class="grid grid-cols-1 gap-1 mt-6 sm:grid-cols-1">
        @endisset

            @csrf   <!--Proteccion contra ataque -->
            <label class="text-gray-700" for="libro">Nombre del Libro</label><br>
            <input class="form-control" type="text" name="titulo" value="{{isset($libro) ? $libro->titulo : ''}}">
            <br>
            <label class="text-gray-700" for="autor">Autor</label><br>
            <input class="form-control" type="text" name="autor" value="{{isset($libro) ? $libro->id_autor : ''}}">
            <br>
            <label class="text-gray-700" for="editorial">ISBN</label><br>
            <input class="form-control" type="text" name="editorial" value="{{isset($libro) ? $libro->ISBN : ''}}">
            <br>
            <label class="text-gray-700" for="publicacion">Fecha de Publicación</label><br>
            <input class="form-control" type="date" name="publicacion" value="{{isset($libro) ? $libro->fecha_publicacion : ''}}">
            <br>
            <label class="text-gray-700" for="paginas">Numero de Páginas</label><br>
            <input class="form-control" type="text" name="paginas" value="{{isset($libro) ? $libro->paginas : ''}}">
            <br>
            <label class="text-gray-700" for="descripcion">Descripcion</label><br>
            <textarea class="form-control" name="descripcion" id="descripcion" cols="10" rows="4">
                {{isset($libro) ? $libro->descripcion : '' }}
            </textarea>
            <br>
            <label class="text-gray-700" for="tema">Tema</label><br>
            <select class="form-control" name="tema" id="tema">
                <option value="Ficcion"{{isset($libro) && $libro->id_categoria == 'Ficcion' ? 'selected' : '' }}>Ficcion</option>
                <option value="Arte"{{isset($libro) && $libro->id_categoria == 'Arte' ? 'selected' : ''}}>Arte</option>
                <option value="Novela"{{isset($libro) && $libro->id_categoria == 'Novela' ? 'selected' : ''}}>Novela</option>
            </select>
            <button type="submit" class="btn btn-outline-info">Guardar</button>
        </form>
    </div>
</x-navbar>
