<h1>CONSIDERACIONES</h1>
<p>INTALAR JETSTREAM: <br>
    > <b><i>composer require laravel/jetstream</i></b> <br>
    > <b><i>php artisan jetstream install livewire</i></b> <br>
</p>


<h2>Para el almacenamiento de imagenes</h2>
<p>Brinda acceso a las imagenes almacenadas en Storage: <br>
    <b><i>php artisan storage:link</i></b>
</p>

<h2>Edición de componentes</h2>
<p>Hace visibles los archivos para la edicion de componentes en las vistas: <br>
    <b><i>php artisan vendor:publish --tag=jetstream-views</i></b>
</p>

<h2>Adición Metodo de Pago</h2>
<p>Instala SDK de Mercado Pago para PHP <br>
    <b><i>composer require "mercadopago/dx-php"</i></b>
</p>

<h2>Correr factories</h2>
<p>Factory Libros <br>
 <b><i>php artisan db:seed --class=LibroSeeder</i></b>
<p>Factory Usuarios <br>
<b><i>php artisan db:seed --class=UserSeeder</i></b>
