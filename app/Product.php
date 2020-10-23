<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Product extends Model
{

     //Table Name
     protected $table = 'products';
     //Primary Key
      public $primaryKey = 'id';
     //Timestamps
     public $timestamps = true;

    public function sales(){

        return $this->hasMany('App\Sales','id');
    }

    public function inventory()
    {
        return $this->hasMany('App\Inventory')->orderBy('id', 'DESC');
    }

    public function categories(){

        return $this->belongsTo('App\Category','cat_id');
    }

    public function saletemp()
    {
        return $this->hasMany('App\SaleTemp')->orderBy('id', 'DESC');
    }

    public function saleitem()
    {
        return $this->hasMany('App\SaleItem');
    }


    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = IdGenerator::generate(['table' => 'products', 'length' => 10, 'prefix' =>date('ym')]);
        });
    }
}
