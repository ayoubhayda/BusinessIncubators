<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStore;
use App\Http\Requests\UserUpdate;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index',[
            'users' => User::where('role', 0)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStore $request)
    {
        $request->validated();
        $request->merge(['password' => bcrypt($request->password)]);
        $request->merge(['password_confirm' => bcrypt($request->password_confirm)]);
        User::create($request->all());
        return redirect()->route('users.index');

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
    public function edit($user)
    {
        return view('admin.users.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdate $request,User $user)
    {
        $request->validated();
        $request->merge(['password' => bcrypt($request->password)]);
        $request->merge(['password_confirm' => bcrypt($request->password_confirm)]);
        $user->update($request->all());
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
