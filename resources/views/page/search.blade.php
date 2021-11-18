@extends('layouts.master')
@section('contents')

<section class="product_list section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Search Result</h2>
                    <p>Tìm thấy {{count($product)}} sản phẩm</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="product_list_slider owl-carousel">
                    <!-- Column 1 nè -->
                    <div class="single_product_list_slider">
                        <div class="row align-items-center justify-content-between">
                            @isset($product)
                            @php
                            $products1 = $product->take(8);
                            @endphp
                            @foreach ($products1 as $product)
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <a href="{{route('product.detail',$product->slug)}}">
                                        @php $photos = explode(',',$product->photo); @endphp
                                        <img src="{{$photos[0]}}" alt="{{$product->title}}">
                                    </a>
                                    <div class="single_product_text">
                                        <h4>{{$product->title}}</h4>
                                        <h3>{{number_format($product->price)}} $</h3>
                                        <a href="{{route('cart.add',$product->slug)}}" class="add_cart">+ add to cart</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endisset

                        </div>
                    </div>
                    <!-- Column 2 -->
                    <div class="single_product_list_slider">
                        <div class="row align-items-center justify-content-between">
                            @isset($product)
                            @php
                            $products2 = $product->skip(8)->take(8);
                            @endphp
                            @foreach ($products2 as $product)
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <a href="{{route('product.detail',$product->slug)}}">
                                        <img src="{{$product->photo}}" alt="{{$product->title}}">
                                    </a>
                                    <div class="single_product_text">
                                        <h4>{{$product->title}}</h4>
                                        <h3>{{number_format($product->price)}} $</h3>
                                        <a href="{{route('cart.add',$product->slug)}}" class="add_cart">+ add to cart<i class="ti ti-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection