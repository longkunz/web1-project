@extends('layouts.master')
@section('title','Checkout')
@section('contents')
@include('partial.breadcrumb',['name' => 'Checkout your order','here' => 'Checkout'])
<!--================Checkout Area =================-->
<section class="checkout_area padding_top">
    <div class="container">
        <div class="returning_customer">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Billing Details</h3>
                        <form class="row contact_form" action="{{route('order.store')}}" method="post" novalidate="novalidate">
                            @csrf
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Full name" />
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="address" name="address" placeholder="Address" />
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number" />
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email address" />
                            </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li>
                                    <a href="#">Product
                                        <span>Total</span>
                                    </a>
                                </li>
                                @isset($cart)
                                @if ($cart->isNotEmpty())
                                @foreach ($cart as $item)
                                <li>
                                    <a href="#">{{$item->product->title}}
                                        <span class="middle">x {{$item->quantity}}</span>
                                        <span class="last">${{$item->amount}}</span>
                                    </a>
                                </li>
                                @endforeach
                                @endif
                                @endisset
                            </ul>
                            <ul class="list list_2">
                                <li>
                                    <a href="#">Subtotal
                                        <span>${{$cart->sum('amount')}}</span>
                                        <input type="hidden" name="sub_total" value="{{$cart->sum('amount')}}">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Shipping
                                        @php
                                        $shippingfee=0;
                                        if ($cart->sum('amount') < 1000) { $shippingfee=15; } @endphp <span>${{$shippingfee}}</span>
                                            <input type="hidden" name="shipping" value="{{$shippingfee}}">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Total
                                        <span>${{$cart->sum('amount') + $shippingfee}}</span>
                                        <input type="hidden" name="total" value="{{$cart->sum('amount') + $shippingfee}}">
                                    </a>
                                </li>
                            </ul>
                            <input type="hidden" name="quantity" value="{{$cart->sum('quantity')}}">
                            <button class="btn_3" href="#">Place Order</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
<!--================End Checkout Area =================-->