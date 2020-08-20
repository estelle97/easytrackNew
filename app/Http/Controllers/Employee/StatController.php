<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
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
                    foreach(Auth::user()->sales->where('created_at', '>' , Carbon::today()->subDay($i)->startOfDay())->where('created_at', '<' , Carbon::today()->subDay($i)->endOfDay()) as $sale){
                        $totalSales += $sale->total();
                    }
    
                $sales[] = $totalSales;
                $dates[]= Carbon::today()->subDays($i)->toDateString();
            }
            $total = Auth::user()->totalSales($days);
        } else {
            for ($i=30; $i >= 0; $i--) { 
                $totalSales = 0;
                    foreach(Auth::user()->sales->where('created_at', '>' , Carbon::today()->subDay($i)->startOfDay())->where('created_at', '<' , Carbon::today()->subDay($i)->endOfDay()) as $sale){
                        $totalSales += $sale->total();
                    }

                $sales[] = $totalSales;
                $dates[]= Carbon::today()->subDays($i)->toDateString();
            }
            $total = Auth::user()->totalSales();
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
    
                    foreach(Auth::user()->purchases->where('created_at', '>' , Carbon::today()->subDay($i)->startOfDay())->where('created_at', '<' , Carbon::today()->subDay($i)->endOfDay()) as $purchase){
                        $totalPurchases += $purchase->total();
                    }

                $purchases[] = $totalPurchases;
                $dates[]= Carbon::today()->subDays($i)->toDateString();
            }
            $total =  Auth::user()->totalPurchases($days);
        } else {
            for ($i=30; $i >= 0; $i--) { 
                
                $totalPurchases = 0;
    
                    foreach(Auth::user()->purchases->where('created_at', '>' , Carbon::today()->subDay($i)->startOfDay())->where('created_at', '<' , Carbon::today()->subDay($i)->endOfDay()) as $purchase){
                        $totalPurchases += $purchase->total();
                    }
                $purchases[] = $totalPurchases;
                $dates[]= Carbon::today()->subDays($i)->toDateString();
            }
            $total = Auth::user()->totalPurchases();
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
                    foreach(Auth::user()->sales->where('created_at', '>' , Carbon::today()->subDay($i)->startOfDay())->where('created_at', '<' , Carbon::today()->subDay($i)->endOfDay()) as $sale){
                        $totalSales += $sale->total();
                    }
    
                    foreach(Auth::user()->purchases->where('created_at', '>' , Carbon::today()->subDay($i)->startOfDay())->where('created_at', '<' , Carbon::today()->subDay($i)->endOfDay()) as $purchase){
                        $totalPurchases += $purchase->total();
                    }
    
                $sales[] = $totalSales;
                $purchases[] = $totalPurchases;
                $dates[]= Carbon::today()->subDays($i)->toDateString();
            }
            $profit = Auth::user()->totalSales($days) - Auth::user()->totalPurchases($days);
        } else {
            for ($i=30; $i >= 0; $i--) { 
                $totalSales = 0;
                $totalPurchases = 0;
                    foreach(Auth::user()->sales->where('created_at', '>' , Carbon::today()->subDay($i)->startOfDay())->where('created_at', '<' , Carbon::today()->subDay($i)->endOfDay()) as $sale){
                        $totalSales += $sale->total();
                    }
    
                    foreach(Auth::user()->purchases->where('created_at', '>' , Carbon::today()->subDay($i)->startOfDay())->where('created_at', '<' , Carbon::today()->subDay($i)->endOfDay()) as $purchase){
                        $totalPurchases += $purchase->total();
                    }
                $sales[] = $totalSales;
                $purchases[] = $totalPurchases;
                $dates[]= Carbon::today()->subDays($i)->toDateString();
            }
            $profit = Auth::user()->totalSales() - Auth::user()->totalPurchases();
        }

        return response()->json([
            'sales' => $sales,
            'purchases' => $purchases,
            'dates' => $dates,
            'profits' => $profit,
        ], 200);
    }
}
