<?php

namespace App\Http\Controllers;
Use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Gate;
class HostController extends Controller
{
  public function redis(){
    $thisredis=[];
    $userid = Auth::id();
    $user="user".(string)$userid;
    Redis::lpush($user ,'redisCall');
    $users= Redis::keys('*');
    foreach ($users as $user) {
      $id2=substr($user,17);
      array_push($thisredis,Redis::lrange($id2,0,-1));
    }
    $object = (object) [
    'user' => $user,
    'data' => $thisredis,
  ];
    return json_encode($object);
  }
    public function index(){
      $hosts=\App\host::all();
      foreach ($hosts as $host) {
        $services=$host->services;
        $owners=$host->owners;
        $softwares=$host->softwares;
        $usernames=$host->usernames;
      }
      $userid = Auth::id();
      $user="user".(string)$userid;
      Redis::lpush($user ,'read');
      return $hosts;
    }
    public function add(Request $request){

      $validator = Validator::make($request->all(), [
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
          'message' => $validator->errors()
          ],
          'status' => 'error'
          ], 422);
      }

      $input = $request->all();
      $insertedId = \App\host::create($input)->id;

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
      $userid = Auth::id();
      $user="user".(string)$userid;
      Redis::lpush($user ,'create');
    }

    public function delete($id){

     //if(Gate::allows('updatedelete')){
        $hosts=\App\host::where('id',$id)->delete();
        $owner=\App\owner::where('hostID',$id)->delete();
        $service=\App\service::where('hostID',$id)->delete();
        $software=\App\software::where('hostID',$id)->delete();
        $username=\App\username::where('hostID',$id)->delete();
        $userid = Auth::id();
        $user="user".(string)$userid;
        Redis::lpush($user ,'delete');
     // }
     //  abort(403,'not-access');

    }
    public function change($id,Request $request){

      $validator = Validator::make($request->all(), [
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
          'message' => $validator->errors()
          ],
          'status' => 'error'
          ], 422);
      }
      $input = $request->all();
      \App\host::where('id',$id)->first()->update($input);

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
