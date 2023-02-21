<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function login() {
        return view('login');
    }
    public function buildings() {
        return view('buildings.index');
    }
    public function domains() {
        return view('domains.index');
    }
    public function cities() {
        return view('cities.index');
    }
    public function account() {
        return view('account.index');
    }
}
