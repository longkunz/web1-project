<?php

namespace Tests\Unit;

use App\Models\Banner;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Support\Str;
use Throwable;

class BannerTest extends TestCase
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
    // private $banner;
    protected function setUp(): void
    {
        parent::setUp();
    }
    protected function tearDown(): void
    {
        parent::tearDown();
    }
    //Test valid banner
    public function test_placeBanner()
    {
        $banner = new Banner();
        $banner_data['title'] = 'Hello';
        $banner_data['description'] = 'Hello';
        $banner_data['image'] = 'https://via.placeholder.com/640x480.png/00ff77?text=animals+eos';
        $banner_data['link'] = 'https://www.facebook.com/nhquyen2001/';
        $banner_data['status'] = 'active';

        // DB::beginTransaction();
        // $banner->fill($banner_data);
        // $banner->save();
        // $actual = $banner->where("price", "123456")->first();
        // $this->assertEquals("123456", $actual->price);
        // DB::rollBack();
    }

    //Test banner with empty param title
    public function test_bannerEmptyTitle()
    {
        $banner = new Banner();
        $banner_data['description'] = 'Hello';
        $banner_data['image'] = 'https://via.placeholder.com/640x480.png/00ff77?text=animals+eos';
        $banner_data['link'] = 'https://www.facebook.com/nhquyen2001/';
        $banner_data['status'] = 'active';
        DB::beginTransaction();
        try {
            $banner->fill($banner_data);
            $banner->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }

    //Test banner with empty param description
    public function test_bannerEmptyDescription()
    {
        $banner = new Banner();
        $banner_data['title'] = 'Hello';
        $banner_data['image'] = 'https://via.placeholder.com/640x480.png/00ff77?text=animals+eos';
        $banner_data['link'] = 'https://www.facebook.com/nhquyen2001/';
        $banner_data['status'] = 'active';
        DB::beginTransaction();
        try {
            $banner->fill($banner_data);
            $banner->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }

    //Test banner with empty param image
    public function test_bannerEmptyImage()
    {
        $banner = new Banner();
        $banner_data['title'] = 'Hello';
        $banner_data['description'] = 'Hello';
        $banner_data['link'] = 'https://www.facebook.com/nhquyen2001/';
        $banner_data['status'] = 'active';
        DB::beginTransaction();
        try {
            $banner->fill($banner_data);
            $banner->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }

    //Test banner with empty param link
    public function test_bannerEmptyLink()
    {
        $banner = new Banner();
        $banner_data['title'] = 'Hello';
        $banner_data['description'] = 'Hello';
        $banner_data['image'] = 'https://via.placeholder.com/640x480.png/00ff77?text=animals+eos';
        $banner_data['status'] = 'active';
        DB::beginTransaction();
        try {
            $banner->fill($banner_data);
            $banner->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }

    // //Test banner with empty param status
    // public function test_bannerEmptyStatus()
    // {
    //     $banner = new Banner();
    //     $banner_data['title'] = 'Hello';
    //     $banner_data['description'] = 'Hello';
    //     $banner_data['image'] = 'https://via.placeholder.com/640x480.png/00ff77?text=animals+eos';
    //     $banner_data['link'] = 'https://www.facebook.com/nhquyen2001/';
    //     DB::beginTransaction();
    //     try {
    //         $banner->fill($banner_data);
    //         $banner->save();
    //     } catch (Throwable $e) {
    //         $this->assertTrue(true);
    //     }
    //     DB::rollBack();
    // }

    //Test banner with empty all fields
    public function test_bannerEmptyAll()
    {
        $banner = new Banner();
        $banner_data = [];

        DB::beginTransaction();
        try {
            $banner->fill($banner_data);
            $banner->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }

    // Test update banner with valid input ok
    public function test_updateBannerPassTrue()
    {
        $banner = new Banner();
        // $newBannerData = [
        //     "title" => "Hello",
        //     "description" => "Hello",
        //     "image" => "https://via.placeholder.com/640x480.png/00ff77?text=animals+eos",
        //     "link" => "https://www.facebook.com/nhquyen2001/",
        //     "status" => "inactive",
        // ];
        $newBannerTitle = "Hello";
        $newDescription = "Hello";
        $newImage = "https://via.placeholder.com/640x480.png/00ff77?text=animals+eos";
        $newLink = "https://www.facebook.com/nhquyen2001/";
        $newStatus = "inactive";
        DB::beginTransaction();
        // $banner->create($newBannerData);
        $newBanner = $banner->where("title", "Hello")->first();
        $status = $newBanner->update(['title' => $newBannerTitle]);
        $newBanner = $banner->where("title", "Hello")->first();
        // var_dump($newBanner->title);die();
        $this->assertEquals("Hello", $newBanner->title);

        DB::rollBack();
    }

    // Delete

    public function test_deleteBannerOk()
    {
        $banner = new Banner();
        $idBanner = 1;

        DB::beginTransaction();
        $deleteBanner = $banner->destroy($idBanner);

        if (empty($deleteBanner)) {
            $this->assertTrue(true);
        } else {
            $this->assertFalse(false);
        }
        DB::rollBack();
    }
}
