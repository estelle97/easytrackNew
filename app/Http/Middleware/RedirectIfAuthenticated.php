<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && Auth::user()->is_admin == 3) {
            return redirect()->route('easytrack.dashboard');
        } elseif (Auth::guard($guard)->check() && Auth::user()->is_admin == 2)
        {
            return redirect()->route('admin.dashboard');
        }else {
            return $next($request);
        }
    }
}
