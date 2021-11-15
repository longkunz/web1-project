<?php

namespace App\Repositories;

use App\Models\Order;


class OrderRepository{
    //get order list
    public function getOrder($num){
        return Order::orderBy('id', 'DESC')->paginate($num);
    }
    //Find order by id
    public function findOrder($id){
        return Order::findOrFail($id);
    }
}