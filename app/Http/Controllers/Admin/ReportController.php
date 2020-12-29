<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Site;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.reports');
    }

    public function showReports($site, $period)
    {


        return response()->json([
            'sales' =>  $this->sales($site, $period),
            'purchases' => $this->purchases($site, $period),
            'profits' => $this->profits($site, $period),
            'salesPerEmployee' => $this->salesPerEmployee($site, $period),
            'salesPerCategory' => $this->salesPerCategory($site, $period),
            'purchasesPerCategory' => $this->purchasesPerCategory($site, $period),
            'salesPerPaying_method' => $this->salesPerPaying_method($site, $period),
        ]);
    }




    public function sales($site, $period)
    {
        if ($site == 'all') {
            if ($period == 'all') {
                return Auth::user()->companies->first()->totalSales();
            } else {
                return Auth::user()->companies->first()->totalSales($period);
            }
        } else {
            if ($period == 'all') {
                return Site::find($site)->totalSales();
            } else {
                return Site::find($site)->totalSales($period);
            }
        }
    }

    public function purchases($site, $period)
    {
        if ($site == 'all') {
            if ($period == 'all') {
                return Auth::user()->companies->first()->totalPurchases();
            } else {
                return Auth::user()->companies->first()->totalPurchases($period);
            }
        } else {
            if ($period == 'all') {
                return Site::find($site)->totalPurchases();
            } else {
                return Site::find($site)->totalPurchases($period);
            }
        }
    }

    public function profits($site, $period)
    {
        if ($site == 'all') {
            if ($period == 'all') {
                return (Auth::user()->companies->first()->totalSales() - Auth::user()->companies->first()->totalPurchases());
            } else {
                return (Auth::user()->companies->first()->totalSales($period) - Auth::user()->companies->first()->totalPurchases($period));
            }
        } else {
            if ($period == 'all') {
                return (Site::find($site)->totalSales() - Site::find($site)->totalPurchases());
            } else {
                return (Site::find($site)->totalSales($period) - Site::find($site)->totalPurchases($period));
            }
        }
    }

    public function salesPerEmployee($site, $period)
    {
        return (string)view('ajax.admin.reports.salesPerEmployee', compact('site', 'period'));
    }

    public function salesPerCategory($site, $period)
    {
        return (string)view('ajax.admin.reports.salesPerCategory', compact('site', 'period'));
    }

    public function purchasesPerCategory($site, $period)
    {
        return (string)view('ajax.admin.reports.purchasesPerCategory', compact('site', 'period'));
    }

    public function salesPerPaying_method($site, $period)
    {
        $om = 0;
        $momo = 0;
        $cash = 0;
        if ($site == 'all') {
            if ($period == 'all') {
                foreach (Auth::user()->companies->first()->sites as $site) {
                    foreach ($site->sales as $sale) {
                        if ($sale->paying_method == 'om') $om += $sale->total();
                        if ($sale->paying_method == 'cash') $cash += $sale->total();
                        if ($sale->paying_method == 'momo') $momo += $sale->total();
                    }
                }
            } else {
                if (strlen($period) < 4) {
                    foreach (Auth::user()->companies->first()->sites as $site) {
                        foreach ($site->sales->where('created_at', '>', Carbon::today()->subDays($period))->where('validator_id', '!=', null) as $sale) {
                            if ($sale->paying_method == 'om') $om += $sale->total();
                            if ($sale->paying_method == 'cash') $cash += $sale->total();
                            if ($sale->paying_method == 'momo') $momo += $sale->total();
                        }
                    }
                } else {
                    foreach (Auth::user()->companies->first()->sites as $site) {
                        foreach ($site->sales->where('created_at', '>=', $period . ' 00:00:00')->where('created_at', '<=', $period . ' 23:59:59')->where('validator_id', '!=', null) as $sale) {
                            if ($sale->paying_method == 'om') $om += $sale->total();
                            if ($sale->paying_method == 'cash') $cash += $sale->total();
                            if ($sale->paying_method == 'momo') $momo += $sale->total();
                        }
                    }
                }
            }
        } else {
            if ($period == 'all') {
                foreach (Site::find($site)->sales as $sale) {
                    if ($sale->paying_method == 'om') $om += $sale->total();
                    if ($sale->paying_method == 'cash') $cash += $sale->total();
                    if ($sale->paying_method == 'momo') $momo += $sale->total();
                }
            } else {
                if (strlen($period) < 4) {
                    foreach (Site::find($site)->sales->where('created_at', '>', Carbon::today()->subDays($period))->where('validator_id', '!=', null) as $sale) {
                        if ($sale->paying_method == 'om') $om += $sale->total();
                        if ($sale->paying_method == 'cash') $cash += $sale->total();
                        if ($sale->paying_method == 'momo') $momo += $sale->total();
                    }
                } else {
                    foreach (Site::find($site)->sales->where('created_at', '>=', $period . ' 00:00:00')->where('created_at', '<=', $period . ' 23:59:59')->where('validator_id', '!=', null) as $sale) {
                        if ($sale->paying_method == 'om') $om += $sale->total();
                        if ($sale->paying_method == 'cash') $cash += $sale->total();
                        if ($sale->paying_method == 'momo') $momo += $sale->total();
                    }
                }
            }
        }

        return (string)view('ajax.admin.reports.salesPerPaying_method', compact('om', 'momo', 'cash'));
    }
}
