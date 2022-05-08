@php
    use App\Models\CartDetail;
@endphp
<header class="ec-header">
    <!--Ec Header Top Start -->
    {{-- <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <!-- Header Top phone Start -->
                <div class="col header-top-left">
                    <!-- Social Start -->
                    <div class="header-top-social">
                        <ul class="mb-0">
                            <li class="list-inline-item"><a href="#"><i class="ecicon eci-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ecicon eci-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ecicon eci-linkedin"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ecicon eci-twitter"></i></a></li>
                        </ul>
                    </div>
                    <!-- Social End -->
                </div>
                <!-- Header Top phone End -->
                <!-- Header Top call Start -->
                <div class="col header-top-center">
                    <!-- Language Start -->
                    <div class="header-top-lan-curr header-top-lan dropdown">
                        <button class="dropdown-toggle" data-bs-toggle="dropdown">English <i
                                class="ecicon eci-angle-down" aria-hidden="true"></i></button>
                        <ul class="dropdown-menu">
                            <li class="active"><a class="dropdown-item" href="#">English</a></li>
                            <li><a class="dropdown-item" href="#">Italiano</a></li>
                        </ul>
                    </div>
                    <!-- Language End -->
                    <!-- Currency Start -->
                    <div class="header-top-lan-curr header-top-curr dropdown">
                        <button class="dropdown-toggle" data-bs-toggle="dropdown">USD <i
                                class="ecicon eci-angle-down" aria-hidden="true"></i></button>
                        <ul class="dropdown-menu">
                            <li class="active"><a class="dropdown-item" href="#">USD $</a></li>
                            <li><a class="dropdown-item" href="#">EUR €</a></li>
                        </ul>
                    </div>
                    <!-- Currency End -->

                </div>
                <!-- Header Top call End -->
                <!-- Header Top Language Currency -->
                <div class="col header-top-right d-none d-lg-block">
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
                </div>
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
                        <a href="#" class="ec-header-btn ec-header-wishlist">
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
                        </a>
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
    </div> --}}
    <!-- Ec Header Top  End -->
    <!-- Ec Header Bottom  Start -->
    <div class="ec-header-bottom d-none d-lg-block">
        <div class="container position-relative">
            <div class="row">
                <div class="ec-flex">
                    <!-- Ec Header Logo Start -->
                    <div class="align-self-center ec-header-logo ">
                        <div class="header-logo">
                            <a href="{{route('home')}}"><img style="width: 50px;height:50px;" src="{{asset(@$globalSetting->logo)}}" alt="Site Logo" />
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
                                {{-- <div class="ec-search-select-inner">
                                    <div class="ec-search-cat-title">All</div>
                                    <ul class="ec-search-cat-block">
                                        <li><a href="#">Cloths</a></li>
                                        <li><a href="#">Bag</a></li>
                                        <li><a href="#">Shoes</a></li>
                                    </ul>
                                </div> --}}
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
                                <li><a class="dropdown-item" href="{{route('profile')}}">My Account</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#changePassword" >Change Password</a></li>
                                <li><a class="dropdown-item" href="{{route('logOut')}}">Logout</a></li>
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
                        <a href="{{route('home')}}"><img style="width: 50px;height:50px;" src="{{asset(@$globalSetting->logo)}}" alt="Site Logo" />

                    </div>
                </div>
                <!-- Ec Header Logo End -->
                <!-- Ec Header Search Start -->
                <div class="col align-self-center ec-header-search">
                    <div class="header-search">
                        <form class="ec-search-group-form" action="#">
                            {{-- <div class="ec-search-select-inner">
                                <div class="ec-search-cat-title">All</div>
                                <ul class="ec-search-cat-block">
                                    <li><a href="#">Cloths</a></li>
                                    <li><a href="#">Bag</a></li>
                                    <li><a href="#">Shoes</a></li>
                                </ul>
                            </div> --}}
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
                            <li class=""><a class="text-uppercase" href="{{route('track-order')}}">Track Order</a>
                            </li>
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
                    <li class=""><a class="text-uppercase" href="{{route('category')}}">Categories</a>
                    </li>
                    <li class=""><a class="text-uppercase" href="{{route('product')}}">Products</a>
                    </li>
                    <li class=""><a class="text-uppercase" href="{{route('track-order')}}">Track Order</a>
                    </li>
                    <li class=""><a class="text-uppercase" href="{{route('home')}}">About Us</a>
                    </li>
                    <li class=""><a class="text-uppercase" href="{{route('home')}}">Contact Us</a>
                    </li>
                </ul>
            </div>
            {{-- <div class="header-res-lan-curr">
                <div class="header-top-lan-curr">
                    <!-- Language Start -->
                    <div class="header-top-lan dropdown">
                        <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Language <i
                                class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                        <ul class="dropdown-menu">
                            <li class="active"><a class="dropdown-item" href="#">English</a></li>
                            <li><a class="dropdown-item" href="#">Italiano</a></li>
                        </ul>
                    </div>
                    <!-- Language End -->
                    <!-- Currency Start -->
                    <div class="header-top-curr dropdown">
                        <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Currency <i
                                class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                        <ul class="dropdown-menu">
                            <li class="active"><a class="dropdown-item" href="#">USD $</a></li>
                            <li><a class="dropdown-item" href="#">EUR €</a></li>
                        </ul>
                    </div>
                    <!-- Currency End -->
                </div>
                <!-- Social Start -->
                <div class="header-res-social">
                    <div class="header-top-social">
                        <ul class="mb-0">
                            <li class="list-inline-item"><a href="#"><i class="ecicon eci-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ecicon eci-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ecicon eci-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ecicon eci-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- Social End -->
            </div> --}}
        </div>
    </div>
    <!-- Ekka Menu End -->
    @livewire('change-password')
