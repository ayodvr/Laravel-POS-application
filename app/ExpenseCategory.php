<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    protected $fillable = ['name', 'slug', 'description'];

    public function expense()
    {
    	return $this->hasMany('App\Expense','expense_category_id');
    }
}
