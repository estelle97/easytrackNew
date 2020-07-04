<?php

namespace App\Http\Middleware;

use Closure;

class OwnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $snack, $site = null)
    {
        $snack = $request->route()->parameter($snack);
        $user = $request->user();

        
        if($user->is_admin == '2'){
            if($snack->user_id != $user->id){
                abort(403, 'Access Denied');
            }
            return $next($request);
        }

        if($site != null || $user->is_admin == '1'){
            $site = $request->route()->parameter($site);

            if($site->id != $user->site_id){
                abort(403, 'Access Denied');
            }
        }

        return $next($request);
    }
}
