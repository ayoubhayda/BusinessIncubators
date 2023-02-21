@extends('layout')
@section('title', 'index')
@section('content')
<div class="add m-5 d-flex justify-content-center align-items-center">
        <a href="" class="material-symbols-outlined">Add</a>
</div>
<div class="content mt-4 d-flex justify-content-center">
    <div class="container-fluid row d-flex justify-content-between">
        @foreach ($buildings as $building)
            <div class="card col-4 mb-4">
                <div class="container-fluid">
                    <img src={{url($building['logo'])}} alt="" class="card-img-top">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-3">{{$building['name']}}</h3>
                        <div class="card-text">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Ville</td>
                                    <td>{{$building['city']}}</td>
                                </tr>
                                <tr>
                                    <td>Adresse</td>
                                    <td>{{$building['address']}}</td>
                                </tr>
                                <tr>
                                    <td>Tele</td>
                                    <td>{{$building['phone']}}</td>
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
        @endforeach

    </div>
</div>
@endsection
