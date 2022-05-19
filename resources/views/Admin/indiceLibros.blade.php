<x-navbar>

    <div class="container-md ">
    
            <h1 class=" font-bold text-lg mt-3">Catalogo de Libros</h1>
            @include('alert')
            @csrf
            <a href="libros/create" type="button" class="btn btn-outline-primary">AÑADIR LIBRO</a>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>ISBN</th>
                            <th>Fecha de Publicación</th>
                            <th>Páginas</th>
                            <th>Descripción</th>
                            <th>Tema</th>
                            <th>Portada</th>
                            <th>Archivo</th>
                            <th>Acción</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($libros as $libro)
                        <tr>
                            @php
                                $autores = "";
                            @endphp
                            <td>{{$libro->titulo}}</td>
                            @foreach($libro->autor as $autor)
                                @php
                                    if ($autores)
                                        $autores = $autores.', '.$autor->name;
                                    else
                                        $autores = $autor->name;


                                @endphp

                            @endforeach
                            <td>{{$autores}}</td>

                            <td>{{$libro->isbn}}</td>
                            <td>{{$libro->fecha_publicacion}}</td>
                            <td>{{$libro->paginas}}</td>
                            <td>{{substr($libro->descripcion,0,10)}}</td>
                            <td>{{$libro->categoria->nombre}}</td>
                            <td><a href="{{url($libro->portada)}}"><img src="{{url($libro->portada)}}" alt="No image" width="30%" height="30%"></a></td>

                            <td>
                                <a href="{{$libro->archivo_libro}}">
                                    <div style="height:100%;width:100%">
                                    {{$libro->titulo}}
                                    </div>
                                </a>
                            </td>
                            <td>

                                <div class="col-md-3 col-sm-1 gx-1">
                                    <a href="libros/{{$libro ->id}}" type="button" class="btn btn-primary btn-sm">Detalle</a>
                                    {{-- @if (Auth::user()->can('update', $libro)) --}}
                                </div>
                                <div class="col-md-3 col-sm-1 gx-1">
                                        <a href="libros/{{$libro ->id}}/edit" type="button" class="btn btn-success btn-sm">Editar</a>
                                </div>
                                    {{-- @endif --}}
                                    {{-- @if (Auth::user()->can('delete', $libro)) --}}
                                <div class="col-md-3 col-sm-1 gx-1">
                                    <form action="/libros/{{$libro ->id}}" method="post">
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
