<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\City;
use Illuminate\Http\Request;


class CitiesController extends Controller
{
    public function index()
    {
        return view('cities.index',[
            'cities' => City::all()
        ]
        );
    }
    public function create()
    {
        return view('cities.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'new-city-name' => ['required','string']
        ]);
        $city = new City();
        $city->name = strip_tags($request->input('new-city-name'));
        $city->slug = Str::slug($city->name);
        $city->save();
        return redirect()->route('cities.index');
    }
    public function show($city)
    {
        //
    }
    public function edit($city)
    {
       return view('cities.index');
    }
    public function update(Request $request, $city)
    {
        $request->validate([
            'city-name' => ['required','string'],
        ]);
        $toUpdate = City::findOrFail($city);
        $toUpdate->name = strip_tags($request->input('city-name'));
        $toUpdate->slug = Str::slug($toUpdate->name);
        $toUpdate->save();
        return redirect()->route('cities.index');
    }
    public function destroy($city)
    {
        $toDelete = City::findOrFail($city);
        $toDelete->delete();
        return redirect()->route('cities.index');
    }
}
