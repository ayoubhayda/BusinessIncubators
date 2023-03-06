@extends('layouts.admin')
@section('title', 'Employés')
@section('content')
    <div class="add mt-4 mb-3 d-flex justify-content-center align-items-center">
        <a href={{ route('employees.create',['building' => $building->id, 'floor' => $floor->id, 'office' => $office->id,'company' => $company->id])}} class="material-symbols-outlined">Add</a>
    </div>
    <div class="content mt-4 d-flex justify-content-center">
        <div class="container-fluid row d-flex justify-content-between">
            @foreach ($employees as $employee)
                <div class="card col-4 mb-4">
                    <div class="card-header"></div>
                    <div class="cintainer d-flex justify-content-center">
                        <div class="card-img rounded-circle mt-2 d-flex justify-content-center alighn-items-center">
                            <img src={{ url('images/' . $employee->image) }} class="img-fluid card-logo"
                                style="border-radius: 50%; " />
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h4 class="mb-2 card-title ">{{ $employee->first_name." ".$employee->last_name}}</h4>
                        <div class="card-text">
                            <table class="table table-bordered ">
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $employee->email }}</td>
                                </tr>
                                <tr>
                                    <td>Tele</td>
                                    <td>{{ $employee->phone }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="mt-4 mb-2 justify-content-center">
                            <a href="{{ route('employees.show', ['building' => $building->id, 'floor' => $floor->id, 'office' => $office->id, 'company' => $company->id,'employee' => $employee->id]) }}"
                                class="btn btn-E">Voir les détails</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
