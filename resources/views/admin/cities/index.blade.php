@extends('layouts.admin')
@section('title', 'Villes')
@section('city','active')
@section('styles')
    {{--    styles for this page --}}
@endsection
@section('content')
    <div class="conatiner-fluid d-flex justify-content-center mt-4">
        <div class="mt-4">
            @if (Session::get('errors'))
            <div class="alert alert-danger alert-dismissable d-flex justify-content-between">
                @foreach ($errors->all() as $message)
                    <div><strong>Erreur!</strong> {{ $message }}</div>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
                            
            @endif
            <table class="table text-center bodyTable">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cities as $city)
                        <tr>
                            <td>{{ $city->name }}</td>
                            <td>
                                <div class="text-center">
                                    <a href="#updateModal{{ $city->id }}" class="link upt-link btn btn-u"
                                        data-bs-toggle="modal">Modifier</a>
                                </div>
                            </td>
                            <td class="pt-2">
                                <form action="{{ route('cities.destroy', ['city' => $city->id]) }}" method="POST"
                                    style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit"
                                        onclick="return confirm('Voulez-vous vraiment supprimer cette ville ?')"
                                        class="link dlt-link btn btn-d" value="Supprimer">
                                </form>
                            </td>
                        </tr>
                        <div class="modal fade" id="updateModal{{ $city->id }}" tabindex="-1"
                            aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateModalLabel">Modifier le nom de la ville</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('cities.update', ['city' => $city->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <label for="city-name" class="form-label">Nom de la ville</label>
                                            <input type="text" class="form-control" id="city-name" name="name"
                                                value="{{ $city->name }}" required>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-d"
                                                    data-bs-dismiss="modal">Annuler</button>
                                                <input type="submit" class="link btn btn-a  add-link" value="Modifier">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">
                            <div class="text-center">
                                <a href="#addModal" class="link btn btn-a" data-bs-toggle="modal">Ajouter</a>
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addModalLabel">Ajouter une ville</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="add-city-form" action="{{ route('cities.store') }}" method="POST">
                                @csrf
                                @method('Post')
                                <label for="new-city-name" class="form-label">Nom de la ville</label>
                                <input type="text" class="form-control" id="new-city-name" name="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="small text-danger">* {{ $message }}</span>
                                @enderror
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-d" data-bs-dismiss="modal">Annuler</button>
                                    <input type="submit" class="link btn btn-a" value="Ajouter">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
