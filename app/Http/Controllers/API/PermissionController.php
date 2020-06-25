<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PermissionResource;
use App\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PermissionResource::collection(Permission::all()->load('roles','users'));
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
     * @param [string] name
     * @param [string] slug
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        
        $permission = new Permission([
            'name' => $request->name,
            'slug' => $request->slug
        ]);

        $permission->save();

        return response()->json([
            'message' => 'Permission added successfully!',
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        return new PermissionResource($permission->loadMissing('roles','users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        
        $permission->update([
            'name' => $request->name,
            'slug' => $request->slug
        ]);
        
        return response()->json([
            'message' => 'Permission added successfully!',
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $$permission->destroy($permission->id);

        return response()->json([
            'message' => 'Permission deleted successfully!',
        ],204);
    }
}
