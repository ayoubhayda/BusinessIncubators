<?php

namespace App\Http\Controllers;
use App\Http\Requests\PositionStore;
use App\Http\Requests\PositionUpdate;
use App\Models\Position;


class PositionsController extends Controller
{
    public function index()
    {
        return view('admin.positions.index',[
            'positions' => Position::all()
        ]
        );
    }
    public function create()
    {
        return view('admin.positions.index');
    }
    public function store(PositionStore $request)
    {
        $request->validated();
        Position::create($request->all());
        return redirect()->route('positions.index');
    }
    public function show($position)
    {
        //
    }
    public function edit($position)
    {
       return view('admin.positions');
    }
    public function update(PositionUpdate $request,Position $position)
    {
        $request->validated();
        $position->update($request->all());
        return redirect()->route('positions.index');
    }
    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route('positions.index');
    }
}