</header>

{{-- <div class="ec-side-cart-overlay"></div>
<div id="ec-side-cart" class="ec-side-cart">
    <div class="ec-cart-inner">
        <div class="ec-cart-top">
            <div class="ec-cart-title">
                <span class="cart_title">My Cart</span>
                <button class="ec-close">×</button>
            </div>
            <ul class="eccart-pro-items">
                <li>
                    <a href="product-left-sidebar.html" class="sidecart_pro_img"><img
                            src="{{asset('web/assets/images/product-image/39_1.jpg')}}" alt="product"></a>
                    <div class="ec-pro-content">
                        <a href="single-product-left-sidebar.html" class="cart_pro_title">Instant camera with two album</a>
                        <span class="cart-price"><span>$450</span> x 1</span>
                        <div class="qty-plus-minus">
                            <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                        </div>
                        <a href="#" class="remove">×</a>
                    </div>
                </li>
                <li>
                    <a href="product-left-sidebar.html" class="sidecart_pro_img"><img
                            src="assets/images/product-image/40_1.jpg" alt="product"></a>
                    <div class="ec-pro-content">
                        <a href="product-left-sidebar.html" class="cart_pro_title">Google nest wireless</a>
                        <span class="cart-price"><span>$360</span> x 1</span>
                        <div class="qty-plus-minus">
                            <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                        </div>
                        <a href="#" class="remove">×</a>
                    </div>
                </li>
                <li>
                    <a href="product-left-sidebar.html" class="sidecart_pro_img"><img
                            src="assets/images/product-image/41_1.jpg" alt="product"></a>
                    <div class="ec-pro-content">
                        <a href="product-left-sidebar.html" class="cart_pro_title">Earbuds 3nd generation wireless</a>
                        <span class="cart-price"><span>$30</span> x 1</span>
                        <div class="qty-plus-minus">
                            <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                        </div>
                        <a href="#" class="remove">×</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="ec-cart-bottom">
            <div class="cart-sub-total">
                <table class="table cart-table">
                    <tbody>
                        <tr>
                            <td class="text-left">Sub-Total :</td>
                            <td class="text-right">$1350.00</td>
                        </tr>
                        <tr>
                            <td class="text-left">VAT (20%) :</td>
                            <td class="text-right">$270.00</td>
                        </tr>
                        <tr>
                            <td class="text-left">Total :</td>
                            <td class="text-right primary-color">$1620.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="cart_btn">
                <a href="cart.html" class="btn btn-primary">View Cart</a>
                <a href="checkout.html" class="btn btn-secondary">Checkout</a>
            </div>
        </div>
    </div>
</div> --}}

