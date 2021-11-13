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
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('index')->with('products', $products)
        ->with('categories', $categories);
    }

    public function getSearch(Request $req)
    {
        $product = Product::where('title', 'like','%'.$req->key.'%')
        ->orwhere ('summary', $req->key)
        ->get();

        return view('page.search', compact('product'));
    }

    public function category($cat_id)
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $cate = Category::where('id', $cat_id)->first();
        $product = Product::where('cat_id',$cate->id)->get();
        return view('page.category')->with('categories', $cate)
        ->with('products', $product);
    }
}
