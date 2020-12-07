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

Route::get('test/', [
    'as' => 'test',
    'uses' => 'Auth\RegisterController@testMail',
]);

Route::get('test/activate', [
    'as' => 'test',
    'uses' => 'Auth\RegisterController@activateCompanies',
]);

Route::get('test/roles', [
    'as' => 'test',
    'uses' => 'Admin\RoleController@init',
]);



Route::get('/', function () {
    return view('landing');
});

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



Route::group(['middleware' => ['auth','verifyLicence']], function() {
    Route::get('logout', 'Admin\DashboardController@logout')->name('logout');

    Route::get('admin/dashboard', ['as'=> 'admin.dashboard','uses' => 'Admin\DashboardController@index']);
    Route::get('admin/profile',[ 'uses' => 'Admin\DashboardController@profile','as' => 'admin.profile']);
    Route::get('admin/profile/edit', ['uses' => 'Admin\DashboardController@profileEdit' , 'as' => 'admin.profile.edit']);
    Route::post('admin/profile/edit', ['uses' => 'Admin\DashboardController@profileUpdate' , 'as' => 'admin.profile.update']);
    Route::get('admin/profile/settings', ['uses' => 'Admin\DashboardController@profileSettings' , 'as' => 'admin.profile.settings']);

    Route::post('admin/companies/update/{field}', 'Admin\SettingController@update');
    Route::get('admin/settings/view/{page}', 'Admin\SettingController@showView');
    Route::get('admin/settings/view/budget/{page}', 'Admin\SettingController@showBudgetView');
    Route::get('admin/settings/view/budget/{page}', 'Admin\SettingController@showBudgetView');
    Route::get('admin/settings', 'Admin\SettingController@index')->name('admin.settings');

    Route::get('admin/reports', 'Admin\ReportController@index')->name('admin.reports');
    Route::get('admin/reports/{site}/{period}', 'Admin\ReportController@showReports');

    Route::get('admin/{site}/users', 'Admin\SiteController@users')->name('admin.site.employees');
    Route::get('admin/sites', 'Admin\SiteController@index')->name('admin.sites');
    Route::post('admin/sites/add', 'Admin\SiteController@store');
    Route::post('admin/sites/update', 'Admin\SiteController@update');
    Route::post('admin/sites/{site}/destroy', 'Admin\SiteController@destroy');



    Route::post('/admin/fexpenses', 'Admin\ExpenseController@addFixExpense');
    Route::post('/admin/fexpenses/{fexpense}', 'Admin\ExpenseController@updateFixExpense');
    Route::post('/admin/fexpenses/{fexpense}/state', 'Admin\ExpenseController@updateState');
    Route::get('/admin/fexpenses/{fexpense}/destroy', 'Admin\ExpenseController@destroyFixExpense');

    Route::get('/admin/expenses/{site}/{period}', 'Admin\ExpenseController@getNetProfit');

    Route::post('/admin/vexpenses', 'Admin\ExpenseController@addVariableExpense');
    Route::post('/admin/vexpenses/{vexpense}', 'Admin\ExpenseController@updateVariableExpense');
    Route::get('/admin/vexpenses/{vexpense}/destroy', 'Admin\ExpenseController@destroyVariableExpense');


    Route::get('admin/users', 'Admin\UserController@index')->name('admin.company.users');
    Route::post('admin/users', 'Admin\UserController@search')->name('admin.company.users.search');
    Route::get('admin/users/{user}/show', 'Admin\UserController@show')->name('admin.user.show');
    Route::get('admin/users/{user}/edit', 'Admin\UserController@edit')->name('admin.user.edit');
    Route::post('admin/users/{user}/edit', 'Admin\UserController@update');
    Route::post('admin/users/store', 'Admin\UserController@store');
    Route::post('admin/users/{user}/destroy', 'Admin\UserController@destroy');
    Route::post('admin/users/{user}/salary', 'Admin\UserController@updateSalary');
    Route::post('admin/users/{user}/salary/suspend', 'Admin\UserController@stopSalary');
    Route::post('admin/users/{user}/salary/activate', 'Admin\UserController@activateSalary');

    Route::post('admin/roles/detachPermissionToUser', 'Admin\RoleController@detachPermissionToUser');
    Route::post('admin/roles/attachPermissionToUser', 'Admin\RoleController@attachPermissionToUser');


    Route::get('easytrack/stats/towns', 'SuperAdmin\StatController@subscribersPerTown');
    Route::get('easytrack/stats/packages/{months}', 'SuperAdmin\StatController@packages');
    Route::get('easytrack/stats/companies/{months}', 'SuperAdmin\StatController@companies');
    Route::get('easytrack/stats/profits/{months}', 'SuperAdmin\StatController@profits');
    Route::get('easytrack/stats/users/{months}', 'SuperAdmin\StatController@users');


    Route::get('easytrack/dashboard', ['as'=> 'easytrack.dashboard','uses' => 'SuperAdmin\DashboardController@index']);
    Route::get('easytrack/profil',[ 'uses' => 'SuperAdmin\DashboardController@profile','as' => 'easytrack.profile']);
    Route::get('easytrack/profile/edit', ['uses' => 'SuperAdmin\DashboardController@profileEdit' , 'as' => 'easytrack.profile.edit']);
    Route::post('easytrack/profile/edit', ['uses' => 'SuperAdmin\DashboardController@profileUpdate' , 'as' => 'easytrack.profile.update']);
    Route::get('easytrack/profile/settings', ['uses' => 'SuperAdmin\DashboardController@profileSettings' , 'as' => 'easytrack.profile.settings']);
    Route::get('easytrack/roles', 'SuperAdmin\RoleController@index')->name('easytrack.roles');

    Route::post('easytrack/roles/add', 'SuperAdmin\RoleController@store');
    Route::post('easytrack/roles/update', 'SuperAdmin\RoleController@update');
    Route::post('easytrack/roles/detachPermissionToRole', 'SuperAdmin\RoleController@detachPermissionToRole');
    Route::post('easytrack/roles/attachPermissionToRole', 'SuperAdmin\RoleController@attachPermissionToRole');

    Route::post('easytrack/products/{site}/{product}/destroy', 'SuperAdmin\ProductController@destroy');
    Route::post('easytrack/products/{product}', 'SuperAdmin\ProductController@update');
    Route::get('easytrack/products/add', 'SuperAdmin\ProductController@create')->name('easytrack.products.create');
    Route::post('easytrack/products/store/many', 'SuperAdmin\ProductController@storeManyProducts');
    Route::resource('easytrack/products', 'SuperAdmin\ProductController');

    Route::post('easytrack/categories/{category}/destroy', 'SuperAdmin\CategoryController@destroy');
    Route::post('easytrack/categories/{category}', 'SuperAdmin\CategoryController@update');
    Route::resource('easytrack/categories', 'SuperAdmin\CategoryController');


    Route::get("/easytrack/companies/update/{company}/state", 'SuperAdmin\CompanyController@updateState');
    Route::post("/easytrack/companies/update/{company}", 'SuperAdmin\CompanyController@update');
    Route::post("/easytrack/companies/subscription/update/{company}", 'SuperAdmin\CompanyController@subscriptionUpdate');
    Route::post('easytrack/companies/store', 'SuperAdmin\CompanyController@store');
    Route::get('easytrack/companies', 'SuperAdmin\CompanyController@index')->name('easytrack.companies');
    Route::get('easytrack/types', 'SuperAdmin\PackageController@index')->name('easytrack.types');
    Route::post('easytrack/types', 'SuperAdmin\PackageController@store');
    Route::post('easytrack/types/{type}/destroy', 'SuperAdmin\PackageController@destroy');
    Route::post('easytrack/types/{type}', 'SuperAdmin\PackageController@update');
    Route::get('easytrack/users', 'SuperAdmin\UserController@index')->name('easytrack.users');

    Route::post('easytrack/notifications/last', 'SuperAdmin\NotificationController@getNotifications');
    Route::get('easytrack/notifications', 'SuperAdmin\NotificationController@notifications')->name('easytrack.notifications');




    Route::get('admin/stats/sales/{days}', 'Admin\StatController@sales');
    Route::get('admin/stats/purchases/{days}', 'Admin\StatController@purchases');
    Route::get('admin/stats/profits/{days}', 'Admin\StatController@profits');



    Route::get('admin/sales/{sale}/update/init', 'Admin\SaleController@getElementBySale');
    Route::get('admin/sales/{sale}/update', 'Admin\SaleController@edit')->name('admin.sales.edit');
    Route::get('admin/sales/{sale}/show', 'Admin\SaleController@show')->name('admin.sales.show');
    Route::post('admin/sales/{sale}/status', 'Admin\SaleController@updateSaleStatus');
    Route::post('admin/sales/{sale}/validate', 'Admin\SaleController@validateSale');
    Route::post('admin/sales/{sale}/invalidate', 'Admin\SaleController@invalidateSale');
    Route::post('admin/sales/{sale}', 'Admin\SaleController@update');
    Route::post('admin/sales', 'Admin\SaleController@store');
    Route::get('admin/kanban', 'Admin\SaleController@kanban')->name('admin.sales.kanban');
    Route::get('admin/sales', 'Admin\SaleController@index')->name('admin.sales.all');
    Route::get('admin/sales/site', 'Admin\SaleController@getElementBySite');
    Route::get('admin/pos', 'Admin\SaleController@create')->name('admin.sales.pos');
    Route::post('admin/sales/{sale}/destroy', 'Admin\SaleController@destroy');



    Route::get('admin/purchases/create', 'Admin\PurchaseController@create');
    Route::get('admin/purchases/{purchase}/show', 'Admin\PurchaseController@show')->name('admin.purchases.show');
    Route::post('admin/purchases/{purchase}/status', 'Admin\PurchaseController@updatePurchaseStatus');
    Route::post('admin/purchases/{purchase}/validate', 'Admin\PurchaseController@validatePurchase');
    Route::post('admin/purchases/{purchase}/invalidate', 'Admin\PurchaseController@invalidatePurchase');
    Route::post('admin/purchases/{purchase}/update', 'Admin\PurchaseController@update');
    Route::post('admin/purchases/{purchase}', 'Admin\PurchaseController@edit');
    Route::get('admin/purchases/site', 'Admin\PurchaseController@getElementBySite');
    Route::post('admin/purchases', 'Admin\PurchaseController@store');
    Route::get('admin/purchases', 'Admin\PurchaseController@index')->name('admin.purchases');
    Route::post('admin/purchases/{purchase}/destroy', 'Admin\PurchaseController@destroy');


    Route::post('admin/products/{product}', 'Admin\ProductController@update');
    Route::post('admin/products', 'Admin\ProductController@store');
    Route::get('admin/products/init/{site}', 'Admin\ProductController@getAllProducts');
    Route::get('admin/products/add', 'Admin\ProductController@create')->name('admin.products.create');
    Route::post('admin/products/store/many', 'Admin\ProductController@storeManyProducts');
    Route::get('admin/products','Admin\ProductController@index')->name('admin.products');
    Route::post('admin/products/{site}/{product}/destroy', 'Admin\ProductController@destroy');

    Route::post('admin/customers/{customer}/destroy', 'Admin\CustomerController@destroy');
    Route::post('admin/customers/{customer}', 'Admin\CustomerController@update');
    Route::resource('admin/customers', 'Admin\CustomerController');

    Route::post('admin/suppliers/{supplier}/destroy', 'Admin\SupplierController@destroy');
    Route::post('admin/suppliers/{supplier}', 'Admin\SupplierController@update');
    Route::resource('admin/suppliers', 'Admin\SupplierController');

    Route::resource('admin/payrools', 'Admin\PayroolController');


    Route::resource('admin/expenses', 'Admin\ExpenseController');


    Route::get('employee/stats/sales/{days}', 'Employee\StatController@sales');
    Route::get('employee/stats/purchases/{days}', 'Employee\StatController@purchases');
    Route::get('employee/stats/profits/{days}', 'Employee\StatController@profits');

    Route::get('employee/sales/{sale}/update/init', 'Employee\SaleController@getElementBySale');
    Route::get('employee/sales/{sale}/update', 'Employee\SaleController@edit')->name('employee.sales.edit');
    Route::get('employee/sales/{sale}/show', 'Employee\SaleController@show')->name('employee.sales.show');
    Route::post('employee/sales/{sale}/status', 'Employee\SaleController@updateSaleStatus');
    Route::post('employee/sales/{sale}/validate', 'Employee\SaleController@validateSale');
    Route::post('employee/sales/{sale}/invalidate', 'Employee\SaleController@invalidateSale');
    Route::post('employee/sales/{sale}', 'Employee\SaleController@update');
    Route::post('employee/sales', 'Employee\SaleController@store');
    Route::get('employee/kanban', 'Employee\SaleController@kanban')->name('employee.sales.kanban');
    Route::get('employee/sales', 'Employee\SaleController@index')->name('employee.sales.all');
    Route::get('employee/sales/site', 'Employee\SaleController@getElementBySite');
    Route::get('employee/pos', 'Employee\SaleController@create')->name('employee.sales.pos');
    Route::post('employee/sales/{sale}/destroy', 'Employee\SaleController@destroy');



    Route::get('employee/purchases/create', 'Employee\PurchaseController@create');
    Route::get('employee/purchases/{purchase}/show', 'Employee\PurchaseController@show')->name('employee.purchases.show');
    Route::post('employee/purchases/{purchase}/status', 'Employee\PurchaseController@updatePurchaseStatus');
    Route::post('employee/purchases/{purchase}/validate', 'Employee\PurchaseController@validatePurchase');
    Route::post('employee/purchases/{purchase}/invalidate', 'Employee\PurchaseController@invalidatePurchase');
    Route::post('employee/purchases/{purchase}/update', 'Employee\PurchaseController@update');
    Route::post('employee/purchases/{purchase}', 'Employee\PurchaseController@edit');
    Route::get('employee/purchases/site', 'Employee\PurchaseController@getElementBySite');
    Route::post('employee/purchases', 'Employee\PurchaseController@store');
    Route::get('employee/purchases', 'Employee\PurchaseController@index')->name('employee.purchases');
    Route::post('employee/purchases/{purchase}/destroy', 'Employee\PurchaseController@destroy');

    Route::post('employee/roles/detachPermissionToUser', 'Employee\RoleController@detachPermissionToUser');
    Route::post('employee/roles/attachPermissionToUser', 'Employee\RoleController@attachPermissionToUser');

    Route::get('employee/users', 'Employee\UserController@index')->name('employee.company.users');
    Route::post('employee/users', 'Employee\UserController@search')->name('employee.company.users.search');
    Route::get('employee/users/{user}/show', 'Employee\UserController@show')->name('employee.user.show');
    Route::get('employee/users/{user}/edit', 'Employee\UserController@edit')->name('employee.user.edit');
    Route::post('employee/users/{user}/edit', 'Employee\UserController@update');
    Route::post('employee/users/store', 'Employee\UserController@store');
    Route::post('employee/users/{user}/destroy', 'Employee\UserController@destroy');


    Route::post('employee/sites/update', 'Employee\SiteController@update');
    Route::get('employee/{site}/users', 'Employee\SiteController@users')->name('employee.site.employees');
    Route::get('employee/sites', 'Employee\SiteController@index')->name('employee.sites');

    Route::post('employee/products/{product}', 'Employee\ProductController@update');
    Route::get('employee/products/init/{site}', 'Employee\ProductController@getAllProducts');
    Route::get('employee/products/add', 'Employee\ProductController@create')->name('employee.products.create');
    Route::post('employee/products/store/many', 'Employee\ProductController@storeManyProducts');
    Route::post('employee/products', 'Employee\ProductController@store');
    Route::get('employee/products','Employee\ProductController@index')->name('employee.products');
    Route::post('employee/products/{site}/{product}/destroy', 'Employee\ProductController@destroy');

    Route::post('employee/customers/{customer}/destroy', 'Employee\CustomerController@destroy');
    Route::post('employee/customers/{customer}', 'Employee\CustomerController@update');
    Route::resource('employee/customers', 'Employee\CustomerController');

    Route::post('employee/suppliers/{supplier}/destroy', 'Employee\SupplierController@destroy');
    Route::post('employee/suppliers/{supplier}', 'Employee\SupplierController@update');
    Route::resource('employee/suppliers', 'Employee\SupplierController');

    Route::get('employee/profile',[ 'uses' => 'Employee\DashboardController@profile','as' => 'employee.profile']);
    Route::get('employee/profile/edit', ['uses' => 'Employee\DashboardController@profileEdit' , 'as' => 'employee.profile.edit']);
    Route::post('employee/profile/edit', ['uses' => 'Employee\DashboardController@profileUpdate' , 'as' => 'employee.profile.update']);
    Route::get('employee/profile/settings', ['uses' => 'Employee\DashboardController@profileSettings' , 'as' => 'employee.profile.settings']);
    Route::get('employee/settings', 'Employee\SettingController@index')->name('employee.settings');
    Route::get('employee/dashboard', 'Employee\DashboardController@index')->name('employee.dashboard');
    Route::get('purchases', 'Employee\PurchaseController@index');
    Route::get('employee/teams', 'Employee\AgendaController@teams')->name('employee.teams');

    Route::post('employee/notifications/last', 'Employee\NotificationController@getNotifications');
    Route::get('employee/notifications', 'Employee\NotificationController@notifications')->name('employee.notifications');


    Route::get('chat/{user?}', 'ChatController@index')->name('chat');
    Route::post('chat/contacts', 'ChatController@getContacts');


    Route::post('admin/notifications/last', 'Admin\NotificationController@getNotifications');
    Route::get('admin/notifications', 'Admin\NotificationController@notifications')->name('admin.notifications');


    Route::get('admin/teams/sites/{site}', 'Admin\TeamController@showSiteTeams');
    Route::get('admin/teams', 'Admin\TeamController@teams')->name('admin.teams');
    Route::post('admin/teams/add', 'Admin\TeamController@addTeam');
    Route::post('admin/teams/attachUserToTeam/{team}', 'Admin\TeamController@attachUserToTeam');
    Route::post('admin/teams/detachUserToTeam/{team}', 'Admin\TeamController@detachUserToTeam');
    Route::post("/admin/teams/team/{team}/destroy", 'Admin\TeamController@destroyTeam');

    Route::get('admin/agenda/meeting', 'Admin\MeetingController@index')->name('admin.meeting');

    Route::get('notifications', 'NotificationController@index')->name('notifications');
    Route::post('resetPassword/{user}', 'Auth\ResetPasswordController@resetPassword');
    Route::post('switchaccount', 'Controller@switchAccount');

});
