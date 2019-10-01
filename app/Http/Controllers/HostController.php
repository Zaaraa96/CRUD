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
  public $valid=[
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
    ];
  public $multi=[
      'services'=> ['services','service','\App\service'],
      'owners'=>['owners','owner','\App\owner'],
      'softwares'=>['softwares','software','\App\software'],
      'usernames'=>['usernames','username','\App\username'],
    ];

  public function redis(){
    $thisredis=[];
    $userid = Auth::id();
    $user2="user".(string)$userid;
    Redis::lpush($user2 ,'redisCall');
    $users= Redis::keys('*');
    foreach ($users as $user) {
      $id2=substr($user,17);
      if($id2==$user2){
        array_push($thisredis,Redis::lrange($id2,0,-1));
      }
    }
    $object = (object) [
    'user' => $user2,
    'data' => $thisredis,
  ];
    return json_encode($object);
  }
    public function index(){
      $hosts=\App\host::all();
      $multi=$this->multi;
      foreach ($hosts as $host) {
        foreach ($multi as $key => $value) {
          $type=$value[0];
          $key=$host->$type;
        }
      }
      $userid = Auth::id();
      $user="user".(string)$userid;
      Redis::lpush($user ,'read');
      return $hosts;
    }
    public function add(Request $request){
      if(Gate::allows('updatedelete')){
      $validator = Validator::make($request->all(), $this->valid);

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
      $multi=$this->multi;
      foreach ($multi as $key => $val) {
        $r=$val[0];
        $key=request($r);
        $r2=$val[1];
        $r3=$val[2];
        foreach ($key as $value):
          $prop= new $r3;
          $prop->hostID= $insertedId;
          $prop->$r2=$value;
          $prop->save();
        endforeach;
      }

      $userid = Auth::id();
      $user="user".(string)$userid;
      Redis::lpush($user ,'create');
      }else {
        abort(403,'not-access');
      }
    }

    public function delete($id){
     if(Gate::allows('updatedelete')){
        $hosts=\App\host::where('id',$id)->delete();
        $multi=$this->multi;
        foreach ($multi as $key => $val) {
          $r3=$val[2];
          $d=$r3::where('hostID',$id)->delete();
        }
        $userid = Auth::id();
        $user="user".(string)$userid;
        Redis::lpush($user ,'delete');
       }else {
         abort(403,'not-access');
       }


    }
    public function change($id,Request $request){
      if(Gate::allows('updatedelete')){
      $validator = Validator::make($request->all(), $this->valid);

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
      $multi=$this->multi;
      foreach ($multi as $key => $val) {
        $r=$val[0];
        $key=request($r);
        $r2=$val[1];
        $r3=$val[2];
        $d=$r3::where('hostID',$id)->delete();
        foreach ($key as $value):
          $prop= new $r3;
          $prop->hostID= $id;
          $prop->$r2=$value;
          $prop->save();
        endforeach;
      }

      $userid = Auth::id();
      $user="user".(string)$userid;
      Redis::lpush($user ,'change');
      }else {
        abort(403,'not-access');
      }
    }
}
