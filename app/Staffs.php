<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelIdGenerator\IdGenerator;
class Staffs extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'address','phone','city','photo','date_of_birth','date_employed','department','salary',
        'experience','status','slug'
    ];

    protected $dates = ['deleted_at'];

    public function user(){
        return $this->hasMany('App\User');
    }
    public function admin_profiles(){
        return $this->belongsTo('App\AdminProfile');
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->id= IdGenerator::generate(['table' => 'staffs', 'length' => 10, 'prefix' =>date('ym')]);
        });
    }

}
