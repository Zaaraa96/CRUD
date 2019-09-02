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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $hosts= DB::table('hosts')->get();
    $owner=DB::table('owners')->get();
    $service=DB::table('services')->get();
    $software=DB::table('software')->get();
    $username=DB::table('usernames')->get();
    $c=compact('hosts','owner','service','software','username');
    return $c;
});
