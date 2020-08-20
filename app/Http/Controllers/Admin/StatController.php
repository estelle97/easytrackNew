<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatController extends Controller
{
    public function sales($days){

        $sales = [];
        $dates = [];
        if($days != 'all'){
            for ($i=$days; $i >= 0; $i--) { 
                $totalSales = 0;
                foreach(Auth::user()->companies->first()->sites as $site){
                    foreach($site->sales->where('created_at', '>' , \Carbon\Carbon::today()->subDay($i)->startOfDay())->where('created_at', '<' , \Carbon\Carbon::today()->subDay($i)->endOfDay()) as $sale){
                        $totalSales += $sale->total();
                    }
                }
    
                $sales[] = $totalSales;
                $dates[]= \Carbon\Carbon::today()->subDays($i)->toDateString();
            }
            $total = Auth::user()->companies->first()->totalSales($days);
        } else {
            for ($i=30; $i >= 0; $i--) { 
                $totalSales = 0;
                foreach(Auth::user()->companies->first()->sites as $site){
                    foreach($site->sales->where('created_at', '>' , \Carbon\Carbon::today()->subDay($i)->startOfDay())->where('created_at', '<' , \Carbon\Carbon::today()->subDay($i)->endOfDay()) as $sale){
                        $totalSales += $sale->total();
                    }
                }

                $sales[] = $totalSales;
                $dates[]= \Carbon\Carbon::today()->subDays($i)->toDateString();
            }
            $total = Auth::user()->companies->first()->totalSales();
        }
        
        return response()->json([
            'sales' => $sales,
            'dates' => $dates,
            'total' => $total,
        ], 200);
    }

    public function purchases($days){

        $purchases = [];
        $dates = [];
        if($days != 'all'){
            for ($i=$days; $i >= 0; $i--) { 

                $totalPurchases = 0;
    
                foreach(Auth::user()->companies->first()->sites as $site){
                    foreach($site->purchases->where('created_at', '>' , \Carbon\Carbon::today()->subDay($i)->startOfDay())->where('created_at', '<' , \Carbon\Carbon::today()->subDay($i)->endOfDay()) as $purchase){
                        $totalPurchases += $purchase->total();
                    }
                }

                $purchases[] = $totalPurchases;
                $dates[]= \Carbon\Carbon::today()->subDays($i)->toDateString();
            }
            $total =  Auth::user()->companies->first()->totalPurchases($days);
        } else {
            for ($i=30; $i >= 0; $i--) { 
                
                $totalPurchases = 0;
    
                foreach(Auth::user()->companies->first()->sites as $site){
                    foreach($site->purchases->where('created_at', '>' , \Carbon\Carbon::today()->subDay($i)->startOfDay())->where('created_at', '<' , \Carbon\Carbon::today()->subDay($i)->endOfDay()) as $purchase){
                        $totalPurchases += $purchase->total();
                    }
                }
                $purchases[] = $totalPurchases;
                $dates[]= \Carbon\Carbon::today()->subDays($i)->toDateString();
            }
            $total = Auth::user()->companies->first()->totalPurchases();
        }
        
        return response()->json([
            'purchases' => $purchases,
            'dates' => $dates,
            'total' => $total,
        ], 200);
    }

    public function profits($days){

        $sales = [];
        $purchases = [];
        $dates = [];
        if($days != 'all'){
            for ($i=$days; $i >= 0; $i--) { 
                $totalSales = 0;
                $totalPurchases = 0;
                foreach(Auth::user()->companies->first()->sites as $site){
                    foreach($site->sales->where('created_at', '>' , \Carbon\Carbon::today()->subDay($i)->startOfDay())->where('created_at', '<' , \Carbon\Carbon::today()->subDay($i)->endOfDay()) as $sale){
                        $totalSales += $sale->total();
                    }
                }
    
                foreach(Auth::user()->companies->first()->sites as $site){
                    foreach($site->purchases->where('created_at', '>' , \Carbon\Carbon::today()->subDay($i)->startOfDay())->where('created_at', '<' , \Carbon\Carbon::today()->subDay($i)->endOfDay()) as $purchase){
                        $totalPurchases += $purchase->total();
                    }
                }
    
                $sales[] = $totalSales;
                $purchases[] = $totalPurchases;
                $dates[]= \Carbon\Carbon::today()->subDays($i)->toDateString();
            }
            $profit = Auth::user()->companies->first()->totalSales($days) - Auth::user()->companies->first()->totalPurchases($days);
        } else {
            for ($i=30; $i >= 0; $i--) { 
                $totalSales = 0;
                $totalPurchases = 0;
                foreach(Auth::user()->companies->first()->sites as $site){
                    foreach($site->sales->where('created_at', '>' , \Carbon\Carbon::today()->subDay($i)->startOfDay())->where('created_at', '<' , \Carbon\Carbon::today()->subDay($i)->endOfDay()) as $sale){
                        $totalSales += $sale->total();
                    }
                }
    
                foreach(Auth::user()->companies->first()->sites as $site){
                    foreach($site->purchases->where('created_at', '>' , \Carbon\Carbon::today()->subDay($i)->startOfDay())->where('created_at', '<' , \Carbon\Carbon::today()->subDay($i)->endOfDay()) as $purchase){
                        $totalPurchases += $purchase->total();
                    }
                }
                $sales[] = $totalSales;
                $purchases[] = $totalPurchases;
                $dates[]= \Carbon\Carbon::today()->subDays($i)->toDateString();
            }
            $profit = Auth::user()->companies->first()->totalSales() - Auth::user()->companies->first()->totalPurchases();
        }

        return response()->json([
            'sales' => $sales,
            'purchases' => $purchases,
            'dates' => $dates,
            'profits' => $profit,
        ], 200);
    }
}
