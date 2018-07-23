<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\OngkirTrait;
use Auth;
use File;
use App\Cart;
use App\Product;

class CartController extends Controller
{
    use OngkirTrait;
    
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
        $carts = Auth::user()->carts;
        $totalBeratInKilo = $this->totalBeratInKilo($carts);
        $subtotal = $this->subtotal($carts);
        $subtotalFormatted = $this->subtotalStringFormatted($carts);
        $this->getOngkirJson($carts);
        $daftarLayananJne = $this->daftarLayananJne();
        return view('cart.index', compact(
            'carts', 'totalBeratInKilo', 'subtotalFormatted', 'daftarLayananJne', 'subtotal'
        ));
    }

    public function store(Request $request, Product $product)
    {
    	if (!$request->ajax()) {
    		abort(404);
    	}

        if (Cart::where('user_id', Auth::id())->where('product_id', $product->id)->count() > 0) {
            $cart = Cart::where('user_id', Auth::id())->where('product_id', $product->id)->first();
            $cart->quantity += $request->quantity;
            $cart->save();
            return;
        }

        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => $request->quantity,
        ]);
        return;
    }

    public function update(Request $request, Cart $cart)
    {
        $cart->quantity = $request->quantity;
        $cart->save();
        return back();
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return back();
    }

    public function clear()
    {
       Cart::where('user_id', Auth::id())->delete();
       return  back();
    }

    private function totalBerat($carts)
    {
        $totalBerat = 0;
        foreach ($carts as $c) {
            $totalBerat += $c->totalWeight();
        }
        return $totalBerat;
    }

    private function totalBeratInKilo($carts)
    {
        return number_format($this->totalBerat($carts) / 1000, 2, ',', '.').' Kg';
    }

    private function subtotal($carts)
    {
        $subtotal = 0;
        foreach ($carts as $c) {
            $subtotal += $c->totalPrice();
        }
        return $subtotal;
    }

    private function subtotalStringFormatted($carts)
    {
        return 'Rp '.number_format($this->subtotal($carts), 0, '', '.');
    }
}
