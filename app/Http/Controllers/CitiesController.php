<?php

namespace App\Http\Controllers;
use App\Http\Requests\CityStore;
use App\Http\Requests\CityUpdate;
use App\Models\City;


class CitiesController extends Controller
{
    public function index()
    {
        return view('admin.cities.index',[
            'cities' => City::all()
        ]
        );
    }
    public function create()
    {
        return view('admin.cities.index');
    }
    public function store(CityStore $request)
    {
        $request->validated();
        City::create($request->all());
        return redirect()->route('cities.index');
    }
    public function show($city)
    {
        //
    }
    public function edit($city)
    {
       return view('admin.cities');
    }
    public function update(CityUpdate $request,City $city)
    {
        $request->validated();
        $city->update($request->all());
        return redirect()->route('cities.index');
    }
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index');
    }
}
