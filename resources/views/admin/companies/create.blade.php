@extends('layouts.admin')
@section('title', "Ajouter une entreprise")
@section('content')
    <div class=" container mb-5 mt-5">
        <div class="form-body row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Ajouter une entreprise
                    </div>
                    <div class="card-body">
                        <form action={{ route('companies.store', ['building' => $building->id, 'floor' => $floor->id, 'office' => $office->id]) }} method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <div class="col">
                                    <label for="name" class="form-label">Nom de l'entreprise</label>
                                    <input type="text" class="form-control" placeholder="Nom de l'entreprise" value="{{ old('name') }}" name="name">
                                    @error('name')
                                            <span class="small text-danger">* {{ $message }}</span>
                                    @enderror    
                                </div>
                                <div class="col">
                                    <label for="visibility" class="form-label">Visibilité</label><br>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" id="visibiity" name="visibility" value={{1}} checked>
                                        <label class="form-check-label" for="visibility">Visible</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" id="visibility" name="visibility" value={{0}} {{old('visibility') ==0 ? "checked" : "" }}>
                                        <label class="form-check-label" for="visibility"> Non visible </label>
                                    </div>
                                    @error('visibility')
                                            <span class="small text-danger">* {{ $message }}</span>
                                    @enderror    
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col">
                                    <label for="type" class="form-label">Type de l'entreprise</label>
                                    <input type="text" class="form-control" placeholder="Type de l'entreprise" value="{{ old('type') }}" name="type">
                                    @error('type')
                                            <span class="small text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class=" col">
                                    <label for="stage" class="form-label">Stade de l'entreprise</label>
                                    <input type="text" class="form-control" placeholder="Stage de l'entreprise" value="{{ old('stage') }}" name="stage">
                                    @error('stage')
                                            <span class="small text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col">
                                    <label for="fonded_at" class="form-label">Date de création</label>
                                    <input type="date" class="form-control" value="{{ old('founded_at') }}" name="founded_at">
                                    @error('founded_at')
                                        <span class="small text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="slogan" class="form-label">Slogan de l'entreprise</label>
                                    <input type="text" class="form-control" value="{{ old('slogan') }}" placeholder="Slogan" name="slogan">
                                    @error('slogan')
                                        <span class="small text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                                <div class="mb-3">
                                <label for="address" class="form-label">Adresse</label>
                                <textarea name="address" id="address" class="form-control" cols="30" rows="2"
                                    placeholder="Entrez l'adresse de l'entreprise">{{ old('address') }}</textarea>
                                @error('address')
                                    <span class="small text-danger">* {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="domain_id" class="form-label">Domaine</label>
                                <select id="domain_id" name="domain_id" class="dropdown form-select select">
                                        <option disabled selected hidden>Sélectionnez un domaine</option>
                                        @foreach ($domains as $domain)
                                            @if ($domain->id == old('domain_id'))
                                                <option value={{$domain->id}} selected>{{$domain->name}}</option>
                                            @else
                                                <option value={{$domain->id}}>{{$domain->name}}</option>
                                            @endif
                                        @endforeach
                                  </select>
                                  @error('domain_id')
                                    <span class="small text-danger">* {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" value="{{ old('email') }}" placeholder="exemple@gmail.com" name="email">
                                    @error('email')
                                        <span class="small text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="phone" class="form-label">Numéro de téléphone</label>
                                    <input type="tel" class="form-control" value="{{ old('phone') }}" placeholder="0500550005" name="phone">
                                    @error('phone')
                                        <span class="small text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="video" class="form-label">Video</label>
                                    <div class="input-group form-control p-0">
                                        <input id="upload_video" type="file" onchange="readURL(this)" name="video"
                                            class="form-control border-0">
                                        <label id="upload-label_video" for="upload_video"
                                            class="font-weight-light text-muted ">Choisir le video</label>
                                        <div class="input-group-append">
                                            <label for="upload_video" class="btn btn-file">Parcourir</label>
                                        </div>
                                    </div>
                                    @error('video')
                                        <span class="small text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="logo" class="form-label">Logo</label>
                                    <div class="input-group form-control p-0">
                                        <input id="upload_logo" type="file" onchange="readURL(this)" name="logo"
                                            class="form-control border-0">
                                        <label id="upload-label_logo" for="upload"
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
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="website" class="form-label">Site web</label>
                                    <input type="text" class="form-control" value="{{ old('website') }}" placeholder="https://exemple.com" name="website">
                                    @error('website')
                                        <span class="small text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="facebook" class="form-label">Facebook</label>
                                    <input type="text" class="form-control" value="{{ old('facebook') }}"
                                    placeholder="Facebook" name="facebook">
                                    @error('facebook')
                                        <span class="small text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="instagram" class="form-label">Instagram</label>
                                    <input type="text" class="form-control" value="{{ old('instagram') }}"
                                    placeholder="instagram" name="instagram">
                                    @error('instagram')
                                        <span class="small text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="linkedin" class="form-label">Linkedin</label>
                                    <input type="text" class="form-control" value="{{ old('linkedin') }}"
                                    placeholder="Linkedin" name="linkedin">
                                    @error('linkedin')
                                        <span class="small text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="youtube" class="form-label">Youtube</label>
                                    <input type="text" class="form-control" value="{{ old('youtube') }}"
                                    placeholder="youtube" name="youtube">
                                    @error('youtube')
                                        <span class="small text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="twitter" class="form-label">Twitter</label>
                                    <input type="text" class="form-control" value="{{ old('twitter') }}"
                                    placeholder="twitter" name="twitter">
                                    @error('twitter')
                                        <span class="small text-danger">* {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 ">
                                <label for="meta_description" class="form-label">Meta description</label>
                                <textarea name="meta_description" id="meta_description" class="form-control" cols="30" rows="3"
                                    placeholder="Entrez la meta description de l'entreprise">{{ old('meta_description') }}</textarea>
                                @error('meta_description')
                                    <span class="small text-danger">* {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 ">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control" cols="30" rows="5"
                                    placeholder="Entrez la description de l'entreprise">{{ old('description') }}</textarea>
                                @error('descrition')
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
