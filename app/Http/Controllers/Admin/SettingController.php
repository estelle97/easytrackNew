<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.settings');
    }

    public function update(Request $request, $field){

        $company = Auth::user()->companies->first();
        $logo = $request->file('logo');
        if($logo){
            $path = 'template/assets/static/companies/'.$company->activity->name.'/';
            $fileName = $company->slug.'.'.$logo->extension();
            $name = $path.$fileName;
            $logo->move($path,$name);
            $company->logo = $name;
            $company->save();

            return $company->$field;
        }

        $company->$field = $request->value;
        $company->save();

        return $company->$field;
    }

    public function showView($view){

        return view('ajax.admin.settings.'.$view);
    }
}
