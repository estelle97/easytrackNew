<?php

namespace App\Http\Controllers\Employee;

use App\Action;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
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
        return view('employee.users.users');
    }

    public function generatePassword()
    {
        $id = Keygen::numeric(6)->generate();
        return $id;
    }

    public function store(UserStoreRequest $request)
    {

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
            $path = 'template/assets/static/users/'.Auth::user()->employee->site->company->name.'/'.\App\Site::find($request->site_id)->name.'/';
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
        return view('employee.users.user-profile', compact('user'));
    }

    public function edit($user)
    {
        $user = User::whereUsername($user)->first();
        return view('employee.users.user-profile-edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, $user)
    {

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
            $path = 'template/assets/static/users/'.Auth::user()->employee->site->company->name.'/'.Auth::user()->employee->site->name.'/';
            $fileName = $request->username.'.'.$photo->extension();
            $name = $path.$fileName;
            $photo->move($path,$name);
            $user->photo = $name;
        }

        $user->save();
        $user->employee->save();



        flashy()->success('Mise à jour de l\'utilisateur effectuée avec succès');

        Action::store('Employee', $user->employee->id, 'update',
            "Mise à jour du ".$user->role->name." ".$user->name
        );

        return redirect()->back();
    }

    public function search(Request $request){
        $text = $request->text;
        return view('ajax.employee.employees_search', compact('text'));
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
