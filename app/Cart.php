<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
    	'user_id', 'product_id', 'quantity'
    ];

    public function totalWeight()
    {
        return $this->quantity * $this->product->weight;
    }

    public function totalPrice()
    {
        return $this->quantity * $this->product->price;
    }

    public function totalPriceStringFormatted()
    {
        return 'Rp ' . number_format($this->totalPrice(), 0, ',', '.');
    }

    //realtion
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}
