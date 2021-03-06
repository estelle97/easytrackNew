<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Helmesvs\Notify\Facades\Notify;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        logout as logout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    { 
        $this->middleware('guest')->except('logout');
    }

    /**
    * Get the login username to be used by the controller.
    *
    * @return string
    */
    public function username()
    {
        $login = request()->input('identity');

        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$field => $login]);

        return $field;
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $messages = [
            'login.required' => "L'adresse email ou le nom d'utilisateur doit être renseigné",
            'password.required' => 'Veuillez entrer un mot de passe',
        ];

        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ], $messages);
    }

    public function login(){
        if (Auth::user() && Auth::user()->is_admin == 3){
            return redirect()->route('easytrack.dashboard');
        } elseif (Auth::user() && Auth::user()->is_admin == 2){
            return redirect()->route('admin.dashboard');
        }
        elseif (Auth::user() && Auth::user()->is_admin == 1){
            return redirect()->route('employee.dashboard');
        }

        return view('login');
    }

    public function loginPost(Request $request) {
        $this->validateLogin($request);


        $fieldType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if(!auth()->attempt(array($fieldType => $request->login, 'password' => $request->password))){
            flashy()->warning('Login et/ou mot de passe incorrect', 'Informations incorrects');
            return redirect()->back();
        }

        $user = $request->user();

        if($user->active == '0'){
            Auth::logout();

            flashy()->warning("Ce compte a été suprimé, Veuillez contacter l'administrateur", "Compte Supprimé");
            return redirect()->back();
        }


        if (Auth::check() && Auth::user()->is_admin == 3){
            return redirect()->route('easytrack.dashboard');
        } elseif (Auth::check() && Auth::user()->is_admin == 2){
            $remainingDays = Auth::user()->companies->first()->subscription()->remainingDays;
            if($remainingDays <= 0){
                Auth::user()->companies->first()->types->last()->pivot->is_active = 0;
                Auth::user()->companies->first()->types->last()->pivot->timestamps = null;
                Auth::user()->companies->first()->types->last()->pivot->save();
                Auth::logout();
                flashy()->error("Votre abonnement est terminé! Veuillez contacter l'administrateur");

                return redirect()->route('login');
            }

            return redirect()->route('admin.dashboard');
        } else{
            $remainingDays = Auth::user()->employee->site->company->subscription()->remainingDays;
            if($remainingDays <= 0){
                Auth::user()->employee->site->company->types->last()->pivot->is_active = 0;
                Auth::user()->employee->site->company->types->last()->pivot->timestamps = null;
                Auth::user()->employee->site->company->types->last()->pivot->save();
                Auth::logout();
                flashy()->error('Votre entreprise a été désactivée! Veuillez contacter l\'administrateur');

                return redirect()->route('login');
            }
            return redirect()->route('employee.dashboard');
        }
    }

    protected function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('/login');
    }
}
