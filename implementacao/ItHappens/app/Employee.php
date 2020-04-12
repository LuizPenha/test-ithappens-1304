<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    public $timestamps = false;




    public function branch_id()
    {
        return $this->hasOne(Branch::class, 'id');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order', 'employee_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}

