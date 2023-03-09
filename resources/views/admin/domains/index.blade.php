@extends('layouts.admin')
@section('title', 'Domaines')
@section('domain','active')
@section('styles')
    {{--    styles for this page --}}
@endsection
@section('content')
    <div class="conatiner-fluid d-flex justify-content-center mt-4">
        <div class="mt-4">
            @if (Session::get('errors'))
                <div class="alert alert-danger alert-dismissable d-flex justify-content-between">
                    @foreach ($errors->all() as $message)
                        <div><strong>Erreur!</strong> {{ $message }}</div>
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            <table class="table text-center bodyTable">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($domains as $domain)
                        <tr>
                            <td>{{ $domain->name }}</td>
                            <td>
                                <div class="text-center">
                                    <a href="#updateModal{{ $domain->id }}" class="link upt-link btn btn-u"
                                        data-bs-toggle="modal">Modifier</a>
                                </div>
                            </td>
                            <td class="pt-2">
                                <form action="{{ route('domains.destroy', ['domain' => $domain->id]) }}" method="POST"
                                    style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit"
                                        onclick="return confirm('Voulez-vous vraiment supprimer ce domaine ?')"
                                        class="link dlt-link btn btn-d" value="Supprimer">
                                </form>
                            </td>
                        </tr>
                        <div class="modal fade" id="updateModal{{ $domain->id }}" tabindex="-1"
                            aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateModalLabel">Modifier le nom du domaine</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('domains.update', ['domain' => $domain->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <label for="domain-name" class="form-label">Nom du domaine</label>
                                            <input type="text" class="form-control" id="domain-name" name="name"
                                                value="{{ $domain->name }}" required>
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
                            <form id="add-domain-form" action="{{ route('domains.store') }}" method="POST">
                                @csrf
                                @method('POST')
                                <label for="new-domain-name" class="form-label">Nom du domaine</label>
                                <input type="text" class="form-control" id="new-domain-name" name="name"
                                    value="{{ old('name') }}" required>
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
