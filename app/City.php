<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
    	'name', 'province_id', 'type', 'postal_code'
    ];

    public function users()
    {
    	return $this->hasMany('App\User');
    }
}
