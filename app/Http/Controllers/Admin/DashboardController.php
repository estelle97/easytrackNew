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

    public function profileUpdate(Request $request, $id)
    {
        $input = $request->all();
        $lims_user_data = User::find($id);
        $lims_user_data->update($input);
        notify()->success('Mise à jour du profil effectuée avec succès', 'Mise à jour du profil');
        return redirect()->back();
    }
}
