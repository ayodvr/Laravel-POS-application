<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelIdGenerator\IdGenerator;
class Staffs extends Model
{
    // use SoftDeletes;


    protected $fillable = [
        'address','phone','city','photo','date_of_birth','date_employed','department','salary',
        'experience','status','slug'
    ];

    // protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongs('App\User');
    }

    public function admin_profiles(){
        return $this->belongsTo('App\AdminProfile');
    }

    public function customers(){
        return $this->hasMany('App\Customers','id');
    }

    public function suppliers(){
        return $this->hasMany('App\Supplier','id');
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid= IdGenerator::generate(['table' => 'staffs', 'length' => 10, 'prefix' =>date('ym')]);
        });
    }

}
