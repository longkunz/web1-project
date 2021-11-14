<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use App\Models\Product;
use App\Models\Category;

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
}
