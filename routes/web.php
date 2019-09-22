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
Use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

//Auth::routes();
// Route::post('/login', 'userController@login');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/{any}', function ($any) {
    return view('welcome');
})->where('any', '.*');
