<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','email', 'password','avatar_url','avatar_key','mobile','account_verified','active','verification_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function items(){
        return $this->hasMany('\App\Models\Item','user_id');
    }

    public function transactions(){
        return $this->hasMany('\App\Models\Transaction','user_id');
    }

    public function reviews(){
        return $this->hasMany('\App\Models\Review','user_id');
    }

    public function isAdmin(){
        return $this->user_type > 0;
    }

    public function isSuperAdmin(){
        return $this->user_type > 1;
    }

    public function isVerified(){
        return $this->account_verified;
    }

    public function fullName(){
        $full_name = "";
        if(!empty($this->last_name) && !empty($this->first_name)) $full_name =$this->last_name." ".$this->first_name;
        return $full_name;
    }

}
