<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use App\User;
use Auth;
use DB;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        //$lims_role_all = DB::table('roles')->where('is_active', 1)->first();
        $lims_role_all = Role::get();
        return view('admin.users.roles.create', ['lims_role_all' => $lims_role_all, 'user'=>$user]);
        
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => [
                'max:255',
                    Rule::unique('roles')->where(function ($query) {
                    return $query->where('is_active', 1);
                }),
            ],
        ]);

        $data = $request->all();
        Role::create($data);
        $name = $request->name;
        notify()->success('Rôle '.$name.' ajouté avec succès', 'Ajout de rôle');
        return redirect()->back();
    }

    public function edit($id)
    {
        $lims_role_data = Role::find($id);
        return $lims_role_data;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => [
                'max:255',
                Rule::unique('roles')->ignore($request->role_id)->where(function ($query) {
                    return $query->where('is_active', 1);
                }),
            ],
        ]);

        $input = $request->all();
        $lims_role_data = Role::where('id', $input['role_id'])->first();
        $lims_role_data->update($input);
        notify()->success('Rôle '.$name.' modifié avec succès', 'Modification de rôle');
        return redirect()->back();
    }

    public function permission($id)
    {
        $lims_role_data = Role::find($id);
        $permissions = Permission::findByName($lims_role_data->name)->permissions;
        foreach ($permissions as $permission)
            $all_permission[] = $permission->name;
        if(empty($all_permission))
            $all_permission[] = 'dummy text';
        return view('admin.role.permission', compact('lims_role_data', 'all_permission'));
    }

    public function destroy($id)
    {
        $lims_role_data = Role::find($id);
        $lims_role_data->delete();
        notify()->success('Rôle supprimé avec succès', 'Suppression de rôle');
        return redirect()->back();
    }

}
