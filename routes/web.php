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

  Route::prefix('admin')->namespace('Admin')->group(function () {

    Route::prefix('patients')->name('patients.')->group(function () {
      Route::get('/', 'PatientController@index')->name('index');
      Route::get('create', 'PatientController@create')->name('create');
      Route::get('edit/{patient}', 'PatientController@edit')->name('edit');
      Route::get('delete/{id}', 'PatientController@delete')->name('delete');
      Route::post('store', 'PatientController@store')->name('store');
      Route::post('update/{id}', 'PatientController@update')->name('update');
    });

    Route::prefix('doctors')->name('doctors.')->group(function () {
      Route::get('/', 'DoctorController@index')->name('index');
      Route::get('/create', 'DoctorController@create')->name('create');
      Route::get('/edit/{doctor}', 'DoctorController@edit')->name('edit');
      Route::get('/delete/{id}', 'DoctorController@delete')->name('delete');
      Route::post('/store', 'DoctorController@store')->name('store');
      Route::post('/update/{id}', 'DoctorController@update')->name('update');
    });

    Route::prefix('schedules')->name('schedules.')->group(function () {
      Route::get('/', 'ScheduleController@index')->name('index');
      Route::get('/create', 'ScheduleController@create')->name('create');
      Route::get('/edit/{schedule}', 'ScheduleController@edit')->name('edit');
      Route::get('/delete/{id}', 'ScheduleController@delete')->name('delete');
      Route::post('/store', 'ScheduleController@store')->name('store');
      Route::post('/update/{id}', 'ScheduleController@update')->name('update');
    });

    Route::prefix('users')->name('users.')->group(function () {
      Route::get('/', 'UserController@index')->name('index');
      Route::get('/create', 'UserController@create')->name('create');
      Route::get('/edit/{user}', 'UserController@edit')->name('edit');
      Route::get('/delete/{id}', 'UserController@delete')->name('delete');
      Route::post('/store', 'UserController@store')->name('store');
      Route::post('/update/{id}', 'UserController@update')->name('update');


      Route::patch('/{user}',  ['as' => 'users.update', 'uses' => 'UserController@update']);

    });
  });
});
