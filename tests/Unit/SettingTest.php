<?php

namespace Tests\Unit;

use App\Models\Setting;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Throwable;

class SettingTest extends TestCase
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
    protected function setUp(): void
    {
        parent::setUp();
    }
    protected function tearDown(): void
    {
        parent::tearDown();
    }
    //Test update setting valid input
    public function test_settingValid()
    {
        $setting = new Setting();
        $data['description'] = "Description";
        $data['title'] = "Title";
        $data['logo'] = "logo";
        $data['address'] = "address";
        $data['phone'] = "phone";
        $data['email'] = "email";
        DB::beginTransaction();
        $stored = $setting->where("id", "1")->first();
        $status = $stored->fill($data)->save();
        $actual = $setting->where("id", "1")->first();
        $this->assertEquals("Title", $actual->title);
        DB::rollBack();
    }
    //test update setting with empty description
    public function test_emptyDescription()
    {
        $setting = new Setting();
        $data['description'] = null;
        $data['title'] = "Title";
        $data['logo'] = "logo";
        $data['address'] = "address";
        $data['phone'] = "phone";
        $data['email'] = "email";
        DB::beginTransaction();
        try {
            $stored = $setting->where("id", "1")->first();
            $status = $stored->fill($data)->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //test update setting with description is array
    public function test_DescriptionArray()
    {
        $setting = new Setting();
        $data['description'] = array();
        $data['title'] = "Title";
        $data['logo'] = "logo";
        $data['address'] = "address";
        $data['phone'] = "phone";
        $data['email'] = "email";
        DB::beginTransaction();
        try {
            $stored = $setting->where("id", "1")->first();
            $status = $stored->fill($data)->save();
            $actual=$setting->where("id", "1")->first();
            $this->assertEquals("[]",$actual->description);
        } catch (Throwable $e) {
            // $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //test update setting with description is object
    public function test_DescriptionObject()
    {
        $setting = new Setting();
        $data['description'] = $setting;
        $data['title'] = "Title";
        $data['logo'] = "logo";
        $data['address'] = "address";
        $data['phone'] = "phone";
        $data['email'] = "email";
        DB::beginTransaction();
        try {
            $stored = $setting->where("id", "1")->first();
            $status = $stored->fill($data)->save();
            $actual=$setting->where("id", "1")->first();
            $this->assertEquals("[]",$actual->description);
        } catch (Throwable $e) {
            // $this->assertTrue(true);
        }
        DB::rollBack();
    }
    
    //test update setting with null title
    public function test_nullTitle()
    {
        $setting = new Setting();
        $data['description'] = "Description";
        $data['title'] = null;
        $data['logo'] = "logo";
        $data['address'] = "address";
        $data['phone'] = "phone";
        $data['email'] = "email";
        DB::beginTransaction();
        try {
            $stored = $setting->where("id", "1")->first();
            $status = $stored->fill($data)->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //test update setting with title empty
    public function test_emptyTitle()
    {
        $setting = new Setting();
        $data['description'] = "Description";
        $data['title'] = '';
        $data['logo'] = "logo";
        $data['address'] = "address";
        $data['phone'] = "phone";
        $data['email'] = "email";
        DB::beginTransaction();
        try {
            $stored = $setting->where("id", "1")->first();
            $status = $stored->fill($data)->save();
            $actual=$setting->where("id", "1")->first();
            $this->assertEquals("",$actual->title);
        } catch (Throwable $e) {
            // $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //test update setting with title array
    public function test_arrayTitle()
    {
        $setting = new Setting();
        $data['description'] = "Description";
        $data['title'] = array();
        $data['logo'] = "logo";
        $data['address'] = "address";
        $data['phone'] = "phone";
        $data['email'] = "email";
        DB::beginTransaction();
        try {
            $stored = $setting->where("id", "1")->first();
            $status = $stored->fill($data)->save();
            $actual=$setting->where("id", "1")->first();
            $this->assertEquals("[]",$actual->title);
        } catch (Throwable $e) {
            // $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //test update setting with title object
    public function test_objTitle()
    {
        $setting = new Setting();
        $data['description'] = "Description";
        $data['title'] = $setting;
        $data['logo'] = "logo";
        $data['address'] = "address";
        $data['phone'] = "phone";
        $data['email'] = "email";
        DB::beginTransaction();
        try {
            $stored = $setting->where("id", "1")->first();
            $status = $stored->fill($data)->save();
            $actual=$setting->where("id", "1")->first();
            $this->assertEquals("[]",$actual->title);
        } catch (Throwable $e) {
            // $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //test update setting with title boolean
    public function test_booleanTitle()
    {
        $setting = new Setting();
        $data['description'] = "Description";
        $data['title'] = false;
        $data['logo'] = "logo";
        $data['address'] = "address";
        $data['phone'] = "phone";
        $data['email'] = "email";
        DB::beginTransaction();
        try {
            $stored = $setting->where("id", "1")->first();
            $status = $stored->fill($data)->save();
            $actual=$setting->where("id", "1")->first();
            $this->assertEquals("[]",$actual->title);
        } catch (Throwable $e) {
            // $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //test update setting with null logo
    public function test_nullLogo()
    {
        $setting = new Setting();
        $data['description'] = "Description";
        $data['title'] = "Title";
        $data['logo'] = null;
        $data['address'] = "address";
        $data['phone'] = "phone";
        $data['email'] = "email";
        DB::beginTransaction();
        try {
            $stored = $setting->where("id", "1")->first();
            $status = $stored->fill($data)->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //test update setting with empty logo
    public function test_emptyLogo()
    {
        $setting = new Setting();
        $data['description'] = "Description";
        $data['title'] = "Title";
        $data['logo'] = '';
        $data['address'] = "address";
        $data['phone'] = "phone";
        $data['email'] = "email";
        DB::beginTransaction();
        try {
            $stored = $setting->where("id", "1")->first();
            $status = $stored->fill($data)->save();
            $actual=$setting->where("id", "1")->first();
            $this->assertEquals("",$actual->title);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //test update setting with array logo
    public function test_arrayLogo()
    {
        $setting = new Setting();
        $data['description'] = "Description";
        $data['title'] = "Title";
        $data['logo'] = array();
        $data['address'] = "address";
        $data['phone'] = "phone";
        $data['email'] = "email";
        DB::beginTransaction();
        try {
            $stored = $setting->where("id", "1")->first();
            $status = $stored->fill($data)->save();
            $actual=$setting->where("id", "1")->first();
            $this->assertEquals("[]",$actual->title);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //test update setting with object logo
    public function test_objLogo()
    {
        $setting = new Setting();
        $data['description'] = "Description";
        $data['title'] = "Title";
        $data['logo'] = $setting;
        $data['address'] = "address";
        $data['phone'] = "phone";
        $data['email'] = "email";
        DB::beginTransaction();
        try {
            $stored = $setting->where("id", "1")->first();
            $status = $stored->fill($data)->save();
            $actual=$setting->where("id", "1")->first();
            $this->assertEquals("[]",$actual->title);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //test update setting with boolean logo
    public function test_booleanLogo()
    {
        $setting = new Setting();
        $data['description'] = "Description";
        $data['title'] = "Title";
        $data['logo'] = true;
        $data['address'] = "address";
        $data['phone'] = "phone";
        $data['email'] = "email";
        DB::beginTransaction();
        try {
            $stored = $setting->where("id", "1")->first();
            $status = $stored->fill($data)->save();
            $actual=$setting->where("id", "1")->first();
            $this->assertEquals("[]",$actual->title);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //test update setting with empty address
    public function test_emptyAddress()
    {
        $setting = new Setting();
        $data['description'] = "Description";
        $data['title'] = "Title";
        $data['logo'] = "logo";
        $data['address'] = '';
        $data['phone'] = "phone";
        $data['email'] = "email";
        DB::beginTransaction();
        try {
            $stored = $setting->where("id", "1")->first();
            $status = $stored->fill($data)->save();
            $actual=$setting->where("id", "1")->first();
            $this->assertEquals("",$actual->title);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //test update setting with null address
    public function test_nullAddress()
    {
        $setting = new Setting();
        $data['description'] = "Description";
        $data['title'] = "Title";
        $data['logo'] = "logo";
        $data['address'] = null;
        $data['phone'] = "phone";
        $data['email'] = "email";
        DB::beginTransaction();
        try {
            $stored = $setting->where("id", "1")->first();
            $status = $stored->fill($data)->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //test update setting with empty phone
    public function test_emptyPhone()
    {
        $setting = new Setting();
        $data['description'] = "Description";
        $data['title'] = "Title";
        $data['logo'] = "logo";
        $data['address'] = "address";
        $data['phone'] = null;
        $data['email'] = "email";
        DB::beginTransaction();
        try {
            $stored = $setting->where("id", "1")->first();
            $status = $stored->fill($data)->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //test update setting with empty email
    public function test_emptyEmail()
    {
        $setting = new Setting();
        $data['description'] = "Description";
        $data['title'] = "Title";
        $data['logo'] = "logo";
        $data['address'] = "address";
        $data['phone'] = "phone";
        $data['email'] = null;
        DB::beginTransaction();
        try {
            $stored = $setting->where("id", "1")->first();
            $status = $stored->fill($data)->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //test update setting with empty all fields
    public function test_emptyAll()
    {
        $setting = new Setting();
        $data['description'] = null;
        $data['title'] = null;
        $data['logo'] = null;
        $data['address'] = null;
        $data['phone'] = null;
        $data['email'] = null;
        DB::beginTransaction();
        try {
            $stored = $setting->where("id", "1")->first();
            $status = $stored->fill($data)->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //test update setting with empty all fields
    public function test_objectAll()
    {
        $setting = new Setting();
        $data['description'] = $setting;
        $data['title'] = $setting;
        $data['logo'] = $setting;
        $data['address'] = $setting;
        $data['phone'] = $setting;
        $data['email'] = $setting;
        DB::beginTransaction();
        try {
            $stored = $setting->where("id", "1")->first();
            $status = $stored->fill($data)->save();
            $actual=$setting->where("id", "1")->first();
            $this->assertEquals("[]",$actual->title);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
}
