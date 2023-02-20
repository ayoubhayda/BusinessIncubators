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
    <title>Home</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img class="logo" src="{{ url('images/logo.png') }}"
                    alt=""></a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Villes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Immeubles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Domaines</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Paramétres</a>
                </li>
            </ul>
            <a class="btn btn-primary" href="#">Deconection</a>
        </div>
    </nav>
    <div class="content mt-4 d-flex justify-content-center">
        <div class="container-fluid row d-flex justify-content-between">
          <div class="card col-4">
            <div class="container-fluid">
              <img src="{{ url('images/logo1.png') }}" alt="" class="card-img-top">
            <div class="card-body">
                <h3 class="card-title text-center mb-3">Tech Insider</h3>
                <div class="card-text">
                    <table class="table table-bordered">
                        <tr>
                            <td>Ville</td>
                            <td>El Jadida</td>
                        </tr>
                        <tr>
                            <td>Adresse</td>
                            <td>Route Sidi Bouzid</td>
                        </tr>
                        <tr>
                            <td>Tele</td>
                            <td>+21267439285</td>
                        </tr>
                    </table>
                </div>
                <div class="row">
                    <a href="" class="btn btn-E col-12 mb-2">Étages</a>
                </div>
                <div class="row d-flex justify-content-between">
                    <a href="" class="btn btn-M col-5">Modifier</a>
                    <a href="" class="btn btn-S col-5">Supprimer</a>
                </div>
            </div>
            </div>
        </div>
        <div class="card col-4">
          <div class="container-fluid">
            <img src="{{ url('images/logo1.png') }}" alt="" class="card-img-top">
          <div class="card-body">
              <h3 class="card-title text-center mb-3">Tech Insider</h3>
              <div class="card-text">
                  <table class="table table-bordered">
                      <tr>
                          <td>Ville</td>
                          <td>El Jadida</td>
                      </tr>
                      <tr>
                          <td>Adresse</td>
                          <td>Route Sidi Bouzid</td>
                      </tr>
                      <tr>
                          <td>Tele</td>
                          <td>+21267439285</td>
                      </tr>
                  </table>
              </div>
              <div class="row">
                  <a href="" class="btn btn-E col-12 mb-2">Étages</a>
              </div>
              <div class="row d-flex justify-content-between">
                  <a href="" class="btn btn-M col-5">Modifier</a>
                  <a href="" class="btn btn-S col-5">Supprimer</a>
              </div>
          </div>
          </div>
      </div>
      <div class="card col-4">
        <div class="container-fluid">
          <img src="{{ url('images/logo1.png') }}" alt="" class="card-img-top">
        <div class="card-body">
            <h3 class="card-title text-center mb-3">Tech Insider</h3>
            <div class="card-text">
                <table class="table table-bordered">
                    <tr>
                        <td>Ville</td>
                        <td>El Jadida</td>
                    </tr>
                    <tr>
                        <td>Adresse</td>
                        <td>Route Sidi Bouzid</td>
                    </tr>
                    <tr>
                        <td>Tele</td>
                        <td>+21267439285</td>
                    </tr>
                </table>
            </div>
            <div class="row">
                <a href="" class="btn btn-E col-12 mb-2">Étages</a>
            </div>
            <div class="row d-flex justify-content-between">
                <a href="" class="btn btn-M col-5">Modifier</a>
                <a href="" class="btn btn-S col-5">Supprimer</a>
            </div>
        </div>
        </div>
    </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
