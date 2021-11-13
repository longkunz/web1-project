@extends('layouts.master')
@section('contents')

<!-- product_list start-->
<section class="product_list section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="product_list_slider owl-carousel">
                    <!-- Column 1 nè -->
                    <div class="single_product_list_slider">
                        <div class="row align-items-center justify-content-between">
                            @foreach ($products as $pro)
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <a href="{{route('product.detail',$pro->slug)}}">
                                        <img src="{{$pro->photo}}" alt="{{$pro->title}}">
                                    </a>
                                    <div class="single_product_text">
                                        <h4>{{$pro->title}}</h4>
                                        <h3>{{number_format($pro->price)}} $</h3>
                                        <a href="{{route('cart.add',$pro->slug)}}" class="add_cart">+ add to cart<i class="ti ti-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product_list part start-->

<!-- awesome_shop start-->

<!-- awesome_shop part start-->

<!-- product_list part start-->

<!-- product_list part end-->

<!-- subscribe_area part start-->
<section class="subscribe_area section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="subscribe_area_text text-center">
                    <h5>Join Our Newsletter</h5>
                    <h2>Subscribe to get Updated
                        with new offers</h2>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="enter email address" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <a href="#" class="input-group-text btn_2" id="basic-addon2">subscribe now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--::subscribe_area part end::-->
@endsection