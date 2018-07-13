<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'email', 'password','gender','phone','address','birthDate'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    function is_admin (){
        $role=$this->role ;
        if($role==0)
            {return true;}
        return false;
    }

    function is_doctor(){
        $role=$this->role ;
        if($role==1)
            {return true;}
        return false;
    }

 function is_student(){
        $role=$this->role ;
        if($role==2)
            {return true;}
        return false;
    }

}

