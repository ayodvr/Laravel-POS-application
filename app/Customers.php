<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $fillable = ['name', 'email', 'phone_number','avatar','address','city','state','zip','company','account','prev_balance','payment','prev_balance'];

    public function admin_profiles(){
        
        return $this->belongsTo('App\AdminProfile');

    }
    public function staffs(){
        
        return $this->belongsTo('App\Staffs');

    }

    public function user(){
        
        return $this->belongsTo('App\User');

    }
}
