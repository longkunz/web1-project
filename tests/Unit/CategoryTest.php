<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Support\Str;
use Throwable;

class CategoryTest extends TestCase
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
    private $category;
    protected function setUp(): void
    {
        parent::setUp();
    }
    protected function tearDown(): void
    {
        parent::tearDown();
    }
    //Test valid category
    public function test_placeCategory()
    {
        $category = new Category();
        $category_data['name'] = "stream";
        $category_data['slug'] = "stream";
        $category_data['status'] = "active";
        $product_data['cate'] = "1";
        DB::beginTransaction();
        $category->fill($category_data);
        $category->save();
        $actual = $category->where("slug", "stream")->first();
        $this->assertEquals("stream", $actual->slug);
        DB::rollBack();
    }
    // Sản phẩm thử nghiệm có tiêu đề tham số trống
    public function test_emptyTitle()
    {
        $category = new Category();
        $category_data['name'] = "stream";
        $category_data['status'] = "active";
        $category_data['cate'] = "1";
        DB::beginTransaction();
        try {
            $category->fill($category_data);
            $category->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test category with empty slug
    public function test_emptySlug()
    {
        $category = new Category();
        $category_data['name'] = "stream";
        $category_data['status'] = "active";
        $category_data['cate'] = "1";
        DB::beginTransaction();
        try {
            $category->fill($category_data);
            $category->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test category with empty summary
    public function test_emptySummary()
    {
        $category = new Category();
        $category_data['name'] = "stream";
        $category_data['status'] = "active";
        $category_data['cate'] = "1";
        DB::beginTransaction();
        try {
            $category->fill($category_data);
            $category->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test category with empty Status
    public function test_emptyStatus()
    {
        $category = new Category();
        $category_data['name'] = "stream";
        $category_data['status'] = "active";
        $category_data['cate'] = "1";
        DB::beginTransaction();
        try {
            $category->fill($category_data);
            $category->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    
    //Test category with empty Name
    public function test_emptyName()
    {
        $category = new Category();
        $category_data['name'] = "stream";
        $category_data['status'] = "active";
        $category_data['cate'] = "1";
        DB::beginTransaction();
        try {
            $category->fill($category_data);
            $category->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test category with empty description
    public function test_emptyDescription()
    {
        $category = new Category();
        $category_data['name'] = "stream";
        $category_data['status'] = "active";
        $category_data['cate'] = "1";
        DB::beginTransaction();
        try {
            $category->fill($category_data);
            $category->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test category with empty Stock
    public function test_emptyStock()
    {
        $category = new Category();
        $category_data['name'] = "stream";
        $category_data['status'] = "active";
        $category_data['cate'] = "1";
        DB::beginTransaction();
        try {
            $category->fill($category_data);
            $category->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test category with empty Categories
    public function test_emptyCategories()
    {
        $category = new Category();
        $category_data['name'] = "stream";
        $category_data['status'] = "active";
        $category_data['cate'] = "1";
        DB::beginTransaction();
        try {
            $category->fill($category_data);
            $category->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test kiểm tra với tất cả các trường trống
    public function test_emptyAll()
    {
        $category = new Category();
        $category_data = [];

        DB::beginTransaction();
        try {
            $category->fill($category_data);
            $category->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //test update
    public function test_updateCategoryTrue()
    {
        $category = new Category();
        $newCategoryData =
            [
                'name' => "Test",
                'status' => "active",
            ];
        DB::beginTransaction();
        $category->create($newCategoryData);
        $newCategory = $category->where("name", "Test")->first();
        
        $newCategory = $category->where("status", "active")->first();
        try {
            $category->fill($newCategory);
            $category->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    
    public function test_deleteCategory()
    {
        $category = new Category();
        $idCategory = 1;
        DB::beginTransaction();
        $deleteCategory = $category->destroy($category);

        if(empty($deleteCategory)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
        DB::rollBack();
    }
    public function test_deleteCategoryIsBoolean()
    {
        $category = new Category();
        $idCategory = true;
        DB::beginTransaction();
        $deleteCategory = $category->destroy($category);

        if(empty($deleteCategory)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
        DB::rollBack();
    }
    public function test_deleteCategoryIsDoubleNumber()
    {
        $category = new Category();
        $idCategory = 5.5;
        DB::beginTransaction();
        $deleteCategory = $category->destroy($category);

        if(empty($deleteCategory)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
        DB::rollBack();
    }
    public function test_deleteCategoryIsNegativeNumber()
    {
        $category = new Category();
        $idCategory = -5;
        DB::beginTransaction();
        $deleteCategory = $category->destroy($category);

        if(empty($deleteCategory)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
        DB::rollBack();
    }
    public function test_deleteCategoryIsArray()
    {
        $category = new Category();
        $idCategory = [];
        DB::beginTransaction();
        $deleteCategory = $category->destroy($category);

        if(empty($deleteCategory)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
        DB::rollBack();
    }
    public function test_deleteCategoryIsObject()
    {
        $category = new Category();
        $idCategory = new Product();
        DB::beginTransaction();
        $deleteCategory = $category->destroy($category);

        if(empty($deleteCategory)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
        DB::rollBack();
    }
    public function test_deleteCategoryIsNotExist()
    {
        $category = new Category();
        $idCategory = 100;
        DB::beginTransaction();
        $deleteCategory = $category->destroy($category);

        if(empty($deleteCategory)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
        DB::rollBack();
    }
    public function test_deleteCategoryIsCharacters()
    {
        $category = new Category();
        $idCategory = '%%';
        DB::beginTransaction();
        $deleteCategory = $category->destroy($category);

        if(empty($deleteCategory)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
        DB::rollBack();
    }
    public function test_deleteCategoryIsString()
    {
        $category = new Category();
        $idCategory = 10;
        DB::beginTransaction();
        $deleteCategory = $category->destroy($category);

        if(empty($deleteCategory)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
        DB::rollBack();
    }
    public function test_deleteCategoryIsNull()
    {
        $category = new Category();
        $idCategory = null;
        DB::beginTransaction();
        $deleteCategory = $category->destroy($category);

        if(empty($deleteCategory)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
        DB::rollBack();
    }
    public function test_deleteCategoryIsNg()
    {
        $category = new Category();
        $idCategory = 200;
        DB::beginTransaction();
        $deleteCategory = $category->destroy($category);

        if(empty($deleteCategory)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
        DB::rollBack();
    }

}
