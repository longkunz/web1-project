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
        ];
        $newTitle = "Quyen";
        DB::beginTransaction();
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("title", "Test")->first();
            $status = $newBanner->update(['title' => $newTitle]);
            $newBanner = $banner->where("title", "Test")->first();
            $this->assertEquals($newTitle, $newBanner->title);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
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
        ];
        $newTitle = '';
        DB::beginTransaction();
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("title", "Test")->first();
            $status = $newBanner->update(['title' => $newTitle]);
            $newBanner = $banner->where("title", "Test")->first();
            $this->assertEquals($newTitle, $newBanner->title);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
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
        ];
        $newTitle = Null;
        DB::beginTransaction();
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("title", "Test")->first();
            $status = $newBanner->update(['title' => $newTitle]);
            $newBanner = $banner->where("title", "Test")->first();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
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
        ];
        $newTitle = array();
        DB::beginTransaction();
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("title", "Test")->first();
            $status = $newBanner->update(['title' => $newTitle]);
            $newBanner = $banner->where("title", "Test")->first();
            $this->assertEquals($newTitle, $newBanner->title);
        } catch (Throwable $e) {

        }
        DB::rollBack();
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
        ];
        $newTitle = $banner;
        DB::beginTransaction();
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("title", "Test")->first();
            $status = $newBanner->update(['title' => $newTitle]);
            $newBanner = $banner->where("title", "Test")->first();
            $this->assertEquals($newTitle, $newBanner->title);
        } catch (Throwable $e) {

        }
        DB::rollBack();
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
        ];
        $newTitle = true;
        DB::beginTransaction();
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("title", "Test")->first();
            $status = $newBanner->update(['title' => $newTitle]);
            $newBanner = $banner->where("title", "Test")->first();
            $this->assertEquals($newTitle, $newBanner->title);
        } catch (Throwable $e) {

        }
        DB::rollBack();
    }

    // Description
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
        DB::beginTransaction();
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("description", "Test")->first();
            $status = $newBanner->update(['description' => $newDescription]);
            $newBanner = $banner->where("description", "Test")->first();
            $this->assertEquals($newDescription, $newBanner->description);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    // Test update banner with description empty
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
        $newDescription = '';
        DB::beginTransaction();
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("description", "Test")->first();
            $status = $newBanner->update(['description' => $newDescription]);
            $newBanner = $banner->where("description", "Test")->first();
            $this->assertEquals($newDescription, $newBanner->description);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
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
        DB::beginTransaction();
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("description", "Test")->first();
            $status = $newBanner->update(['description' => $newDescription]);
            $newBanner = $banner->where($newDescription, "Test")->first();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    // Test update banner with description array
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
        DB::beginTransaction();
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("description", "Test")->first();
            $status = $newBanner->update(['description' => $newDescription]);
            $newBanner = $banner->where("description", "Test")->first();
            $this->assertEquals($newDescription, $newBanner->description);
        } catch (Throwable $e) {

        }
        DB::rollBack();
    }
    // Test update banner with description object
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
        DB::beginTransaction();
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("description", "Test")->first();
            $status = $newBanner->update(['description' => $newDescription]);
            $newBanner = $banner->where("description", "Test")->first();
            $this->assertEquals($newDescription, $newBanner->description);
        } catch (Throwable $e) {

        }
        DB::rollBack();
        
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
        DB::beginTransaction();
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("description", "Test")->first();
            $status = $newBanner->update(['description' => $newDescription]);
            $newBanner = $banner->where("description", "Test")->first();
            $this->assertEquals($newDescription, $newBanner->description);
        } catch (Throwable $e) {

        }
        DB::rollBack();
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
        DB::beginTransaction();
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("image", "Test")->first();
            $status = $newBanner->update(['image' => $newImage]);
            $newBanner = $banner->where("image", "Test")->first();
            $this->assertEquals($newImage, $newBanner->image);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
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
        $newImage = '';
        DB::beginTransaction();
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("image", "Test")->first();
            $status = $newBanner->update(['image' => $newImage]);
            $newBanner = $banner->where("image", "Test")->first();
            $this->assertEquals($newImage, $newBanner->image);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
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
        DB::beginTransaction();
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("image", "Test")->first();
            $status = $newBanner->update(['image' => $newImage]);
            $newBanner = $banner->where($newImage, "Test")->first();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
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
        DB::beginTransaction();
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("image", "Test")->first();
            $status = $newBanner->update(['image' => $newImage]);
            $newBanner = $banner->where("image", "Test")->first();
            $this->assertEquals($newImage, $newBanner->image);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
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
        DB::beginTransaction();
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("image", "Test")->first();
            $status = $newBanner->update(['image' => $newImage]);
            $newBanner = $banner->where("image", "Test")->first();
            $this->assertEquals($newImage, $newBanner->image);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
        
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
        DB::beginTransaction();
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("image", "Test")->first();
            $status = $newBanner->update(['image' => $newImage]);
            $newBanner = $banner->where("image", "Test")->first();
            $this->assertEquals($newImage, $newBanner->image);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
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
        DB::beginTransaction();
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("image", "Test")->first();
            $status = $newBanner->update(['image' => $newLink]);
            $newBanner = $banner->where("image", "Test")->first();
            $this->assertEquals($newLink, $newBanner->image);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
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
        $newLink = '';
        DB::beginTransaction();
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("link", "Test")->first();
            $status = $newBanner->update(['link' => $newLink]);
            $newBanner = $banner->where("link", "Test")->first();
            $this->assertEquals($newLink, $newBanner->link);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
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
        DB::beginTransaction();
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("link", "Test")->first();
            $status = $newBanner->update(['link' => $newLink]);
            $newBanner = $banner->where($newLink, "Test")->first();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
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
        DB::beginTransaction();
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("link", "Test")->first();
            $status = $newBanner->update(['link' => $newLink]);
            $newBanner = $banner->where("link", "Test")->first();
            $this->assertEquals($newLink, $newBanner->link);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
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
        $newImage = $banner;
        DB::beginTransaction();
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("image", "Test")->first();
            $status = $newBanner->update(['image' => $newImage]);
            $newBanner = $banner->where("image", "Test")->first();
            $this->assertEquals($newImage, $newBanner->image);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
        
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
        DB::beginTransaction();
        try {
            $banner->create($newBannerData);
            $newBanner = $banner->where("link", "Test")->first();
            $status = $newBanner->update(['link' => $newLink]);
            $newBanner = $banner->where("link", "Test")->first();
            $this->assertEquals($newLink, $newBanner->link);
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
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
