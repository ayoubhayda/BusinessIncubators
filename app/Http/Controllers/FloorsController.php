<?php

namespace App\Http\Controllers;
use App\Http\Requests\FloorRequest;
use App\Models\Building;
use App\Models\Floor;

class FloorsController extends Controller
{
    public function index()
    {
        return view('admin.floors.index')
        ->with('floors', Floor::all())
        ->with('buildings', Building::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.floors.index')
        ->with('floors', Floor::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FloorRequest $request)
    {
        $request->validated();
        Floor::create($request->all());
        return redirect()->route('floors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $floor) 
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Floor $floor) 
    {
        return view('admin.floors.index')
        ->with('floor', $floor)
        ->with('buildings', Building::all());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FloorRequest $request,Floor $floor)
    {
        $request->validated();
        $floor->update($request->all());
        return redirect()->route('floors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Floor $floor)
    {
        $floor->delete();
        return redirect()->route('floors.index');
    }
}