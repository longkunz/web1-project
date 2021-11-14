<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Product;

class CategoryController extends Controller
{

    //Construct
    protected $catRepository;
    public function __construct(CategoryRepository $catRepository)
    {
        $this->catRepository = $catRepository;
    }

    //Get product of category by slug
    public function getProductByCatId($id)
    {
        $categories = Category::all();
        $products = Product::where('cat_id', $id)->paginate(6);
        return view('page.catproducts', ['products' => $products, 'categories' => $categories]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->catRepository->getCategories(10);
        return view('backend.category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required',
            'status' => 'required|in:active,inactive',
        ]);
        $data = $request->all();
        //Tạo slug nếu không nhập slug
        $slug = Str::slug($request->name);
        $count = Category::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }
        //Gán slug
        $data['slug'] = $slug;
        // return $data;
        //Gán dữ liệu đã lưu vào db cho biến $status để kiểm tra. create là phương thức kế thừa từ model   
        $status = $this->catRepository->createData($data);
        if ($status) {
            request()->session()->flash('success', 'Category successfully added');
        } else {
            request()->session()->flash('error', 'Error occurred, Please try again!');
        }
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->catRepository->findCat($id);
        return view('backend.category.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = $this->catRepository->findCat($id);
        //Kiểm tra request -> trả về error
        $this->validate($request, [
            'name' => 'string|required',
            'status' => 'required|in:active,inactive',
        ]);
        $data = $request->all();
        //Lưu dữ liệu xuống database và kiểm tra
        $status = $category->fill($data)->save();
        if ($status) {
            request()->session()->flash('success', 'Category successfully updated');
        } else {
            request()->session()->flash('error', 'Error occurred, Please try again!');
        }
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->catRepository->findCat($id);
        // return $child_cat_id;
        $status = $category->delete();

        if ($status) {
            request()->session()->flash('success', 'Category successfully deleted');
        } else {
            request()->session()->flash('error', 'Error while deleting category');
        }
        return redirect()->route('category.index');
    }
}
