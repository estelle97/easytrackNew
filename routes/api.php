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

    Route::apiResource('companies', 'API\CompanyController');
    Route::apiResource('employees', 'API\EmployeeController');


    Route::get('sites/{site}/stats', 'API\SiteController@stats');
    Route::get('sites/{site}/customers', 'API\SiteController@sitesCustomers');
    Route::get('sites/{site}/suppliers', 'API\SiteController@sitesSuppliers');
    Route::post('sites/{site}', 'API\SiteController@update');
    Route::apiResource('sites', 'API\SiteController');


    Route::post('sales/{sale}/status', 'Admin\SaleController@updateSaleStatus');
    Route::get('sales/{sale}/validate', 'API\SaleController@validateSale');
    Route::get('sales/{sale}/invalidate', 'API\SaleController@invalidateSale');
    Route::apiResource('sales', 'API\SaleController');

    Route::get('purchases/{purchase}/validate', 'API\PurchaseController@validatePurchase');
    Route::get('purchases/{purchase}/invalidate', 'API\PurchaseController@invalidatePurchase');
    Route::apiResource('purchases', 'API\PurchaseController');


    Route::get('customers/sites/{site}', 'API\CustomerController@customersSite');
    Route::apiResource('customers', 'API\CustomerController');

    Route::get('suppliers/sites/{site}', 'API\SupplierController@suppliersSite');
    Route::apiResource('suppliers' ,'API\SupplierController');


    Route::get('products/site/{category_id}', 'API\ProductController@getProductsByCategory');
    Route::apiResource('products', 'API\ProductController');


    Route::apiResource('categories', 'API\CategoryController');
    Route::apiResource('roles', 'API\RoleController');
    Route::apiResource('permissions','API\PermissionController');

    Route::post('attachPermissionsToRole/{role}', 'API\RoleController@attachPermissionstoRole');
    Route::post('detachPermissionsToRole/{role}', 'API\RoleController@detachPermissionstoRole');

    Route::post('attachRolesToUser/{user}', 'API\UserController@attachRolesToUser');
    Route::post('detachRolesToUser/{user}', 'API\UserController@detachRolesToUser');

    Route::post('attachPermissionsToUser/{user}', 'API\UserController@attachPermissionsToUser');
    Route::post('detachPermissionsToUser/{user}', 'API\UserController@detachPermissionsToUser');

});
