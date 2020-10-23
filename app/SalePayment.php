<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalePayment extends Model
{
    protected $fillable = ['payment', 'sale_id', 'comments', 'payment_type'];

    public function sale()
    {
    	return $this->belongsTo('App\Sale');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
