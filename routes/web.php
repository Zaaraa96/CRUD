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
Use app\host;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->get('/', function () {
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


Route::post('/dashboard', function () {
      $id= DB::table('hosts')->insertGetId(
      ['hostname'=>request('hostname'),
      'ip'=>request('IP'),
      'collector'=>request('collector'),
      'assetValue'=>request('assetValue'),
      'icon'=>request('icon'),
      'FQND'=>request('FQND'),
      'OS'=>request('OS'),
      'OSversion'=>request('OSversion'),
      'CPU'=>request('CPU'),
      'CPUbrand'=>request('CPUbrand'),
      'RAM'=>request('RAM'),
      'RAMbrand'=>request('RAMbrand'),
      'MACaddress'=>request('MACaddress'),
      'location'=>request('location'),
      'HDD'=>request('HDD'),
      'HDDbrand'=>request('HDDbrand')
    ]);
    $owners= request('owners');
    foreach ($owners as $value):
      DB::table('owners')->insert([
        'hostID'=>$id,
        'owner'=>$value
      ]);
    endforeach;
    $softwares= request('softwares');
    foreach ($softwares as $value):
      DB::table('software')->insert([
        'hostID'=>$id,
        'software'=>$value
      ]);
    endforeach;
    $services= request('services');
    foreach ($services as $value):
      DB::table('services')->insert([
        'hostID'=>$id,
        'service'=>$value
      ]);
    endforeach;
    $usernames= request('usernames');
    foreach ($usernames as $value):
      DB::table('usernames')->insert([
        'hostID'=>$id,
        'username'=>$value
      ]);
    endforeach;

});

Route::get('/delete/{id}',function($id){
  DB::table('hosts')->where('id',$id)->delete();
  DB::table('owners')->where('hostID',$id)->delete();
  DB::table('usernames')->where('hostID',$id)->delete();
  DB::table('services')->where('hostID',$id)->delete();
  DB::table('services')->where('hostID',$id)->delete();
  DB::table('software')->where('hostID',$id)->delete();
});


Route::post('/change/{id}', function($id) {
      DB::table('hosts')->where('id', $id)->update(
      ['hostname'=>request('hostname'),
      'ip'=>request('IP'),
      'collector'=>request('collector'),
      'assetValue'=>request('assetValue'),
      'icon'=>request('icon'),
      'FQND'=>request('FQND'),
      'OS'=>request('OS'),
      'OSversion'=>request('OSversion'),
      'CPU'=>request('CPU'),
      'CPUbrand'=>request('CPUbrand'),
      'RAM'=>request('RAM'),
      'RAMbrand'=>request('RAMbrand'),
      'MACaddress'=>request('MACaddress'),
      'location'=>request('location'),
      'HDD'=>request('HDD'),
      'HDDbrand'=>request('HDDbrand')
    ]);
    DB::table('owners')->where('hostID',$id)->delete();
    DB::table('usernames')->where('hostID',$id)->delete();
    DB::table('services')->where('hostID',$id)->delete();
    DB::table('services')->where('hostID',$id)->delete();
    DB::table('software')->where('hostID',$id)->delete();
    $owners= request('owners');
    // $s=implode("",$owner);
    // $owners = explode(",", $s);
    foreach ($owners as $value):
      DB::table('owners')->insert([
        'hostID'=>$id,
        'owner'=>$value
      ]);
    endforeach;
    $softwares= request('softwares');
    // $s=implode("",$software);
    // $softwares = explode(",", $s);
    foreach ($softwares as $value):
      DB::table('software')->insert([
        'hostID'=>$id,
        'software'=>$value
      ]);
    endforeach;
    $services= request('services');
    // $s=implode("",$service);
    // $services = explode(",",$s);
    foreach ($services as $value):
      DB::table('services')->insert([
        'hostID'=>$id,
        'service'=>$value
      ]);
    endforeach;
    $usernames= request('usernames');
    // $s=implode("",$username);
    // $usernames= explode(",",$s);
    foreach ($usernames as $value):
      DB::table('usernames')->insert([
        'hostID'=>$id,
        'username'=>$value
      ]);
    endforeach;

});
