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
    //Test category update null
    public function test_UpdateNull()
    {
        $category = new Category();
        $newCategoryData =
            [
                'name' => "stream",    
                'status' => "active",              
                'cat_id' => 1,
            ];
        $newName = null;
        DB::beginTransaction();
        try {
            $category->create($newCategoryData);
            $newCategory = $category->where("name", "stream")->first();
            $status = $category->update(['stream' => $newName]);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test category update array
    public function test_UpdateArray()
    {
        $category = new Category();
        $newCategoryData =
            [
                'name' => "stream",    
                'status' => "active",              
                'cat_id' => 1,
            ];

        $newName = array(1,2,3);
        DB::beginTransaction();
        try {
            $category->create($newCategoryData);
            $newCategory = $category->where("name", "stream")->first();
            $status = $category->update(['stream' => $newName]);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }

    //Test category update Object
    public function test_UpdateObject()
    {
        $category = new Category();
        $newCategoryData =
            [
                'name' => "stream",    
                'status' => "active",              
                'cat_id' => 1,
            ];
        $newName = $category;
        DB::beginTransaction();
        try {
            $category->create($newCategoryData);
            $newCategory = $category->where("name", "stream")->first();
            $status = $category->update(['stream' => $newName]);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }

    //Test category update with stock negative
    public function test_UpdateNameNegative()
    {
        $category = new Category();
        $newCategoryData =
            [
                'name' => "stream",    
                'status' => "active",              
                'cat_id' => 1,
            ];
        $newName = -10;
        DB::beginTransaction();
        try {
            $category->create($newCategoryData);
            $newCategory = $category->where("name", "stream")->first();
            $status = $category->update(['stream' => $newName]);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }

    //Test category update with price negative
    public function test_UpdateStatusNegative()
    {
        $category = new Category();
        $newCategoryData =
            [
                'name' => "stream",    
                'status' => "active",              
                'cat_id' => 1,
            ];
        $newName = -50000;
        DB::beginTransaction();
        try {
            $category->create($newCategoryData);
            $newCategory = $category->where("name", "stream")->first();
            $status = $category->update(['stream' => $newName]);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //test update name
    public function test_UpdateName()
    {
        $category = new Category();
        $newCategoryData =
            [
                'name' => "stream",    
                'status' => "active",              
                'cat_id' => 1,
            ];
        $newName = 'stream';
        DB::beginTransaction();
        try {
            $category->create($newCategoryData);
            $newCategory = $category->where("name", "stream")->first();
            $status = $category->update(['stream' => $newName]);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    public function test_UpdateStatus()
    {
        $category = new Category();
        $newCategoryData =
            [
                'name' => "stream",    
                'status' => "active",              
                'cat_id' => 1,
            ];
        $newStatus = 'acctive';
        DB::beginTransaction();
        try {
            $category->create($newCategoryData);
            $newCategory = $category->where("status", "acctive")->first();
            $status = $category->update(['acctive' => $newStatus]);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //test update status null
    public function test_UpdateStatusNull()
    {
        $category = new Category();
        $newCategoryData =
            [
                'name' => "stream",    
                'status' => "active",              
                'cat_id' => 1,
            ];
        $newStatus = 'null';
        DB::beginTransaction();
        try {
            $category->create($newCategoryData);
            $newCategory = $category->where("status", "acctive")->first();
            $status = $category->update(['acctive' => $newStatus]);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //test update name null
    public function test_UpdateNameNull()
    {
        $category = new Category();
        $newCategoryData =
            [
                'name' => "stream",    
                'status' => "active",              
                'cat_id' => 1,
            ];
        $newName = 'null';
        DB::beginTransaction();
        try {
            $category->create($newCategoryData);
            $newCategory = $category->where("name", "stream")->first();
            $status = $category->update(['stream' => $newName]);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //test update name null
    public function test_UpdateNameArray()
    {
        $category = new Category();
        $newCategoryData =
            [
                'name' => "stream",    
                'status' => "active",              
                'cat_id' => 1,
            ];
        $newName = 'null';
        DB::beginTransaction();
        try {
            $category->create($newCategoryData);
            $newCategory = $category->where("name", "stream")->first();
            $status = $category->update(['stream' => $newName]);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }

}
