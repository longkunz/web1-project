<?php

namespace Tests\Feature;

use App\Http\Controllers\AdminController;
use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Http\Request;

class SettingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    //Test update setting with valid input
    public function testUpdateValid()
    {
        DB::beginTransaction();
        DB::table('settings')->insert([
            'description' => "Longkunz Furniture",
            'title' => "Longkunz furniture store",
            'logo' => "/img/logo.png",
            'address' => "53 Vo Van Ngan",
            'phone' => "0123456789",
            'email' => "store@mail.com",
        ]);
        $request = new Request([], [
            'description' => "123",
            'title' => "store",
            'logo' => "/img/logo.jpg",
            'address' => "54 Vo Van Ngan",
            'phone' => "012345678910",
            'email' => "store.online@mail.com",
        ]);
        $controller = new AdminController();
        $controller->settingsUpdate($request);
        $actual = Setting::where('id', 1);
        dd($actual);
    }
}
