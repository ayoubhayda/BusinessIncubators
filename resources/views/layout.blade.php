<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <title>@yield('title')</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img class="logo" src="{{ url('images/logo.png') }}"
                    alt=""></a>
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
                    <a class="nav-link" href="{{route('account.index')}}">Profile</a>
                </li>
            </ul>
            <a class="btn btn-primary" href="#">Déconexion</a>
        </div>
    </nav>
    <div>
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
