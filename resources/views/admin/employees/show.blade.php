@extends('layouts.admin')
@section('title', "Détails de l'employé")
@section('styles')
    {{--    styles for this page --}}
@endsection
@section('content')
    <div class="container show_company py-5">
        <div class="cards">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-img text-center">
                                <img src ={{ url('images/'.$employee->image) }}
                                alt="avatar" class="rounded-circle img-fluid " style="width: 150px;">
                            </div>
                            <h5 class="my-3 text-center card-title employee-name">{{ $employee->first_name." ".$employee->last_name}}</h5>
                            <hr>
                            <p class="mt-2 h6">Date de naissance</p>
                            <p class="text-muted mb-1">{{$employee->birth_date}}</p>
                            <hr>
                            <p class="mt-2 h6">Carte d'Identité Nationale</p>
                            <p class="text-muted mb-4">{{$employee->cin}}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Prénom</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$employee->first_name}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nom</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$employee->last_name}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">E-mail</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$employee->email}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Téléphone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$employee->phone}}</p>
                                </div>
                            </div>               
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Spécialité</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$employee->speciality}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Poste</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$employee->position->name}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Biographie</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$employee->biography}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-4">
                                <a href={{ route('employees.edit', ['building' => $building->id, 'floor' => $floor->id, 'office' => $office->id, 'company' => $company, 'employee'=>$employee->id]) }} class="btn btn-U col m-2">Modifier</a>
                                <button type="button" class="btn btn-S col m-2" data-bs-toggle="modal"
                                        data-bs-target="#myModal">Supprimer</button>
                                    <form id="delete" action={{route('employees.destroy', ['building' => $building->id, 'floor' => $floor->id, 'office' => $office->id, 'company' => $company, 'employee'=>$employee->id]) }}
                                        method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <div class="modal" id="myModal">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    Voulez-vous vraiment supprimer cet employé ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Non</button>
                                                    <button
                                                        onclick="event.preventDefault();
                                                document.getElementById('delete').submit()"
                                                        class="btn btn-primary">Oui</button>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
