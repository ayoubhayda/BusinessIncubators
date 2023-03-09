<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected function authorizeUser($building)
    {
        $admin = Auth::user();
        if ($admin->role == 0 && !$admin->buildings->contains($building)) {
            abort(403, 'Unauthorized action');
        }
    }
}
