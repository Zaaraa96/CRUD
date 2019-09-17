<?php

namespace App\Http\Controllers;
Use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Gate;
class HostController extends Controller
{
  public function redis(){
    $thisredis=[];

    $userid = Auth::id();
    $user="user".(string)$userid;
    Redis::lpush($user ,'redisCall');
    //return Redis::lrange($user,0,-1);
    $users= Redis::keys('*');
    //return $users[0];
    foreach ($users as $user) {
      $id2=substr($user,17);
      array_push($thisredis,Redis::lrange($id2,0,-1));
    }

    return $thisredis;
  }
    public function index(){
      $hosts=\App\host::all();
      // $i=0;
      // $hostwithservice=[];
      foreach ($hosts as $host) {
        $services=$host->services;
        $owners=$host->owners;
        $softwares=$host->softwares;
        $usernames=$host->usernames;
      }
      $userid = Auth::id();
      $user="user".(string)$userid;
      Redis::lpush($user ,'read');
      //Redis::lpush($user ,$userid);
      return $hosts;
    }
    public function add(){
      $user=request('user');
      $userid = $user.id;
      $user="user".(string)$userid;
      Redis::lpush($user ,'create');
      // $this->validate(request(),[
      //   'hostname'=> 'required',
      //   'IP'=>'Nullable|ip',
      //   'collector'=>'Nullable',
      //   'assetValue'=>'Nullable',
      //   'icon'=>'Nullable|url',
      //   'FQND'=>'Nullable',
      //   'OS'=>'Nullable',
      //   'OSversion'=>'Nullable|numeric',
      //   'CPU'=>'Nullable',
      //   'CPUbrand'=>'Nullable',
      //   'RAM'=>'Nullable',
      //   'RAMbrand'=>'Nullable',
      //   'MACaddress'=>'Nullable|regex:/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/',
      //   'location'=>'Nullable',
      //   'HDD'=>'Nullable',
      //   'HDDbrand'=>'Nullable',
      //   'owners'=>'Nullable|array',
      //   'softwares'=>'Nullable|array',
      //   'services'=>'Nullable|array',
      //   'usernames'=>'Nullable|array',
      // ]);
      // if($validator->fails()){
      //     return response([
      //     'data' => [
      //     'message' => $valiator->errors()
      //     ],
      //     'status' => 'error'
      //     ], 422);
      // }

      $host= new \App\host;
      $host->hostname=request('hostname');
      $host->ip=request('IP');
      $host->collector=request('collector');
      $host->assetValue=request('assetValue');
      $host->icon=request('icon');
      $host->FQND=request('FQND');
      $host->OS=request('OS');
      $host->OSversion=request('OSversion');
      $host->CPU=request('CPU');
      $host->CPUbrand=request('CPUbrand');
      $host->RAM=request('RAM');
      $host->RAMbrand=request('RAMbrand');
      $host->MACaddress=request('MACaddress');
      $host->location=request('location');
      $host->HDD=request('HDD');
      $host->HDDbrand=request('HDDbrand');
      $host->save();
      $insertedId = $host->id;

      $owners= request('owners');
      foreach ($owners as $value):
        $owner= new \App\owner;
        $owner->hostID= $insertedId;
        $owner->owner=$value;
        $owner->save();
      endforeach;
      $softwares= request('softwares');
      foreach ($softwares as $value):
        $software= new \App\software;
        $software->hostID= $insertedId;
        $software->software= $value;
        $software->save();
      endforeach;
      $services= request('services');
      foreach ($services as $value):
        $service= new \App\service;
        $service->hostID= $insertedId;
        $service->service=$value;
        $service->save();
      endforeach;
      $usernames= request('usernames');
      foreach ($usernames as $value):
        $username=  new \App\username;
        $username->hostID= $insertedId;
        $username->username=$value;
        $username->save();
      endforeach;


      //check
      // public function store() {
      //
      // $input = Request::all();
      // $id = Company::create($input)->id;
      //
      // return redirect('company/'.$id);
      // }


    }
    public function delete($id){

     if(Gate::allows('updatedelete')){
        $hosts=\App\host::where('id',$id)->delete();
        $owner=\App\owner::where('hostID',$id)->delete();
        $service=\App\service::where('hostID',$id)->delete();
        $software=\App\software::where('hostID',$id)->delete();
        $username=\App\username::where('hostID',$id)->delete();
        $userid = Auth::id();
        $user="user".(string)$userid;
        Redis::lpush($user ,'delete');
     }
      abort(403,'not-access');

    }
    public function change($id){
      $this->validate(request(),[
        'hostname'=> 'required',
        'IP'=>'Nullable|ip',
        'collector'=>'Nullable',
        'assetValue'=>'Nullable',
        'icon'=>'Nullable|url',
        'FQND'=>'Nullable',
        'OS'=>'Nullable',
        'OSversion'=>'Nullable|numeric',
        'CPU'=>'Nullable',
        'CPUbrand'=>'Nullable',
        'RAM'=>'Nullable',
        'RAMbrand'=>'Nullable',
        'MACaddress'=>'Nullable|regex:/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/',
        'location'=>'Nullable',
        'HDD'=>'Nullable',
        'HDDbrand'=>'Nullable',
        'owners'=>'Nullable|array',
        'softwares'=>'Nullable|array',
        'services'=>'Nullable|array',
        'usernames'=>'Nullable|array',
      ]);
      if($validator->fails()){
          return response([
          'data' => [
          'message' => $valiator->errors()
          ],
          'status' => 'error'
          ], 422);
      }
      \App\host::where('id',$id)
      ->update(
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
      $owner=\App\owner::where('hostID',$id)->delete();
      $service=\App\service::where('hostID',$id)->delete();
      $software=\App\software::where('hostID',$id)->delete();
      $username=\App\username::where('hostID',$id)->delete();

      $owners= request('owners');
      foreach ($owners as $value):
        $owner= new \App\owner;
        $owner->hostID= $id;
        $owner->owner=$value;
        $owner->save();
      endforeach;
      $softwares= request('softwares');
      foreach ($softwares as $value):
        $software= new \App\software;
        $software->hostID= $id;
        $software->software= $value;
        $software->save();
      endforeach;
      $services= request('services');
      foreach ($services as $value):
        $service= new \App\service;
        $service->hostID= $id;
        $service->service=$value;
        $service->save();
      endforeach;
      $usernames= request('usernames');
      foreach ($usernames as $value):
        $username=  new \App\username;
        $username->hostID= $id;
        $username->username=$value;
        $username->save();
      endforeach;
      $userid = Auth::id();
      $user="user".(string)$userid;
      Redis::lpush($user ,'change');
    }
}
