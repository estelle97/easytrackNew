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

Route::group(['middleware' => 'auth:api','isActive'], function(){
    
    Route::get('logout', 'API\UserController@logout');
    Route::put('users/{user}/activate', 'API\UserController@activateUser');
    Route::put('users/{user}/changeAdminLevel', 'API\UserController@changeAdminLevel');
    Route::apiResource('users', 'API\UserController');
    
    Route::apiResource('Categories', 'API\CategoryController');
    Route::apiResource('Types', 'API\TypeController');
    Route::apiResource('snacks', 'API\SnackController');
    Route::apiResource('sites', 'API\SiteController');
    Route::apiResource('bills', 'API\BillController');
    Route::apiResource('invoices', 'API\InvoiceController');
    Route::apiResource('products', 'API\ProductController');
    Route::apiResource('roles', 'API\RoleController');
    Route::apiResource('permissions','API\PermissionController');
    Route::apiResource('categories', 'API\CategoryController');
    Route::apiResource('types', 'API\TypeController');
    Route::apiResource('suppliers' ,'API\SupplierController');

});
