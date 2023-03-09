<?php

namespace App\Http\Controllers;

use App\Http\Requests\FloorStore;
use App\Http\Requests\FloorUpdate;
use App\Models\Building;
use App\Models\Floor;
use Illuminate\Http\Request;

class FloorsController extends AdminController
{
    public function index(Building $building)
    {
        $this->authorizeUser($building);
        return view('admin.floors.index')
            ->with('building', $building)
            ->with('floors', $building->floors);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Building $building)
    {
        $this->authorizeUser($building);
        return view('admin.floors.create')
            ->with('building', $building);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FloorStore $request, Building $building)
    {
        $this->authorizeUser($building);
        $validatedData = $request->validated();
        $validatedData['building_id'] = $building->id;

        Floor::create($validatedData);

        return redirect()->route('floors.index', $building);
    }

    /**
     * Display the specified resource.
     */
    public function show(Building $building, Floor $floor)
    {
        $this->authorizeUser($building);
        return view('admin.floors.show')
            ->with('building', $building)
            ->with('floor', $floor);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Building $building, Floor $floor)
    {
        $this->authorizeUser($building);
        return view('admin.floors.edit')
            ->with('building', $building)
            ->with('floor', $floor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FloorUpdate $request, Building $building, Floor $floor)
    {
        $this->authorizeUser($building);
        $validatedData = $request->validated();
        $validatedData['building_id'] = $building->id;

        $floor->update($validatedData);

        return redirect()->route('floors.index', $building);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Building $building, Floor $floor)
    {
        $this->authorizeUser($building);
        $floor->delete();

        return redirect()->route('floors.index', $building);
    }
}
