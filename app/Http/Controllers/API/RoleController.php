<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RoleResource::collection(Role::all()->load('permissions','users'));
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
        $request->validate([
            'name'=> 'required[string',
            'description' => 'required|string',
        ]);
        $slug = trim($request->name);

        $role = new Role();
        $role->name = $request->name;
        $role->description = $request->description;
        $role->slug = $slug;
        $role->save();

        return response()->json([
            'message' => 'Role added successfully!',
            'role' => new RoleResource($role)
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return new RoleResource($role->loadMissing('permissions','users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'=> 'required[string',
            'description' => 'required|string',
        ]);
        $slug = trim($request->name);

        $role->name = $request->name;
        $role->description = $request->description;
        $role->slug = $slug;
        $role->save();

        return response()->json([
            'message' => 'Role updated successfully!',
            'role' => new RoleResource($role)
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->is_active = '0';
        $role->save();

        return response()->json([
            'message' => 'Role deleted successfully!'
        ],204);
    }
}
