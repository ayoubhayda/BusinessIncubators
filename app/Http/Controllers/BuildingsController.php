<?php

namespace App\Http\Controllers;
use App\Http\Requests\BuildingRequest;
use Illuminate\Support\Str;
use App\Models\Building;
use App\Models\City;
use App\Models\User;
use App\Models\Floor;
use Auth;

class BuildingsController extends Controller
{
    public function index()
    {
        $admin = Auth::user();
        $buildings = $admin->role == 1? Building::all():$admin->buildings;
        return view('admin.buildings.index')
        ->with('buildings', $buildings)
        ->with('admin', $admin);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.buildings.create')
        ->with('cities', City::all())
        ->with('users', User::where('role', 0)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BuildingRequest $request)
    {
        $request->validated();
        $slug = uniqid().Str::of($request->name)->slug('-').".".$request->logo->extension();
        $building = Building::create($request->except(['logo','user_id']) + ['logo' => $slug]);
        $building->users()->attach($request->user_id);
        $request->logo->move(public_path('images'), $slug);
        return redirect()->route('buildings.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($building) 
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Building $building) 
    {
        $admin = Auth::user();
        return view('admin.buildings.edit')
        ->with('building', $building)
        ->with('cities', City::all())
        ->with('users', User::where('role', 0)->get())
        ->with('admin', $admin);
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