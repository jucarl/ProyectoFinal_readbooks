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
        <form action="/libros/{{$libro->id }}" method="post" class="" enctype="multipart/form-data"> <!----actualizar-->
            @method ('PATCH')
        @else
        <form action="/libros" method="post" class="" enctype="multipart/form-data">
        @endisset

            @csrf   <!--Proteccion contra ataque -->
            <label class="text-gray-700" for="libro">Nombre del Libro</label><br>
            <input class="form-control" type="text" name="titulo" value="{{ old('titulo') }}{{isset($libro) ? $libro->titulo: ''}}" minlength="1" maxlength="200" required >
            <br>
            <label class="text-gray-700" for="autor">Autor</label><br>
            <input class="form-control" type="text" name="autor" readonly="true" value="{{ old('autor') }}{{ auth()->user()->name}}"  title="Letras y números. Tamaño mínimo: 2. Tamaño máximo: 100 ">
            <br>
            <label class="text-gray-700" for="editorial">ISBN</label><br>
            <input class="form-control" type="text" name="isbn" value="{{ old('isbn') }}{{isset($libro) ? $libro->isbn : ''}}" minlength="10" maxlength="10" pattern="[A-Za-z0-9]+" title="Letras y números. Tamaño:10 ">
            <br>
            <label class="text-gray-700" for="publicacion">Año de Publicación</label><br>
            <input class="form-control" type="numeric" name="publicacion" value="{{ old('publicacion') }}{{isset($libro) ? $libro->fecha_publicacion : ''}}" required pattern="[0-9]{4}" title="Ingresa unicamente el año Ej. 1999">
            <br>
            <label class="text-gray-700" for="paginas">Numero de Páginas</label><br>
            <input class="form-control" type="text" name="paginas" value="{{ old('paginas') }}{{isset($libro) ? $libro->paginas : ''}}" required pattern="[0-9]+" title="Solo números">
            <br>
            <label class="text-gray-700" for="descripcion">Descripcion</label><br>
            <textarea class="form-control" name="descripcion" id="descripcion" cols="10" rows="4" minlength="5" maxlength="4000" required pattern="[A-Za-z0-9]+">
            {{ old('descripcion') }}{{isset($libro) ? $libro->descripcion : '' }}
            </textarea>
            <br>
            <label class="text-gray-700" for="tema">Tema</label><br>
            <select class="form-control" name="tema" id="tema" required >
                @foreach( $categorias as $categoria )
                     <option value="{{ $categoria->nombre}}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>

            <label for="portada_libro" class="col-md-4 col-form-label text-md-right">Portada</label>
            <div class="col-md-6">
                <input id="portada_libro" accept="image/*" type="file" name="portada_libro" onchange="readCoverImage(this);" class="form-control @error('portada_libro') is-invalid @enderror" value="{{isset($libro) ? $libro->portada_libro : '' }}" >

                @error('portada_libro')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror

                <img id="portada_libro-thumb" class="img-fluid img-thumbnail" src="">
            </div>

            <label for="archivo_libro" class="form-label">Libro</label>
            <div class="col-md-6">
                <input class="form-control" type="file" id="archivo_libro" name="archivo_libro" value="{{isset($libro) ? $libro->archivo_libro : '' }}" accept=".txt, .pdf">
                @error('archivo_libro')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-outline-info">Guardar</button>
        </form>
        <div class="mb-3">

        </div>
    </div>
</x-navbar>
