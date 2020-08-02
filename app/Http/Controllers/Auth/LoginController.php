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
        if (Auth::check() && Auth::user()->is_admin == 3)
        {
            $this->redirectTo = route('easytrack.dashboard');
        } elseif (Auth::check() && Auth::user()->is_admin == 2)
        {
            $this->redirectTo = route('admin.dashboard');
        } else{
            $this->redirectTo = route('user.dashboard');
        }
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

        if (Auth::check() && Auth::user()->is_admin == 3)
        {
            return redirect()->route('easytrack.dashboard');
        } elseif (Auth::check() && Auth::user()->is_admin == 2)
        {
            return redirect()->route('admin.dashboard');
        } else{
            return redirect()->route('user.dashboard');
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
