@php
    use App\Models\CartDetail;
@endphp
<header class="ec-header">
    <!--Ec Header Top Start -->
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <!-- Header Top phone Start -->

                <!-- Header Top phone End -->
                <!-- Header Top call Start -->

                <!-- Header Top call End -->
                <!-- Header Top Language Currency -->
                {{-- <div class="col header-top-right d-none d-lg-block">
                    <div class="header-top-right-inner d-flex justify-content-end">

                        <!-- Header User Start -->
                        <div class="ec-header-user dropdown">
                            <button class="dropdown-toggle" data-bs-toggle="dropdown"><img
                                    src="{{asset('web/assets/images/icons/user_5.svg')}}" class="svg_img top_svg" alt="" /><span
                                    class="ec-btn-title">Login</span></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a class="dropdown-item" href="register.html">Register</a></li>
                                <li><a class="dropdown-item" href="checkout.html">Checkout</a></li>
                                <li><a class="dropdown-item" href="login.html">Login</a></li>
                            </ul>
                        </div>
                        <!-- Header User End -->
                        <!-- Header wishlist Start -->
                        <div class="ec-header-wishlist">
                            <a href="#">
                                <div class="top-icon"><img src="{{asset('web/assets/images/icons/pro_wishlist.svg')}}"
                                        class="svg_img top_svg" alt="" /></div>
                                <span class="ec-btn-title">wishlist</span>
                            </a>
                        </div>
                    </div>
                </div> --}}
                <!-- Header Top Language Currency -->
                <!-- Header Top responsive Action -->
                <div class="col header-top-res d-lg-none">
                    <div class="ec-header-bottons">
                        <!-- Header User Start -->
                        <div class="ec-header-user dropdown">
                            <button class="dropdown-toggle" data-bs-toggle="dropdown"><img
                                    src="{{asset('web/assets/images/icons/user_5.svg')}}" class="svg_img header_svg" alt="" /></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a class="dropdown-item" href="register.html">Register</a></li>
                                <li><a class="dropdown-item" href="checkout.html">Checkout</a></li>
                                <li><a class="dropdown-item" href="login.html">Login</a></li>
                            </ul>
                        </div>
                        <!-- Header User End -->
                        <!-- Header Cart Start -->
                        {{-- <a href="#" class="ec-header-btn ec-header-wishlist">
                            <div class="header-icon"><img src="{{asset('web/assets/images/icons/wishlist.svg')}}"
                                    class="svg_img header_svg" alt="" /></div>
                            <span class="ec-header-count ec-wishlist-count">0</span>
                        </a>
                        <!-- Header Cart End -->
                        <!-- Header Cart Start -->
                        <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
                            <div class="header-icon"><img src="{{asset('web/assets/images/icons/cart_5.svg')}}"
                                    class="svg_img header_svg" alt="" /></div>
                            <span class="ec-header-count ec-cart-count">3</span>
                        </a> --}}
                        <!-- Header Cart End -->
                        <!-- Header menu Start -->
                        <a href="#ec-mobile-menu" class="ec-header-btn ec-side-toggle d-lg-none">
                            <i class="ecicon eci-bars"></i>
                        </a>
                        <!-- Header menu End -->
                    </div>
                </div>
                <!-- Header Top responsive Action -->
            </div>
        </div>
    </div>
    <!-- Ec Header Top  End -->
    <!-- Ec Header Bottom  Start -->
    <div class="ec-header-bottom d-none d-lg-block">
        <div class="container position-relative">
            <div class="row">
                <div class="ec-flex">
                    <!-- Ec Header Logo Start -->
                    <div class="align-self-center ec-header-logo ">
                        <div class="header-logo">
                            <a href="{{route('home')}}"><img style="width: 100px;height:100px;" src="{{asset(@$globalSetting->logo)}}" alt="Site Logo" />
                                {{-- <img
                                    class="dark-logo" style="width: 50px;height:50px;" src="{{asset(@$globalSetting->logo)}}" alt="Site Logo"
                                    style="display: none;" /> --}}
                                </a>
                        </div>
                    </div>
                    <!-- Ec Header Logo End -->

                    <!-- Ec Header Search Start -->
                    <div class="align-self-center ec-header-search">
                        <div class="header-search">
                            <form class="ec-search-group-form" action="#">
                                <div class="ec-search-select-inner">
                                    <div class="ec-search-cat-title">All</div>
                                </div>
                                <input class="form-control" placeholder="Search Here..." type="text">
                                <button class="search_submit" type="submit"><i class="ecicon eci-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <!-- Ec Header Search End -->

                    <!-- Ec Header Button Start -->
                    <div class="align-self-center ec-header-bottons">

                        <div class="ec-header-bottons">

                            <!-- Header wishlist End -->
                            <!-- Header Cart Start -->
                            @auth
                            <a href="{{route('cart')}}" class="ec-header-btn ">
                                <div class="header-icon"><img style="width: 20px;height:20px;"  src="{{asset('web/assets/images/icons/cart_5.svg')}}"
                                        class="svg_img header_svg" alt="" /></div>
                                <span class="ec-btn-title"  ><span id="count" class="step">{{@CartDetail::where([['user_id',Auth::user()->id],['status',1]])->count()}}</span></span>

                            </a>

                            @endauth
                            @guest
                            <a href="{{route('login')}}" class="ec-header-btn ">
                                <div class="header-icon"><img style="width: 20px;height:20px;"  src="{{asset('web/assets/images/icons/cart_5.svg')}}"
                                        class="svg_img header_svg" alt="" /></div>
                                <span class="ec-btn-title"  ><span id="count" class="step">{{@CartDetail::where([['user_id',Auth::user()->id],['status',1]])->count()}}</span></span>

                            </a>

                            @endguest
                            <!-- Header Cart End -->
                        </div>
                        <div class="ec-header-user dropdown">
                            <button class="dropdown-toggle" data-bs-toggle="dropdown"><img
                                    src="{{asset('web/assets/images/icons/user.svg')}}" class=" header_svg" alt="" /></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                @guest
                                    <li><a class="dropdown-item" href="{{route('register')}}">Register</a></li>
                                    <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
                                @endguest
                                @auth
                                    <li><a class="dropdown-item" href="{{route('user.profile')}}">My Account</a></li>
                                    <li><a class="dropdown-item" href="{{route('cart')}}">My Cart</a></li>
                                    <li><a class="dropdown-item" href="{{route('order.view')}}">My Orders</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#changePassword" >Change Password</a></li>
                                    <li><a class="dropdown-item" href="{{route('user.logout')}}">Logout</a></li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec Header Button End -->
    <!-- Header responsive Bottom  Start -->
    <div class="ec-header-bottom d-lg-none">
        <div class="container position-relative">
            <div class="row ">

                <!-- Ec Header Logo Start -->
                <div class="col">
                    <div class="header-logo">
                        <a href="{{route('home')}}"><img style="width: 100px;height:100px;" src="{{asset(@$globalSetting->logo)}}" alt="Site Logo" />

                    </div>
                </div>
                <!-- Ec Header Logo End -->
                <!-- Ec Header Search Start -->
                <div class="col align-self-center ec-header-search">
                    <div class="header-search">
                        <form class="ec-search-group-form" action="#">
                            <div class="ec-search-select-inner">
                                <div class="ec-search-cat-title">All</div>
                                <ul class="ec-search-cat-block">
                                    <li><a href="#">Cloths</a></li>
                                    <li><a href="#">Bag</a></li>
                                    <li><a href="#">Shoes</a></li>
                                </ul>
                            </div>
                            <input class="form-control" placeholder="Search Here..." type="text">
                            <button class="search_submit" type="submit"><i class="ecicon eci-search"></i></button>
                        </form>
                    </div>
                </div>
                <!-- Ec Header Search End -->
            </div>
        </div>
    </div>
    <!-- Header responsive Bottom  End -->
    <!-- EC Main Menu Start -->
    <div id="ec-main-menu-desk" class="sticky-nav">
        <div class="container position-relative">
            <div class="row">
                {{-- <div class="col ec-category-block">
                    <div class="ec-cat-menu">
                        <div class="ec-category-toggle">
                            <span class="ec-category-icon"></span>
                            <span class="ec-category-title">all categories</span>
                        </div>
                        <div class="ec-category-content">
                            <div id="ec-category-menu" class="ec-category-menu">
                                <ul class="ec-category-wrapper">
                                    <li><a title="" class="ec-cat-menu-link" href="#">Home & Kitchen</a></li>
                                    <li><a title="" class="ec-cat-menu-link" href="#">Electronics & Digital</a></li>
                                    <li><a title="" class="ec-cat-menu-link" href="#">Home Accessories</a></li>
                                    <li><a title="" class="ec-cat-menu-link" href="#">Electronics</a></li>
                                    <li><a title="" class="ec-cat-menu-link" href="#">Office Furniture</a></li>
                                    <li><a title="" class="ec-cat-menu-link" href="#">Hotel Furniture</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col ec-main-menu-block align-self-center d-none d-lg-block p-0">
                    <div class="ec-main-menu">
                        <ul>
                            <li class=""><a class="text-uppercase" href="{{route('home')}}">Home</a>

                            </li>
                            <li class=""><a class="text-uppercase" href="{{route('web.category')}}">Categories</a>
                            </li>
                            <li class=""><a class="text-uppercase" href="{{route('web.single.product')}}">Products</a>
                            </li>
                            {{-- <li class=""><a class="text-uppercase" href="{{route('track-order')}}">Track Order</a>
                            </li> --}}
                            <li class=""><a class="text-uppercase" href="{{route('home')}}">About Us</a>
                            </li>
                            <li class=""><a class="text-uppercase" href="{{route('home')}}">Contact Us</a>
                            </li>

                        </ul>
                    </div>
                </div>
                {{-- <div class="col ec-spe-offer-block">
                    <div class="ec-spe-offer-link">
                        <a href="offer.html" class="ec-spe-offer-title">Special offer</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- Ec Main Menu End -->
    <!-- Ekka Menu Start -->
    <div id="ec-mobile-menu" class="ec-side-cart ec-mobile-menu">
        <div class="ec-menu-title">
            <span class="menu_title">My Menu</span>
            <button class="ec-close">×</button>
        </div>
        <div class="ec-menu-inner">
            <div class="ec-menu-content">
                <ul>
                    <li class=""><a class="text-uppercase" href="{{route('home')}}">Home</a>

                    </li>
                    <li class=""><a class="text-uppercase" href="{{route('web.category')}}">Categories</a>
                    </li>
                    <li class=""><a class="text-uppercase" href="{{route('web.single.product')}}">Products</a>
                    </li>
                    {{-- <li class=""><a class="text-uppercase" href="{{route('track-order')}}">Track Order</a>
                    </li> --}}
                    <li class=""><a class="text-uppercase" href="{{route('home')}}">About Us</a>
                    </li>
                    <li class=""><a class="text-uppercase" href="{{route('home')}}">Contact Us</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
    <!-- Ekka Menu End -->
    @livewire('change-password')
</header>



