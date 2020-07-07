<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Site;
use App\Snack;
use App\Type;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
     * @param Integer snack_id [optional]
     * @param Char is_admin (1, 2, 3) default 1
     * 
     * @return String message
     */
    public function register(Request $request){
        $infos = (object)$request->all();

        // Validate and create admin
        $userRules = [
            'name' => 'required|unique:users',
            'address' => 'required',
            'tel' => 'required|min:9|max:9',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:8|confirmed'
        ];
        $validator = Validator::make($infos->user, $userRules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        // Remove password_confirmation field to user array
        $user = array_pop($infos->user);
        $user = User::create($infos->user);
        $user->is_admin = 2;
        $user->save();

         // Validate and create Snack
         $snackRule = [
            'name' => 'required|unique:snacks',
            'tel1' => 'required|min:9|max:9',
            'email' => 'required|email|unique:snacks',
        ];
        $validator = Validator::make($infos->snack, $snackRule);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $snackVal = (object) $infos->snack;

        $snack = new Snack([
            'name' => $snackVal->name,
            'slug' => $this->makeSlug($snackVal->name),
            'email' => $snackVal->email,
            'tel1' => $snackVal->tel1,
            'tel2' => $snackVal->tel2,
            'town' => $snackVal->town,
            'street' =>$snackVal->street,
            'user_id' => $user->id
        ]);
        $snack->save();


        // Validate and create Site
        $siteRules = [
            'name' => 'required|unique:sites',
            'tel1' => 'required|min:9|max:9',
            'email' => 'required|email|unique:sites',
            'street' => 'required',
            'town' => 'required'
        ];
        $validator = Validator::make($infos->snack, $siteRules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $siteVal = (object) $infos->site;
        $site = new Site([
            'name' => $siteVal->name,
            'slug' => $this->makeSlug($siteVal->name),
            'email' => $siteVal->email,
            'tel1' => $siteVal->tel1,
            'tel2' => $siteVal->tel2,
            'town' => $siteVal->town,
            'street' =>$siteVal->street,
            'snack_id' => $snack->id
        ]);
        $site->save();

        // Attach snack with his type of subscription
        $type = Type::findOrFail($infos->type);
        $snack->types()->attach($type->id,[
            'end_date' => Carbon::now()->addMonth($type->duration),
        ]);

        return response()->json([
            "message" => "Operation success!",
            "snack" => $snack->load('user','sites','types')
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
        if($user->is_active == '0'){
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
            'user' => new UserResource($user->loadMissing('site','roles'))
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
        $users = User::all()->load('site','roles','permissions','agendas');
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
            'tel' => ValidationRule::unique('users')->whereNotNull('tel'),
            'username' => 'required|string|unique:users',
            'address' => 'required|string',
            'password' => 'required|string|confirmed'
        ]);

        $user = new User([
            'name' => $request->name,
            'tel' => $request->tel,
            'email' => $request->email,
            'address' => $request->address,
            'username' => $request->username,
            'cni_number' => $request->cni_number,
            'contact_name' => $request->contact_name,
            'contact_tel' => $request->contact_tel,
            'is_admin' => $request->is_admin,
            'password' => bcrypt($request->password),
            'site_id' => 1
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
        $user->load('site.snack','roles','permissions','agendas');
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
     * @param String tel
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
            'tel' => ValidationRule::unique('users')->whereNotNull('tel'),
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
            'user' => new UserResource($user->loadMissing('site','roles'))
        ],200);
    }

    /**
     * Activate User
     * @param \App\User $user
     * @return \Illuminate\http\Response
     */
    public function activateUser(User $user){
        $user->is_active = '1';
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
        if($user->is_admin == '2'){     // Check if it's a manager
            $otherManager = User::where('is_admin','2')->where('id','!=',$user->id)->where('site_id',$user->site_id)->first();   // retreive the others managers
            if(!$otherManager){     // if there are not another manager
               $site = \App\Site::find($user->site_id);
               $site->is_active = '0';
               $site->save();
            }
        }
        $user->is_active = '0';
        $user->save();

        return response()->json([
            'message' => 'deleted successfully'
        ],
        204);
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
}
