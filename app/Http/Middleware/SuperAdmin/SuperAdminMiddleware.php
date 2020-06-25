<?php

namespace App\Http\Middleware\SuperAdmin;

use Closure;
use Illuminate\Support\Facades\Auth;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->is_admin == 3)
        {
            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }
}
