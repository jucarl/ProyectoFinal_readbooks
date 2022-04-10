<x-navbar>
    <div class="main-content flex-1 mt-14 mx-12">
        @isset($libro)
            <h1 class="text-blue-500 font-bold text-lg">Editar Libro</h1>
        @else
        <h1 class="text-blue-500 font-bold text-lg">Agregar Libro</h1>
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
            <input class="w-1/14 mt-1 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500" type="text" name="titulo" value="{{isset($libro) ? $libro->titulo : ''}}">
            <br>
            <label class="text-gray-700" for="autor">Autor</label><br>
            <input class="w-full mt-1 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500" type="text" name="autor" value="{{isset($libro) ? $libro->autor : ''}}">
            <br>
            <label class="text-gray-700" for="editorial">Editorial</label><br>
            <input class="w-full mt-1 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500" type="text" name="editorial" value="{{isset($libro) ? $libro->editorial : ''}}">
            <br>
            <label class="text-gray-700" for="publicacion">Fecha de Publicación</label><br>
            <input class="w-full mt-1 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500" type="date" name="publicacion" value="{{isset($libro) ? $libro->publicacion : ''}}">
            <br>
            <label class="text-gray-700" for="paginas">Numero de Páginas</label><br>
            <input class="w-full mt-1 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500" type="text" name="paginas" value="{{isset($libro) ? $libro->paginas : ''}}">
            <br>
            <label class="text-gray-700" for="descripcion">Descripcion</label><br>
            <textarea class="w-full mt-1 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500" name="descripcion" id="descripcion" cols="10" rows="4">
                {{isset($libro) ? $libro->descripcion : '' }}
            </textarea>
            <br>
            <label class="text-gray-700" for="tema">Tema</label><br>
            <select class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500" name="tema" id="tema">
                <option value="Ficcion"{{isset($libro) && $libro->tema == 'Ficcion' ? 'selected' : '' }}>Ficcion</option>
                <option value="Arte"{{isset($libro) && $libro->tema == 'Arte' ? 'selected' : ''}}>Arte</option>
                <option value="Novela"{{isset($libro) && $libro->tema == 'Novela' ? 'selected' : ''}}>Novela</option>
            </select>
            <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white bold py-2 px-2 rounded">Guardar</button>
        </form>
    </div>
</x-navbar>
