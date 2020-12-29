<?php

namespace App\Http\Controllers\Auth;

use App\User;

use Twilio\Rest\Client;
use App\Http\Requests\PasswordStoreRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Twilio\Jwt\ClientToken;
use Keygen;
use Auth;
use Helmesvs\Notify\Facades\Notify;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('forgotPassword');
    }

    /**
     * Detach Roles to a User
     * @param String login
     */
    public function passwordRequest(Request $request)
    {
        $user = User::whereEmail($request->login)->orWhere('username', $request->login)->orWhere('phone', $request->login)->first();
        if ($user) {
            $password = $this->generatePassword(8);
            $this->sendSMS(
                $user->phone,
                "Votre nouveau mot de passe est le suivant: " . $password
            );

            $user->password = bcrypt($password);
            $user->save();

            flashy()->success("Votre nouveau mot de passe vous a été par SMS");
            return redirect()->route('login');
        }

        flashy()->error("Aucun utilisateur ne corresond à ces informations");
        return redirect()->back();
    }
}
