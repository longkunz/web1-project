@php
$site=DB::table('settings')->first();
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>{{$site->title}} - @yield('title')</title>
    <!-- Meta description -->
    <meta name="description" content="{{$site->description}}" />
    <!-- CSP meta tag for security -->
    <!-- <meta http-equiv="Content-Security-Policy" content="default-src 'self'"> -->
    <link rel="icon" href="{{url('img/favicon.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{url('css/animate.css')}}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{url('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('css/lightslider.min.css')}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{url('css/all.css')}}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{url('css/flaticon.css')}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{url('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{url('css/font-awesome.min.css')}}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{url('css/slick.css')}}">
    <!-- themify icon -->
    <link rel="stylesheet" href="https://unpkg.com/@icon/themify-icons/themify-icons.css">
    @stack('styles')
    <!-- style CSS -->
    <link rel="stylesheet" href="{{url('css/style.css')}}">
</head>

<body>
    <!--::header part start::-->
    @include('partial.header')
    <!-- Header part end-->

    <!-- product_list start-->
    @yield('contents')
    <!-- product_list part end-->

    <!--::footer_part start::-->
    @include('partial.footer')
    <!--::footer_part end::-->

    @stack('scripts')
</body>

</html>