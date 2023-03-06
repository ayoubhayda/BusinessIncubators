<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Building;
use App\Models\Floor;
use App\Models\Office;
use App\Models\Domain;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Str;


class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Building $building, Floor $floor,Office $office)
    {
        return view('admin.companies.index')
        ->with(['building' => $building, 'floor' =>  $floor,'office' =>  $office, 'companies'=> $office->companies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Building $building, Floor $floor,Office $office)
    {
        return view('admin.companies.create')
        ->with(['building' => $building, 'floor' =>  $floor, 'office' =>  $office, 'domains' => Domain::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request,Building $building, Floor $floor,Office $office)
    {
        $request->validated();
        $slug_logo = uniqid().Str::of($request->name)->slug('-').".".$request->logo->extension();
        $request->logo->move(public_path('images'),  $slug_logo);
        $data = ['logo' => $slug_logo];
        if(!empty($request->video)){
            $slug_video = uniqid().Str::of($request->name)->slug('-')."."."mp4";
            $request->video->move(public_path('videos'), $slug_video);
            $data = ['logo' => $slug_logo, 'video' => $slug_video];
        }
        $company = Company::create($request->except(['logo','domain_id','video']) + $data + ['office_id' => $office->id]);
        $company->domains()->attach($request->domain_id);
        return redirect()->route('companies.index',['building' => $building, 'floor' =>  $floor, 'office' =>  $office]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Building $building, Floor $floor,Office $office,Company $company) 
    {
        return view('admin.companies.show')
        ->with(['building' => $building, 'floor' =>  $floor, 'office' =>  $office, 'company'=> $company, 'domains' => $company->domains]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Building $building, Floor $floor,Office $office,Company $company)
    {
        return view('admin.companies.edit')
        ->with(['building' => $building, 'floor' =>  $floor, 'office' =>  $office, 'company'=> $company, 'domains' => Domain::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request,Building $building, Floor $floor,Office $office,Company $company)
    {
        $request->validated();
        $slug_logo = uniqid().Str::of($request->name)->slug('-').".".$request->logo->extension();
        $request->logo->move(public_path('images'),  $slug_logo);
        $data = ['logo' => $slug_logo];
        if(!empty($request->video)){
            $slug_video = uniqid().Str::of($request->name)->slug('-')."."."mp4";
            $request->video->move(public_path('videos'), $slug_video);
            $data = ['logo' => $slug_logo, 'video' => $slug_video];
        }
        $company->update($request->except(['logo','video','domain_id']) + $data + ['office_id' => $office->id]);
        $company->domains()->attach($request->domain_id);
        return redirect()->route('companies.show',['building' => $building, 'floor' =>  $floor, 'office' =>  $office, 'company'=> $company]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Building $building, Floor $floor,Office $office,Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index',['building' => $building, 'floor' =>  $floor, 'office' =>  $office]);
    }
}