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

    Route::get('messages/{receiver}', 'API\MessageController@index');
    Route::post('messages', 'API\MessageController@store');
    Route::get('contacts', 'API\UserController@contacts');

    Route::post('logout', 'API\UserController@logout');
    Route::post('users/{user}/activate', 'API\UserController@activateUser');
    Route::post('users/{user}/changeAdminLevel', 'API\UserController@changeAdminLevel');
    Route::post('users/{user}/destroy', 'API\UserController@destroy');
    Route::post('users/{user}', 'API\UserController@update');
    Route::apiResource('users', 'API\UserController');

    Route::post('companies/{company}/destroy', 'API\CompanyController@destroy');
    Route::post('companies/{company}', 'API\CompanyController@update');
    Route::apiResource('companies', 'API\CompanyController');

    Route::post('employees/{employee}/destroy', 'API\EmployeeController@destroy');
    Route::post('employees/{employee}', 'API\EmployeeController@update');
    Route::apiResource('employees', 'API\EmployeeController');


    Route::get('sites/{site}/stats', 'API\SiteController@stats');
    Route::get('sites/{site}/customers', 'API\SiteController@sitesCustomers');
    Route::get('sites/{site}/suppliers', 'API\SiteController@sitesSuppliers');
    Route::post('sites/{site}/destroy', 'API\SiteController@destroy');
    Route::post('sites/{site}', 'API\SiteController@update');
    Route::apiResource('sites', 'API\SiteController');


    Route::get('/stats', 'Admin\SaleController@stats');
    Route::post('sales/{sale}/status', 'Admin\SaleController@updateSaleStatus');
    Route::post('sales/{sale}/validate', 'API\SaleController@validateSale');
    Route::post('sales/{sale}/invalidate', 'API\SaleController@invalidateSale');
    Route::post('sales/{sale}/destroy', 'API\SaleController@destroy');
    Route::post('sales/{sale}', 'API\SaleController@update');
    Route::apiResource('sales', 'API\SaleController');

    Route::post('purchases/{purchase}/validate', 'API\PurchaseController@validatePurchase');
    Route::post('purchases/{purchase}/invalidate', 'API\PurchaseController@invalidatePurchase');
    Route::apiResource('purchases', 'API\PurchaseController');


    Route::get('customers/sites/{site}', 'API\CustomerController@customersSite');
    Route::post('customers/{customer}/destroy', 'API\CustomerController@destroy');
    Route::post('customers/{customer}', 'API\CustomerController@update');
    Route::apiResource('customers', 'API\CustomerController');

    Route::get('suppliers/sites/{site}', 'API\SupplierController@suppliersSite');
    Route::post('suppliers/{supplier}/destroy', 'API\SupplierController@destroy');
    Route::post('suppliers/{supplier}', 'API\SupplierController@update');
    Route::apiResource('suppliers' ,'API\SupplierController');


    Route::get('products/site/{category_id}', 'API\ProductController@getProductsByCategory');
    Route::post('products/{product}/destroy', 'API\ProductController@destroy');
    Route::post('products/{product}', 'API\ProductController@update');
    Route::apiResource('products', 'API\ProductController');


    Route::post('categories/{category}/destroy', 'API\CategoryController@destroy');
    Route::post('categories/{category}', 'API\CategoryController@update');
    Route::apiResource('categories', 'API\CategoryController');

    Route::post('roles/{role}/destroy', 'API\RoleController@destroy');
    Route::post('roles/{role}', 'API\RoleController@update');
    Route::apiResource('roles', 'API\RoleController');
    Route::apiResource('permissions','API\PermissionController');

    Route::post('attachPermissionsToRole/{role}', 'API\RoleController@attachPermissionstoRole');
    Route::post('detachPermissionsToRole/{role}', 'API\RoleController@detachPermissionstoRole');

    Route::post('attachRolesToUser/{user}', 'API\UserController@attachRolesToUser');
    Route::post('detachRolesToUser/{user}', 'API\UserController@detachRolesToUser');

    Route::post('attachPermissionsToUser/{user}', 'API\UserController@attachPermissionsToUser');
    Route::post('detachPermissionsToUser/{user}', 'API\UserController@detachPermissionsToUser');

    Route::get('notifications', 'API\NotificationController@index');
    Route::post('notifications/{id}', 'API\NotificationController@changeState');

    Route::get('userSites', 'API\AgendaController@sites');
    Route::get('teams/{id}', 'API\AgendaController@index');
    Route::get('details/{id}/sites/{siteId}', 'API\AgendaController@details');

});
