<?php

namespace App\Http\Controllers\API;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all()->load('site','user');
        return EmployeeResource::collection($employees);
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
        $this->validate($request,[
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'address' => 'required',
            'phone' => 'required|min:200000000|max:999999999|numeric|unique:users',
            'password' => 'required|min:8',
            'role_id' => 'required',
            'site_id' => 'required',
        ]);   
       
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'address' => $request->address,
            'phone' => $request->phone,
            'bio' => $request->bio,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
        ]);

        $employee = new Employee([
            'contact_name' => $request->contact_name,
            'contact_phone' => $request->contact_phone,
            'cni_number' => $request->cni_number,
            'site_id' => $request->site_id
        ]);

        DB::transaction(function () use($user, $employee) {
            $user->save();
                $employee->user_id = $user->id;
                $employee->save();
        });

        return response()->json([
            'message' => 'Employee created successfully',
            'employee' => new EmployeeResource($employee->load('user')),
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return new EmployeeResource($employee->loadMissing('site','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $this->validate($request,[
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required|min:200000000|max:999999999|numeric',
            'password' => 'required|min:8',
        ]);   
       
        $employee->contact_name = $request->contact_name;
        $employee->contact_phone = $request->contact_phone;
        $employee->cni_number = $request->cni_number;
        $employee->user->name = $request->name;
        $employee->user->username = $request->username;
        $employee->user->email = $request->name;
        $employee->user->address = $request->address;
        $employee->user->phone = $request->phone;
        
        DB::transaction(function () use($employee) {
            $employee->save();
            $employee->user->save();
           
        });

        return response()->json([
            'message' => 'Employee updated successfully',
            'employee' => new EmployeeResource($employee->load('user')),
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
