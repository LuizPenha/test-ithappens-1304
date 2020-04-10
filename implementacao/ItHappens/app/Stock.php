<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
    public $timestamps = false;


    public function branch()
    {
        return $this->belongsTo(Branch::class,'id','branch_id');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
