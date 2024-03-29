<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <title>@yield('title')</title>
    @yield('styles')

</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-sm ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img class="logo" src="{{ url('images/logo.png') }}"
                    alt=""></a>
            @if (Auth::user()->role == 1)
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('buildings.index') }}"><i
                                class="material-symbols-outlined @yield('home')">Home</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}"><i
                                class="material-symbols-outlined @yield('user')">Group</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('cities.index') }}"><i
                                class="material-symbols-outlined @yield('city')">Home_Pin</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('domains.index') }}"><i
                                class="material-symbols-outlined @yield('domain')">Business_Center</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('positions.index') }}"><i
                                class="material-symbols-outlined @yield('position')">Badge</i></a>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('buildings.index') }}"><i
                                class="material-symbols-outlined @yield('home')">Home</i></a>
                    </li>
                </ul>
            @endif
            <div class="dropdown">
                <a id="navbarDropdown" class="btn dropdown-toggle" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit()">
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
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    @yield('scripts')
</body>

</html>
