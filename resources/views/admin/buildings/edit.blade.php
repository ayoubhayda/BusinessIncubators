@extends('layouts.admin')
@section('title', "Modifier l'immeuble")
@section('content')
    <div class=" container mt-4">
        <div class="form-body row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Modifier l'immeuble
                    </div>
                    <div class="card-body">
                        <form action="{{ route('buildings.update', $building->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="name" class="form-label">Nom d'immeuble</label>
                                    <input type="text" class="form-control" value="{{ $building->name }}" placeholder="Nom d'immeuble" name="name">
                                    @error('name')
                                        <span class="small text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            @if ($admin->role == 1)
                            </div>
                            <div class="row mb-3 mt-1">
                            @endif
                                <div class="col">
                                    <label for="phone" class="form-label">Numéro de téléphone</label>
                                    <input type="tel" class="form-control" value="{{ $building->phone }}"
                                        placeholder="Numéro de téléphone" name="phone">
                                    @error('phone')
                                        <span class="small text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                                @if ($admin->role == 1)
                                <div class="col">
                                    <label for="user_id" class="form-label">Utilisateur</label>
                                    <select id="user_id" name="user_id" class="dropdown form-select">
                                        <option disabled selected hidden>Sélectionnez un Utilisateur</option>
                                        @foreach ($users as $user)
                                            @if ($user->id == $selectedUserId)
                                                <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                            @else
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <span class="small text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>                                
                                @endif
                            </div>
                            <div class="row mb-3 mt-3">
                                <div class="col">
                                    <label for="city_id" class="form-label">Ville</label>
                                    <select id="city_id" name="city_id" value="{{$building->city_id}}" class="dropdown form-select">
                                            <option disabled selected hidden>Sélectionnez une ville</option>
                                            @foreach ($cities as $city)
                                                @if ($city->id == $building->city_id)
                                                    <option value={{$city->id}} selected>{{$city->name}}</option>
                                                @else
                                                    <option value={{$city->id}}>{{$city->name}}</option>
                                                @endif
                                            @endforeach
                                      </select>
                                      @error('city_id')
                                        <span class="small text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <label for="logo" class="form-label">Logo</label>
                                    <div class="input-group form-control p-0">
                                        <input id="upload_logo" type="file" onchange="readURL(this)" name="logo"
                                            class="form-control border-0">
                                        <label id="upload-label_logo" for="upload_logo"
                                            class="font-weight-light text-muted ">Choisir le fichier</label>
                                        <div class="input-group-append">
                                            <label for="upload_logo" class="btn btn-file">Parcourir</label>
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
                                    placeholder="Entrez l'adresse du d'immeuble">{{ $building->address }}</textarea>
                                @error('address')
                                    <span class="small text-danger">* {{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-submit mb-2 mt-3">Modifier</button>
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
