@extends('layouts.layout')
@section('title', 'New super')
@section('content')
    <div class=" container mt-5">
        <div class="form-immeuble row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Modi Immeuble
                    </div>
                    <div class="card-body">
                        <form action="{{ route('buildings.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3 mt-1">
                                <div class="col">
                                    <label for="name" class="form-label">Nom d'immeuble</label>
                                  <input type="text" class="form-control" placeholder="Nom d'immeuble" name="name">
                                </div>
                                <div class="col">
                                    <label for="phone" class="form-label">Numéro de téléphone</label>
                                  <input type="tel" class="form-control" placeholder="Numéro de téléphone" name="phone">
                                </div>
                              </div>
                              <div class="row mb-3 mt-3">
                                <div class="col">
                                    <label for="city" class="form-label">Ville</label>
                                    <select id="city" name="city" class="dropdown btn-file form-select">
                                            <option>Sélectionnez une ville</option>
                                            @foreach ($cities as $city)
                                                <option value={{$city['id']}}>{{$city['name']}}</option>
                                            @endforeach
                                      </select>
                                </div>

                                <div class="col">
                                    <label for="logo" class="form-label">
                                        Logo
                                    </label>
                                    <label class="form-label btn btn-file d-block">
                                        <span>Sélectionnez une image</span>
                                        <input type="file" name="logo" class="visually-hidden" id="customFile" />
                                    </label>
                                </div>
                              </div>
                            <div class="mb-3 mt-3">
                                <label for="address" class="form-label">Adresse</label>
                                <textarea name="address" id="address" class="form-control" cols="30" rows="2" placeholder="Entrez l'adresse du d'immeuble"></textarea>
                            </div>
                            <button type="submit" class="btn btn-submit mb-2 mt-3">Ajouter un immeuble</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
