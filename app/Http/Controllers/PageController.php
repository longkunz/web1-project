<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    //Index page
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        return view('index')->with('products', $products);
    }

    public function getSearch(Request $req)
    {
        $product = Product::where('title', 'like','%'.$req->key.'%')
        ->orwhere ('summary', $req->key)
        ->get();

        return view('page.search', compact('product'));
    }

    //Checkout page
    public function checkout()
    {
        $cart = Cart::with('product')->where('order_id', null)->where('user_id', Auth::user()->id)->orderBy('id', 'ASC')->get();
        return view('page.checkout')->with('cart', $cart);
    }
}
