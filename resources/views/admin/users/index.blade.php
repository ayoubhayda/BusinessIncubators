@extends('layouts.layout')
@section('title','Utilisateurs')
@section('content')
    <div class="conatiner-fluid d-flex justify-content-center">
        <div class="mt-4">
            <table class="table text-center usersTable">
                <thead>
                    <tr>
                        <th >Nom</th>
                        <th >Email</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <div class="text-center">
                                <a href="#updateModal{{$user->id}}" class="link upt-link btn btn-u" data-bs-toggle="modal">Modifier</a>
                            </div>                    
                        </td>
                        <td class="pt-2">
                            <form action="{{route('users.destroy',['user'=>$user->id])}}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <input type="submit"  onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?')"  class="link dlt-link btn btn-d" value="Supprimer">
                            </form>            
                        </td>
                    </tr>               
                    <div class="modal fade" id="updateModal{{$user->id}}" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateModalLabel">Modifier les information de l'utilisateur</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('users.update',['user'=>$user->id])}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <label for="name" class="form-label">Nom</label>
                                            <input type="text" class="form-control" id="name" name ="name" value="{{$user->name}}" required>
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="email" name ="email" value="{{$user->email}}" required>
                                            <label for="password" class="form-label">Mot de passe</label>
                                            <input type="password" class="form-control" id="password" name ="password" value="{{$user->password}}" required>
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
                            <h5 class="modal-title" id="addModalLabel">Ajouter un utilisateur</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="add-user-form" action="{{route('users.store')}}" method="POST">
                                @csrf
                                @method('POST')
                                    <label for="name" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="name" name ="name" value="{{old('name')}}" required>
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name ="email" value="{{old('email')}}" required>
                                    <label for="password" class="form-label">Mot de passe</label>
                                    <input type="password" class="form-control" id="password" name ="password" value="{{old('password')}}" required>
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
    <script src="{{url('javascript/users.js')}}"></script>
@endsection
 --}}