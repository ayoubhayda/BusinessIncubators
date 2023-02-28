@extends('layouts.layout')
@section('title', "Modifier l'immeuble")
@section('content')
    <div class=" container mt-5">
        <div class="form-immeuble row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Modifier Immeuble
                    </div>
                    <div class="card-body">
                        <form action="{{ route('buildings.update',$building->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3 mt-1">
                                <div class="col">
                                    <label for="name" class="form-label">Nom d'immeuble</label>
                                  <input type="text" class="form-control" value="{{$building->name}}" placeholder="Nom d'immeuble" name="name">
                                </div>
                                <div class="col">
                                    <label for="phone" class="form-label">Numéro de téléphone</label>
                                  <input type="tel" class="form-control" value="{{$building->phone}}" placeholder="Numéro de téléphone" name="phone">
                                </div>
                              </div>
                              <div class="row mb-3 mt-3">
                                <div class="col">
                                    <label for="city" class="form-label">Ville</label>
                                    <select id="city" name="city" value="{{$building->city_id}}" class="dropdown btn-file form-select">
                                            <option>Sélectionnez une ville</option>
                                            @foreach ($cities as $city)
                                                @if ($city->id == $building->city_id)
                                                    <option value={{$city['id']}} selected>{{$city['name']}}</option>
                                                @endif
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
                                <textarea name="address" id="address" class="form-control" cols="30" rows="2" placeholder="Entrez l'adresse du d'immeuble">{{$building->address}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-submit mb-2 mt-3">Modifier un immeuble</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
