<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    /**
     * Create User
     * @param [String] name
     * @param [String] username
     * @param [String] email
     * @param [String] address
     * @param [String] password_confirmation
     * @param [char] is_admin (1, 2, 3) default 1
     * 
     * @return [string] message
     */
    public function register(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'email|required|string|unique:users',
            'username' => 'required|string|unique:users',
            'address' => 'required|string',
            'password' => 'required|string|confirmed'
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'username' => $request->username,
            'is_admin' => $request->is_admin,
            'password' => bcrypt($request->password)
        ]);
        $user->save();

        return response()->json(['message' => 'success'],201);
    }

    /**
     * Create User
     * @param [String] email
     * @param [String] password
     * @param [boolean] remember_me
     * 
     * @return [String] access_token
     * @return [String] token_type
     * @return [string] expires_at
     */
    public function login(Request $request){
        $request->validate([
            'email' => 'email|required',
            'password' => 'required',
            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials)) 
            return response()->json(['message' => 'username/password incorrect'], 401);
        
        $user = $request->user();
        if($user->is_active == '0'){
            return response()->json([
                'message' => 'User Deleted',
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
     * @return [string] message
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user->load('site','roles','permissions','agendas');
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
     * @param [String] name
     * @param [String] username
     * @param [String] email
     * @param [String] address
     * @param [String] password_confirmation
     * @param [char] is_admin (1, 2, 3) default 1
     * 
     * @return [string] message
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'email|required|string',
            'username' => 'required|string',
            'address' => 'required|string',
            'is_admin' => 'required',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->username = $request->username;
        $user->is_admin = $request->is_admin;
        
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
}
