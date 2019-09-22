<?php

Use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

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
//
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Auth::routes();
Route::post('/login','userController@login');
Route::middleware('auth:api')->group(function(){
  Route::get('/dashboard', 'HostController@index');

  Route::post('/dashboard', 'HostController@add');

  Route::get('/delete/{id}','HostController@delete');

  Route::post('/change/{id}', 'HostController@change');
});
