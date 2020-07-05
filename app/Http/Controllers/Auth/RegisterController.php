<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Site;
use App\Snack;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterStoreRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
            $this->redirectTo = route('superadmin.dashboard');
        } elseif (Auth::check() && Auth::user()->is_admin == 2)
        {
            $this->redirectTo = route('admin.dashboard');
        } else{
            $this->redirectTo = route('user.dashboard');
        }
        $this->middleware('guest');
    }

    public function index(Request $request){
        return view('auth.register');
    }

    public function store(RegisterStoreRequest $request){
        $user = new User();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->tel = $request->tel;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->snack_id = 100;
        $user->is_active = 1;
        $user->is_admin = 2;
        $user->save();

        //$user->site()->attach($request->name_site);
        //$user->snacks()->attach($request->name_snack);


        /*$data = $request->all();
        $data['password'] = bcrypt($data['password']);
        User::create($data);*/
        notify()->success('Votre requete a été prise en compte ', 'Inscription');
        return view('auth.login');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    /*protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }*/

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    /*protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }*/
}
