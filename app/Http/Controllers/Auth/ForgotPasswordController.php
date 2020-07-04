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
        return view('auth.passwords.email');
    }

    /**
     * Sends sms to user using Twilio's programmable sms client
     * @param String $message Body of sms
     * @param Number $recipients string or array of phone number of recepient
     */
    private function sendMessage($message, $recipients)
    {
        $account_sid = getenv("TWILIO_ACCOUNT_ID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients, 
                ['from' => $twilio_number, 'body' => $message] );
    }

    /*public function generatePassword()
    {
        $id = Keygen::numeric(6)->generate();
        return $id;
    }*/

    public function store(PasswordStoreRequest $request)
    {
        $value = $request->input('identity');
        $user = User::where('email', '=', $request->input('identity'))->first();
        $user1 = User::where('username', '=', $request->input('identity'))->first();
        $user2 = User::where('tel', '=', $request->input('identity'))->first();

        $sid    = 'AC10531d636e939b0ee4c01cb7b4c0ec2a';
        $token  = '2317ef060ac5ea9f8706d35512228dfb';
        $client = new Client( $sid, $token );
        $code = Keygen::alphanum(10)->generate();
        $message = "Bonjour vous avez demandé une réinitialisation de mot de passe de votre compte EASYTRACK. Votre code de vérification est : ".$code;
        if ($user != null) {
            $test = $user->tel;
            dd($message);
            /*$client->messages->create(
                $test,
                [
                    'from' => '+12055840409',
                    'body' => $message,
                ]
            );*/
            notify()->success('Un code vous a été envoyé par SMS ', 'Vérification d\'identité');
            return view('auth.passwords.email');
        }
        elseif($user1 != null){
            $test = $user1->tel;
            dd($message);
            /*$client->messages->create(
                $test,
                [
                    'from' => '+12055840409',
                    'body' => $message,
                ]
            );*/
            notify()->success('Un code vous a été envoyé par SMS ', 'Vérification d\'identité');
            return view('auth.login');
        }
        elseif($user2 != null){
            $test = $user2->tel;
            dd($message);
            /*$client->messages->create(
                $test,
                [
                    'from' => '+12055840409',
                    'body' => $message,
                ]
            );*/
            notify()->success('Un code vous a été envoyé par SMS ', 'Vérification d\'identité');
            return view('auth.login');
        }
        else{
            notify()->warning('Aucune référence existante ', 'Vérification d\'identité');
            return view('auth.login');
        }
    }
}
