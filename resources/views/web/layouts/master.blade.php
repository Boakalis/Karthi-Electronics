<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

        <title>{{@$globalSetting->name}} | One Stop Solution for all products</title>
        <meta
            name="keywords"
            content="apparel, catalog, clean, ecommerce, ecommerce HTML, electronics, fashion, html eCommerce, html store, minimal, multipurpose, multipurpose ecommerce, online store, responsive ecommerce template, shops"
        />
        <meta name="description" content="Best ecommerce html template for single and multi vendor store." />
        <meta name="author" content="dragonboa">

        <!-- site Favicon -->
        <link rel="icon" href="{{asset(@$globalSetting->favicon)}}" sizes="32x32" />
        <link rel="apple-touch-icon" href="{{asset(@$globalSetting->favicon)}}" />
        <meta name="msapplication-TileImage" content="{{asset(@$globalSetting->favicon)}}" />

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
        {{-- <script src="{{ url('js/app.js') }}" ></script> --}}

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



        @livewire('forgetpassword')

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
        <script src="{{asset('web/assets/js/plugins/fb-chat.js')}}"></script>

        <!-- Main Js -->
        <script src="{{asset('web/assets/js/vendor/index.js')}}"></script>
        <script src="{{asset('web/assets/js/demo-5.js')}}"></script>



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

        <script>
            function password() {
                alert(1);
            }
        </script>

        @stack('scripts')
    </body>
</html>
