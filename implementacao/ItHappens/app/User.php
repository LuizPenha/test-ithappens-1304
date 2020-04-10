<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $timestamps = false;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'type_id',
        'name',
        'email',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //'password', 'remember_token',
    ];



    public function orders()
    {
        return $this->hasMany('App\Order', 'client_id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'user_id', 'id')->where('type_id',4);
    }

    // public function employee()
    // {
    //     return $this->belongsTo( Employee::class , 'user_id');
    // }

}
