<?php

namespace App\Http\Controllers\Admin;

use App\Expense;
use App\Fexpense;
use App\Http\Controllers\Controller;
use App\Vexpense;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function addFixExpense(Request $request){
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'name' => 'required'
        ]);

        $fexpense = Fexpense::create($request->only('site_id','amount','name','date_payment','description'));
        for ($month = 0; $month < 36; $month++) {
            Expense::create([
                'fexpense_id' => $fexpense->id,
                'name' => $fexpense->name,
                'amount' => $fexpense->amount,
                'date_payment' => Carbon::parse($fexpense->date_payment)->addMonths($month)
            ]);
        }
    }

    public function updateFixExpense(Request $request, Fexpense $fexpense){
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'name' => 'required'
        ]);

        $fexpense->update($request->only('site_id', 'amount', 'name', 'date_payment', 'description'));

        foreach ($fexpense->expenses->where('date_payment', '>', now()) as $exp) {
            $exp->update([
                'amount' => $request->amount,
                'name' => $request->name
            ]);
        }
    }

    public function updateState(Request $request, Fexpense $fexpense){
        $fexpense->is_active = $request->is_active;
        $fexpense->save();

        foreach ($fexpense->expenses->where('date_payment', '>', now()) as $exp) {
            $exp->update([
                'is_active' => $request->is_active
            ]);
        }

    }

    public function destroyFixExpense(Fexpense $fexpense)
    {
        if ($fexpense->delete()) {
            foreach ($fexpense->expenses->where('date_payment', '>', now()) as $exp) {
                $exp->delete();
            }
        }
    }

    public function addVariableExpense(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'name' => 'required'
        ]);

        $vexpense = Vexpense::create($request->only('site_id', 'amount', 'name', 'description'));

    }

    public function updateVariableExpense(Request $request, Vexpense $vexpense){

        $request->validate([
            'amount' => 'required|numeric|min:0',
            'name' => 'required'
        ]);

        $vexpense->update($request->only('amount', 'name', 'description'));
    }

    public function destroyVariableExpense(Vexpense $vexpense){

        if($vexpense->delete()){
            return 'success';
        }
        return 'error';
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
