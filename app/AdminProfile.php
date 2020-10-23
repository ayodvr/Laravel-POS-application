<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminProfile extends Model
{
    //Table Name
    protected $table = 'admin_profiles';
    //Primary Key
     public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function staffs(){
        return $this->hasMany('App\Staffs','id');
    }

    public function customers(){
        return $this->hasMany('App\Customers','id');
    }

    public function suppliers(){
        return $this->hasMany('App\Supplier','id');
    }
}
