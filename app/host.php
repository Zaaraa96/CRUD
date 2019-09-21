<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class host extends Model
{
    protected $fillable=[
      'hostname',
      'IP',
      'collector',
      'assetValue',
      'icon',
      'FQND',
      'OS',
      'OSversion',
      'CPU',
      'CPUbrand',
      'RAM',
      'RAMbrand',
      'MACaddress',
      'location',
      'HDD',
      'HDDbrand'
    ];



    public function services(){
      return $this->hasMany(service::class, 'hostID');
    }
    public function usernames(){
      return $this->hasMany(username::class, 'hostID');
    }
    public function owners(){
      return $this->hasMany(owner::class, 'hostID');
    }
    public function softwares(){
      return $this->hasMany(software::class, 'hostID');
    }
}
