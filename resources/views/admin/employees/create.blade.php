@extends('layouts.admin')
@section('title', 'Ajouter un employé')
@section('content')
    <div class=" container mb-5 mt-5">
        <div class="form-body row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Ajouter un employé
                    </div>
                    <div class="card-body">
                        <form
                            action={{ route('employees.store', ['building' => $building->id, 'floor' => $floor->id, 'office' => $office->id, 'company' => $company->id]) }}
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <div class="col">
                                    <label for="first_name" class="form-label">Prénom</label>
                                    <input type="text" class="form-control" placeholder="Prénom"
                                        value="{{ old('first_name') }}" name="first_name">
                                    @error('first_name')
                                        <span class="small text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="last_name" class="form-label">Nom</label>
                                    <input type="text" class="form-control" placeholder="Nom"
                                        value="{{ old('last_name') }}" name="last_name">
                                    @error('last_name')
                                        <span class="small text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col">
                                    <label for="birth_date" class="form-label">Date de naissance</label>
                                    <input type="date" class="form-control" value="{{ old('birth_date') }}"
                                        name="birth_date">
                                    @error('birth_date')
                                        <span class="small text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="cin" class="form-label">CIN</label>
                                    <input type="text" class="form-control" value="{{ old('cin') }}" placeholder="CIN"
                                        name="cin">
                                    @error('cin')
                                        <span class="small text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" value="{{ old('email') }}"
                                        placeholder="exemple@gmail.com" name="email">
                                    @error('email')
                                        <span class="small text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="phone" class="form-label">Numéro de téléphone</label>
                                    <input type="tel" class="form-control" value="{{ old('phone') }}"
                                        placeholder="0500550005" name="phone">
                                    @error('phone')
                                        <span class="small text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="position_id" class="form-label">Poste</label>
                                <select id="position_id" name="position_id" class="dropdown form-select">
                                    <option disabled selected hidden>Sélectionnez un Poste</option>
                                    @foreach ($positions as $position)
                                        @if ($position->id == old('position_id'))
                                            <option value={{ $position->id }} selected>{{ $position->name }}</option>
                                        @else
                                            <option value={{ $position->id }}>{{ $position->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('position_id')
                                    <span class="small text-danger">* {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="speciality" class="form-label">Specialité</label>
                                    <input type="text" class="form-control" value="{{ old('speciality') }}"
                                        placeholder="Specialité" name="speciality">
                                    @error('speciality')
                                        <span class="small text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="image" class="form-label">Image</label>
                                    <div class="input-group form-control p-0">
                                        <input id="upload_image" type="file" onchange="readURL(this)" name="image"
                                            class="form-control border-0">
                                        <label id="upload-label_image" for="upload_image"
                                            class="font-weight-light text-muted ">Choisir le fichier</label>
                                        <div class="input-group-append">
                                            <label for="upload_image" class="btn btn-file">Parcourir</label>
                                        </div>
                                    </div>
                                    @error('image')
                                        <span class="small text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 ">
                                <label for="biography" class="form-label">Biographie</label>
                                <textarea name="biography" id="biography" class="form-control" cols="30" rows="5"
                                    placeholder="Entrez la biography de l'entreprise">{{ old('biography') }}</textarea>
                                @error('biography')
                                    <span class="small text-danger">* {{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-submit mb-2 mt-3">Ajouter</button>
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
