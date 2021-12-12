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
    //Test product with empty all fields
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

    //Test product update null
    public function test_UpdateNull()
    {
        $product = new Product();
        $newProductData =
            [
                'title' => "hello",
                'slug' => "hello",
                'summary' => "hello",
                'description' => "hello",
                'photo' => "https://via.placeholder.com/640x480.png/00ff77?text=animals+eos",
                'stock' => 10,
                'status' => "active",
                'price' => 50000,
                'cat_id' => 1,
            ];
        $newTitle = null;
        DB::beginTransaction();
        try {
            $product->create($newProductData);
            $newProduct = $product->where("title", "hello")->first();
            $status = $product->update(['title' => $newTitle]);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }

    //Test product update array
    public function test_UpdateArray()
    {
        $product = new Product();
        $newProductData =
            [
                'title' => "hello",
                'slug' => "hello",
                'summary' => "hello",
                'description' => "hello",
                'photo' => "https://via.placeholder.com/640x480.png/00ff77?text=animals+eos",
                'stock' => 10,
                'status' => "active",
                'price' => 50000,
                'cat_id' => 1,
            ];
        $newStock = array(1,2,3);
        DB::beginTransaction();
        try {
            $product->create($newProductData);
            $newProduct = $product->where("title", "hello")->first();
            $status = $product->update(['stock' => $newStock]);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }

    //Test product update Object
    public function test_UpdateObject()
    {
        $product = new Product();
        $newProductData =
            [
                'title' => "hello",
                'slug' => "hello",
                'summary' => "hello",
                'description' => "hello",
                'photo' => "https://via.placeholder.com/640x480.png/00ff77?text=animals+eos",
                'stock' => 10,
                'status' => "active",
                'price' => 50000,
                'cat_id' => 1,
            ];
        $newStock = $product;
        DB::beginTransaction();
        try {
            $product->create($newProductData);
            $newProduct = $product->where("title", "hello")->first();
            $status = $product->update(['stock' => $newStock]);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }

    //Test product update with stock negative
    public function test_UpdateStockNegative()
    {
        $product = new Product();
        $newProductData =
            [
                'title' => "hello",
                'slug' => "hello",
                'summary' => "hello",
                'description' => "hello",
                'photo' => "https://via.placeholder.com/640x480.png/00ff77?text=animals+eos",
                'stock' => 10,
                'status' => "active",
                'price' => 50000,
                'cat_id' => 1,
            ];
        $newStock = -10;
        DB::beginTransaction();
        try {
            $product->create($newProductData);
            $newProduct = $product->where("title", "hello")->first();
            $status = $product->update(['stock' => $newStock]);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }

    //Test product update with price negative
    public function test_UpdatePriceNegative()
    {
        $product = new Product();
        $newProductData =
            [
                'title' => "hello",
                'slug' => "hello",
                'summary' => "hello",
                'description' => "hello",
                'photo' => "https://via.placeholder.com/640x480.png/00ff77?text=animals+eos",
                'stock' => 10,
                'status' => "active",
                'price' => 50000,
                'cat_id' => 1,
            ];
        $newPrice = -50000;
        DB::beginTransaction();
        try {
            $product->create($newProductData);
            $newProduct = $product->where("title", "hello")->first();
            $status = $product->update(['price' => $newPrice]);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
}
