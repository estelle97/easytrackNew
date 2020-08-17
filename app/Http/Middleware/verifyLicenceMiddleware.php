<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;

class verifyLicenceMiddleware
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
        if($request->user()->is_admin == '1'){
            $is_active = $request->user()->employee->site->company->types->last()->pivot->is_active;
            if($is_active == 0){
                $remainingDays = Carbon::now()->diffInDays($request->user()->employee->site->company->types->last()->pivot->end_date);
                if($remainingDays > 0){
                    Auth::logout();
                    flashy()->error('Votre entreprise a été désactivée!');
                    return redirect()->route('login');
                } else {
                    Auth::logout();
                    flashy()->error('Veuillez renouveler votre abonement');
                    return redirect()->route('login');
                }
            }
        } elseif($request->user()->is_admin == '2'){
            $is_active = $request->user()->companies->first()->types->last()->pivot->is_active;
            if($is_active == 0){
                $remainingDays = Carbon::now()->diffInDays($request->user()->companies->first()->types->last()->pivot->end_date);
                if($remainingDays > 0){
                    Auth::logout();
                    flashy()->error('Votre entreprise a été désactivée! Veuillez contacter l\'administrateur');
                     return redirect()->route('login');
                } else {
                    Auth::logout();
                    flashy()->error('Veuillez renouveler votre abonement!');
                     return redirect()->route('login');
                }
            }
        }
        return $next($request);
    }
}
