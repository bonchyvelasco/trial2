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
        'username', 'email', 'password', 'firstname', 'lastname'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
    */
    protected $hidden = [
        'password', 'is_admin'
    ];

    public $timestamps = false;

    // public function getRememberToken()
    // {
    // return null; // not supported
    // }

    // public function setRememberToken($value)
    // {
    // // not supported
    // }

    // public function getRememberTokenName()
    // {
    // return null; // not supported
    // }

    /**
    * Overrides the method to ignore the remember token.
    */
    public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute)
        {
            parent::setAttribute($key, $value);
        }
    }
    
    public function products() {
        return $this->hasMany('App\Product');
    }

    public function buys() {
        return $this->hasMany('App\Buy');
    }
}
