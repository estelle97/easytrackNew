<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Permission;
use Auth;
use Hash;
use Keygen;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $lims_user_list = User::where('is_active', true)->get();
        return view('admin.users.users.users', compact('lims_user_list','user'));
    }

    public function generatePassword()
    {
        $id = Keygen::numeric(6)->generate();
        return $id;
    }
}
