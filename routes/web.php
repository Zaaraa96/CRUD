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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/redis',function(){
  $thisredis=Redis::lrange('user1',0,-1);
  return $thisredis;
});
Route::middleware('auth')->get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->get('/{any}', function ($any) {
    return view('welcome');
})->where('any', '.*');
