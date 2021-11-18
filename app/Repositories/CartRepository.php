<?php

namespace App\Repositories;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;

class CartRepository
{
    //Show cart
    public function showCart()
    {
        return Cart::with('product')->where('order_id', null)->where('user_id', Auth::user()->id)->orderBy('id', 'ASC')->paginate(15);
    }

    //Store item to cart
    public function storeCartItem(Request $request)
    {
        // dd($request);
        $quant = $request->quantity;
        if (!$quant) {
            $quant = 1;
        }
        if (empty($request->slug)) {
            request()->session()->flash('error', 'Invalid Products');
            return back();
        }
        $product = Product::where('slug', $request->slug)->first();
        // return $product;
        if (empty($product)) {
            request()->session()->flash('error', 'Invalid Products');
            return back();
        }

        $already_cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $product->id)->first();
        // return $already_cart;
        if ($already_cart) {
            // dd($already_cart);
            $already_cart->quantity = $already_cart->quantity + $quant;
            $already_cart->amount = $product->price + $already_cart->amount;
            // return $already_cart->quantity;
            if ($already_cart->product->stock < $already_cart->quantity || $already_cart->product->stock <= 0) return back()->with('error', 'Stock not sufficient!.');
            $already_cart->save();
        } else {
            $cart = new Cart;
            $cart->user_id = auth()->user()->id;
            $cart->product_id = $product->id;
            $cart->price = $product->price;
            $cart->quantity = $quant;
            $cart->amount = $cart->price * $cart->quantity;
            if ($cart->product->stock < $cart->quantity || $cart->product->stock <= 0) return back()->with('error', 'Stock not sufficient!.');
            $cart->save();
        }
    }

    //Update cart item
    public function updateCartItem(Request $request)
    {
        foreach ($request->quantity as $position => $quant) {
            $id = $request->cartId[$position];
            $cart = Cart::find($id);
            if ($quant > 0 && $cart) {
                if ($cart->product->stock < $quant) {
                    request()->session()->flash('error', 'Out of stock');
                    return back();
                }
                $cart->quantity = ($cart->product->stock > $quant) ? $quant  : $cart->product->stock;
                if ($cart->product->stock <= 0) continue;
                $after_price = $cart->product->price;
                $cart->amount = $after_price * $quant;
                $cart->save();
            }
        }
    }

    //Find cart item
    public function findCartItem($id)
    {
        return Cart::find($id)->first();
    }
}
