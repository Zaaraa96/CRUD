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
}
