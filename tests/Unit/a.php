<?php
public function test_placeOrder()
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
    $order_data['status'] = "new";
    DB::beginTransaction();
    $order->fill($order_data);
    $order->save();
    $actual = $order->where("phone", "0382987829")->first();
    $this->assertEquals("0382987829", $actual->phone);
    DB::rollBack();

    try {
        $order->fill($order_data);
        $order->save();
    } catch (Throwable $e) {
        $this->assertTrue(true);
    }
}