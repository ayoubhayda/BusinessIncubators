@extends('layout')
<<<<<<< HEAD
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
=======
@section('title','Domaines')
@section('content')
    <div class="mt-4">
        <table class="table text-center domainsTable">
            <thead>
                <tr>
                    <th >Nom</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($domains as $domain)
                <tr>
                    <td>{{$domain['name']}}</td>
                    <td>
                        <div class="text-center">
                            <a href="#updateModal{{$domain->id}}" class="link upt-link btn btn-u" data-bs-toggle="modal">Modifier</a>
                        </div>                    
                    </td>
                    <td class="pt-2">
                        <form action="{{route('domains.destroy',['domain'=>$domain->id])}}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="link dlt-link btn btn-d" value="Supprimer">
                        </form>            
                    </td>
                </tr>               
                <div class="modal fade" id="updateModal{{$domain->id}}" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateModalLabel">Modifier le nom du domaine</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('domains.update',['domain'=>$domain->id])}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <label for="domain-name" class="form-label">Nom du domaine</label>
                                    <input type="text" class="form-control" id="domain-name" name ="domain-name" value="{{$domain['name']}}">
                                    @error('domain-name')
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
                        <h5 class="modal-title" id="addModalLabel">Ajouter un domaine</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('domains.store')}}" method="POST">
                            @csrf
                            @method('POST')
                            <label for="new-domain-name" class="form-label">Nom du domaine</label>
                            <input type="text" class="form-control" id="new-domain-name" name ="new-domain-name" value="{{old('domain-name')}}">
                            @error('new-domain-name')
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
    <script src="{{url('javascript/domains.js')}}"></script>
>>>>>>> aedbe9b0fcec5aaa776815479065a86ffd22fc9c
@endsection
