<div>@include('partial.notification')</div>
<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{route('index')}}"> <img src="{{url('img/logo.png')}}" alt="logo" style="max-width: 35%;"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('index')}}">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Shop
                                </a>
                                @php
                                $Categories = App\Models\Category::all();
                                @endphp
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                    <a class="dropdown-item" href="{{route('product.list')}}"> products list</a>
                                    @isset($Categories)
                                    @foreach ($Categories as $cat)
                                    <a class="dropdown-item" href="{{route('catproducts',$cat->id)}}">{{$cat->name}}</a>
                                    @endforeach
                                    @endisset
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    pages
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                    <a class="dropdown-item" href="{{route('login')}}"> login</a>
                                    <a class="dropdown-item" href="{{route('user.order.index')}}">tracking</a>
                                    <a class="dropdown-item" href="{{route('checkout')}}">product checkout</a>
                                    <a class="dropdown-item" href="{{route('cart.index')}}">shopping cart</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    actions
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                    <a class="dropdown-item" href="{{route('login')}}"> login</a>
                                    <a class="dropdown-item" href="{{route('user.register')}}">register</a>
                                </div>
                            </li>
                            @isset(Auth::user()->id)
                            @if (Auth::user()->role === 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.index')}}">Admin</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('user.profile')}}">Profile</a>
                            </li>
                            @endif
                            @endisset

                        </ul>
                    </div>
                    <div class="hearer_icon d-flex">
                        <a id="search_1" href="javascript:void(0)"><i class="ti ti-search"></i></a>
                        @isset(Auth::user()->id)
                        <a href=""><i class="ti ti-heart"></i></a>
                        <div class="dropdown cart">
                            <a class="dropdown-toggle" href="{{route('cart.index')}}">
                                <i class="fas fa-cart-plus"><span>@php
                                        echo App\Models\Cart::cartCount();
                                        @endphp</span></i>
                            </a>
                        </div>
                        <a href="{{route('user.logout')}}"><i class="fas fa-sign-out-alt"></i></a>
                        @else
                        <div class="dropdown cart">
                            <a class="dropdown-toggle" href="{{route('cart.index')}}">
                                <i class="fas fa-cart-plus"><span>0</span></i>
                            </a>
                        </div>
                        <a href="{{route('login')}}"><i class="ti ti-user"></i></a>
                        @endisset

                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container ">
            <form class="d-flex justify-content-between search-inner" action="{{route('search')}}" method="get">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here" name="key">
                <button type="submit" class="btn"></button>
                <span class="ti ti-close" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>