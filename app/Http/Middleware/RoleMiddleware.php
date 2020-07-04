<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  \Role  $role
     * @param  \Permission $permission
     * @return mixed
     */
    public function handle($request, Closure $next, $roles, $permission = null)
    {

        dd($request->route());
        if($request->user()->is_admin == '1'){
            $roles = explode('|',$roles);
            if(!$request->user()->hasRoles($roles)) {
                 abort(403, "Access denied");
            }
    
            if($permission !== null && !$request->user()->can($permission)) {
                 abort(403, "Permission denied");
            }
        }

        return $next($request);

    }
}
