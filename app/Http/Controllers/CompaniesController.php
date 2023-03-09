<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuildingStore;
use App\Http\Requests\BuildingUpdate;
use App\Http\Requests\CompanyStore;
use App\Http\Requests\CompanyUpdate;
use App\Models\Building;
use App\Models\Floor;
use App\Models\Office;
use App\Models\Domain;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Str;


class CompaniesController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Building $building, Floor $floor, Office $office)
    {
        $this->authorizeUser($building);
        return view('admin.companies.index')
            ->with(['building' => $building, 'floor' => $floor, 'office' => $office, 'companies' => $office->companies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Building $building, Floor $floor, Office $office)
    {
        $this->authorizeUser($building);
        return view('admin.companies.create')
            ->with(['building' => $building, 'floor' => $floor, 'office' => $office, 'domains' => Domain::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyStore $request, Building $building, Floor $floor, Office $office)
    {
        $this->authorizeUser($building);
        $request->validated();
        $slug_logo = uniqid() . Str::of($request->name)->slug('-') . "." . $request->logo->extension();
        $request->logo->move(public_path('images'), $slug_logo);
        $data = ['logo' => $slug_logo];
        if (!empty($request->video)) {
            $slug_video = uniqid() . Str::of($request->name)->slug('-') . "." . "mp4";
            $request->video->move(public_path('videos'), $slug_video);
            $data = ['logo' => $slug_logo, 'video' => $slug_video];
        }
        $company = Company::create($request->except(['logo', 'domain_id', 'video']) + $data + ['office_id' => $office->id]);
        $company->domains()->attach($request->domain_id);
        return redirect()->route('companies.index', ['building' => $building, 'floor' => $floor, 'office' => $office]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Building $building, Floor $floor, Office $office, Company $company)
    {
        $this->authorizeUser($building);
        return view('admin.companies.show')
            ->with(['building' => $building, 'floor' => $floor, 'office' => $office, 'company' => $company, 'domains' => $company->domains]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Building $building, Floor $floor, Office $office, Company $company)
    {
        $this->authorizeUser($building);
        $selectedDomainId = optional($company->domains->first())->id;
        $domains = Domain::all();
        return view('admin.companies.edit', compact('building', 'floor', 'office', 'company', 'selectedDomainId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyUpdate $request, Building $building, Floor $floor, Office $office, Company $company)
    {
        $this->authorizeUser($building);
        $validatedData = $request->validated();
        $data = [];

        if ($request->hasFile('logo')) {
            $slug_logo = uniqid() . '-' . Str::slug($validatedData['name']) . '.' . $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(public_path('images'), $slug_logo);
            $data['logo'] = $slug_logo;
        }

        if ($request->hasFile('video')) {
            $slug_video = uniqid() . '-' . Str::slug($validatedData['name']) . '.mp4';
            $request->file('video')->move(public_path('videos'), $slug_video);
            $data['video'] = $slug_video;
        }

        $company->update(array_merge($request->except(['logo', 'video', 'domain_id']), $data, ['office_id' => $office->id]));
        $company->domains()->attach($request->domain_id);

        return redirect()->route('companies.show', compact('building', 'floor', 'office', 'company'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Building $building, Floor $floor, Office $office, Company $company)
    {
        $this->authorizeUser($building);
        $company->delete();
        return redirect()->route('companies.index', ['building' => $building, 'floor' => $floor, 'office' => $office]);
    }
}