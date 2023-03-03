@extends('layouts.layout')
@section('title', 'Entreprises')
@section('content')
    <div class="add mt-4 mb-3 d-flex justify-content-center align-items-center">
        <a href={{ route('companies.create') }} class="material-symbols-outlined">Add</a>
    </div>
    <div class="content mt-4 d-flex justify-content-center">
        <div class="container-fluid row d-flex justify-content-between">
            @foreach ($companies as $company)
                <div class="card col-4 mb-4">
                    <div class="card-header d-flex justify-content-center">
                        <div class="d-flex justify-content-center card-img">
                            <img src={{ url('images/'.$company['logo']) }} alt="">
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="card-body">
                            <h3 class="card-title text-center mb-3">{{ $company->name }}</h3>
                            <div class="card-text">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Adresse</td>
                                        <td>{{ $company->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $company->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tele</td>
                                        <td>{{ $company->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">{{ $company->slogan }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row d-flex justify-content-between mt-4 mb-2">
                                <a href="{{ route('companies.show', $company->id) }}" class="btn btn-a col-5">Voir lles détails</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
