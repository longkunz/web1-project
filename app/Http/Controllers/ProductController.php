<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Repositories\ProductRepository;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\CategoryRepository;

class ProductController extends Controller
{
    //Construct
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    //Show list product
    public function listProducts()
    {
        $products = $this->productRepository->getProducts(6);
        $categories= Category::get();
        return view('page.products')->with('products', $products)->with('categories',$categories);
    }
    //get product detail by slug
    public function productDetail($slug)
    {
        $product = $this->productRepository->getProductDetail($slug);
        return view('page.product')->with('product', $product);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository->getProductWithCat(10);
        return view('backend.product.index', compact('products', $products));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::get();
        return view('backend.product.create')->with('categories', $category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate data from request
        $this->validate($request, [
            'title' => 'string|required',
            'summary' => 'string|required',
            'description' => 'string|nullable',
            'photo' => 'string|required',
            'stock' => "required|numeric",
            'status' => 'required|in:active,inactive',
            'price' => 'required|numeric',
            'size' => 'string|nullable',
        ]);
        //Assign data
        $data = $request->all();

        //Create slug
        $slug = Str::slug($request->title);
        //Check unique slug
        $count = Product::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }
        //Assign slug to $data
        $data['slug'] = $slug;

        //Call create product function
        $status = Product::create($data);

        //Check process
        if ($status) {
            request()->session()->flash('success', 'Product Successfully added');
        } else {
            request()->session()->flash('error', 'Please try again!!');
        }
        return redirect()->route('product.index');
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
        $product = Product::findOrFail($id);
        $category = Category::get();
        // return $items;
        return view('backend.product.edit')->with('product', $product)
            ->with('categories', $category);
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
        $product = Product::findOrFail($id);
        //Kiểm tra dữ liệu gửi về từ request
        $this->validate($request, [
            'title' => 'string|required',
            'summary' => 'string|required',
            'description' => 'string|nullable',
            'photo' => 'string|required',
            'stock' => "required|numeric",
            'cat_id' => 'required|exists:categories,id',
            'status' => 'required|in:active,inactive',
            'price' => 'required|numeric',
            'size' => 'string|nullable',
        ]);
        // //Gán dữ liệu
        $data = $request->all();
        //$data['is_featured'] = $request->input('is_featured', 0);
        //Gọi phương thức update
        $status = $product->fill($data)->save();
        //Kiểm tra quá trình thêm product đã thành công hay chưa
        if ($status) {
            request()->session()->flash('success', 'Product Updated Successfully');
        } else {
            request()->session()->flash('error', 'Please try again!!');
        }
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $status = $product->delete();
        //Kiểm tra quá trình thêm product đã thành công hay chưa
        if ($status) {
            request()->session()->flash('success', 'Product Deleted Successfully');
        } else {
            request()->session()->flash('error', 'Please try again!!');
        }
        return redirect()->route('product.index');
    }
}