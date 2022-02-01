<?php

namespace App\Http\Middleware;

use App\Models\Roles;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccessAuth
{
    public function handle(Request $request, Closure $next, string $role)
    {
        $level = Roles::where('role',$role)->first();

        if (Auth::user()->role_id == $level->id) {
            return $next($request);
        }
        abort(403);
    }
}
