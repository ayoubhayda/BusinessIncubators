<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Building;
use App\Models\Floor;

class FloorsController extends Controller
{
    public function index()
    {
        return view('admin.floors.index')
        ->with('buildings', Floor::all())
        ->with('buildings', Building::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

  }

    /**
     * Display the specified resource.
     */
    public function show(string $id) 
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($building) 
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    }
}
