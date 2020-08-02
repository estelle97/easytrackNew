<?php

namespace App\Http\Controllers\Admin;

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
            'username' => 'required|unique:users',
            'email' => 'nullable|email|unique:users',
            'address' => 'required',
            'phone' => 'required|min:200000000|max:999999999|numeric|unique:users',
            'password' => 'required|min:8',
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

        DB::transaction(function () use($user, $employee) {
            $user->save();
                $employee->user_id = $user->id;
                $employee->save();
        });

        flashy()->success("l'employé <strong>$user->name</strong> a été ajouté avec succès");
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
            'username' => 'required',
            'address' => 'required',
            'role_id' => 'required',
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
        $user->save();
        $user->employee->save();



        notify()->success('Mise à jour de l\'utilisateur effectuée avec succès', 'Mise à jour utilisateur');
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

    public function destroy($id)
    {
        $lims_user_data = User::find($id);
        $lims_user_data->delete();
        notify()->success('Utilisateur supprimé avec succès', 'Suppression d\'utilisateur');
        return redirect()->back();
    }
}
