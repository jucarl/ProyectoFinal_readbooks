<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <title>BookStore</title>

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


        .card:hover #Libro {
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
        <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #405072c0 ">
            <div class="container-fluid">
              <a class="navbar-brand" href="/dashboard">
                  <img src="assets/" alt="" width="20" height="25">
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
                    <a class="nav-link" href="/autores">Autores</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/categorias">Categorías</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Libros
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="/autores">Autores</a></li>
                      <li><a class="dropdown-item" href="#">Help</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="api/Libro">API JSON</a>
                  </li>
                </ul>
                <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

                {{-- <li class="nav-item">
                    <div class="dropdown w-75">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ Auth::user()->profile_photo_url }}" alt="" class="rounded-circle w-75 ms-2">
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                          <li><a class="dropdown-item" href="/perfil">Mi Perfil</a></li>
                          <li><a class="dropdown-item" href="/profile">Ajustes</a></li>
                          <li><a class="dropdown-item" href="/logout">Something else here</a></li>
                        </ul>
                      </div>
                </li> --}}
                 <a href="/perfil">
                    <img src="{{ Auth::user()->profile_photo_url }}" alt="" class="rounded-circle w-75 ms-2">
                </a>



              </div>



            </div>
          </nav>


            <div class="container-sm">


                {{ $slot }}

            </div>

    </div>


</body>
</html>
