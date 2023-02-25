<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <title>Connectez-vous</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <img class="loginLogo" src="{{ url('images/logo.png') }}" alt="">
    <div class="container d-flex justify-content-center ">
        <form method="POST" action="{{ route('login') }}" class="p-3 rounded-3 login p-4">
            @csrf
            <h5 class="text-center mb-4">Se connecter</h5>
            <div class="mb-4">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"> <i class="material-symbols-rounded icon">person</i> </span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-2">
                <label for="password" class="form-label">Mot de passe</label>
                <div class="input-group">
                    <span class="input-group-text"> <i class="material-symbols-rounded icon">lock_person</i> </span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" placeholder="Mot de passe" required autocomplete="current-password">
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-4 mt-2">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>
                <label for="remember_me" class="form-check-label"> Se souvenir de moi </label>
            </div>
            <button type="submit" class="btn">
                Connexion
            </button>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
