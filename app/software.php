<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class software extends Model
{
    //
    public function host(){
      return $this->belongsTo(host::class);
      }
}
