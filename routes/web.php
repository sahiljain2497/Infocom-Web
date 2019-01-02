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
	Route::resource('home', 'HomeController');
	Route::resource('user','UserController');
	Route::resource('attendance','AttendanceController');
});

Route::namespace('Coordinator')
	->prefix('coordinator')
	->middleware(['is_coordinator'])
	->group(function () {
	Route::resource('home', 'HomeController');
	Route::resource('user','UserController');
	Route::resource('attendance','AttendanceController');
});

Route::namespace('Admin')
	->prefix('admin')
	->middleware(['is_admin'])
	->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
	Route::resource('users','UserController');
	Route::resource('attendance','AttendanceController');
	Route::resource('circle','CircleController');
});
