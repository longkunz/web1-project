<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class PageController extends Controller
{
    //Index page
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->get()->take(16);
        $banners = Banner::orderBy('id', 'DESC')->where('status', 'active')->get();
        $cate1 = Category::where('status', 'active')->where('id', 1)->first();
        $cate2 = Category::where('status', 'active')->where('id', 2)->first();
        $cate3 = Category::where('status', 'active')->where('id', 3)->first();
        $cate4 = Category::where('status', 'active')->where('id', 4)->first();
        $best = Cart::with('product')->get()->take(8);
        return view('index')->with('products', $products)
            ->with('banners', $banners)
            ->with('cate1', $cate1)
            ->with('cate2', $cate2)
            ->with('cate3', $cate3)
            ->with('cate4', $cate4)
            ->with('best', $best);
    }

    public function getSearch(Request $req)
    {
        $product = Product::where('title', 'like', '%' . $req->key . '%')
            ->orwhere('summary', $req->key)
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
