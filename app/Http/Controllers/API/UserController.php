<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Site;
use App\Company;
use App\Customer;
use App\Http\Requests\RegisterStoreRequest;
use App\Type;
use App\User;
use App\Employee;
use Carbon\Carbon;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule as ValidationRule;

class UserController extends Controller
{


    /**
     * Create User
     * @param String name
     * @param String username
     * @param String email
     * @param String tel
     * @param String address
     * @param String password_confirmation
     * @param Integer company_id [optional]
     * @param Char is_admin (1, 2, 3) default 1
     *
     * @return String message
     */
    public function register(RegisterStoreRequest $request){


        // Remove password_confirmation field to user array

        $user = new User([
            'name' => $request->username,
            'email' => $request->useremail,
            'username' => $request->userusername,
            'address' => $request->useraddress,
            'phone' => $request->userphone,
            'password' => bcrypt($request->userpassword),
            'is_admin' => 2,
            'role_id' => 5
        ]);

        $company = new company([
            'name' => $request->companyname,
            'slug' => $this->makeSlug($request->companyname),
            'email' => $request->companyemail,
            'phone1' => $request->companyphone1,
            'phone2' => $request->companyphone2,
            'town' => $request->companytown,
            'street' =>$request->companystreet,
        ]);


        $site = new Site([
            'name' => $request->sitename,
            'slug' => $this->makeSlug($request->sitename),
            'email' => $request->siteemail,
            'phone1' => $request->sitephone1,
            'phone2' => $request->sitephone2,
            'town' => $request->sitetown,
            'street' =>$request->sitestreet,
        ]);

        DB::transaction(function () use($user, $company, $site){
            $user->save();
                $company->user_id = $user->id;
                $company->save();
                    $site->company_id = $company->id;
                    $site->save();

        });

        $customers = Customer::create([
            'name' => 'Passager',
            'street' => $site->street,
            'town' => $site->town,
            'site_id' => $site->id
        ]);

        // Attach company with his type of subscription
        $type = Type::findOrFail($request->type);
        $company->types()->attach($type->id,[
            'end_date' => Carbon::now()->addDays($type->duration),
            'licence_number' => 'L122L1KZ',
            'is_active' => 1,
        ]);

        $this->sendMail($user->email, $company);

        return response()->json([
            "message" => "Operation success!",
        ], 201);

    }

    /**
     * Create User
     * @param String login
     * @param String password
     * @param [boolean] remember_me
     *
     * @return String access_token
     * @return String token_type
     * @return String expires_at
     */
    public function login(Request $request){
        $request->validate([
            'login' => 'required',
            'password' => 'required',
            'remember_me' => 'boolean'
        ]);

        $fieldType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if(!auth()->attempt(array($fieldType => $request->login, 'password' => $request->password))){
            return response()->json([
                'message' => 'Username/Email or Password incorrect'
            ], 404);
        }

        // $credentials = request(['email', 'password']);

        // if(!Auth::attempt($credentials))
        //     return response()->json(['message' => 'username/password incorrect'], 401);

        $user = $request->user();
        if($user->active == '0'){
            return response()->json([
                'message' => 'User was deleted',
            ],
            403);
        }

        $tokenResult = $user->createToken('Personal_Access_Token');
        $token = $tokenResult->token;

        if($request->remember_me){
            $token->expires_at = Carbon::now()->addWeek(1);
        }
        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString(),
            'user_id' => $user->id
        ]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return String message
     */
    public function logout(Request $request){
        $request->user()->token()->revoke();

        return response()->json(['message' => 'logout successfully'], 200);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->load('employee.site.company','role','permissions');
        return UserResource::collection($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => ValidationRule::unique('users')->whereNotNull('email'),
            'phone' => ValidationRule::unique('users')->whereNotNull('phone'),
            'username' => 'required|string|unique:users',
            'address' => 'required|string',
            'password' => 'required|string|confirmed'
        ]);

        $user = new User([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'username' => $request->username,
            'cni_number' => $request->cni_number,
            'contact_name' => $request->contact_name,
            'contact_phone' => $request->contact_phone,
            'is_admin' => $request->is_admin,
            'password' => bcrypt($request->password),
        ]);
        $user->save();

        return response()->json([
            'message' => 'User Created successfully!',
            'user' => new UserResource($user)
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user->loadMissing('employee.site.company','role','permissions');
        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param String name
     * @param String username
     * @param String email
     * @param String phone
     * @param String address
     * @param String password_confirmation
     * @param Char is_admin (1, 2, 3) default 1
     *
     * @return String message
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string',
            'email' =>  ValidationRule::unique('users')->whereNotNull('email'),
            'phone' => ValidationRule::unique('users')->whereNotNull('phone'),
            'username' => 'required|string',
            'address' => 'required|string',
        ]);

        $user->name = $request->name;
        $user->tel = $request->tel;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->username = $request->username;
        $user->is_admin = $request->is_admin;
        $user->cni_number = $request->cni_number;
        $user->contact_name = $request->contact_name;
        $user->contact_tel = $request->contact_tel;

        $user->save();

