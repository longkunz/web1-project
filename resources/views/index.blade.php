@extends('layouts.master')
@section('contents')
<!-- banner part start-->
@isset($banners)
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="banner_slider owl-carousel">

                    @foreach ($banners as $banner)
                    <!-- Start single slider -->
                    <div class="single_banner_slider">
                        <div class="row">
                            <div class="col-lg-5 col-md-8">
                                <div class="banner_text">
                                    <div class="banner_text_iner">
                                        <h1>{{$banner->title}}</h1>
                                        <p>{{$banner->description}}</p>
                                        <a href="{{$banner->link}}" class="btn_2">buy now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="banner_img d-none d-lg-block">
                                <img src="{{$banner->image}}" alt="{{$banner->title}}">
                            </div>
                        </div>
                    </div>
                    <!-- End single slider -->
                    @endforeach

                </div>
                <div class="slider-counter"></div>
            </div>
        </div>
    </div>
</section>
@endisset
<!-- banner part start-->

<!-- feature_part start-->
<section class="feature_part padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section_tittle text-center">
                    <h2>Featured Category</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            @if($cate1 && $cate2)
            <div class="col-lg-7 col-sm-6">
                <div class="single_feature_post_text">
                    <p>Premium Quality</p>
                    <h3>{{$cate1->name}}</h3>
                    <a href="{{route('catproducts',$cate1->id)}}" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                    <img src="{{url('img/feature/feature_1.png')}}" alt="{{$cate1->name}}">
                </div>
            </div>

            <div class="col-lg-5 col-sm-6">
                <div class="single_feature_post_text">
                    <p>Premium Quality</p>
                    <h3>{{$cate2->name}}</h3>
                    <a href="{{route('catproducts',$cate2->id)}}" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                    <img src="{{url('img/feature/feature_2.png')}}" alt="{{$cate2->name}}">
                </div>
            </div>
            @endif

            @if($cate3 && $cate4)
            <div class="col-lg-5 col-sm-6">
                <div class="single_feature_post_text">
                    <p>Premium Quality</p>
                    <h3>{{$cate3->name}}</h3>
                    <a href="{{route('catproducts',$cate3->id)}}" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                    <img src="{{url('img/feature/feature_3.png')}}" alt="{{$cate3->name}}">
                </div>
            </div>
            <div class="col-lg-7 col-sm-6">
                <div class="single_feature_post_text">
                    <p>Premium Quality</p>
                    <h3>{{$cate4->name}}</h3>
                    <a href="{{route('catproducts',$cate4->id)}}" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                    <img src="{{url('img/feature/feature_4.png')}}" alt="{{$cate4->name}}">
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
<!-- upcoming_event part start-->

<!-- product_list start-->
<section class="product_list section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>New Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="product_list_slider owl-carousel">
                    <!-- Column 1 nè -->
                    <div class="single_product_list_slider">
                        <div class="row align-items-center justify-content-between">
                            @isset($products)
                            @php
                            $products1 = $products->take(8);
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
                                        <h3>${{number_format($product->price)}}</h3>
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
                            @isset($products)
                            @php
                            $products2 = $products->skip(8)->take(8);
                            @endphp
                            @foreach ($products2 as $product)
                            <div class="col-lg-3 col-sm-6">
                                <div class="single_product_item">
                                    <a href="{{route('product.detail',$product->slug)}}">
                                        @php $photos = explode(',',$product->photo); @endphp
                                        <img src="{{$photos[0]}}" alt="{{$product->title}}">
                                    </a>
                                    <div class="single_product_text">
                                        <h4>{{$product->title}}</h4>
                                        <h3>${{number_format($product->price)}}</h3>
                                        <a href="{{route('cart.add',$product->slug)}}" class="add_cart">+ add to cart</a>
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
<!-- product_list part start-->


<!-- product_list part start-->
@if(count($best) != 0)

<section class="product_list best_seller">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Hot Products</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="best_product_slider owl-carousel">
                    @foreach ($best as $item)
                    <div class="single_product_item">
                        @php $photos = explode(',',$item->product->photo); @endphp
                        <a href="{{route('product.detail',$item->product->id)}}"><img src="{{$photos[0]}}" alt="{{$item->product->title}}"></a>
                        <div class="single_product_text">
                            <h4>{{$item->product->title}}</h4>
                            <h3>${{number_format($item->product->price)}}</h3>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product_list part end-->
@endif

@endsection