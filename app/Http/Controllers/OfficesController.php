<?php

namespace App\Http\Controllers;
use App\Http\Requests\OfficeRequest;
use App\Models\Office;
use App\Models\Floor;

class OfficesController extends Controller
{
    public function index()
    {
        return view('admin.offices.index')
        ->with('offices', Office::all())
        ->with('floors', Floor::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.offices.index')
        ->with('floors', Floor::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfficeRequest $request)
    {
        $request->validated();
        Office::create($request->all());
        return redirect()->route('offices.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $office) 
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Office $office) 
    {
        return view('admin.offices.index')
        ->with('office', $office)
        ->with('floors', Floor::all());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OfficeRequest $request,Office $office)
    {
        $request->validated();
        $office->update($request->all());
        return redirect()->route('offices.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Office $office)
    {
        $office->delete();
        return redirect()->route('offices.index');
    }
}