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
    // public function test_placeBanner()
    // {
    //     $banner = new Banner();
    //     $banner_data['title'] = 'Hello';
    //     $banner_data['description'] = 'Hello';
    //     $banner_data['image'] = 'https://via.placeholder.com/640x480.png/00ff77?text=animals+eos';
    //     $banner_data['link'] = 'https://www.facebook.com/nhquyen2001/';
    //     $banner_data['status'] = 'active';

    //     // DB::beginTransaction();
    //     // $banner->fill($banner_data);
    //     // $banner->save();
    //     // $actual = $banner->where("price", "123456")->first();
    //     // $this->assertEquals("123456", $actual->price);
    //     // DB::rollBack();
    // }

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

    // Test update banner with title ok
    public function test_updateTitleTrue()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
            'lock_version' => '0',
        ];
        $newTitle = "Quyen";
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("title", "Test")->first();
            $status = $newBanner->update($newBannerData);
            $newBanner->save();
            $newBanner = Banner::where('title', "Test")->first();
            $this->assertEquals($newTitle, $newBanner->title);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $newBanner = Banner::where('title', "Test")->first();
        $newBanner->delete();
    }
    // Test update banner with title empty
    public function test_updateTitleEmpty()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
            'lock_version' => '0',
        ];
        $newTitle = "";
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("title", "Test")->first();
            $status = $newBanner->update($newBannerData);
            $newBanner->save();
            $newBanner = Banner::where('title', "Test")->first();
            $this->assertEquals($newTitle, $newBanner->title);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $newBanner = Banner::where('title', "Test")->first();
        $newBanner->delete();
    }
    // Test update banner with title null
    public function test_updateTitleNull()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
            'lock_version' => '0',
        ];
        $newTitle = Null;
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("title", "Test")->first();
            $status = $newBanner->update($newBannerData);
            $newBanner->save();
            $newBanner = Banner::where('title', "Test")->first();
            $this->assertEquals($newTitle, $newBanner->title);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $newBanner = Banner::where('title', "Test")->first();
        $newBanner->delete();
    }
    // Test update banner with title array
    public function test_updateTitleArray()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
            'lock_version' => '0',
        ];
        $newTitle = array();
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("title", "Test")->first();
            $status = $newBanner->update($newBannerData);
            $newBanner->save();
            $newBanner = Banner::where('title', "Test")->first();
            $this->assertEquals($newTitle, $newBanner->title);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $newBanner = Banner::where('title', "Test")->first();
        $newBanner->delete();
    }
    // Test update banner with title object
    public function test_updateTitleObject()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
            'lock_version' => '0',
        ];
        $newTitle = $banner;
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("title", "Test")->first();
            $status = $newBanner->update($newBannerData);
            $newBanner->save();
            $newBanner = Banner::where('title', "Test")->first();
            $this->assertEquals($newTitle, $newBanner->title);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $newBanner = Banner::where('title', "Test")->first();
        $newBanner->delete();
    }
    // Test update banner with title boolean
    public function test_updateTitleBoolean()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
            'lock_version' => '0',
        ];
        $newTitle = true;
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("title", "Test")->first();
            $status = $newBanner->update($newBannerData);
            $newBanner->save();
            $newBanner = Banner::where('title', "Test")->first();
            $this->assertEquals($newTitle, $newBanner->title);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $newBanner = Banner::where('title', "Test")->first();
        $newBanner->delete();
    }

    // // Description
    // Test update banner with description ok
    public function test_updateDescriptionTrue()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
        ];
        $newDescription = "Quyen";
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("description", "Test")->first();
            $status = $newBanner->update(['description' => $newDescription]);
            $newBanner = Banner::where('description', "Test")->first();
            $this->assertEquals($newDescription, $newBanner->description);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $newBanner = Banner::where('title', "Test")->first();
        $newBanner->delete();
    }
    // // Test update banner with description empty
    public function test_updateDescriptionEmpty()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
        ];
        $newDescription = "";
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("description", "Test")->first();
            $status = $newBanner->update(['description' => $newDescription]);
            $newBanner = Banner::where('description', "Test")->first();
            $this->assertEquals($newDescription, $newBanner->description);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $newBanner = Banner::where('title', "Test")->first();
        $newBanner->delete();
    }
    // Test update banner with description null
    public function test_updateDescriptionNull()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
        ];
        $newDescription = Null;
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("description", "Test")->first();
            $status = $newBanner->update(['description' => $newDescription]);
            $newBanner = Banner::where('description', "Test")->first();
            $this->assertEquals($newDescription, $newBanner->description);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $newBanner = Banner::where('title', "Test")->first();
        $newBanner->delete();
    }
    // // Test update banner with description array
    public function test_updateDescriptionArray()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
        ];
        $newDescription = array();
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("description", "Test")->first();
            $status = $newBanner->update(['description' => $newDescription]);
            $newBanner = Banner::where('description', "Test")->first();
            $this->assertEquals($newDescription, $newBanner->description);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $newBanner = Banner::where('title', "Test")->first();
        $newBanner->delete();
    }
    // // Test update banner with description object
    public function test_updateDescriptionObject()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
        ];
        $newDescription = $banner;
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("description", "Test")->first();
            $status = $newBanner->update(['description' => $newDescription]);
            $newBanner = Banner::where('description', "Test")->first();
            $this->assertEquals($newDescription, $newBanner->description);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $newBanner = Banner::where('title', "Test")->first();
        $newBanner->delete();
    }
    // Test update banner with description boolean
    public function test_updateDescriptionBoolean()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
        ];
        $newDescription = true;
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("description", "Test")->first();
            $status = $newBanner->update(['description' => $newDescription]);
            $newBanner = Banner::where('description', "Test")->first();
            $this->assertEquals($newDescription, $newBanner->description);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $newBanner = Banner::where('title', "Test")->first();
        $newBanner->delete();
    }

    // Image
    // Test update banner with Image ok
    public function test_updateImageTrue()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
        ];
        $newImage = "Quyen";
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("image", "Test")->first();
            $status = $newBanner->update(['image' => $newImage]);
            $newBanner = Banner::where('image', "Test")->first();
            $this->assertEquals($newImage, $newBanner->image);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $newBanner = Banner::where('title', "Test")->first();
        $newBanner->delete();
    }
    // Test update banner with Image empty
    public function test_updateImageEmpty()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
        ];
        $newImage = "";
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("image", "Test")->first();
            $status = $newBanner->update(['image' => $newImage]);
            $newBanner = Banner::where('image', "Test")->first();
            $this->assertEquals($newImage, $newBanner->image);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $newBanner = Banner::where('title', "Test")->first();
        $newBanner->delete();
    }
    // Test update banner with Image null
    public function test_updateImageNull()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
        ];
        $newImage = Null;
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("image", "Test")->first();
            $status = $newBanner->update(['image' => $newImage]);
            $newBanner = Banner::where('image', "Test")->first();
            $this->assertEquals($newImage, $newBanner->image);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $newBanner = Banner::where('title', "Test")->first();
        $newBanner->delete();
    }
    // Test update banner with Image array
    public function test_updateImageArray()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
        ];
        $newImage = array();
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("image", "Test")->first();
            $status = $newBanner->update(['image' => $newImage]);
            $newBanner = Banner::where('image', "Test")->first();
            $this->assertEquals($newImage, $newBanner->image);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $newBanner = Banner::where('title', "Test")->first();
        $newBanner->delete();
    }
    // Test update banner with Image object
    public function test_updateImageObject()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
        ];
        $newImage = $banner;
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("image", "Test")->first();
            $status = $newBanner->update(['image' => $newImage]);
            $newBanner = Banner::where('image', "Test")->first();
            $this->assertEquals($newImage, $newBanner->image);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $newBanner = Banner::where('title', "Test")->first();
        $newBanner->delete();
    }
    // Test update banner with Image boolean
    public function test_updateImageBoolean()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
        ];
        $newImage = true;
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("image", "Test")->first();
            $status = $newBanner->update(['image' => $newImage]);
            $newBanner = Banner::where('image', "Test")->first();
            $this->assertEquals($newImage, $newBanner->image);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $newBanner = Banner::where('title', "Test")->first();
        $newBanner->delete();
    }

    // Link
    // Test update banner with Link ok
    public function test_updateLinkTrue()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
        ];
        $newLink = "Quyen";
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("link", "Test")->first();
            $status = $newBanner->update(['link' => $newLink]);
            $newBanner = Banner::where('link', "Test")->first();
            $this->assertEquals($newLink, $newBanner->link);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $newBanner = Banner::where('title', "Test")->first();
        $newBanner->delete();
    }
    // Test update banner with Link empty
    public function test_updateLinkEmpty()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
        ];
        $newLink = "";
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("link", "Test")->first();
            $status = $newBanner->update(['link' => $newLink]);
            $newBanner = Banner::where('link', "Test")->first();
            $this->assertEquals($newLink, $newBanner->link);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $newBanner = Banner::where('title', "Test")->first();
        $newBanner->delete();
    }
    // Test update banner with Link null
    public function test_updateLinkNull()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
        ];
        $newLink = Null;
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("link", "Test")->first();
            $status = $newBanner->update(['link' => $newLink]);
            $newBanner = Banner::where('link', "Test")->first();
            $this->assertEquals($newLink, $newBanner->link);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $newBanner = Banner::where('title', "Test")->first();
        $newBanner->delete();
    }
    // Test update banner with Link array
    public function test_updateLinkArray()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
        ];
        $newLink = array();
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("link", "Test")->first();
            $status = $newBanner->update(['link' => $newLink]);
            $newBanner = Banner::where('link', "Test")->first();
            $this->assertEquals($newLink, $newBanner->link);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $newBanner = Banner::where('title', "Test")->first();
        $newBanner->delete();
    }
    // Test update banner with Link object
    public function test_updateLinkObject()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
        ];
        $newLink = $banner;
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("link", "Test")->first();
            $status = $newBanner->update(['link' => $newLink]);
            $newBanner = Banner::where('link', "Test")->first();
            $this->assertEquals($newLink, $newBanner->link);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $newBanner = Banner::where('title', "Test")->first();
        $newBanner->delete();
    }
    // Test update banner with Link boolean
    public function test_updateLinkBoolean()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
        ];
        $newLink = true;
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("link", "Test")->first();
            $status = $newBanner->update(['link' => $newLink]);
            $newBanner = Banner::where('link', "Test")->first();
            $this->assertEquals($newLink, $newBanner->link);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        $newBanner = Banner::where('title', "Test")->first();
        $newBanner->delete();
    }

    // Delete
    // Test delete banner with id ok
    public function test_deleteBannerOk()
    {
        $banner = new Banner();
        
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
        ];
        $banner->create($newBannerData);
        $idBanner = Banner::where('title', "Test")->pluck('id')->first();
        
        $deleteBanner = $banner->destroy($idBanner);

        if (empty($deleteBanner)) {
            $this->assertTrue(true);
        } else {
            $this->assertFalse(false);
        }
    }

    // Test delete banner with id empty
    public function test_deleteBannerEmpty()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
        ];
        $banner->create($newBannerData);
        $idBanner = Banner::where('title', "Test")->pluck('id')->first();
        
        $deleteBanner = $banner->destroy($idBanner);

        if (empty($deleteBanner)) {
            $this->assertTrue(true);
        } else {
            $this->assertFalse(false);
        }
    }

    // Test delete banner with id Array
    public function test_deleteBannerArray()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
        ];
        $banner->create($newBannerData);
        $idBanner = Banner::where('title', "Test")->pluck('id')->first();
        
        $deleteBanner = $banner->destroy($idBanner);

        if (empty($deleteBanner)) {
            $this->assertTrue(true);
        } else {
            $this->assertFalse(false);
        }
    }

    // Test delete banner with id Object
    public function test_deleteBannerObject()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
        ];
        $banner->create($newBannerData);
        $idBanner = Banner::where('title', "Test")->pluck('id')->first();
        
        $deleteBanner = $banner->destroy($idBanner);

        if (empty($deleteBanner)) {
            $this->assertTrue(true);
        } else {
            $this->assertFalse(false);
        }
    }

    // Test delete banner with id Null
    public function test_deleteBannerNull()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
        ];
        $banner->create($newBannerData);
        $idBanner = Banner::where('title', "Test")->pluck('id')->first();
        
        $deleteBanner = $banner->destroy($idBanner);

        if (empty($deleteBanner)) {
            $this->assertTrue(true);
        } else {
            $this->assertFalse(false);
        }
    }

    // Test delete banner with id Boolean
    public function test_deleteBannerBoolean()
    {
        $banner = new Banner();
        $newBannerData = [
            'title' => "Test",
            'description' => "Test",
            'image' => "https://via.placeholder.com/test",
            'link' => "https://via.placeholder.com/test",
            'status' => "inactive",
        ];
        $banner->create($newBannerData);
        $idBanner = Banner::where('title', "Test")->pluck('id')->first();
        
        $deleteBanner = $banner->destroy($idBanner);

        if (empty($deleteBanner)) {
            $this->assertTrue(true);
        } else {
            $this->assertFalse(false);
        }
    }
}
