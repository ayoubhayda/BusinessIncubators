@extends('layouts.layout')
@section('title','Bureaux')
@section('styles')
{{--    styles for this page--}}
@endsection
@section('content')
    <div class="conatiner-fluid d-flex justify-content-center">
        <div class="mt-4">
            <table class="table text-center officesTable">
                <thead>
                    <tr>
                        <th >Nom</th>
                        <th>Étage</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($offices as $office)
                    <tr>
                        <td>{{$office->name}}</td>
                        <td>{{$office->floor->name}}</td>

                        <td>
                            <div class="text-center">
                                <a href="#updateModal{{$office->id}}" class="link upt-link btn btn-u" data-bs-toggle="modal">Modifier</a>
                            </div>
                        </td>
                        <td class="pt-2">
                            <form action="{{route('offices.destroy',['office'=>$office->id])}}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <input type="submit" onclick="return confirm('Voulez-vous vraiment supprimer ce bureau ?')"  class="link dlt-link btn btn-d" value="Supprimer">
                            </form>
                        </td>
                    </tr>
                    <div class="modal fade" id="updateModal{{$office->id}}" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateModalLabel">Modifier le nom du bureau</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('offices.update',['office'=>$office->id])}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <label for="office-name" class="form-label">Nom du bureau</label>
                                        <input type="text" class="form-control" id="office-name" name ="name" value="{{$office->name}}" required>
                                        <label for="floor" class="form-label">Étage</label>
                                        <select id="floor" name="floor_id" class="dropdown form-select" value="{{ $office->floor_id }}">
                                            <option selected disabled hidden>Sélectionnez un étage</option>
                                            @foreach ($floors as $floor)
                                                @if ($floor->id == $office->floor_id)
                                                    <option value={{ $floor->id }} selected>{{ $floor->name }}</option>
                                                @else
                                                    <option value={{ $floor->id }}>{{ $floor->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <div class="row">
                                            <label for="is_rented" class="form-label">Disponible</label>
                                            <span class="col"><input type="radio" name="is_rented" id="is_rented" value="1" >Oui</span> 
                                            <span class="col"><input type="radio" name="is_rented" id="is_rented" value="0" >Non</span> 
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-d" data-bs-dismiss="modal">Annuler</button>
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
                            <h5 class="modal-title" id="addModalLabel">Ajouter un bureau</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="add-office-form" action="{{route('offices.store')}}" method="POST">
                                @csrf
                                @method('POST')
                                <label for="new-office-name" class="form-label">Nom du bureau</label>
                                <input type="text" class="form-control" id="new-office-name" name ="name" value="{{old('name')}}" required>
                                <label for="floor" class="form-label">Étage</label>
                                <select id="floor" name="floor_id" class="dropdown form-select">
                                    <option selected disabled hidden>Sélectionnez un étage</option>
                                    @foreach ($floors as $floor)
                                        <option value={{ $floor->id }}>{{ $floor->name }}</option>
                                    @endforeach
                                </select>
                                <div class="row">
                                    <label for="is_rented" class="form-label">Disponible</label>
                                    <span class="col"><input type="radio" name="is_rented" id="is_rented" value="1" >Oui</span> 
                                    <span class="col"><input type="radio" name="is_rented" id="is_rented" value="0" >Non</span> 
                                </div>

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
{{-- @section('scripts')
    <script src="{{url('javascript/offices.js')}}"></script>
@endsection
 --}}