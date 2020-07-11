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
    public function index(Request $request)
    {
        $user = Auth::user();
        $lims_role_all = Role::get();
        return view('admin.users.users.user-rolesPermissions', ['lims_role_all' => $lims_role_all, 'user'=>$user]);
        
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
        notify()->success('Rôle '.$role->name.' ajouté avec succès', 'Ajout de rôle');
        return redirect()->back();
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
                    return $query->where('active', 1);
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
        $user = Auth::user();
        $lims_role_data = Role::find($id);
        //$permissions = DB::table('permissions_roles')->where([['role_id', $id]])->get();
        $permissions = Role::find($lims_role_data)->load('permissions');
        //dd($permissions);
        foreach ($permissions as $permission)
            $all_permission[] = $permission->name;
            //dd($all_permission[]);

        
        if(empty($all_permission))
            $all_permission[] = 'dummy text';
        return view('admin.users.roles.permission', compact('lims_role_data', 'all_permission','user'));
    }

    public function setPermission(Request $request)
    {
        $role = Role::firstOrCreate(['id' => $request['role_id']]);

        if($request->has('read_user')){
            $permission = Permission::firstOrCreate(['name' => 'read_user']);
            if(!$role->hasPermissionTo('read_user')){
                $role->givePermission($permission);
            }
        }
        else
            $role->removePermission('read_user');


        if($request->has('create_user')){
            $permission = Permission::firstOrCreate(['name' => 'create_user']);
            if(!$role->hasPermissionTo('create_user')){
                $role->givePermission($permission);
            }
        }
        else
            $role->removePermission('create_user');

        if($request->has('update_user')){
            $permission = Permission::firstOrCreate(['name' => 'update_user']);
            if(!$role->hasPermissionTo('update_user')){
                $role->givePermission($permission);
            }
        }
        else
            $role->removePermission('update_user');
        
        if($request->has('delete_user')){
            $permission = Permission::firstOrCreate(['name' => 'delete_user']);
            if(!$role->hasPermissionTo('delete_user')){
                $role->givePermission($permission);
            }
        }
        else
            $role->removePermission('delete_user');
            
        notify()->success('Permissions modifiées avec succès', 'Modification de permissions');
        return redirect()->route('admin.role.index');

    }

    public function destroy($id)
    {
        $lims_role_data = Role::find($id);
        $lims_role_data->delete();
        notify()->success('Rôle supprimé avec succès', 'Suppression de rôle');
        return redirect()->back();
    }

}
