<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receving extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }

    public static function receiving_detailed($receiving_id)
    {
        $receivingitems = ReceivingItem::where('receiving_id', $receiving_id)->get();
        return $receivingitems;
    }
}
