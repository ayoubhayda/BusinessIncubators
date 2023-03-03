@extends('layouts.layout')
@section('title','Postes')
@section('styles')
{{--    styles for this page--}}
@endsection
@section('content')
    <div class="conatiner-fluid d-flex justify-content-center">
        <div class="mt-4">
            <table class="table text-center positionsTable">
                <thead>
                    <tr>
                        <th >Nom</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($positions as $position)
                    <tr>
                        <td>{{$position->name}}</td>
                        <td>
                            <div class="text-center">
                                <a href="#updateModal{{$position->id}}" class="link upt-link btn btn-u" data-bs-toggle="modal">Modifier</a>
                            </div>
                        </td>
                        <td class="pt-2">
                            <form action="{{route('positions.destroy',['position'=>$position->id])}}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <input type="submit" onclick="return confirm('Voulez-vous vraiment supprimer ce poste ?')" class="link dlt-link btn btn-d" value="Supprimer">
                            </form>
                        </td>
                    </tr>
                    <div class="modal fade" id="updateModal{{$position->id}}" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateModalLabel">Modifier le nom du poste</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('positions.update',['position'=>$position->id])}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <label for="position-name" class="form-label">Nom du poste</label>
                                        <input type="text" class="form-control" id="position-name" name ="name" value="{{$position->name}}" required>
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
                            <h5 class="modal-title" id="addModalLabel">Ajouter un poste</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="add-position-form" action="{{route('positions.store')}}" method="POST">
                                @csrf
                                @method('Post')
                                <label for="new-position-name" class="form-label">Nom du poste</label>
                                <input type="text" class="form-control" id="new-position-name" name ="name" value="{{old('name')}}" required>
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
    <script src="{{url('javascript/positions.js')}}"></script>
@endsection
 --}}