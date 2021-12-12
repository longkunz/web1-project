<?php

namespace Tests\Unit;

use App\Models\Order;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Support\Str;
use Throwable;

class OrderTest extends TestCase
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
    private $order;
    protected function setUp(): void
    {
        parent::setUp();
    }
    protected function tearDown(): void
    {
        parent::tearDown();
    }
    //Test valid order
    public function test_placeOrder()
    {
        $order = new Order();
        $order_data['lock_version'] = "1";
        $order_data['order_number'] = "ORD-123456";
        $order_data['user_id'] = "1";
        $order_data['sub_total'] = "1000";
        $order_data['quantity'] = "5";
        $order_data['shipping'] = "10";
        $order_data['payment_status'] = "unpaid";
        $order_data['total_amount'] = "5005";
        $order_data['address'] = "53 vo van ngan";
        $order_data['name'] = "Ho Viet Long";
        $order_data['email'] = "hovietlong234@gmail.com";
        $order_data['phone'] = "0382987829";
        $order_data['status'] = "new";
        
        DB::beginTransaction();
        $order->fill($order_data);
        $order->save();
        $actual = $order->where("phone", "0382987829")->first();
        $this->assertEquals("0382987829", $actual->phone);
        DB::rollBack();
    }
    //Test order with empty param Order_number
    public function test_emptyOrderNumber()
    {
        $order = new Order();
        $order_data['user_id'] = "1";
        $order_data['sub_total'] = "1000";
        $order_data['quantity'] = "5";
        $order_data['shipping'] = "10";
        $order_data['payment_status'] = "unpaid";
        $order_data['total_amount'] = "5005";
        $order_data['address'] = "53 vo van ngan";
        $order_data['name'] = "Ho Viet Long";
        $order_data['email'] = "hovietlong234@gmail.com";
        $order_data['phone'] = "0382987829";
        $order_data['status'] = "new";
        DB::beginTransaction();
        try {
            $order->fill($order_data);
            $order->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test order with empty subtotal
    public function test_emptySubtotal()
    {
        $order = new Order();
        $order_data['order_number'] = "ORD-123456";
        $order_data['user_id'] = "1";
        $order_data['quantity'] = "5";
        $order_data['shipping'] = "10";
        $order_data['payment_status'] = "unpaid";
        $order_data['total_amount'] = "5005";
        $order_data['address'] = "53 vo van ngan";
        $order_data['name'] = "Ho Viet Long";
        $order_data['email'] = "hovietlong234@gmail.com";
        $order_data['phone'] = "0382987829";
        $order_data['status'] = "new";
        DB::beginTransaction();
        try {
            $order->fill($order_data);
            $order->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test order with empty user id
    public function test_emptyUserId()
    {
        $order = new Order();
        $order_data['order_number'] = "ORD-123456";
        $order_data['sub_total'] = "1000";
        $order_data['quantity'] = "5";
        $order_data['shipping'] = "10";
        $order_data['payment_status'] = "unpaid";
        $order_data['total_amount'] = "5005";
        $order_data['address'] = "53 vo van ngan";
        $order_data['name'] = "Ho Viet Long";
        $order_data['email'] = "hovietlong234@gmail.com";
        $order_data['phone'] = "0382987829";
        $order_data['status'] = "new";
        DB::beginTransaction();
        $order->fill($order_data);
        $order->save();
        $actual = $order->where("phone", "0382987829")->first();
        $this->assertEquals(null, $actual->user_id);
        DB::rollBack();
    }
    //Test order with empty total_amount
    public function test_emptyTotalAmount()
    {
        $order = new Order();
        $order_data['order_number'] = "ORD-123456";
        $order_data['user_id'] = "1";
        $order_data['sub_total'] = "1000";
        $order_data['quantity'] = "5";
        $order_data['shipping'] = "10";
        $order_data['payment_status'] = "unpaid";
        $order_data['address'] = "53 vo van ngan";
        $order_data['name'] = "Ho Viet Long";
        $order_data['email'] = "hovietlong234@gmail.com";
        $order_data['phone'] = "0382987829";
        $order_data['status'] = "new";
        DB::beginTransaction();
        try {
            $order->fill($order_data);
            $order->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test order with empty quantity
    public function test_emptyQuantity()
    {
        $order = new Order();
        $order_data['order_number'] = "ORD-123456";
        $order_data['user_id'] = "1";
        $order_data['sub_total'] = "1000";
        $order_data['shipping'] = "10";
        $order_data['payment_status'] = "unpaid";
        $order_data['total_amount'] = "5005";
        $order_data['address'] = "53 vo van ngan";
        $order_data['name'] = "Ho Viet Long";
        $order_data['email'] = "hovietlong234@gmail.com";
        $order_data['phone'] = "0382987829";
        $order_data['status'] = "new";
        DB::beginTransaction();
        try {
            $order->fill($order_data);
            $order->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test order with empty Shipping
    public function test_emptyShipping()
    {
        $order = new Order();
        $order_data['order_number'] = "ORD-123456";
        $order_data['user_id'] = "1";
        $order_data['sub_total'] = "1000";
        $order_data['quantity'] = "5";
        $order_data['payment_status'] = "unpaid";
        $order_data['total_amount'] = "5005";
        $order_data['address'] = "53 vo van ngan";
        $order_data['name'] = "Ho Viet Long";
        $order_data['email'] = "hovietlong234@gmail.com";
        $order_data['phone'] = "0382987829";
        $order_data['status'] = "new";
        DB::beginTransaction();
        try {
            $order->fill($order_data);
            $order->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test order with empty payment status
    public function test_emptyPaymentStatus()
    {
        $order = new Order();
        $order_data['lock_version'] = "1";
        $order_data['order_number'] = "ORD-123456";
        $order_data['user_id'] = "1";
        $order_data['sub_total'] = "1000";
        $order_data['quantity'] = "5";
        $order_data['shipping'] = "10";
        $order_data['total_amount'] = "5005";
        $order_data['address'] = "53 vo van ngan";
        $order_data['name'] = "Ho Viet Long";
        $order_data['email'] = "hovietlong234@gmail.com";
        $order_data['phone'] = "0382987829";
        $order_data['status'] = "new";
        DB::beginTransaction();
        $order->fill($order_data);
        $order->save();
        $actual = $order->where("phone", "0382987829")->first();
        $this->assertEquals("unpaid", $actual->payment_status);
        DB::rollBack();
    }
    //Test order with empty status
    public function test_emptyStatus()
    {
        $order = new Order();
        $order_data['order_number'] = "ORD-123456";
        $order_data['user_id'] = "1";
        $order_data['sub_total'] = "1000";
        $order_data['quantity'] = "5";
        $order_data['shipping'] = "10";
        $order_data['payment_status'] = "unpaid";
        $order_data['total_amount'] = "5005";
        $order_data['address'] = "53 vo van ngan";
        $order_data['name'] = "Ho Viet Long";
        $order_data['email'] = "hovietlong234@gmail.com";
        $order_data['phone'] = "0382987829";
        DB::beginTransaction();
        $order->fill($order_data);
        $order->save();
        $actual = $order->where("phone", "0382987829")->first();
        $this->assertEquals("new", $actual->status);
        DB::rollBack();
    }
    //Test order with empty name
    public function test_emptyName()
    {
        $order = new Order();
        $order_data['order_number'] = "ORD-123456";
        $order_data['user_id'] = "1";
        $order_data['sub_total'] = "1000";
        $order_data['quantity'] = "5";
        $order_data['shipping'] = "10";
        $order_data['payment_status'] = "unpaid";
        $order_data['total_amount'] = "5005";
        $order_data['address'] = "53 vo van ngan";
        $order_data['email'] = "hovietlong234@gmail.com";
        $order_data['phone'] = "0382987829";
        $order_data['status'] = "new";
        DB::beginTransaction();
        try {
            $order->fill($order_data);
            $order->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test order with empty email
    public function test_emptyEmail()
    {
        $order = new Order();
        $order_data['order_number'] = "ORD-123456";
        $order_data['user_id'] = "1";
        $order_data['sub_total'] = "1000";
        $order_data['quantity'] = "5";
        $order_data['shipping'] = "10";
        $order_data['payment_status'] = "unpaid";
        $order_data['total_amount'] = "5005";
        $order_data['address'] = "53 vo van ngan";
        $order_data['name'] = "Ho Viet Long";
        $order_data['phone'] = "0382987829";
        $order_data['status'] = "new";
        DB::beginTransaction();
        try {
            $order->fill($order_data);
            $order->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test order with empty phone
    public function test_emptyPhone()
    {
        $order = new Order();
        $order_data['order_number'] = "ORD-123456";
        $order_data['user_id'] = "1";
        $order_data['sub_total'] = "1000";
        $order_data['quantity'] = "5";
        $order_data['shipping'] = "10";
        $order_data['payment_status'] = "unpaid";
        $order_data['total_amount'] = "5005";
        $order_data['address'] = "53 vo van ngan";
        $order_data['name'] = "Ho Viet Long";
        $order_data['email'] = "hovietlong234@gmail.com";
        $order_data['status'] = "new";
        DB::beginTransaction();
        try {
            $order->fill($order_data);
            $order->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test order with empty address
    public function test_emptyAddress()
    {
        $order = new Order();
        $order_data['order_number'] = "ORD-123456";
        $order_data['user_id'] = "1";
        $order_data['sub_total'] = "1000";
        $order_data['quantity'] = "5";
        $order_data['shipping'] = "10";
        $order_data['payment_status'] = "unpaid";
        $order_data['total_amount'] = "5005";
        $order_data['name'] = "Ho Viet Long";
        $order_data['email'] = "hovietlong234@gmail.com";
        $order_data['phone'] = "0382987829";
        $order_data['status'] = "new";
        DB::beginTransaction();
        try {
            $order->fill($order_data);
            $order->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
    //Test order with empty all fields
    public function test_emptyAll()
    {
        $order = new Order();
        $order_data = [];

        DB::beginTransaction();
        try {
            $order->fill($order_data);
            $order->save();
        } catch (Throwable $e) {
            $this->assertTrue(true);
        }
        DB::rollBack();
    }
}
