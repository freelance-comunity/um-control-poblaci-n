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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/chart', 'HomeController@chart');

Route::group(['middleware' => ['web']], function () {
	Route::resource('admin/campus', 'Admin\\CampusController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('users', 'UsersController');
  Route::get('changePassword', 'UsersController@changePassword');
});
