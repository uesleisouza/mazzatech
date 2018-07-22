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

Route::group(['middleware' => 'auth'], function () {

  Route::prefix('admin')->group(function () {

    Route::prefix('patients')->name('patients.')->group(function () {
      Route::get('/', 'Admin\\PatientController@index')->name('index');
      Route::get('create', 'Admin\\PatientController@create')->name('create');
      Route::get('edit/{patient}', 'Admin\\PatientController@edit')->name('edit');
      Route::get('delete/{id}', 'Admin\\PatientController@delete')->name('delete');
      Route::post('store', 'Admin\\PatientController@store')->name('store');
      Route::post('update/{id}', 'Admin\\PatientController@update')->name('update');
    });

    Route::prefix('doctors')->name('doctors.')->group(function () {
      Route::get('/', 'Admin\\DoctorController@index')->name('index');
      Route::get('/create', 'Admin\\DoctorController@create')->name('create');
      Route::get('/edit/{doctor}', 'Admin\\DoctorController@edit')->name('edit');
      Route::get('/delete/{id}', 'Admin\\DoctorController@delete')->name('delete');
      Route::post('/store', 'Admin\\DoctorController@store')->name('store');
      Route::post('/update/{id}', 'Admin\\DoctorController@update')->name('update');
    });
  });
});
