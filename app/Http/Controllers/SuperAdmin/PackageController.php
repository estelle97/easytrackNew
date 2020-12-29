<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Type;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('superAdmin.packages');
    }

    public function store(Request $request){
        Type::create($request->only('title','duration','number_of_site','number_of_employee','price'));

        return 'success';
    }

    public function update(Request $request, Type $type){
        $type->update($request->only('title','duration','number_of_site','number_of_employee','price'));
        return 'success';
    }

    public function destroy(Type $type){
        if($type->numberOfUsers() == 0){
            if( $type->delete()) return 'success';
            else return 'Une erreur est survenue lors de la suppression du forfait';
        } else return 'Impossible de supprimer ce forfait';
    }
}
