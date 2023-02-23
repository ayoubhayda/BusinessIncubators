<!DOCTYPE html>
<html lang="en">

<head>
<<<<<<< HEAD
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
=======
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
>>>>>>> aedbe9b0fcec5aaa776815479065a86ffd22fc9c
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
<<<<<<< HEAD
    <title>@yield('title')</title>
</head>

<body class="d-flex flex-column min-vh-100">
=======
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
</head>

<body>
>>>>>>> aedbe9b0fcec5aaa776815479065a86ffd22fc9c
    <nav class="navbar navbar-expand-sm ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img class="logo" src="{{ url('images/logo.png') }}"
                    alt=""></a>
<<<<<<< HEAD

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('buildings.index') }}">Immeubles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('cities.index') }}">Villes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('domains.index') }}">Domaines</a>
                </li>
            </ul>
            <div class="dropdown">
                <a id="navbarDropdown" class="btn dropdown-toggle" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Paramètres</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Déconnexion') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <div>
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
=======
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('cities.index')}}">Villes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('buildings.index')}}">Immeubles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('domains.index')}}">Domaines</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('users.index')}}">Profile</a>
                </li>
            </ul>
            <a class="btn btn-primary" href="#">Déconexion</a>
        </div>
    </nav>
    <div class="content mt-4 d-flex justify-content-center">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
>>>>>>> aedbe9b0fcec5aaa776815479065a86ffd22fc9c
    </script>
</body>

</html>
