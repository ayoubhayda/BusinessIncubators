<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;



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
    public function store(Request $request)
    {
        $request->validate([
            'new-user-name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'new-user-password' => ['required', 'string', 'min:8'],
        ]);
        $user = new User();
        $user->name = strip_tags($request->input('new-user-name'));
        $user->email = strip_tags($request->input('email'));
        $user->password = Hash::make($request->input('new-user-password'));
        $user->save();
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
    public function update(Request $request, $user)
    {
        $request->validate([
            'user-name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'user-password' => ['required', 'string', 'min:8'],
        ]);
        $toUpdate = User::findOrFail($user);
        $toUpdate->name = strip_tags($request->input('user-name'));
        $toUpdate->email = strip_tags($request->input('email'));
        $toUpdate->password = Hash::make($request->input('user-password'));
        $toUpdate->save();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user)
    {
        $toDelete = User::findOrFail($user);
        $toDelete->delete();
        return redirect()->route('users.index');
    }
}
