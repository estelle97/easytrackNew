<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        notify()->success('Mot de passe réinitialisé avec succès', 'Bienvenue');
        $this->middleware('guest')->except('resetPassword');
    }

    public function resetPassword(User $user, Request $request){
        $request->validate([
            'password' => 'required',
            'newPassword' => 'required|min:8',
            'newPasswordConfirm' => 'required|required_with:newPasswordConfirm|same:newPassword'
        ]);

        // dump($user->password);
        // dump($request->all());
        if(Hash::check($request->password, $user->password)) {
            $user->password = bcrypt($request->newPassword);
            $user->save();
        } else {
                return 'error';
        }

    }
}
