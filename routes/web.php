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

Route::prefix('admin')->group(function () {

  // TODO: Incluir rotas em grupo
  Route::get('patients', 'Admin\\PatientController@index')->name('patients.index');
  Route::get('patients/create', 'Admin\\PatientController@create')->name('patients.create');
  Route::get('patients/edit/{patient}', 'Admin\\PatientController@edit')->name('patients.edit');
  Route::get('patients/delete/{id}', 'Admin\\PatientController@delete')->name('patients.delete');
  Route::post('patients/store', 'Admin\\PatientController@store')->name('patients.store');
  Route::post('patients/update/{id}', 'Admin\\PatientController@update')->name('patients.update');
});
