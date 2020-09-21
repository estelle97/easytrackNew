<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function teams(){
        return view('employee.teams');
    }
}
