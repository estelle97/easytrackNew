<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    public function profile($id)
    {
        $lims_user_data = User::find($id);
        return view('user-profile', compact('lims_user_data'));
    }
}
