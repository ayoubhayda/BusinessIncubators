<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />    <link rel="stylesheet" href="{{url('css/style.css')}}">  
    <title>Connectez-vous</title>
</head>
<body class="d-flex flex-column min-vh-100">
    <img class="loginLogo" src="{{url('images/logo.png')}}" alt="">
        <div class="container d-flex justify-content-center ">
            <form action="login.php" class="p-3 rounded-3 login p-4" method="post">
                <h5 class="text-center mb-4">Se connecter</h5>
                <div class="mb-4">
                    <label for="username" class="form-label">Nom d'utilisateur</label>
                    <div class="input-group">
                        <span class="input-group-text"> <i class="material-symbols-rounded icon">person</i> </span>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Nom d'utilisateur">
                    </div>
                </div>
                <div class="mb-2">
                    <label for="password" class="form-label">Mot de passe</label>
                    <div class="input-group">
                        <span class="input-group-text"> <i class="material-symbols-rounded icon">lock_person</i> </span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
                    </div>
                </div>
                <div class="mb-4">
                    <input type="checkbox" class="form-check-input" name="remember_me" id="remember_me">
                    <label for="remember_me" class="form-check-label"> Se souvenir de moi </label>
                </div>
                <button type="submit" class="btn">Connexion</button>
            </form>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
