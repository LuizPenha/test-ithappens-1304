<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'id','branch_id' , 'employee_id', 'type_id', 'client_id', 'observation',
    ];


    public $timestamps = false;


    public function payment()
    {
        return $this->hasOne('App\Payment');
    }



    public function branch()
    {
        return $this->hasOne('App\Branch', 'id', 'branch_id');
    }

    public function client()
    {
        return $this->hasOne('App\User', 'id', 'client_id');
    }

    public function employee()
    {
        return $this->hasOne('App\Employee', 'id', 'employee_id');
    }   

    public function employee_user()
    {
        return $this->hasOneThrough('App\Employee', 'App\User', 'user_id', 'Employ_id', 'id', 'id');
    }

}
