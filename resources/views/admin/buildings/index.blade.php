@extends('layouts.layout')
@section('title', 'Immeubles super')
@section('content')
    <div class="add mt-4 mb-3 d-flex justify-content-center align-items-center">
        <a href={{ route('buildings.create') }} class="material-symbols-outlined">Add</a>
    </div>
    <div class="content mt-4 d-flex justify-content-center">
        <div class="container-fluid row d-flex justify-content-between">
            @foreach ($buildings as $building)
                <div class="card col-4 mb-4">
                    <div class="card-header d-flex justify-content-center">
                        <div class="d-flex justify-content-center card-img">
                            <img src={{ url($building['logo']) }} alt="">
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="card-body">
                            <h3 class="card-title text-center mb-3">{{ $building['name'] }}</h3>
                            <div class="card-text">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Ville</td>
                                        <td>{{ $cities[$building['city_id'] - 1]['name'] }}</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Adresse</td>
                                        <td>{{ $building['address'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tele</td>
                                        <td>{{ $building['phone'] }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row d-flex justify-content-between mt-4 mb-2">
                                <a href="{{ route('buildings.edit', $building->id) }}" class="btn btn-M col-5">Modifier</a>
                                <a onclick="event.preventDefault();
                            document.getElementById('delete').submit()"
                                    class="btn btn-S col-5">Supprimer</a>
                                <form id="delete" action="{{ route('buildings.destroy', $building->id) }}" method="POST"
                                    class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
