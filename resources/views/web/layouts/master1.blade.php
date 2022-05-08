
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="x-ua-compatible" content="ie=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

     <title>Ekka - Ecommerce HTML Template.</title>
     <meta name="keywords" content="apparel, catalog, clean, ecommerce, ecommerce HTML, electronics, fashion, html eCommerce, html store, minimal, multipurpose, multipurpose ecommerce, online store, responsive ecommerce template, shops" />
     <meta name="description" content="Best ecommerce html template for single and multi vendor store.">
     <meta name="author" content="ashishmaraviya">

    <!-- site Favicon -->
    <link rel="icon" href="{{asset('web/assets/images/favicon/favicon.png')}}" sizes="32x32" />
    <link rel="apple-touch-icon" href="{{asset('web/assets/images/favicon/favicon.png')}}" />
    <meta name="msapplication-TileImage" content="{{asset('web/assets/images/favicon/favicon.png')}}" />

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
    <link rel="stylesheet" href="{{asset('web/assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('web/assets/css/responsive.css')}}" />

    <!-- Background css -->
    <link rel="stylesheet" id="bg-switcher-css" href="{{asset('web/assets/css/backgrounds/bg-4.css')}}">
    @livewireStyles
    <link rel="stylesheet" href="{{asset('/css/developer.css')}}" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @yield('stylesheet')
</head>
<body class="shop_page">

    <div id="ec-overlay"><span class="loader_img"></span></div>

    {{-- header --}}
    @livewire('header')

    {{-- header-end --}}
    <!-- Ec breadcrumb start -->
    @include('web.layouts.includes.breadcrumb')
    <!-- Ec breadcrumb end -->

    <!-- Content -->
    @yield('content')
    <!-- Content-end -->

    <!-- Footer Start -->
    @include('web.layouts.footer1')
    <!-- Footer Area End -->

    @livewire('change-password')
    @livewire('forgetpassword')

    <!-- Vendor JS -->
    <script src="{{asset('web/assets/js/vendor/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('web/assets/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('web/assets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('web/assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{asset('web/assets/js/vendor/modernizr-3.11.2.min.js')}}"></script>

    <!--Plugins JS-->
    <script src="{{asset('web/assets/js/plugins/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('web/assets/js/plugins/nouislider.js')}}"></script>
    <script src="{{asset('web/assets/js/plugins/countdownTimer.min.js')}}"></script>
    <script src="{{asset('web/assets/js/plugins/scrollup.js')}}"></script>
    <script src="{{asset('web/assets/js/plugins/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('web/assets/js/plugins/slick.min.js')}}"></script>
    <script src="{{asset('web/assets/js/plugins/infiniteslidev2.js')}}"></script>
    <script src="{{asset('web/assets/js/vendor/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('web/assets/js/plugins/jquery.sticky-sidebar.js')}}"></script>
    {{-- <script src="{{asset('web/assets/js/plugins/product-360.js')}}"></script> --}}
    <!-- Main Js -->
    <script src="{{asset('web/assets/js/main.js')}}"></script>
    <script src="{{asset('web/assets/js/vendor/index.js')}}"></script>
    <script src="https://kit.fontawesome.com/1b0bb62797.js" crossorigin="anonymous"></script>

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
        Livewire.on('cartUpdatedValue',function(val){

            $('#countData').html(val);
        });
    </script>
     <script>
        function password() {
            alert(1);
        }
    </script>
    @stack('scripts')
</body>
</html>
