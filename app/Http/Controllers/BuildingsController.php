<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuildingStore;
use App\Http\Requests\BuildingUpdate;
use Illuminate\Support\Str;
use App\Models\Building;
use App\Models\City;
use App\Models\User;
use Auth;

class BuildingsController extends AdminController
{

    public function index()
    {
        $admin = Auth::user();
        $buildings = $admin->role == 1 ? Building::all() : $admin->buildings;
        return view('admin.buildings.index', compact('buildings', 'admin'));
    }

    public function create()
    {
        $cities = City::all();
        $users = User::where('role', 0)->get();
        return view('admin.buildings.create', compact('cities', 'users'));
    }

    public function store(BuildingStore $request)
    {
        $validatedData = $request->validated();
        $slug = uniqid() . Str::slug($validatedData['name'], '-') . '.' . $validatedData['logo']->extension();
        $validatedData['logo']->move(public_path('images'), $slug);
        $validatedData['logo'] = $slug;
        $building = Building::create($validatedData);
        $building->users()->attach($validatedData['user_id']);
        return redirect()->route('buildings.index');
    }

    public function edit(Building $building)
    {
        $this->authorizeUser($building);
        $admin = Auth::user();
        $cities = City::all();
        $users = User::where('role', 0)->get();
        $selectedUserId = optional($building->users->first())->id;
        return view('admin.buildings.edit', compact('building', 'cities', 'users', 'admin', 'selectedUserId'));
    }

    public function update(BuildingUpdate $request, Building $building)
    {
        $this->authorizeUser($building);

        $validatedData = $request->validated();

        if ($request->hasFile('logo')) {
            $slug = uniqid() . '-' . Str::slug($validatedData['name']) . '.' . $validatedData['logo']->extension();
            $validatedData['logo']->storeAs('public/images', $slug);
            $validatedData['logo'] = $slug;
        }

        $building->update($validatedData);

        return redirect()->route('buildings.index');
    }


    public function destroy(Building $building)
    {
        $this->authorizeUser($building);
        $building->delete();
        return redirect()->route('buildings.index');
    }
}