@extends('layouts.admin')
@section('title','Étages')
@section('content')
    <div class="conatiner-fluid d-flex justify-content-center mt-4">
        <div class="mt-4">
            <table class="table text-center floorsTable">
                <thead>
                    <tr>
                        <th >Numéro</th>
                        <th >Nom</th>
                        <th colspan="3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($floors as $floor)
                    <tr>
                        <td>{{$floor->order}}</td>
                        <td>{{$floor->name}}</td>
                        <td>
                            <div class="text-center">
                                <a href="{{route('offices.index', ['building' => $building->id, 'floor' => $floor->id])}}" class="link upt-link btn btn-m">Bureaux</a>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <a href="#updateModal{{$floor->id}}" class="link upt-link btn btn-u" data-bs-toggle="modal">Modifier</a>
                            </div>
                        </td>
                        <td class="pt-2">
                            <button type="button" class="btn btn-d" data-bs-toggle="modal"
                                        data-bs-target="#myModal">Supprimer</button>
                                    <form id="delete" action="{{route('floors.destroy',['building' => $building->id, 'floor' => $floor->id])}}"
                                        method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <div class="modal" id="myModal">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    Voulez-vous vraiment supprimer cet étage ?
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
                        </td>
                    </tr>
                    <div class="modal fade" id="updateModal{{$floor->id}}" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateModalLabel">Modifier le nom de l'étage</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('floors.update',['building' => $building->id, 'floor' => $floor->id])}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <label for="floor-name" class="form-label">Nom d'étage</label>
                                        <input type="text" class="form-control" id="floor-name" name ="name" placeholder="Nom d'étage" value="{{$floor->name}}" required>
                                        <label for="floor-order" class="form-label mt-3">Numéro de l'étage</label>
                                        <input type="number" class="form-control" id="floor-order" name ="order" placeholder="Numéro de l'étage" value="{{$floor->order}}" required>
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
                        <td colspan="5">
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
                            <h5 class="modal-title" id="addModalLabel">Ajouter un étage</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="add-floor-form" action="{{route('floors.store',['building' => $building->id])}}" method="POST">
                                @csrf
                                @method('POST')
                                <label for="new-floor-name" class="form-label">Nom de l'étage</label>
                                <input type="text" class="form-control" id="new-floor-name" placeholder="Nom de l'étage" name ="name" value="{{old('name')}}" required>
                                <label for="new-floor-order" class="form-label mt-3">Numéro de l'étage</label>
                                <input type="number" class="form-control" id="new-floor-order" name ="order" placeholder="Numéro de l'étage" value="{{old('order')}}" required>
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
