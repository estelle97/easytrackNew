<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'API\UserController@login');
Route::post('/register', 'API\UserController@register');
Route::post('passwordRequest', 'API\UserController@passwordRequest');
Route::apiResource('types', 'API\TypeController');

Route::get('/uniques', 'API\UserController@getUniqueElements');

Route::group(['middleware' => 'auth:api'], function(){
    
    Route::post('logout', 'API\UserController@logout');
    Route::put('users/{user}/activate', 'API\UserController@activateUser');
    Route::put('users/{user}/changeAdminLevel', 'API\UserController@changeAdminLevel');
    Route::apiResource('users', 'API\UserController');
    
    Route::apiResource('Categories', 'API\CategoryController');
    Route::apiResource('Types', 'API\TypeController');
    Route::apiResource('snacks', 'API\SnackController');

    Route::post('sites/{site}', 'API\SiteController@update');
    Route::apiResource('sites', 'API\SiteController');
    Route::apiResource('bills', 'API\BillController');
    Route::apiResource('employees', 'API\EmployeeController');
    Route::apiResource('products', 'API\ProductController');
    Route::apiResource('roles', 'API\RoleController');
    Route::apiResource('permissions','API\PermissionController');
    Route::apiResource('categories', 'API\CategoryController');
    Route::apiResource('suppliers' ,'API\SupplierController');

    Route::post('attachPermissionsToRole/{role}', 'API\RoleController@attachPermissionstoRole');
    Route::post('detachPermissionsToRole/{role}', 'API\RoleController@detachPermissionstoRole');

    Route::post('attachRolesToUser/{user}', 'API\UserController@attachRolesToUser');
    Route::post('detachRolesToUser/{user}', 'API\UserController@detachRolesToUser');

    Route::post('attachPermissionsToUser/{user}', 'API\UserController@attachPermissionsToUser');
    Route::post('detachPermissionsToUser/{user}', 'API\UserController@detachPermissionsToUser');

});
