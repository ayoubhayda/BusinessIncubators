<?php

use Closure;
use Illuminate\Http\Request;

class AuthorizeBuildingAccess
{
    public function handle(Request $request, Closure $next)
    {
        $admin = auth()->user();
        $building = $request->route('building');

        if ($admin->role == 0 && !$admin->buildings->contains($building)) {
            abort(403, 'Unauthorized action');
        }

        return $next($request);
    }
}
