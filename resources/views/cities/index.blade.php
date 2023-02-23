@extends('layout')
@section('content')
    <div class="container-fluid row d-flex justify-content-between">
        <div class="card col-4">
            <div class="container-fluid">
                <img src="{{ url('images/logo1.png') }}" alt="" class="card-img-top">
                <div class="card-body">
                    <h3 class="card-title text-center mb-3">Tech Insider</h3>
                    <div class="card-text">
                        <table class="table table-bordered">
                            <tr>
                                <td>Ville</td>
                                <td>El Jadida</td>
                            </tr>
                            <tr>
                                <td>Adresse</td>
                                <td>Route Sidi Bouzid</td>
                            </tr>
                            <tr>
                                <td>Tele</td>
                                <td>+21267439285</td>
                            </tr>
                        </table>
                    </div>
                    <div class="row">
                        <a href="" class="btn btn-E col-12 mb-2">Étages</a>
                    </div>
                    <div class="row d-flex justify-content-between">
                        <a href="" class="btn btn-M col-5">Modifier</a>
                        <a href="" class="btn btn-S col-5">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('title','Villes')
@section('content')
    <div class="mt-4">
        <table class="table text-center citiesTable">
            <thead>
                <tr>
                    <th >Nom</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($cities as $city)
                <tr>
                    <td>{{$city['name']}}</td>
                    <td>
                        <div class="text-center">
                            <a href="#updateModal{{$city->id}}" class="link upt-link btn btn-u" data-bs-toggle="modal">Modifier</a>
                        </div>                    
                    </td>
                    <td class="pt-2">
                        <form action="{{route('cities.destroy',['city'=>$city->id])}}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="link dlt-link btn btn-d" value="Supprimer">
                        </form>            
                    </td>
                </tr>               
                <div class="modal fade" id="updateModal{{$city->id}}" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateModalLabel">Modifier le nom de la ville</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('cities.update',['city'=>$city->id])}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <label for="city-name" class="form-label">Nom de la ville</label>
                                    <input type="text" class="form-control" id="city-name" name ="city-name" value="{{$city['name']}}">
                                    @error('city-name')
                                        <span class="text-danger">* {{$message}}</span> 
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
                        <form action="{{route('cities.store')}}" method="POST">
                            @csrf
                            @method('POST')
                            <label for="new-city-name" class="form-label">Nom de la ville</label>
                            <input type="text" class="form-control" id="new-city-name" name ="new-city-name" value="{{old('city-name')}}">
                            @error('new-city-name')
                                <span class="text-danger">* {{$message}}</span> 
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
    <script src="{{url('javascript/cities.js')}}"></script>
@endsection
