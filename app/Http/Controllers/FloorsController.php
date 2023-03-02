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
/*         return view('admin.buildings.create')
        ->with('cities', City::all());
 */    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
/*         $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'city'=>'required',
            'logo'=>'required|mimes:jpg,png,jped|max:548',
            'address'=>'required',
        ]);
        $slug = Str::of($request->name)->slug('-');
        $newImageName = uniqid().'-'.$slug.'.'.$request->logo->extension();
        $request->logo->move(public_path('images'),$newImageName);

        Building::create([
            'name' => $request->input('name'), 
            'address' => $request->input('address'),
            'phone' => $request->input('phone'), 
            'logo' => 'images/'.$newImageName, 
            'city_id' => $request->input('city')
        ]);

        return redirect()->route('buildings.index');
 */    }

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
/*         return view('admin.buildings.edit')
        ->with('building', Building::findOrFail($building))
        ->with('cities', City::all());
 */    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
/*         $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'city'=>'required',
            'logo'=>'required|mimes:jpg,png,jped|max:548',
            'address'=>'required',
        ]);
        $slug = Str::of($request->name)->slug('-');
        $newImageName = uniqid().'-'.$slug.'.'.$request->logo->extension();
        $request->logo->move(public_path('images'),$newImageName);

        Building::where('id',$id)
        ->update([
            'name' => $request->input('name'), 
            'address' => $request->input('address'),
            'phone' => $request->input('phone'), 
            'logo' => 'images/'.$newImageName, 
            'city_id' => $request->input('city')
        ]);

        return redirect()->route('buildings.index');
 */    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
/*         Building::where('id',$id)->delete();
        return redirect()->route('buildings.index');
 */    }
}
