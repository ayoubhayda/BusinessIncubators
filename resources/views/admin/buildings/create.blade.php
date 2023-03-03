@extends('layouts.layout')
@section('title', 'Ajouter un immeuble')
@section('content')
    <div class=" container mt-4">
        <div class="form-immeuble row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        ajouter un immeuble
                    </div>
                    <div class="card-body">
                        <form action="{{ route('buildings.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom d'immeuble</label>
                                <input type="text" class="form-control" placeholder="Nom d'immeuble" name="name">
                                @error('name')
                                    <span class="small text-danger">* {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row mb-3 mt-1">
                                <div class="col">
                                    <label for="phone" class="form-label">Numéro de téléphone</label>
                                    <input type="tel" class="form-control" placeholder="Numéro de téléphone"
                                        name="phone">
                                    @error('phone')
                                        <span class="small text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="user_id" class="form-label">Utilisateur</label>
                                    <select id="user_id" name="user_id" class="dropdown form-select">
                                            <option disabled selected hidden>Sélectionnez un Utilisateur</option>
                                            @foreach ($users as $user)
                                                <option value={{$user->id}}>{{$user->name}}</option>
                                            @endforeach
                                      </select>
                                </div>
                            </div>
                            <div class="row mb-3 mt-3">
                                <div class="col">
                                    <label for="city" class="form-label">Ville</label>
                                    <select id="city" name="city" class="dropdown btn-file form-select">
                                            <option>Sélectionnez une ville</option>
                                            @foreach ($cities as $city)
                                                <option value={{$city->id}}>{{$city->name}}</option>
                                            @endforeach
                                      </select>
                                </div>
                                <div class="col">
                                    <label for="logo" class="form-label">Logo</label>
                                    <div class="input-group form-control p-0">
                                        <input id="upload" type="file" onchange="readURL(this)" name="logo"
                                            class="form-control border-0">
                                        <label id="upload-label" for="upload"
                                            class="font-weight-light text-muted ">Choisir le fichier</label>
                                        <div class="input-group-append">
                                            <label for="upload" class="btn btn-file">Parcourir</label>
                                        </div>
                                    </div>
                                    @error('logo')
                                        <span class="small text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="address" class="form-label">Adresse</label>
                                <textarea name="address" id="address" class="form-control" cols="30" rows="2"
                                    placeholder="Entrez l'adresse du d'immeuble"></textarea>
                                @error('address')
                                    <span class="small text-danger">* {{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-submit mb-1 mt-3">ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ url('javascript/buildings.js') }}"></script>
@endsection
