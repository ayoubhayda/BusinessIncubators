<?php

namespace App\Http\Controllers;
use App\Http\Requests\BuildingStore;
use App\Http\Requests\BuildingUpdate;
use Illuminate\Support\Str;
use App\Models\Building;
use App\Models\City;

class BuildingsController extends Controller
{
    public function index()
    {
        return view('admin.buildings.index')
        ->with('buildings', Building::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.buildings.create')
        ->with('cities', City::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BuildingStore $request)
    {
        $request->validated();
        $slug = Str::of($request->name)->slug('-');
        $imageName =uniqid().$slug.'.'.$request->logo->extension();
        $request->logo->move(public_path('images'), $imageName);
        Building::create($request->only(['name', 'phone', 'city_id', 'address']) + ['logo' => 'images/'.$imageName]);
        return redirect()->route('buildings.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $building) 
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Building $building) 
    {
        return view('admin.buildings.edit')
        ->with('building', $building)
        ->with('cities', City::all());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BuildingUpdate $request,Building $building)
    {
        $request->validated();
        $slug = uniqid().Str::of($request->name)->slug('-').'.'.$request->logo->extension();
        $request->logo->move(public_path('images'), $slug);
        $building->update($request->except(['logo']) + ['logo' => $slug]);
        return redirect()->route('buildings.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Building $building)
    {
        $building->delete();
        return redirect()->route('buildings.index');
    }
}