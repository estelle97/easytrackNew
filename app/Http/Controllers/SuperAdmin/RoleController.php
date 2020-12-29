<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Role;
use Helmesvs\Notify\Facades\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index()
    {
        return view('superAdmin.roles');

    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles'
        ]);
        $role = Role::create([
            'name' => $request->name,
            'slug' => $this->makeSlug($request->name),
            'description' => $request->description
        ]);
        $this->attachPermissionsToRole($role, $request->permissions);
        Notify::success("Le role ".$role->name." a été ajouté avec succès");
        notify()->success('Rôle '.$role->name.' ajouté avec succès', 'Ajout de rôle');
        return redirect()->back();
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required|string'
        ]);

        $role = Role::find($request->role_id);
        $role->name = $request->name;
        $role->description = $request->description;
        if($role->save()){
            return 'success';
        } else {
            return 'error';
        }
    }

    /**
     * Attach permissions to a role
     * @param Integer[] permissions
     */
    public function attachPermissionsToRole(Role $role, $permissions){
        foreach($permissions as $perm){
            if(!$role->permissions->contains($perm)){
               $role->permissions()->attach($perm);
            }
        }
        return 'success';
    }

    public function attachPermissionToRole(Request $request){
        $role = Role::find($request->role_id);
        if(!$role->permissions->contains($request->permission_id)){
            $role->permissions()->attach($request->permission_id);

            return 'success';
        }

        return 'error';
    }

     /**
     * Detach permissions to a role
     * @param Integer[] permissions
     */
    public function detachPermissionToRole(Request $request){
        $role = Role::find($request->role_id);
        if($role->permissions->contains($request->permission_id)){
            $role->permissions()->detach($request->permission_id);
            return 'success';
        }

        return 'error';
    }
}
