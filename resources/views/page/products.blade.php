@extends('layouts.master')
@section('title','List of products')
@section('contents')
@include('partial.breadcrumb',['name' => 'Products list','here' => 'Products'])
<!--================ Products Area =================-->
<section class="cat_product_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="left_sidebar_area">
                    @include('partial.sidebar')
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row align-items-center latest_product_inner">
                    <!-- Show product list x6 -->

                    @isset($products)
                    @foreach ($products as $product)
                    <div class="col-md-4 col-lg-4 col-sm-6">
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

                    <!-- End show product list x6 -->
                    <div class="col-lg-12">
                        {{$products->links('layouts.paginate')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Products Area =================-->
@endsection
@push('styles')
<link rel="stylesheet" href="{{url('css/nice-select.css')}}">
@endpush