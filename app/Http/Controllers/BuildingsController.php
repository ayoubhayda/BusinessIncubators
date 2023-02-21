<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BuildingsController extends Controller
{

    //______________________________________________________________
    private static function getData(){
        return(
            [
                ['id' => 1,'name' => 'Tech Insider','address' => 'Route Sidi Bouzid','phone' => '+212636754865','logo' => 'images/logo1.png','city' => 'El Jadida'],
                ['id' => 2,'name' => 'Aramco','address' => 'hay Salam','phone' => '+212746846792','logo' => 'images/logo1.png','city' => 'El Jadida'],
                ['id' => 3,'name' => 'Step Tech','address' => 'Saada','phone' => '+212691675342','logo' => 'images/logo1.png','city' => 'El Jadida']
            ]
            );
    }
        
    //______________________________________________________________
    public function index()
    {
        return view('buildings.index',[
            'buildings' => self::getData()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}
