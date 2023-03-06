<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Building;
use App\Models\Company;
use App\Models\Floor;
use App\Models\Office;
use App\Models\Employee;
use App\Models\Position;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Building $building, Floor $floor,Office $office, Company $company)
    {
        return view('admin.employees.index')
        ->with(['building' => $building, 'floor' =>  $floor,'office' =>  $office, 'company'=> $company, 'employees'=> $company->employees]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Building $building, Floor $floor,Office $office, Company $company)
    {
        return view('admin.employees.create')
        ->with(['building' => $building, 'floor' =>  $floor, 'office' =>  $office, 'company'=> $company, 'positions' => Position::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request,Building $building, Floor $floor,Office $office,Company $company)
    {
        $request->validated();
        $full_name = $request->first_name ." ". $request->last_name;
        $slug = uniqid().Str::of($full_name)->slug('-').".".$request->image->extension();
        $request->image->move(public_path('images'),  $slug);
        Employee::create($request->except(['image']) + ['company_id' => $company->id,'image'=>$slug]);
        return redirect()->route('employees.index',['building' => $building, 'floor' =>  $floor, 'office' =>  $office, 'company'=>$company]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Building $building, Floor $floor,Office $office,Company $company,Employee $employee) 
    {
        return view('admin.employees.show')
        ->with(['building' => $building, 'floor' =>  $floor, 'office' =>  $office, 'company'=> $company,'employee'=> $employee, 'position' => $employee->position]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Building $building, Floor $floor,Office $office,Company $company,Employee $employee)
    {
        return view('admin.employees.edit')
        ->with(['building' => $building, 'floor' =>  $floor, 'office' =>  $office, 'company'=> $company, 'employee'=> $employee, 'positions'=>Position::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request,Building $building, Floor $floor,Office $office,Company $company,Employee $employee)
    {
        $request->validated();
        $full_name = $request->first_name ." ". $request->last_name;
        $slug = uniqid().Str::of($full_name)->slug('-').".".$request->image->extension();
        $request->image->move(public_path('images'),  $slug);
        $employee->update($request->except(['image']) + ['company_id' => $company->id,'image'=>$slug]);
        return redirect()->route('employees.show',['building' => $building, 'floor' =>  $floor, 'office' =>  $office, 'company'=> $company,'employee'=> $employee]);

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Building $building, Floor $floor,Office $office,Company $company,Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index',['building' => $building, 'floor' =>  $floor, 'office' =>  $office, 'company' =>  $company]);
    }
}
