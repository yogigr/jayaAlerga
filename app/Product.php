<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'code', 'name', 'slug', 'price', 'category_id', 'weight'
    ];

    public function priceStringFormatted()
    {
    	return 'Rp ' . number_format($this->price, 0, '', '.');
    }

    public function weightInKilo()
    {
        return number_format($this->weight / 1000, 2, ',', '.') . ' Kg';
    }

    //relasi
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
