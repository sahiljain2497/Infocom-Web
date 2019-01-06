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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/unauth', function(){
	return view('unauthorized');
});

Route::namespace('User')
	->prefix('user')
	->middleware(['is_user'])
	->group(function () {
	Route::resource('home', 'HomeController',[
		'as' => 'user'
	]);
	Route::resource('user','UserController',[
		'as' => 'user'
	]);
	Route::resource('attendance','AttendanceController',[
		'as' => 'user'
	]);
	Route::resource('task','TaskController',[
		'as' => 'user'
	]);
	Route::resource('expense','ExpenseController',[
		'as' => 'user'
	]);
	Route::get('/markAsRead','HomeController@markAsRead')->name('user.read');
});

Route::namespace('Coordinator')
	->prefix('coordinator')
	->middleware(['is_coordinator'])
	->group(function () {
	Route::resource('home', 'HomeController',[
		'as' => 'coordinator'
	]);
	Route::resource('user','UserController',[
		'as' => 'coordinator'
	]);
	Route::resource('attendance','AttendanceController',[
		'as' => 'coordinator'
	]);
	Route::resource('dpr','DprController',[
		'as' => 'coordinator'
	]);
	Route::resource('task','TaskController',[
		'as' => 'coordinator'
	]);
	Route::resource('expense','ExpenseController',[
		'as' => 'coordinator'
	]);
	Route::get('/markAsRead','HomeController@markAsRead')->name('coordinator.read');
});

Route::namespace('Admin')
	->prefix('admin')
	->middleware(['is_admin'])
	->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
	Route::resource('users','UserController');
	Route::resource('attendance','AttendanceController');
	Route::resource('circle','CircleController');
	Route::resource('dpr','DprController');
	Route::resource('invoice','InvoiceController');
	Route::resource('profile','ProfileController');
	Route::resource('message','MessageController');
	Route::resource('task','TaskController');
});

Route::namespace('Admin')
	->prefix('admin')
	->middleware(['is_superadmin'])
	->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
});