@extends('layouts.admin')
@section('title', "Détails de l'entreprise")
@section('styles')
    {{--    styles for this page --}}
@endsection
@section('content')
    <div class="container show_company py-5">
        <div class="cards">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src ={{ url('images/'.$company->logo) }}
                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{$company->name}}</h5>
                            <p class="text-muted mb-1">{{$company->slgan}}</p>
                            <p class="text-muted mb-4">{{$company->meta_description}}</p>
                        </div>
                        <div class="container-fluid mb-3">
                            <div class="row">
                                <a href="{{$company->facebook}}" class="fa fa-facebook fa-lg col btn btn-M m-2"></a> <br>
                                <a href="{{$company->instagram}}" class="fa fa-instagram fa-lg col btn btn-M m-2"></a> <br>
                                <a href="{{$company->linkedin}}" class="fa fa-linkedin fa-lg col btn btn-M m-2"></a> <br>
                                <a href="{{$company->youtube}}" class="fa fa-youtube fa-lg col btn btn-M m-2"></a> <br>
                                <a href="{{$company->twitter}}" class="fa fa-twitter fa-lg col btn btn-M m-2"></a> <br>
                                <a href="{{$company->website}}" class="material-symbols-outlined col btn btn-M m-2">language</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nom</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$company->name}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Slogan</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$company->slogan}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">E-mail</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$company->email}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Téléphone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$company->phone}}</p>
                                </div>
                            </div>               
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Type</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$company->type}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Stade</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$company->stage}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Fondée le</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$company->founded_at}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row d-flex align-items-center">
                                <div class="col-sm-3">
                                    <p class="mb-0">Domaines</p>
                                </div>
                                <div class="col-sm-9">
                                    <ul class="mb-0 list-group list-group-horizontal" >
                                        @foreach ($domains as $domain)
                                            <li class="list-group-item text-muted">{{$domain->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Adresse</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$company->address}}</p>
                                </div>
                            </div>  
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Description</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$company->description}}</p>
                                </div>
                            </div>
                            
                            @if (!empty($company->video))
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <p class="mb-2">Video</p>
                                </div>
                                <iframe src={{url('videos/'.$company->video)}} title="video" allowfullscreen></iframe>
                            </div>
                            @endif
                            
                            <hr>
                            <div class="row mt-4">
                                <a href={{route('employees.index', ['building' => $floor->building->id, 'floor' => $floor->id, 'office' => $office->id, 'company' => $company->id])}} class="btn btn-E col m-2">Employees</a>
                                <a href={{ route('companies.edit', ['building' => $building->id, 'floor' => $floor->id, 'office' => $office->id, 'company' => $company->id]) }} class="btn btn-U col m-2">Modifier</a>
                                <button type="button" class="btn btn-S col m-2" data-bs-toggle="modal"
                                        data-bs-target="#myModal">Supprimer</button>
                                    <form id="delete" action={{route('companies.destroy', ['building' => $building->id, 'floor' => $floor->id, 'office' => $office->id, 'company' => $company->id]) }}
                                        method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <div class="modal" id="myModal">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    Voulez-vous vraiment supprimer cet entreprise ?
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
