<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['name','slug','status'];
    //Lấy danh sách sản phẩm trong category
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'cat_id', 'id')->where('status', 'active');
    }
    //Tìm sản phẩm trong category
    public static function getProductByCat($slug)
    {
        return Category::with('products')->where('slug', $slug)->first();
    }
    //Đếm số category đang active
    public static function countActiveCategory()
    {
        $data = Category::where('status', 'active')->count();
        if ($data) {
            return $data;
        }
        return 0;
    }
}
