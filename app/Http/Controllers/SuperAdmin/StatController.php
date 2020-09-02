<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatController extends Controller
{
    public function subscribersPerTown(){
        $users = [];
        $towns = ["Yaoundé", "Douala", "Bafoussam", "Kribi",'Bertoua','Buea','Bamenda','Maroua','Garoua','Ngaoundéré'];
        $colors = ["#206bc4", "#79a6dc", "#bfe399", "#e9ecf1","#206bc4", "#79a6dc", "#bfe399", "#e9ecf1","#206bc4", "#79a6dc"];

        foreach ($towns as $t) {
            $users[] = Company::all()->where('town', $t)->count();
        }

        return response()->json([
            'users' => $users,
            'towns' => $towns,
            'colors' => $colors,
        ], 200);
    }
}
