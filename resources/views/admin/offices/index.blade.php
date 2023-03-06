@extends('layouts.admin')
@section('title','Bureaux')
@section('styles')
{{--    styles for this page--}}
@endsection
@section('content')
    <div class="conatiner-fluid d-flex justify-content-center mt-4">
        <div class="mt-4">
            <table class="table text-center officesTable">
                <thead>
                    <tr>
                        <th >Nom</th>
                        <th>Étage</th>
                        <th>Disponibilité</th>
                        <th colspan="3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($offices as $office)
                    <tr>
                        <td>{{$office->name}}</td>
                        <td>{{$office->floor->name}}</td>
                        <td>
                            @if ($office->is_rented == 0)
                                Disponible
                            @else
                                Non disponible
                            @endif
                        </td>
                        <td>
                            <div class="text-center">
                                <a href="{{route('companies.index', ['building' => $floor->building->id, 'floor' => $floor->id, 'office' => $office->id])}}" class="link upt-link btn btn-m">Entreprises</a>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <a href="#updateModal{{$office->id}}" class="link upt-link btn btn-u" data-bs-toggle="modal">Modifier</a>
                            </div>
                        </td>
                        <td class="pt-2">
                            <form action="{{route('offices.destroy', ['building' => $floor->building->id, 'floor'=>$floor->id, 'office'=>$office->id])}}" method="POST" style="display: inline-block">
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
                                    <form action="{{route('offices.update', ['building' => $floor->building->id, 'floor'=>$floor->id, 'office'=>$office->id])}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <label for="office-name" class="form-label ">Nom du bureau</label>
                                        <input type="text" class="form-control" id="office-name" name ="name" value="{{$office->name}}" required>
                                        <div>
                                            <label for="is_rented" class="form-label mt-3">Disponible</label>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="is_rented" name="is_rented" value={{$office->is_rented}}  {{$office->is_rented == 0 ? "checked" : "" }}>
                                                <label class="form-check-label" for="is_rented">Oui</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="is_rented" name="is_rented" value={{$office->is_rented}}  {{$office->is_rented == 1 ? "checked" : "" }}>
                                                <label class="form-check-label" for="is_rented"> Non </label>
                                            </div>
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
                        <td colspan="6">
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
                            <form id="add-office-form" action="{{route('offices.store', ['building' => $floor->building->id,'floor'=> $floor->id])}}" method="POST">
                                @csrf
                                @method('POST')
                                <label for="new-office-name" class="form-label">Nom du bureau</label>
                                <input type="text" class="form-control" id="new-office-name" name ="name" value="{{old('name')}}" required>
                                <div >
                                    <label for="is_rented" class="form-label mt-3">Disponible</label>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="is_rented" name="is_rented" value={{0}} checked>
                                        <label class="form-check-label" for="is_rented">Oui</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="is_rented" name="is_rented" value={{1}}>
                                        <label class="form-check-label" for="is_rented"> Non </label>
                                    </div>
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
