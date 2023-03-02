<?php

namespace App\Http\Controllers;
use App\Http\Requests\BuildingRequest;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Building;
use App\Models\City;

class BuildingsController extends Controller
{

    //______________________________________________________________
        
    //______________________________________________________________
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
    public function store(BuildingRequest $request): RedirectResponse
    {
        $request->validated();
        $slug = uniqid().Str::of($request->name)->slug('-').".".$request->logo->extension();
        Building::create($request->except(['logo']) + ['logo' => $slug]);
        $request->logo->move(public_path('images'), $slug);
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
    public function update(BuildingRequest $request,Building $building)
    {
        $request->validated();

        $slug = uniqid().Str::of($request->name)->slug('-').".".$request->logo->extension();
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