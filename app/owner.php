<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class owner extends Model
{
    //
    public function host(){
      return $this->belongsTo(host::class);
      }
}
