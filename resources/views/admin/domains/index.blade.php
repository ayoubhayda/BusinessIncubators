@extends('layouts.layout')
@section('title','Domaines norm')
@section('content')
    <div class="container-fluid d-flex justify-content-center">
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
    </div>
@endsection
