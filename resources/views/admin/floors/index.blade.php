@extends('layouts.layout')
@section('title','Étages')
@section('content')
    <div class="conatiner-fluid d-flex justify-content-center">
        <div class="mt-4">
            <table class="table text-center floorsTable">
                <thead>
                    <tr>
                        <th >Nom</th>
                        <th >Numéro</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($floors as $floor)
                    <tr>
                        <td>{{$floor['name']}}</td>
                        <td>{{$floor['order']}}</td>
                        <td>
                            <div class="text-center">
                                <a href="#updateModal{{$floor->id}}" class="link upt-link btn btn-u" data-bs-toggle="modal">Modifier</a>
                            </div>                    
                        </td>
                        <td class="pt-2">
                            <form action="{{route('floors.destroy',['floor'=>$floor->id])}}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="link dlt-link btn btn-d" value="Supprimer">
                            </form>            
                        </td>
                    </tr>               
                    <div class="modal fade" id="updateModal{{$floor->id}}" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateModalLabel">Modifier les information de l'étage</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('floors.update',['floor'=>$floor->id])}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <label for="floor-name" class="form-label">Nom</label>
                                            <input type="text" class="form-control" id="floor-name" name ="floor-name" value="{{$floor['name']}}">
                                            @error('floor-name')
                                                <span class="text-danger">* {{$message}}</span> <br>
                                            @enderror  
                                            <label for="floor-order" class="form-label">Numéro</label>
                                            <input type="number" class="form-control" id="floor-order" name ="floor-order" value="{{$floor['order']}}">
                                            @error('floor-order')
                                                <span class="text-danger">* {{$message}}</span> <br>
                                            @enderror  
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
                        <td colspan="4">
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
                            <form action="{{route('floors.store')}}" method="POST">
                                @csrf
                                @method('POST')
                                    <label for="new-floor-name" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="new-floor-name" name ="new-floor-name" value="{{old('new-floor-name')}}">
                                    @error('new-floor-name')
                                        <span class="text-danger">* {{$message}}</span> <br>
                                    @enderror  
                                    <label for="new-floor-order" class="form-label">Numéro</label>
                                    <input type="number" class="form-control" id="new-floor-order" name ="new-floor-order" value="{{old('new-floor-order')}}">
                                    @error('new-floor-order')
                                        <span class="text-danger">* {{$message}}</span> <br>
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
        <script src="{{url('javascript/floors.js')}}"></script>
    </div>
@endsection
