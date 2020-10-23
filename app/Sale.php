<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function customer()
    {
        return $this->belongsTo('App\Customers');
    }

    public static function sale_detailed($sale_id)
    {
        $SaleItems = SaleItem::where('sale_id', $sale_id)->get();
        return $SaleItems;
    }

    public function sale_payment()
    {
        return $this->hasMany('App\SalePayment');
    }
}
