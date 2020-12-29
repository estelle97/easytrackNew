<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Company;
use App\Http\Controllers\Controller;
use App\Type;
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

    public function packages($months){

        if($months == 'all'){
            $total = 0;
            foreach(Type::all() as $type){
                $total += $type->companies()->count();
            }
        } else {
            $total = 0;
            foreach(Type::all() as $type){
                $total += $type->companies()->withPivot('created_at', '>', \Carbon\Carbon::today()->subMonths($months))->count();
            }
        }
        return view('ajax.superAdmin.packages', compact('months','total'));
    }

    public function companies($months){
        $companies = [];
        $dates = [];
        if($months != 'all'){
            for ($i=$months; $i >= 0; $i--) {
                $companies[] = Company::all()->where('created_at', '>', \Carbon\Carbon::today()->subMonths($i)->startOfMonth())->where('created_at', '<', \Carbon\Carbon::today()->subMonths($i)->endOfMonth())->count();
                $dates[]= \Carbon\Carbon::today()->subMonths($i)->startOfMonth()->toDateString();
            }
            $total =  Company::all()->where('created_at', '<', \Carbon\Carbon::today()->subMonths($i)->startOfMonth())->count();
        } else {
            for ($i=24; $i >= 0; $i--) {
                $companies[] = Company::all()->where('created_at', '>', \Carbon\Carbon::today()->subMonths($i)->startOfMonth())->where('created_at', '<', \Carbon\Carbon::today()->subMonths($i)->endOfMonth())->count();
                $dates[]= \Carbon\Carbon::today()->subMonths($i)->startOfMonth()->toDateString();
            }
            $total =  Company::all()->count();
        }

        return response()->json([
            'companies' => $companies,
            'dates' => $dates,
            'total' => $total,
        ], 200);
    }

    public function profits($months){
        $profits = [];
        $dates = [];
        if($months != 'all'){

            for ($i=$months; $i >= 0; $i--) {
                $totalProfits = 0;
                foreach(Company::all() as $com){
                    $totalProfits += $com->types()->wherePivot('created_at', '>', \Carbon\Carbon::today()->subMonths($i)->startOfMonth())->wherePivot('created_at', '<', \Carbon\Carbon::today()->subMonths($i)->endOfMonth())->sum('price');
                }
                $profits[] = $totalProfits;
                $dates[]= \Carbon\Carbon::today()->subMonths($i)->startOfMonth()->toDateString();
            }
            $total = 0;
            foreach (Company::all() as $com) {
                $total += $com->types()->wherePivot('created_at', '<', \Carbon\Carbon::today()->subMonths($i)->startOfMonth())->sum('price');
            }
        } else {
            for ($i=24; $i >= 0; $i--) {
                $totalProfits = 0;
                foreach(Company::all() as $com){
                    $totalProfits += $com->types()->wherePivot('created_at', '>', \Carbon\Carbon::today()->subMonths($i)->startOfMonth())->wherePivot('created_at', '<', \Carbon\Carbon::today()->subMonths($i)->endOfMonth())->sum('price');
                }
                $profits[] = $totalProfits;
                $dates[]= \Carbon\Carbon::today()->subMonths($i)->startOfMonth()->toDateString();
            }
            $total = 0;
            foreach (Company::all() as $com) {
                $total += $com->types->sum('price');
            }
        }

        return response()->json([
            'profits' => $profits,
            'dates' => $dates,
            'total' => $total,
        ], 200);
    }

    public function users($months){
        $users = [];
        $dates = [];
        if($months != 'all'){

            for ($i=$months; $i >= 0; $i--) {
                $totalusers = 0;
                foreach(Company::all() as $com){
                    $totalusers += 1;
                    foreach ($com->sites as $site) {
                        $totalusers += $site->employees->where('created_at', '>', \Carbon\Carbon::today()->subMonths($i)->startOfMonth())->where('created_at', '<', \Carbon\Carbon::today()->subMonths($i)->endOfMonth())->count();
                    }
                }
                $users[] = $totalusers;
                $dates[]= \Carbon\Carbon::today()->subMonths($i)->startOfMonth()->toDateString();
            }

            $total = 0;
            foreach (Company::all() as $com) {
                $total += 1;
                foreach ($com->sites as $site) {
                    $total += $site->employees->where('created_at', '<', \Carbon\Carbon::today()->subMonths($i)->startOfMonth())->count();
                }
            }
        } else {
            for ($i=24; $i >= 0; $i--) {
                $totalusers = 0;
                foreach(Company::all() as $com){
                    $totalusers += 1;
                    foreach ($com->sites as $site) {
                        $totalusers += $site->employees->where('created_at', '>', \Carbon\Carbon::today()->subMonths($i)->startOfMonth())->where('created_at', '<', \Carbon\Carbon::today()->subMonths($i)->endOfMonth())->count();
                    }
                }
                $users[] = $totalusers;
                $dates[]= \Carbon\Carbon::today()->subMonths($i)->startOfMonth()->toDateString();
            }

            $total = 0;
            foreach (Company::all() as $com) {
                $total += 1;
                foreach ($com->sites as $site) {
                    $total += $site->employees->count();
                }
            }
        }

        return response()->json([
            'users' => $users,
            'dates' => $dates,
            'total' => $total,
        ], 200);
    }
}
