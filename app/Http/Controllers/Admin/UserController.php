<?php

namespace App\Http\Controllers\Admin;

use App\Action;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Permission;
use App\Site;
use Auth;
use Hash;
use Keygen;
use DB;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.users');
    }

    public function generatePassword()
    {
        $id = Keygen::numeric(6)->generate();
        return $id;
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'username' => 'required|string|unique:users|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
            'email' => 'nullable|email|unique:users',
            'address' => 'required',
            'phone' => 'required|min:200000000|max:999999999|numeric|unique:users',
            'password' => 'required|min:8',
            'role_id' => 'required',
            'photo' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'address' => $request->address,
            'phone' => $request->phone,
            'bio' => $request->bio,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
        ]);

        $employee = new Employee([
            'contact_name' => $request->contact_name,
            'contact_phone' => $request->contact_phone,
            'cni_number' => $request->cni_number,
            'site_id' => $request->site_id
        ]);

        $photo = $request->file('photo');
        if($photo){
            $path = 'template/assets/static/users/'.Auth::user()->companies->first()->name.'/'.\App\Site::find($request->site_id)->name.'/';
            $fileName = $request->username.'.'.$photo->extension();
            $name = $path.$fileName;
            $photo->move($path,$name);
            $user->photo = $name;
        }

        DB::transaction(function () use($user, $employee) {
            $user->save();
                $employee->user_id = $user->id;
                $employee->save();
        });

        flashy()->success("l'employé $user->name a été ajouté avec succès");
        Action::store('Employee', $employee->id, 'create',
            "Création du ".$user->role->name." ".$user->name
        );
        return 'success';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        $user = User::whereUsername($user)->first();
        return view('admin.users.user-profile', compact('user'));
    }

    public function edit($user)
    {
        $user = User::whereUsername($user)->first();
        return view('admin.users.user-profile-edit', compact('user'));
    }

    public function update(Request $request, $user)
    {
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required|min:200000000|max:999999999|numeric',
            'email' => 'email|nullable',
            'username' => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
            'address' => 'required',
            'role_id' => 'required',
            'photo' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ]);

        $user = User::whereUsername($user)->first();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->address = $request->address;
        $user->bio = $request->bio;
        $user->phone = $request->phone;
        $user->role_id = $request->role_id;

        $user->employee->cni_number = $request->cni_number;
        $user->employee->contact_name = $request->contact_name;
        $user->employee->contact_phone = $request->contact_phone;


        $photo = $request->file('photo');
        if($photo){
            $path = 'template/assets/static/users/'.Auth::user()->companies->first()->name.'/'.\App\Site::find($request->site_id)->name.'/';
            $fileName = $request->username.'.'.$photo->extension();
            $name = $path.$fileName;
            $photo->move($path,$name);
            $user->photo = $name;
        }

        $user->save();
        $user->employee->save();

        notify()->success('Mise à jour de l\'utilisateur effectuée avec succès', 'Mise à jour utilisateur');
        Action::store('Employee', $user->employee->id, 'update',
            "Mise à jour du ".$user->role->name." ".$user->name
        );
        return redirect()->back();
    }

    public function search(Request $request){
        $text = $request->text;
        if(!is_null($request->site_id)){
            $site = Site::find($request->site_id);
            return view('ajax.admin.employees_search', compact('text','site'));
        }
        return view('ajax.admin.employees_search', compact('text'));
    }

    public function destroy(User $user)
    {

        flashy()->info("L'utilisateur a été supprimé avec succès");
        Action::store('Employee', $user->employee->id, 'destroy',
            "Suppression du ".$user->role->name." ".$user->name
        );
        return redirect()->back();
    }
}
