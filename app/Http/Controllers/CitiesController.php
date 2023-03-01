<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


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
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','string','unique:cities']
        ]);
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
    public function update(Request $request,City $city)
    {
        $request->validate([
            'name' => ['required','string',Rule::unique('cities')->ignore($city)],
        ]);
        $city->update($request->all());
        return redirect()->route('cities.index');
    }
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index');
    }
}
