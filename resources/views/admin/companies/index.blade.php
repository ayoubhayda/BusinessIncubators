@extends('layouts.admin')
@section('title', 'Entreprises')
@section('content')
    <div class="add mt-4 mb-3 d-flex justify-content-center align-items-center">
        <a href={{ route('companies.create',['building' => $building->id, 'floor' => $floor->id, 'office' => $office->id])}} class="material-symbols-outlined">Add</a>
    </div>
    <div class="content mt-4 d-flex justify-content-center">
        <div class="container-fluid row d-flex justify-content-between">
            @foreach ($companies as $company)
                <div class="card col-4 mb-4">
                    <div class="card-header"></div>
                    <div class="cintainer d-flex justify-content-center">
                        <div class="card-img rounded-circle mt-2 d-flex justify-content-center alighn-items-center">
                            <img src={{ url('images/' . $company->logo) }} class="img-fluid card-logo"
                                style="border-radius: 50%; " />
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h4 class="mb-2 card-title ">{{ $company->name }}</h4>
                        <div class="mb-4 pb-2 h4"> {{ $company->slogan }} </div>
                        <div class="d-flex justify-content-between text-center mt-3 mb-2">
                            <div>
                                <p class="mb-2">{{ $company->meta_description }}</p>
                            </div>
                        </div>
                        <div class="mt-4 mb-2 justify-content-center">
                            <a href="{{ route('companies.show', ['building' => $building->id, 'floor' => $floor->id, 'office' => $office->id, 'company' => $company->id]) }}"
                                class="btn btn-E">Voir les détails</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
