<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

        <title>Ekka - Ecommerce HTML Template.</title>
        <meta
            name="keywords"
            content="apparel, catalog, clean, ecommerce, ecommerce HTML, electronics, fashion, html eCommerce, html store, minimal, multipurpose, multipurpose ecommerce, online store, responsive ecommerce template, shops"
        />
        <meta name="description" content="Best ecommerce html template for single and multi vendor store." />
        <meta name="author" content="ashishmaraviya" />

        <!-- site Favicon -->
        <link rel="icon" href="assets/images/favicon/favicon-5.png" sizes="32x32" />
        <link rel="apple-touch-icon" href="assets/images/favicon/favicon-5.png" />
        <meta name="msapplication-TileImage" content="assets/images/favicon/favicon-5.png" />

        <!-- css Icon Font -->
        <link rel="stylesheet" href="{{asset('web/assets/css/vendor/ecicons.min.css')}}" />

        <!-- css All Plugins Files -->
        <link rel="stylesheet" href="{{asset('web/assets/css/plugins/animate.css')}}" />
        <link rel="stylesheet" href="{{asset('web/assets/css/plugins/swiper-bundle.min.css')}}" />
        <link rel="stylesheet" href="{{asset('web/assets/css/plugins/jquery-ui.min.css')}}" />
        <link rel="stylesheet" href="{{asset('web/assets/css/plugins/countdownTimer.css')}}" />
        <link rel="stylesheet" href="{{asset('web/assets/css/plugins/slick.min.css')}}" />
        <link rel="stylesheet" href="{{asset('web/assets/css/plugins/bootstrap.css')}}" />

        <!-- Main Style -->
        <link rel="stylesheet" href="{{asset('web/assets/css/demo5.css')}}" />
        @livewireStyles
        <script src="{{ url('js/app.js') }}" ></script>

    </head>
    <body>
        <div id="ec-overlay"><span class="loader_img"></span></div>

        <!-- Header start  -->
        @include('web.layouts.header')
        <!-- Header End  -->

        @yield('content')

        <!-- Footer Start -->
        @include('web.layouts.footer')
        <!-- Footer Area End -->

        <!-- Modal -->
        <div class="modal fade" id="ec_quickview_modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close qty_close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5 col-sm-12 col-xs-12">
                                <!-- Swiper -->
                                <div class="qty-product-cover">
                                    <div class="qty-slide">
                                        <img class="img-responsive" src="assets/images/product-image/39_1.jpg" alt="" />
                                    </div>
                                    <div class="qty-slide">
                                        <img class="img-responsive" src="assets/images/product-image/39_2.jpg" alt="" />
                                    </div>
                                    <div class="qty-slide">
                                        <img class="img-responsive" src="assets/images/product-image/40_1.jpg" alt="" />
                                    </div>
                                    <div class="qty-slide">
                                        <img class="img-responsive" src="assets/images/product-image/40_2.jpg" alt="" />
                                    </div>
                                    <div class="qty-slide">
                                        <img class="img-responsive" src="assets/images/product-image/41_1.jpg" alt="" />
                                    </div>
                                </div>
                                <div class="qty-nav-thumb">
                                    <div class="qty-slide">
                                        <img class="img-responsive" src="assets/images/product-image/39_1.jpg" alt="" />
                                    </div>
                                    <div class="qty-slide">
                                        <img class="img-responsive" src="assets/images/product-image/39_2.jpg" alt="" />
                                    </div>
                                    <div class="qty-slide">
                                        <img class="img-responsive" src="assets/images/product-image/40_1.jpg" alt="" />
                                    </div>
                                    <div class="qty-slide">
                                        <img class="img-responsive" src="assets/images/product-image/40_2.jpg" alt="" />
                                    </div>
                                    <div class="qty-slide">
                                        <img class="img-responsive" src="assets/images/product-image/41_1.jpg" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-12 col-xs-12">
                                <div class="quickview-pro-content">
                                    <h5 class="ec-quick-title"><a href="product-left-sidebar.html">Trainers with broguing slogan</a></h5>
                                    <div class="ec-quickview-rating">
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star"></i>
                                    </div>

                                    <div class="ec-quickview-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</div>
                                    <div class="ec-quickview-price">
                                        <span class="old-price">$200.00</span>
                                        <span class="new-price">$159.00</span>
                                    </div>

                                    <div class="ec-pro-variation">
                                        <div class="ec-pro-variation-inner ec-pro-variation-color">
                                            <span>Color</span>
                                            <div class="ec-pro-variation-content">
                                                <ul>
                                                    <li><span style="background-color: #202020;"></span></li>
                                                    <li><span style="background-color: #0d4fcf;"></span></li>
                                                    <li><span style="background-color: #f93434;"></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ec-quickview-qty">
                                        <div class="qty-plus-minus">
                                            <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                                        </div>
                                        <div class="ec-quickview-cart">
                                            <button class="btn btn-primary">Add To Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->

        <!-- Click To ChatPro -->

        <!-- Click To ChatPro end-->

        <!-- Newsletter Modal Start -->
        <div id="ec-popnews-bg"></div>
        <div id="ec-popnews-box" class="animate__animated animate__slideInDown">
            <div id="ec-popnews-close"><i class="ecicon eci-close"></i></div>
            <div id="ec-popnews-box-content">
                <h1>Subscribe Newsletter</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                <form id="ec-popnews-form" action="#" method="post">
                    <input type="email" name="newsemail" placeholder="Email Address" required />
                    <button type="button" class="btn btn-secondary" name="subscribe">Subscribe</button>
                </form>
            </div>
        </div>
        <!-- Newsletter Modal end -->

        <!-- successfully toast Start -->
        <div id="addtocart_toast" class="addtocart_toast">
            <div class="desc">You Have Add To Cart Successfully</div>
        </div>
        <div id="wishlist_toast" class="wishlist_toast">
            <div class="desc">You Have Add To Wishlist Successfully</div>
        </div>
        <!--successfully toast end -->

        <!-- Vendor JS -->
        <script src="{{asset('web/assets/js/vendor/jquery-3.5.1.min.js')}}"></script>
        <script src="{{asset('web/assets/js/vendor/popper.min.js')}}"></script>
        <script src="{{asset('web/assets/js/vendor/bootstrap.min.js')}}"></script>
        <script src="{{asset('web/assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
        <script src="{{asset('web/assets/js/vendor/modernizr-3.11.2.min.js')}}"></script>

        <!--Plugins JS-->
        <script src="{{asset('web/assets/js/plugins/swiper-bundle.min.js')}}"></script>
        <script src="{{asset('web/assets/js/plugins/countdownTimer.min.js')}}"></script>
        <script src="{{asset('web/assets/js/plugins/scrollup.js')}}"></script>
        <script src="{{asset('web/assets/js/plugins/jquery.zoom.min.js')}}"></script>
        <script src="{{asset('web/assets/js/plugins/slick.min.js')}}"></script>
        <script src="{{asset('web/assets/js/plugins/infiniteslidev2.js')}}"></script>
        <script src="{{asset('web/assets/js/plugins/chat-pro.js')}}"></script>

        <!-- Main Js -->
        <script src="{{asset('web/assets/js/vendor/index.js')}}"></script>
        <script src="{{asset('web/assets/js/demo-5.js')}}"></script>
        @livewireScripts
    </body>
</html>
