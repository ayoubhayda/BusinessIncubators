<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function login() {
        return view('auth.login');
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
