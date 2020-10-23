<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
     //Table Name
     protected $table = 'suppliers';
     //Primary Key
      public $primaryKey = 'id';
     //Timestamps
     public $timestamps = true;

    public function admin_profiles(){

        return $this->belongsTo('App\AdminProfile','id');
    }

    public function staffs(){

        return $this->belongsTo('App\Staffs','id');
    }
}
