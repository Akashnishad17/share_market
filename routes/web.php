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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','admin']], function(){
	Route::get('/admin', function () {
    	return view('admin.dashboard');
	});
	Route::get('/addusers','Admin\UserController@add');
	Route::post('/addit','Admin\UserController@addit');
	Route::get('/users','Admin\UserController@show');
	Route::delete('/delete/{id}','Admin\UserController@delete');
});
Route::group(['middleware' => ['auth','user']], function(){
	Route::get('/dashboard', function () {
    	return view('user.dashboard');
	});
});

