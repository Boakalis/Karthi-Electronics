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
        <link rel="stylesheet" href="{{asset('web/assets/css/plugins/nouislider.css')}}" />
        <link rel="stylesheet" href="{{asset('web/assets/css/plugins/bootstrap.css')}}" />

        <!-- Main Style -->
        <link rel="stylesheet" href="{{asset('web/assets/css/demo5.css')}}" />
        <link rel="stylesheet" href="{{asset('/css/developer.css')}}" />
        {{-- <link rel="stylesheet" href="{{asset('web/assets/css/style.css')}}" />
        <link rel="stylesheet" href="{{asset('web/assets/css/responsive.css')}}" /> --}}
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

        @livewireStyles
        @yield('stylesheet')
        <style>
            .offer-img{
                background-size:contain !important;
            }
            span.step {
            background: yellow;
            border-radius: 0.8em;
            -moz-border-radius: 0.8em;
            -webkit-border-radius: 0.8em;
            color: black;
            display: inline-block;
            font-weight: bold;
            line-height: 1.6em;
            margin-right: 5px;
            text-align: center;
            width: 1.6em;
            }

        </style>
        <script src="{{ url('js/app.js') }}" ></script>

    </head>
    <body>
        {{-- <div id="ec-overlay"><span class="loader_img"></span></div> --}}

        <!-- Header start  -->
        @include('web.layouts.header')
        <!-- Header End  -->

        @yield('content')

        <!-- Footer Start -->
        @include('web.layouts.footer')
        <!-- Footer Area End -->

        <!-- Modal -->
        <div class="modal fade" id="modal-login" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close qty_close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5 col-sm-12 col-xs-12" >
                                {{-- <!-- Swiper -->
                                <div class="qty-product-cover">
                                    <div class="qty-slide">
                                        <img class="img-responsive" src="" alt="" />
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
                                </div> --}}
                                <img src="{{asset('12.jpg')}}" style="height: 100%" alt="">

                            </div>
                            <div class="col-md-7 col-sm-12 col-xs-12">
                                <div class="login">
                                    <center> <h4 class="text-uppercase">Login</h4> </center>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
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
        {{-- <div id="ec-popnews-bg"></div>
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
        </div> --}}
        <!-- Newsletter Modal end -->

        {{-- <!-- successfully toast Start -->
        <div id="addtocart_toast" class="addtocart_toast">
            <div class="desc">You Have Add To Cart Successfully</div>
        </div>
        <div id="wishlist_toast" class="wishlist_toast">
            <div class="desc">You Have Add To Wishlist Successfully</div>
        </div>
        <!--successfully toast end --> --}}

        <!-- Vendor JS -->
        <script src="{{asset('web/assets/js/vendor/jquery-3.5.1.min.js')}}" data-turbolinks-eval="false" ></script>
        <script src="{{asset('web/assets/js/vendor/popper.min.js')}}" data-turbolinks-eval="false" ></script>
        <script src="{{asset('web/assets/js/vendor/bootstrap.min.js')}}" data-turbolinks-eval="false" ></script>
        <script src="{{asset('web/assets/js/vendor/jquery-migrate-3.3.0.min.js')}}" data-turbolinks-eval="false" ></script>
        <script src="{{asset('web/assets/js/vendor/modernizr-3.11.2.min.js')}}" data-turbolinks-eval="false" ></script>

        <!--Plugins JS-->
        <script src="{{asset('web/assets/js/plugins/swiper-bundle.min.js')}}" data-turbolinks-eval="false" ></script>
        <script src="{{asset('web/assets/js/plugins/countdownTimer.min.js')}}" data-turbolinks-eval="false" ></script>
        <script src="{{asset('web/assets/js/plugins/scrollup.js')}}" data-turbolinks-eval="false" ></script>
        <script src="{{asset('web/assets/js/plugins/jquery.zoom.min.js')}}" data-turbolinks-eval="false" ></script>
        <script src="{{asset('web/assets/js/plugins/slick.min.js')}}" data-turbolinks-eval="false" ></script>
        <script src="{{asset('web/assets/js/plugins/infiniteslidev2.js')}}" data-turbolinks-eval="false" ></script>
        <script src="{{asset('web/assets/js/plugins/chat-pro.js')}}" data-turbolinks-eval="false" ></script>
        <script src="{{asset('web/assets/js/vendor/jquery.magnific-popup.min.js')}}" data-turbolinks-eval="false" ></script>
        <script src="{{asset('web/assets/js/plugins/jquery.sticky-sidebar.js')}}" data-turbolinks-eval="false" ></script>

        <!-- Main Js -->
        <script src="{{asset('web/assets/js/vendor/index.js')}}" data-turbolinks-eval="false" ></script>
        <script src="{{asset('web/assets/js/demo-5.js')}}" data-turbolinks-eval="false" ></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                toastr.options = {
                    "closeButton": false,
                    "debug": true,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
            }
        });
    </script>

        @livewireScripts
     
        @stack('scripts')
    </body>
</html>
