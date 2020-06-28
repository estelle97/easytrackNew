<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use App\User;
use Auth;
use DB;

class RoleController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        //$lims_role_all = DB::table('roles')->where('is_active', 1)->first();
        $lims_role_all = Role::where('is_active', true)->get();
        return view('admin.users.roles.create', ['users' => $users]);
        
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {

    }

    public function edit($id)
    {
        $lims_role_data = Roles::find($id);
        return $lims_role_data;
    }

    public function update(Request $request, $id)
    {

    }

}
