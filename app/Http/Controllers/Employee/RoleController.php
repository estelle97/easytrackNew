<?php

namespace App\Http\Controllers\Employee;

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

    /**
     * Attach permissions to a user
     * @param Integer[] permissions 
     */
    public function attachPermissionToUser(Request $request){
        
        $user = User::find($request->user_id);
        if(!$user->permissions->contains($request->permission_id)){
            $user->permissions()->attach($request->permission_id); 
            return 'success';
        }

        return 'error';
    }


     /**
     * Detach permissions to a user
     * @param Integer[] permissions 
     */
    public function detachPermissionToUser(Request $request){
        $user = User::find($request->user_id);
        if($user->permissions->contains($request->permission_id)){
            $user->permissions()->detach($request->permission_id);
            return 'success';
        }

        return 'error';
    }

}
