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
        /*$this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'address' => 'required',
        ]);

        $user = User::findOrFail(Auth::id());

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->address = $request->address;
        $user->save();*/
        
        /*$input = $request->all();
        $lims_user_data = User::find($id);
        $lims_user_data->update($input);*/
        notify()->success('Mise à jour du profil effectuée avec succès', 'Mise à jour du profil');
        //return redirect('login');
        view('user-profile', compact('lims_user_data'));
    }
}
