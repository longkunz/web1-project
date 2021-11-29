<?php

namespace Tests\Feature;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Cart;
use App\Models\Product;
use Database\Factories\ProductFactory;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CartController;
use App\Repositories\CartRepository;
use Illuminate\Http\Request;

class OrderTest extends TestCase
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
    //Test store order
    // public function testStore()
    // {
    //     DB::beginTransaction();
    //     $product = Product::factory()->count(1)->create();
    //     // dd($product);
    //     $cartRepository = new CartRepository;
    //     $cartController = new CartController($cartRepository);
    //     $request = new Request();
    //     $request['slug'] = $product[0]->slug;
    //     $cart = $cartController->addToCart($request);
    //     dd($cart);
    // }
}