        return response()->json([
            'message' => 'success',
            'user' => new UserResource($user->loadMissing('site','roles.permissions'))
        ],200);
    }

    /**
     * Activate User
     * @param \App\User $user
     * @return \Illuminate\http\Response
     */
    public function activateUser(User $user){
        $user->active = '1';
        $user->save();

        return response()->json([
            'message' => 'user activated successfully',
        ],200);
    }

    /**
     * Change Admin Level
     * @param \App\User $user
     * @return \Illuminate\http\Response
     */
    public function changeAdminLevel(Request $request, User $user){
        $request->validate([
            'is_admin' => 'required|in:1,2,3'
        ]);
        $user->is_admin = $request->is_admin;
        $user->save();

        return response()->json([
            'message' => 'Admin level updated succesfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->employee->delete();
        $user->delete();

        return response()->json([
            'message' => 'deleted successfully'
        ],
        200);
    }

    /**
     * Attach Roles to a User
     * @param Integer[] roles
     */
    public function attachRolesToUser(Request $request, User $user){
        foreach($request->roles as $role){
            if(!$user->roles->contains($role)){
               $user->roles()->attach($role);
            }
        }
        return $this->show($user);
    }

    /**
     * Detach Roles to a User
     * @param Integer[] roles
     */
    public function detachRolesToUser(Request $request, User $user){
        foreach($request->roles as $role){
            if($user->roles->contains($role)){
               $user->roles()->detach($role);
            }
        }
        return $this->show($user);
    }

    /**
     * Attach Roles to a User
     * @param Integer[] roles
     */
    public function attachPermissionsToUser(Request $request, User $user){
        foreach($request->permissions as $perm){
            if(!$user->permissions->contains($perm)){
               $user->permissions()->attach($perm);
            }
        }
        return $this->show($user);
    }

    /**
     * Detach Roles to a User
     * @param Integer[] roles
     */
    public function detachPermissionsToUser(Request $request, User $user){
        foreach($request->permissions as $perm){
            if($user->permissions->contains($perm)){
               $user->permissions()->detach($perm);
            }
        }
        return $this->show($user);
    }

    /**
     * Detach Roles to a User
     * @param String login
     */
    public function passwordRequest(Request $request){
        $user = User::whereEmail($request->login)->orWhere('username', $request->login)->orWhere('tel', $request->login)->first();
        if($user){
            $password = "newPassword";
            $this->sendMessage(
                "Votre nouveau mot de passe est le suivant: $password",
                $user->tel
            );

            $user->password = bcrypt($password);
            $user->save();

            return response()->json([
                'message' => 'Password recovered!',
                'user' => $this->show($user)
            ], 200);
        }
        return response()->json([
            'message' => 'User not foud'
        ], 401);

    }

    public function getUniqueElements(){
        $data = [
            User::all('username'),
            User::all('email'),
            User::all('tel'),
            company::all('name'),
            company::all('email'),
            company::all('tel1'),
            Site::all('name'),
            Site::all('email'),
            Site::all('tel1')
        ];

        return response()->json([
            'data' => $data
        ], 200);

    }

    public function contacts() {
        $user = Auth::user();

        if($user->is_admin == 1) {
            $employee = Employee::where('user_id', '=', $user->id)->first();
            $site = Site::where('id', $employee->site_id)->first();
            $company = Company::where('id', $site->company_id)->first();
            $employees = Employee::where('site_id', $employee->site_id)->where('user_id', '!=', $employee->user_id)->get();
            /* array_push($employees, User::findOrFail($company->user_id)); */
            $contacts = [];
            foreach ($employees as $emp) {
                $add = User::findOrFail($emp->user_id);
                $add->last_message = Message::where(function ($query) use ($add) {
                    $query->where('sender', Auth::user()->id)->where('receiver', $add->id);
                })->orWhere(function ($query) use($add) {
                    $query->where('receiver', Auth::user()->id)->where('sender', $add->id);
                })->orderBy('created_at', 'desc')->first();

                if(!in_array($user, $contacts)){
                    array_push($contacts, $add);
                }
            }

            $add = User::findOrFail($company->user_id);
            $add->last_message = Message::where(function ($query) use ($add) {
                $query->where('sender', Auth::user()->id)->where('receiver', $add->id);
            })->orWhere(function ($query) use($add) {
                $query->where('receiver', Auth::user()->id)->where('sender', $add->id);
            })->orderBy('created_at', 'desc')->first();

            if(!in_array($user, $contacts)){
                array_push($contacts, $add);
            }

        } else if($user->is_admin == 2) {
            $company = Company::where('user_id', $user->id)->first();
            $sites = Site::where('company_id', $company->id)->get();
            $contacts = [];
            foreach ($sites as $site) {
                $employees = Employee::where('site_id', $site->id)->get();
                foreach ($employees as $employee) {
                    $add = User::findOrFail($employee->user_id);
                    $add->last_message = $message = Message::where(function ($query) use ($add) {
                        $query->where('sender', Auth::user()->id)->where('receiver', $add->id);
                    })->orWhere(function ($query) use($add) {
                        $query->where('receiver', Auth::user()->id)->where('sender', $add->id);
                    })->orderBy('created_at', 'desc')->first();

                    if(!in_array($user, $contacts) && $user != $add){
                        array_push($contacts, $add);
                    }

                }
            }
        } else {
            $contacts = User::where('is_admin', 2)->where('id', '!=', $user->id)->get();
            foreach ($contacts as $contact) {
                $contact->last_message = Message::where(function ($query) use ($contact) {
                    $query->where('sender', Auth::user()->id)->where('receiver', $contact->id);
                })->orWhere(function ($query) use($contact) {
                    $query->where('receiver', Auth::user()->id)->where('sender', $contact->id);
                })->orderBy('created_at', 'desc')->first();
            }
        }

        $response = [
            'data' => $contacts,
            'message' => 'Contact de l\'utilisateur ' . $user->name
        ];

        return response()->json($response, 200);
    }
}
