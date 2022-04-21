<?php
namespace App\Http\Middleware;

use Closure;
use Route;
use Illuminate\Support\Facades\Auth;

class AccessControlList
{
    public function handle($request, Closure $next)
    {
        if (!Auth::user()->can(Route::currentRouteName())) {
            abort(401);
        }

        return $next($request);
    }    
}