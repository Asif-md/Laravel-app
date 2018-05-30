<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
      //table name
    protected  $table = 'customers';
    //primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function user(){
       // return $this->belongsTo('App\User');
       return $this->belongsTo('App\Admin');
    }

    public function cx_user(){
      return $this->belongsTo('App\User');
  }
}
