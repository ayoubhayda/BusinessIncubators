<?php

namespace App\Http\Controllers;
use App\Http\Requests\OfficeRequest;
use App\Models\Building;
use App\Models\Floor;
use App\Models\Office;

class OfficesController extends Controller
{
    public function index(Building $building, Floor $floor, Office $office)
    {
        return view('admin.offices.index')
        ->with('floor', $floor)
        ->with('offices', $floor->offices);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfficeRequest $request,Building $building,Floor $floor)
    {
        $request->validated();
        Office::create($request->all() + ['floor_id'=> $floor->id ]);
        return redirect()->route('offices.index', ['building'=> $building->id ,'floor' => $floor->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Floor $floor,Office $office) 
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Building $building,Office $office,Floor $floor) 
    {
        return view('admin.offices.index')
        ->with('offices', $floor->offices);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OfficeRequest $request,Building $building,Floor $floor,Office $office)
    {
        $request->validated();
        $office->update($request->all() + ['floor_id'=> $floor->id ]);
        return redirect()->route('offices.index', ['building' => $building->id ,'floor' => $floor->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Building $building,Floor $floor,Office $office)
    {
        $office->delete();
        return redirect()->route('offices.index', ['building'=> $building->id ,'floor' => $floor->id]); }
}