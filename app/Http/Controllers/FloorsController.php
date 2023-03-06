<?php

namespace App\Http\Controllers;
use App\Http\Requests\FloorStore;
use App\Http\Requests\FloorUpdate;
use App\Models\Building;
use App\Models\Floor;

class FloorsController extends Controller
{
    public function index(Building $building)
    {
        return view('admin.floors.index')
        ->with('building', $building)
        ->with('floors', $building->floors);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Building $building)
    {
        return view('admin.floors.index')
        ->with('floors', $building->floors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FloorStore $request,Building $building)
    {
        $request->validated();
        Floor::create($request->all() + ['building_id'=> $building->id ]);
        return redirect()->route('floors.index', $building);
    }

    /**
     * Display the specified resource.
     */
    public function show(Building $building,Floor $floor) 
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Floor $floor,Building $building) 
    {
        return view('admin.floors.index')
        ->with('floors', $building->floors);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FloorUpdate $request,Building $building,Floor $floor)
    {
        $request->validated();
        $floor->update($request->all() + ['building_id'=> $building->id ]);
        return redirect()->route('floors.index', $building);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Building $building,Floor $floor)
    {
        $floor->delete();
        return redirect()->route('floors.index', ['building' => $building->id]); }
}