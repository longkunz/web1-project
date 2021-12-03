<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Support\Str;
use Throwable;
class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }
    private $product;
    protected function setUp(): void
    {
        parent::setUp();
    }
    protected function tearDown(): void
    {
        parent::tearDown();
    }
    //Test valid product
    public function test_placeProduct()
    {
        $product = new Product();
        $product_data['title'] = "hello world";
        $product_data['slug'] = "hello-world";
        $product_data['summary'] = "hello world";
        $product_data['description'] = "hello world";
        $product_data['photo'] = "https://via.placeholder.com/640x480.png/00ff77?text=animals+eos";    
        $product_data['stock'] = "10";
        $product_data['status'] = "active";
        $product_data['price'] = "123456";
        $product_data['size'] = "12px";
        $product_data['cate'] = "1";
        DB::beginTransaction();
        $product->fill($product_data);
        $product->save();
        $actual = $product->where("price", "123456")->first();
        $this->assertEquals("123456", $actual->price);
        DB::rollBack();
    }
    //Test product with empty param title
    public function test_emptyTitle()
    {
        $product = new Product();
        $product_data['slug'] = "hello-world";
        $product_data['summary'] = "hello world";
        $product_data['description'] = "hello world";
        $product_data['photo'] = "https://via.placeholder.com/640x480.png/00ff77?text=animals+eos";    
        $product_data['stock'] = "10";
        $product_data['status'] = "active";
        $product_data['price'] = "123456";
        $product_data['size'] = "12px";
        $product_data['cate'] = "1";
        DB::beginTransaction();
        try {
            $product->fill($product_data);
            $product->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test Product with empty slug
    public function test_emptySlug()
    {
        $product = new Product();
        $product_data['title'] = "hello world";
        $product_data['summary'] = "hello world";
        $product_data['description'] = "hello world";
        $product_data['photo'] = "https://via.placeholder.com/640x480.png/00ff77?text=animals+eos";    
        $product_data['stock'] = "10";
        $product_data['status'] = "active";
        $product_data['price'] = "123456";
        $product_data['size'] = "12px";
        $product_data['cate'] = "1";
        DB::beginTransaction();
        try {
            $product->fill($product_data);
            $product->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test Product with empty summary
    public function test_emptySummary()
    {
        $product = new Product();
        $product_data['title'] = "hello world";
        $product_data['slug'] = "hello-world";
        $product_data['description'] = "hello world";
        $product_data['photo'] = "https://via.placeholder.com/640x480.png/00ff77?text=animals+eos";    
        $product_data['stock'] = "10";
        $product_data['status'] = "active";
        $product_data['price'] = "123456";
        $product_data['size'] = "12px";
        $product_data['cate'] = "1";
        DB::beginTransaction();
        try {
            $product->fill($product_data);
            $product->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test Product with empty description
    public function test_emptyDescription()
    {
        $product = new Product();
        $product_data['title'] = "hello world";
        $product_data['slug'] = "hello-world";
        $product_data['photo'] = "https://via.placeholder.com/640x480.png/00ff77?text=animals+eos";    
        $product_data['stock'] = "10";
        $product_data['status'] = "active";
        $product_data['price'] = "123456";
        $product_data['size'] = "12px";
        $product_data['cate'] = "1";
        DB::beginTransaction();
        try {
            $product->fill($product_data);
            $product->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test Product with empty Photo
    public function test_emptyPhoto()
    {
        $product = new Product();
        $product_data['title'] = "hello world";
        $product_data['slug'] = "hello-world";
        $product_data['summary'] = "hello world";
        $product_data['description'] = "hello world";  
        $product_data['stock'] = "10";
        $product_data['status'] = "active";
        $product_data['price'] = "123456";
        $product_data['size'] = "12px";
        $product_data['cate'] = "1";
        DB::beginTransaction();
        try {
            $product->fill($product_data);
            $product->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test Product with empty Stock
    public function test_emptyStock()
    {
        $product = new Product();
        $product_data['title'] = "hello world";
        $product_data['slug'] = "hello-world";
        $product_data['description'] = "hello world";
        $product_data['photo'] = "https://via.placeholder.com/640x480.png/00ff77?text=animals+eos";
        $product_data['status'] = "active";
        $product_data['price'] = "123456";
        $product_data['size'] = "12px";
        $product_data['cate'] = "1";
        DB::beginTransaction();
        try {
            $product->fill($product_data);
            $product->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test Product with empty Status
    public function test_emptyStatus()
    {
        $product = new Product();
        $product_data['title'] = "hello world";
        $product_data['slug'] = "hello-world";
        $product_data['description'] = "hello world";
        $product_data['photo'] = "https://via.placeholder.com/640x480.png/00ff77?text=animals+eos";    
        $product_data['stock'] = "10";
        $product_data['price'] = "123456";
        $product_data['size'] = "12px";
        $product_data['cate'] = "1";
        DB::beginTransaction();
        try {
            $product->fill($product_data);
            $product->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test Product with empty Price
    public function test_emptyPrice()
    {
        $product = new Product();
        $product_data['title'] = "hello world";
        $product_data['slug'] = "hello-world";
        $product_data['summary'] = "hello world";
        $product_data['description'] = "hello world";
        $product_data['photo'] = "https://via.placeholder.com/640x480.png/00ff77?text=animals+eos";    
        $product_data['stock'] = "10";
        $product_data['status'] = "active";
        $product_data['size'] = "12px";
        $product_data['cate'] = "1";
        DB::beginTransaction();
        try {
            $product->fill($product_data);
            $product->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test Product with empty Size
    public function test_emptySize()
    {
        $product = new Product();
        $product_data['title'] = "hello world";
        $product_data['slug'] = "hello-world";
        $product_data['summary'] = "hello world";
        $product_data['description'] = "hello world";
        $product_data['photo'] = "https://via.placeholder.com/640x480.png/00ff77?text=animals+eos";    
        $product_data['stock'] = "10";
        $product_data['status'] = "active";
        $product_data['price'] = "123456";
        $product_data['cate'] = "1";
        DB::beginTransaction();
        try {
            $product->fill($product_data);
            $product->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test Product with empty Categories
    public function test_emptyCategories()
    {
        $product = new Product();
        $product_data['title'] = "hello world";
        $product_data['slug'] = "hello-world";
        $product_data['description'] = "hello world";
        $product_data['photo'] = "https://via.placeholder.com/640x480.png/00ff77?text=animals+eos";    
        $product_data['stock'] = "10";
        $product_data['status'] = "active";
        $product_data['price'] = "123456";
        $product_data['size'] = "12px";
        DB::beginTransaction();
        try {
            $product->fill($product_data);
            $product->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test order with empty all fields
    public function test_emptyAll()
    {
        $product = new Product();
        $product_data = [];

        DB::beginTransaction();
        try {
            $product->fill($product_data);
            $product->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
}
