<x-navbar>
    <!--Encabezado: foto, usuario, portada -->
    <div class="container">
        <img src="{{url('auth()->user()->profile_photo_path')}}" class="img-fluid" alt="Responsive image">
        <h1>{{ auth()->user()->name}}</h1>
    </div>

</x-navbar>
