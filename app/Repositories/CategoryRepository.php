<?php

namespace App\Repositories;
use App\Models\Category;

class CategoryRepository{
    //Get list categories
    public function getCategories($num){
        return Category::orderBy('id', 'DESC')->paginate($num);
    }
    //Create data
    public function createData($data){
        return Category::create($data);
    }
    //Find category
    public function findCat($id){
        return Category::findOrFail($id);
    }
}