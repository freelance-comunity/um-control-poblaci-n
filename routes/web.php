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

Route::get('phpinfo', function(){
  return view('phpinfo');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tuxtla', 'HomeController@tuxtla')->name('tuxtla');

Route::get('/tapachula', 'HomeController@tapachula')->name('tapachula');
Route::get('/cancun', 'HomeController@cancun')->name('cancun');

Route::get('/chart', 'HomeController@chart');

Route::group(['middleware' => ['web']], function () {
    Route::resource('admin/campus', 'Admin\\CampusController');
});
Route::group(['middleware' => ['web']], function () {
    Route::resource('users', 'UsersController');
    Route::get('changePassword', 'UsersController@changePassword');
    Route::get('profile', function(){
      return view('backEnd.admin.users.profile');
    });
    Route::post('profile', 'UsersController@updateProfile');
});
Route::group(['middleware' => ['web']], function () {
    Route::resource('roles', 'RolesController');
});

Route::group(['middleware' => ['web']], function () {
    Route::resource('population/population', 'Population\\PopulationController');
    Route::get('importExcel', 'Population\\PopulationController@importExcel');
    Route::post('/import-excel', 'Population\\PopulationController@importExcel');
});

Route::get('test', function () {
    return view('onload');
});

  Route::get('referencia', 'ReferenceController@condensedDate');
  Route::get('importe', 'ReferenceController@condensedAmount');
  Route::get('referenciado', function () {
      return view('referenciado');
  });

  Route::get('generar', 'ReferenceController@generateReference');

  Route::get('pdf', function () {
    $pdf = PDF::loadView('pdf');
    return $pdf->download('referencia.pdf');
  });

  Route::get('vista', function(){
    return view('pdf');
  });

  Route::get('testui', function(){
    return view('ui');
  });

  Route::get('api/population','Population\\PopulationController@apiPopulation');
