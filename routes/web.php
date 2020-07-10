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


/*
* Authentification
*/

Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@login'
]);

Route::post('login', [
    'as' => 'login.post',
    'uses' => 'Auth\LoginController@loginPost'
]);

Route::get('register', [
    'as' => 'register',
    'uses' => 'Auth\RegisterController@index',
]);

Route::post('register', [
    'uses' => 'Auth\RegisterController@store',
    'as' => 'register.post'
]);
    
/*
* Password
*/
Route::get('password-forgot', [
    'as' => 'password-forgot',
    'uses' => 'Auth\ForgotPasswordController@index'
]);

Route::post('password-forgot', [
    'as' => 'password-forgot.post',
    'uses' => 'Auth\ForgotPasswordController@passwordRequest'
]);



Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', 'HomeController@dashboard');
    Route::get('logout', 'Admin\DashboardController@logout')->name('logout');
   
    Route::get('admin/dashboard', ['as'=> 'admin.dashboard','uses' => 'Admin\DashboardController@index']);
    Route::get('admin/profil',[ 'uses' => 'Admin\DashboardController@profile','as' => 'admin.profile']);
    Route::get('admin/profile/edit', ['uses' => 'Admin\DashboardController@profileEdit' , 'as' => 'admin.profile.edit']);
    Route::post('admin/profile/edit', ['uses' => 'Admin\DashboardController@profileUpdate' , 'as' => 'admin.profile.update']);
    Route::get('admin/profile/settings', ['uses' => 'Admin\DashboardController@profileSettings' , 'as' => 'admin.profile.settings']);



    Route::get('easytrack/dashboard', ['as'=> 'easytrack.dashboard','uses' => 'SuperAdmin\DashboardController@index']);
    Route::get('easytrack/profil',[ 'uses' => 'SuperAdmin\DashboardController@profile','as' => 'easytrack.profile']);
    Route::get('easytrack/profile/edit', ['uses' => 'SuperAdmin\DashboardController@profileEdit' , 'as' => 'easytrack.profile.edit']);
    Route::post('easytrack/profile/edit', ['uses' => 'SuperAdmin\DashboardController@profileUpdate' , 'as' => 'easytrack.profile.update']);
    Route::get('easytrack/profile/settings', ['uses' => 'SuperAdmin\DashboardController@profileSettings' , 'as' => 'easytrack.profile.settings']);
});


Route::group(['as'=>'superadmin.','prefix'=>'superadmin','middleware' => ['auth', 'active', 'superadmin']], function() {


    Route::get('dashboard', 'SuperAdmin\DashboardController@index')->name('dashboard');

    Route::get('user/profile/{id}', 'SuperAdmin\DashboardController@profile')->name('user.profile');
	Route::put('user/update_profile/{id}', 'SuperAdmin\DashboardController@profileUpdate')->name('user.profileUpdate');
	Route::put('user/changepass/{id}', 'SuperAdmin\DashboardController@changePassword')->name('user.password');
    Route::get('user/genpass', 'SuperAdmin\DashboardController@generatePassword');
    
});

Route::post('roles/add', 'Admin\RoleController@store');
Route::post('roles/detachPermissionToRole', 'Admin\RoleController@detachPermissionToRole');
Route::post('roles/attachPermissionToRole', 'Admin\RoleController@attachPermissionToRole');



Route::group(['as'=>'admin.','prefix'=>'admin','middleware' => ['auth', 'active', 'admin']], function() {
    
    Route::get('/', 'HomeController@index');
    Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');

    Route::get('user/profile/{id}', 'Admin\DashboardController@profile')->name('user.profile');
    Route::get('user/profile_settings/{id}', 'Admin\DashboardController@profileSettings')->name('user.profileSettings');
	Route::put('user/update_profile/{id}', 'Admin\DashboardController@profileUpdate')->name('user.profileUpdate');
	Route::put('user/changepass/{id}', 'Admin\DashboardController@changePassword')->name('user.password');
    Route::get('user/genpass', 'Admin\UserController@generatePassword');
    Route::post('user/deletebyselection', 'Admin\UserController@deleteBySelection');
    Route::resource('user','Admin\UserController');
    
    //Roles & Permissions Routes
    Route::get('role/permission/{id}', 'Admin\RoleController@permission')->name('role.permission');
	Route::post('role/set_permission', 'Admin\RoleController@setPermission')->name('role.setPermission');
    Route::resource('role', 'Admin\RoleController');
    
    //Sites Routes
	Route::resource('site', 'Admin\SiteController');
    
    //Term of sercice route
    Route::get('terms', 'HomeController@termOfService')->name('terms');
});

Route::group(['as'=>'user.','prefix'=>'user','middleware' => ['auth', 'active', 'user']], function() {

    //Route::get('/', 'HomeController@index');
    Route::get('dashboard', 'User\DashboardController@index')->name('dashboard');

    Route::get('user/profile/{id}', 'Admin\DashboardController@profile')->name('user.profile');
	Route::put('user/update_profile/{id}', 'UserController@profileUpdate')->name('user.profileUpdate');
	Route::put('user/changepass/{id}', 'UserController@changePassword')->name('user.password');
	Route::get('user/genpass', 'UserController@generatePassword');
});