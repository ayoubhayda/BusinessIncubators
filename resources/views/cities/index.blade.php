@extends('layout')
@section('content')
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
    </div>
@endsection
