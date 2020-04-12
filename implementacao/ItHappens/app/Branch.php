<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    //

    protected $fillable = [
        'description'
    ];

    public $timestamps = false;


    public function stock()
    {

        return $this->hasMany(Stock::class);
    }



    public function orders()
    {
        return $this->belongsToMany('App\Order', 'branch_id', 'id');
    }
    
}
