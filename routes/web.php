<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', 'login');

//Route::redirect('/register', 'login');

//Auth::routes(['register' => false]);

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', 'HomeController@dashboard');
    Route::get('logout', 'Admin\DashboardController@logout');
   
    
});

Route::group(['as'=>'superadmin.','prefix'=>'superadmin','middleware' => ['auth', 'active', 'superadmin']], function() {

    //Route::get('/', 'HomeController@index');
    Route::get('dashboard', 'SuperAdmin\DashboardController@index')->name('dashboard');

    Route::get('user/profile/{id}', 'SuperAdmin\DashboardController@profile')->name('user.profile');
	Route::put('user/update_profile/{id}', 'SuperAdmin\DashboardController@profileUpdate')->name('user.profileUpdate');
	Route::put('user/changepass/{id}', 'SuperAdmin\DashboardController@changePassword')->name('user.password');
    Route::get('user/genpass', 'SuperAdmin\DashboardController@generatePassword');
    
});

Route::group(['as'=>'admin.','prefix'=>'admin','middleware' => ['auth', 'active', 'admin']], function() {

    Route::get('/', 'HomeController@index');
    Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');

    Route::get('user/profile/{id}', 'Admin\DashboardController@profile')->name('user.profile');
	Route::put('user/update_profile/{id}', 'Admin\DashboardController@profileUpdate')->name('user.profileUpdate');
	Route::put('user/changepass/{id}', 'Admin\DashboardController@changePassword')->name('user.password');
    Route::get('user/genpass', 'Admin\UserController@generatePassword');
    Route::post('user/deletebyselection', 'Admin\UserController@deleteBySelection');
    Route::resource('user','Admin\UserController');
    
    //Roles & Permissions Routes
    Route::get('role/permission/{id}', 'Admin\RoleController@permission')->name('role.permission');
	Route::post('role/set_permission', 'Admin\RoleController@setPermission')->name('role.setPermission');
	Route::resource('role', 'Admin\RoleController');
    
    //Term of sercice route
    Route::get('terms', 'HomeController@termOfService')->name('terms');
});

Route::group(['as'=>'user.','prefix'=>'user','middleware' => ['auth', 'active', 'user']], function() {

    //Route::get('/', 'HomeController@index');
    Route::get('dashboard', 'HomeController@index')->name('dashboard');

    Route::get('user/profile/{id}', 'Admin\DashboardController@profile')->name('user.profile');
	Route::put('user/update_profile/{id}', 'UserController@profileUpdate')->name('user.profileUpdate');
	Route::put('user/changepass/{id}', 'UserController@changePassword')->name('user.password');
	Route::get('user/genpass', 'UserController@generatePassword');
});