<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <title>Readbooks</title>

    <style>
        .col-sm-4:hover img{opacity: 0.7;}
        #contLibro{
            text-overflow: clip;
            overflow: hidden;
            white-space: nowrap;
        }

        #Libro {
        opacity: 1;
        transition: .5s ease;
        backface-visibility: hidden;
        }

        .sinopsis {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
            color: #3d3d3d;
            text-align: left;
            text-overflow: ellipsis;
            overflow: hidden;


        }


        #Libro:hover  {
             opacity: 0.3;

        }
        .card:hover .sinopsis {
             opacity: 1;
             text-overflow: ellipsis;
        }
    </style>

</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #4a8cb3ea ">
            <div class="container-fluid">
              <a class="navbar-brand" href="/dashboard">
                  {{-- <img src="assets/" alt="" width="20" height="25"> --}}
                  <x-slot name="logo">
                                <x-jet-authentication-card-logo />
                            </x-slot>
                  ReadBooks
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/dashboard">Inicio</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/libros">Libros</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/autores">Autores</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/categorias">Categorías</a>
                  </li>
                </ul>
                  <div class="d-flex">
                        <li class="nav-item" style="list-style: none">
                            <div class="dropdown w-50">
                                <img class=" dropdown-toggle rounded-circle ms-2" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false"
                                    src="{{ Auth::user()->profile_photo_url }}" alt="" width="40px">

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="/perfil">Mi Perfil</a></li>
                                <li><a class="dropdown-item" href="/profile">Ajustes</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/logout">Cerrar Sesión</a></li>
                                </ul>
                            </div>
                        </li>
                    </div>


              </div>



            </div>
          </nav>


            <div class="container-fluid">


                {{ $slot }}

            </div>

    </div>


</body>
</html>
