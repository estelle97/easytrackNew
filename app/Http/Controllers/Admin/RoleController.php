<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use App\User;
use Auth;

class RoleController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $lims_role_all = Role::where('is_active', true)->get();
        if($lims_role_all == null)
        {
            return view('terms-of-services');
        }
        else{
            return view('admin.dashboard.home', compact('user'));
            //return view('admin.users.roles.create', compact('lims_role_all','user'));
        }
        
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
