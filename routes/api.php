<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
  return $request->user();
});

Route::prefix('doctors')->group(function () {

  Route::get('/', function () {
    return \App\Doctor::all();
  });

  Route::get('/{id}', function ($id) {
    try {
      return \App\Doctor::findOrFail($id);
    } catch (Exception $e) {
      return response()->json([
        'Error' => 'Register not found'
      ]);
    }
  });
});
