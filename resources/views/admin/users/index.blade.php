@extends('layouts.admin')
@section('title', 'Utilisateurs')
@section('content')
    <div class="conatainer-fluid d-flex justify-content-center mt-4">
        <div class="mt-4">
            @if (Session::get('errors'))
                <div class="alert alert-danger alert-dismissable d-flex justify-content-between">
                    <ul>
                        @foreach ($errors->all() as $message)
                            <li><strong>Erreur!</strong> {{ $message }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            <table class="table text-center bodyTable">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div class="text-center">
                                    <a href="#updateModal{{ $user->id }}" class="link upt-link btn btn-u"
                                        data-bs-toggle="modal">Modifier</a>
                                </div>
                            </td>
                            <td class="pt-2">
                                <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST"
                                    style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit"
                                        onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?')"
                                        class="link dlt-link btn btn-d" value="Supprimer">
                                </form>
                            </td>
                        </tr>
                        <div class="modal fade" id="updateModal{{ $user->id }}" tabindex="-1"
                            aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateModalLabel">Modifier les information de
                                            l'utilisateur</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <label for="name" class="form-label">Nom</label>
                                            <input type="text" class="form-control mb-2" id="name" name="name"
                                                value="{{ $user->name }}" required>
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control mb-2" id="email" name="email"
                                                value="{{ $user->email }}" required>
                                            <label for="password" class="form-label">Mot de passe<span
                                                    class="text-muted">(min:8 caractères)</span></label>
                                            <input type="password" class="form-control mb-2" id="password" name="password"
                                                value="{{ $user->password }}" required>
                                            <label for="password_confirm" class="form-label">Confirmer le mot de
                                                passe</label>
                                            <input type="password" class="form-control mb-2" id="password_confirm"
                                                name="password_confirm" value="{{ $user->password_confirm }}" required>

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
                            <form id="add-user-form" action="{{ route('users.store') }}" method="POST">
                                @csrf
                                @method('POST')
                                <label for="name" class="form-label">Nom</label>
                                <input type="text" class="form-control mb-2" id="name" name="name"
                                    value="{{ old('name') }}" required>
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control mb-2" id="email" name="email"
                                    value="{{ old('email') }}" required>
                                <label for="password" class="form-label">Mot de passe <span class="text-muted">(min:8
                                        caractères)</span> </label>
                                <input type="password" class="form-control mb-2" id="password" name="password"
                                    value="{{ old('password') }}" required>
                                <label for="password_confirm" class="form-label">Confirmer le mot de passe</label>
                                <input type="password" class="form-control mb-2" id="password_confirm"
                                    name="password_confirm" value="{{ old('password_confirm') }}" required>
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
