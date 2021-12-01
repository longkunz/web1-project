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
    //test update setting with empty title
    public function test_emptyTitle()
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
    //test update setting with empty logo
    public function test_emptyLogo()
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
    //test update setting with empty address
    public function test_emptyAddress()
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
}
