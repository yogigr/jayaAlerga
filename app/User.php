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
        'name', 'email', 'password', 'role_id', 'city_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->role_id == 1;
    }

    public function cartCount()
    {
        $count = 0;
        foreach ($this->carts as $cart) {
            $count += $cart->quantity;
        }
        return $count;
    }

    //relaaation
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function carts()
    {
        return $this->hasMany('App\Cart');
    }
}
