<?php

use App\User;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();
Route::group(['middleware => web'], function(){
	Route::auth();
	Route::get('/', 'HomeController@index');
});

Route::group(['middleware' => 'admin'], function(){
	// Users Route
	Route::get('/users','UsersController@index')->name('users.index');
	Route::get('/users/get','UsersController@getUser')->name('users.get');
	Route::post('/users','UsersController@store')->name('users.store');
	Route::post('/users/{user}/destroy','UsersController@destroy')->name('users.destroy');
	Route::get('/users/{user}','UsersController@edit')->name('users.edit');
	Route::patch('/users/{user}','UsersController@update')->name('users.update');
	Route::get('/users/{user}/getuser','UsersController@userById');
	Route::delete('/users/{user}','UsersController@destroy');

	// User->Role Route
	Route::get('/users/{user}/editRole','UsersController@role_user')->name('role-user');
	Route::post('/users/{user}/userRoleUpdate','UsersController@role_user_update')->name('role-user-update');

	//Role Route
	Route::get('/role','RoleController@index')->name('role.index');
	Route::get('/roles','RoleController@showAll');
	Route::get('/roles/{id}','RoleController@edit');
	Route::post('/roles','RoleController@store')->name('role.store');
	Route::get('/roles/{role}/roleUser','RoleController@getRole');
	Route::patch('/roles/{role}','RoleController@update');
	Route::delete('/role/{role}','RoleController@destroy')->name('role.destroy');

	// Role->Permission Route
	Route::get('/role/{role}/editPermission','PermissionController@permission_role');
	Route::post('/role/{role}/rolepermissionUpdate','RoleController@role_permission_update');

	//Permission Route
	Route::get('/permission','PermissionController@index');
	Route::get('/permissions','PermissionController@showAll');
	Route::post('/permission','PermissionController@store');
	Route::get('/permission/{id}','PermissionController@show');
	Route::patch('/permission/{id}','PermissionController@update');
	Route::delete('/permission/{permission}','PermissionController@destroy');

	//Stock Route
	Route::get('/stock','StockController@index');
	Route::get('/stocks','StockController@showAll');
	Route::post('/stock','StockController@store');
	Route::get('/stock/{id}','StockController@show');
	Route::patch('/stock/{id}','StockController@update');
	Route::delete('/stock/{stock}','StockController@destroy');

	//Service Route
	Route::get('/service','ServiceController@index');
	Route::get('/services','ServiceController@showAll');
	Route::post('/service','ServiceController@store');
	Route::get('/service/{id}','ServiceController@show');
	Route::patch('/service/{id}','ServiceController@update');
	Route::delete('/service/{service}','ServiceController@destroy');	

	// Member Route
	Route::get('/member','MemberController@index');
	Route::get('/members','MemberController@showAll');
	Route::post('/member','MemberController@store');
	Route::get('/member/{id}','MemberController@show');
	Route::patch('/member/{id}','MemberController@update');
	Route::delete('/member/{service}','MemberController@destroy');

	// Cars Route
	Route::get('/car/{cust_id}', 'CarsController@show');
	Route::get('/car/edit/{id}', 'CarsController@edit');
	Route::post('/car', 'CarsController@store');
	Route::patch('/car/{id}','CarsController@update');

	// Kasir Route
	Route::get('/kasir', 'KasirController@index');
});

// 