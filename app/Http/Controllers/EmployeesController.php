<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeStore;
use App\Http\Requests\EmployeeUpdate;
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

class EmployeesController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Building $building, Floor $floor, Office $office, Company $company)
    {
        $this->authorizeUser($building);
        return view('admin.employees.index')
            ->with(['building' => $building, 'floor' => $floor, 'office' => $office, 'company' => $company, 'employees' => $company->employees]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Building $building, Floor $floor, Office $office, Company $company)
    {
        $this->authorizeUser($building);
        return view('admin.employees.create')
            ->with(['building' => $building, 'floor' => $floor, 'office' => $office, 'company' => $company, 'positions' => Position::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeStore $request, Building $building, Floor $floor, Office $office, Company $company)
    {
        $this->authorizeUser($building);
        $validatedData = $request->validated();
        $slug = uniqid() . Str::slug($validatedData['first_name'] . ' ' . $validatedData['last_name'], '-') . '.' . $validatedData['image']->extension();
        $validatedData['image']->move(public_path('images'), $slug);
        $validatedData['image'] = $slug;
        Employee::create(array_merge($validatedData, ['company_id' => $company->id]));
        return redirect()->route('employees.index', compact('building', 'floor', 'office', 'company'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Building $building, Floor $floor, Office $office, Company $company, Employee $employee)
    {
        $this->authorizeUser($building);
        return view('admin.employees.show')
            ->with(['building' => $building, 'floor' => $floor, 'office' => $office, 'company' => $company, 'employee' => $employee, 'position' => $employee->position]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Building $building, Floor $floor, Office $office, Company $company, Employee $employee)
    {
        $this->authorizeUser($building);
        return view('admin.employees.edit')
            ->with(['building' => $building, 'floor' => $floor, 'office' => $office, 'company' => $company, 'employee' => $employee, 'positions' => Position::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeUpdate $request, Building $building, Floor $floor, Office $office, Company $company, Employee $employee)
    {
        $this->authorizeUser($building);
        $validatedData = $request->validated();

        $full_name = $request->first_name . " " . $request->last_name;
        if ($request->hasFile('logo')) {
            $slug = uniqid() . '-' . Str::slug($full_name) . '.' . $validatedData['image']->extension();
            $validatedData['image']->storeAs('public/images', $slug);
            $validatedData['image'] = $slug;
        }

        $employee->update(array_merge($validatedData, ['company_id' => $company->id]));

        return redirect()->route('employees.show', compact('building', 'floor', 'office', 'company', 'employee'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Building $building, Floor $floor, Office $office, Company $company, Employee $employee)
    {
        $this->authorizeUser($building);
        $employee->delete();
        return redirect()->route('employees.index', ['building' => $building, 'floor' => $floor, 'office' => $office, 'company' => $company]);
    }
}