<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'summary', 'description', 'cat_id', 'price', 'status', 'photo', 'stock', 'size', 'version'];
    protected $attributes = [
        'version' => 0,
    ];
    //Đếm số sản phẩm đang active trong db
    public static function countActiveProduct()
    {
        $data = Product::where('status', 'active')->count();
        if ($data) {
            return $data;
        }
        return 0;
    }
    //Định nghĩa cat_info để lấy thông tin category của product
    public function cat_info()
    {
        //Quan hệ N - 1
        return $this->hasOne('App\Models\Category', 'id', 'cat_id');
    }
    public static function getProductBySlug($slug)
    {
        return Product::with(['cat_info', 'rel_prods'])->where('slug', $slug)->first();
    }
    public function rel_prods()
    {
        return $this->hasMany('App\Models\Product', 'cat_id', 'cat_id')->where('status', 'active')->orderBy('id', 'DESC')->limit(8);
    }
}
