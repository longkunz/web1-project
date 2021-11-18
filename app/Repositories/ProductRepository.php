<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductRepository
{
    //get product with number of product perpage
    public function getProducts($number_per_page)
    {
        return Product::paginate($number_per_page);
    }
    //get product detail by slug
    public function getProductDetail($slug)
    {
        return Product::where('slug', $slug)->first();
    }
    //get product with cat_info
    public function getProductWithCat($number_per_page)
    {
        return Product::with('cat_info')->orderBy('id', 'desc')->paginate($number_per_page);
    }
}
