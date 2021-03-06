@extends('web.layouts.master')
@section('content')
    @include('web.layouts.includes.slider')
    <!--  category Section Start -->
    <section class="section ec-category-section section-space-mb">
        <div class="container">
            <div class="row">
                <div class="ec_cat_slider">
                    <div class="ec_cat_content">
                        <div class="ec_cat_inner">
                            <a href="#">
                                <h2 class="d-none">Category</h2>
                                <div class="ec-cat-image">
                                    <img src="assets/images/category-image/8.svg" class="svg_img cat_svg" alt="" />
                                </div>
                                <div class="ec-cat-desc">
                                    <span class="ec-section-title">Laptops & PC</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--category Section End -->

    <!-- Product tab Area Start -->
    <section class="section ec-product-tab section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-title-block">
                    <div class="section-title">
                        <h2 class="ec-title">Featured Products</h2>
                        <h6 class="ec-sub-title">Lorem Ipsum is simply dummy text of the printing</h6>

                    </div>
                </div>

            </div>
            <div class="row m-tb-minus-15">
                <div class="col">
                    <div class="tab-content">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ec-product-content">
                                <div class="ec-product-inner">
                                    <div class="ec-product-hover"></div>
                                    <div class="ec-pro-image-outer">
                                        <div class="ec-pro-image">
                                            <a href="product-left-sidebar.html" class="image">
                                                <img class="main-image" src="{{asset('web/assets/images/product-image/39_1.jpg')}}"
                                                    alt="Product" />
                                                <img class="hover-image" src="{{asset('web/assets/images/product-image/39_2.jpg')}}"
                                                    alt="Product" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ec-pro-content">
                                        <div class="ec-pro-option">
                                            <div class="ec-pro-opt-inner">
                                                <div class="ec-pro-color">
                                                    <ul class="ec-opt-swatch ec-change-img">
                                                        <li class="active"><a href="#" class="ec-opt-clr-img"
                                                                data-src="{{asset('web/assets/images/product-image/39_1.jpg')}}"
                                                                data-src-hover="assets/images/product-image/39_2.jpg"
                                                                data-tooltip="Gray"><span
                                                                    style="background-color:#ef7ca3;"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="ec-pro-compare">
                                                    <a href="compare.html" class="ec-btn-group compare"
                                                        title="Compare"><img src="assets/images/icons/compare_5.svg"
                                                            class="svg_img pro_svg" alt="" /></a>
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Instant camera with two album</a></h5>
                                        <h6 class="ec-pro-stitle"><a href="shop-left-sidebar-col-3.html">Camera</a></h6>
                                        <div class="ec-pro-rat-price">
                                            <div class="ec-pro-rat-pri-inner">
                                                <span class="ec-price">
                                                    <span class="new-price">$159.00</span>
                                                    <span class="old-price">$200.00</span>
                                                </span>
                                                <span class="ec-pro-rating">
                                                    <i class="ecicon eci-star fill"></i>
                                                    <i class="ecicon eci-star fill"></i>
                                                    <i class="ecicon eci-star fill"></i>
                                                    <i class="ecicon eci-star-o"></i>
                                                    <i class="ecicon eci-star-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="pro-hidden-block">

                                            <div class="ec-pro-desc">Lorem Ipsum is simply dummy text of the printing.</div>
                                            <div class="ec-pro-actions">
                                                <a class="ec-btn-group wishlist" title="Wishlist"><img
                                                        src="assets/images/icons/pro_wishlist.svg"
                                                        class="svg_img pro_svg" alt="" /></a>
                                                <button title="Add To Cart" class="add-to-cart btn btn-primary">Add To
                                                    Cart</button>
                                                <a href="#" class="ec-btn-group quickview" data-link-action="quickview"
                                                    title="Quick view" data-bs-toggle="modal"
                                                    data-bs-target="#ec_quickview_modal"><img
                                                        src="assets/images/icons/quickview.svg" class="svg_img pro_svg"
                                                        alt="" /></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ec Product tab Area End -->

    <!-- ec Banner Section Start -->
    <section class="ec-banner section section-space-p">
        <h2 class="d-none">Banner</h2>
        <div class="container">
            <div class="row m-tb-minus-15">
                <div class="ec-banners">
                    <div class="ec-banner-left col-sm-6">
                        <div class="ec-banner-block ec-banner-block-1 col-sm-12">
                            <div class="banner-block">
                                <img src="{{asset('web/assets/images/banner/23.png')}}" alt="" />
                                <div class="banner-content">
                                    <span class="ec-banner-stitle">lenovo tablets</span>
                                    <span class="ec-banner-title">UP to 70% OFF</span>
                                    <span class="ec-banner-btn"><a href="#" class="btn-primary">Shop Now</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ec-banner-right col-sm-6">
                        <div class="ec-banner-block ec-banner-block-2 col-sm-12">
                            <div class="banner-block">
                                <img src="{{asset('web/assets/images/banner/24.png')}}" alt="" />
                                <div class="banner-content">
                                    <span class="ec-banner-stitle">Xiaoyi YI 1080p</span>
                                    <span class="ec-banner-title">WiFi IP Camera 36</span>
                                    <span class="ec-banner-btn"><a href="#" class="btn-primary">Shop Now</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ec Banner Section End -->

    {{-- <!--  Feature & Special Section Start -->
    <section class="section ec-exe-spe-section section-space-ptb-100 section-space-mt section-space-mb-100"
        style="background-image: url('assets/images/special-product/background.jpg');">
        <div class="container">
            <div class="row">
                <!--  Special Section Start -->
                <div class="ec-spe-section col-lg-6 col-md-12 col-sm-12 margin-b-30">
                    <div class="col-md-12 text-left">
                        <div class="section-title mb-6">
                            <h2 class="ec-title">Deals of the days</h2>
                        </div>
                    </div>

                    <div class="ec-spe-products">
                        <div class="ec-fs-product">
                            <div class="ec-fs-pro-inner ec-product-inner">
                                <div class="ec-fs-pro-image-outer col-lg-6 col-md-6 col-sm-6">
                                    <div class="ec-fs-pro-image">
                                        <a href="product-left-sidebar.html" class="image"><img class="main-image"
                                                src="assets/images/special-product/1_1.jpg" alt="Product" /></a>
                                    </div>
                                </div>
                                <div class="ec-pro-content col-lg-6 col-md-6 col-sm-6">
                                    <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Samsung gaming console s8</a></h5>
                                    <h6 class="ec-pro-stitle"><a href="shop-left-sidebar-col-3.html">Gaming</a></h6>
                                    <div class="ec-pro-rat-price">
                                        <span class="ec-price">
                                            <span class="new-price">$159.00</span>
                                            <span class="old-price">$200.00</span>
                                        </span>
                                    </div>
                                    <div class="ec-fs-pro-progress">
                                        <span class="ec-fs-pro-progress-desc"><span>Solid:
                                                <b>0</b></span><span>Available: <b>350</b></span></span>
                                        <span class="ec-fs-pro-progressbar"></span>
                                    </div>
                                    <div class="countdowntimer">
                                        <span class="ec-fs-count-desc"> Hurry up ! offers ends in:</span>
                                        <span id="ec-fs-count-1"></span>
                                    </div>
                                    <div class="ec-pro-actions">
                                        <button title="Add To Cart" class="add-to-cart btn btn-primary">Add To
                                            Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ec-fs-product">
                            <div class="ec-fs-pro-inner ec-product-inner">
                                <div class="ec-fs-pro-image-outer col-lg-6 col-md-6 col-sm-6">
                                    <div class="ec-fs-pro-image">
                                        <a href="product-left-sidebar.html" class="image"><img class="main-image"
                                                src="assets/images/special-product/2_1.jpg" alt="Product" /></a>
                                    </div>
                                </div>
                                <div class="ec-pro-content col-lg-6 col-md-6 col-sm-6">
                                    <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Wireless Earphone with Mic neckband </a></h5>
                                    <h6 class="ec-pro-stitle"><a href="shop-left-sidebar-col-3.html">Multimedia</a></h6>
                                    <div class="ec-pro-rat-price">
                                        <span class="ec-price">
                                            <span class="new-price">$480.00</span>
                                            <span class="old-price">$700.00</span>
                                        </span>
                                    </div>
                                    <div class="ec-fs-pro-progress">
                                        <span class="ec-fs-pro-progress-desc"><span>Solid:
                                                <b>0</b></span><span>Available: <b>200</b></span></span>
                                        <span class="ec-fs-pro-progressbar"></span>
                                    </div>
                                    <div class="countdowntimer">
                                        <span class="ec-fs-count-desc"> Hurry up ! offers ends in:</span>
                                        <span id="ec-fs-count-2"></span>
                                    </div>
                                    <div class="ec-pro-actions">
                                        <button title="Add To Cart" class="add-to-cart btn btn-primary">Add To
                                            Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  Special Section End -->
                <!--  Feature Section Start -->
                <div class="ec-exe-section col-lg-6 col-md-12 col-sm-12">
                    <div class="col-md-12 text-left">
                        <div class="section-title mb-6">
                            <h2 class="ec-title">Exclusive Products</h2>
                        </div>
                    </div>

                    <div class="ec-exe-products product-mt-minus-15">
                        <div class="ec-product-content">
                            <div class="ec-product-inner">
                                <div class="ec-product-hover"></div>
                                <div class="ec-pro-image-outer">
                                    <div class="ec-pro-image">
                                        <a href="product-left-sidebar.html" class="image">
                                            <img class="main-image" src="assets/images/special-product/3_1.jpg"
                                                alt="Product" />
                                            <img class="hover-image" src="assets/images/special-product/3_2.jpg"
                                                alt="Product" />
                                        </a>
                                    </div>
                                </div>
                                <div class="ec-pro-content">
                                    <div class="ec-pro-option">
                                        <div class="ec-pro-opt-inner">
                                            <div class="ec-pro-color">
                                                <ul class="ec-opt-swatch ec-change-img">
                                                    <li class="active"><a href="#" class="ec-opt-clr-img"
                                                            data-src="assets/images/special-product/3_1.jpg"
                                                            data-src-hover="assets/images/special-product/3_1.jpg"
                                                            data-tooltip="Gray"><span
                                                                style="background-color:#dbdbdb;"></span></a></li>
                                                    <li><a href="#" class="ec-opt-clr-img"
                                                            data-src="assets/images/special-product/3_2.jpg"
                                                            data-src-hover="assets/images/special-product/3_2.jpg"
                                                            data-tooltip="Orange"><span
                                                                style="background-color:#76e7e7;"></span></a></li>
                                                </ul>
                                            </div>
                                            <div class="ec-pro-compare">
                                                <a href="compare.html" class="ec-btn-group compare" title="Compare"><img
                                                        src="assets/images/icons/compare_5.svg" class="svg_img pro_svg"
                                                        alt="" /></a>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="ec-pro-title"><a href="product-left-sidebar.html">JBLK wireless speaker</a></h5>
                                    <h6 class="ec-pro-stitle"><a href="shop-left-sidebar-col-3.html">Multimedia</a></h6>
                                    <div class="ec-pro-rat-price">
                                        <div class="ec-pro-rat-pri-inner">
                                            <span class="ec-price">
                                                <span class="new-price">$230.00</span>
                                                <span class="old-price">$360.00</span>
                                            </span>
                                            <span class="ec-pro-rating">
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star-o"></i>
                                                <i class="ecicon eci-star-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="pro-hidden-block">

                                        <div class="ec-pro-desc">Lorem Ipsum is simply dummy text of the printing. </div>
                                        <div class="ec-pro-actions">
                                            <a class="ec-btn-group wishlist" title="Wishlist"><img
                                                    src="assets/images/icons/pro_wishlist.svg" class="svg_img pro_svg"
                                                    alt="" /></a>
                                            <button title="Add To Cart" class="add-to-cart btn btn-primary">Add To
                                                Cart</button>
                                            <a href="#" class="ec-btn-group quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#ec_quickview_modal"><img
                                                    src="assets/images/icons/quickview.svg" class="svg_img pro_svg"
                                                    alt="" /></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ec-product-content">
                            <div class="ec-product-inner">
                                <div class="ec-product-hover"></div>
                                <div class="ec-pro-image-outer">
                                    <div class="ec-pro-image">
                                        <a href="product-left-sidebar.html" class="image">
                                            <img class="main-image" src="assets/images/special-product/4_1.jpg"
                                                alt="Product" />
                                            <img class="hover-image" src="assets/images/special-product/4_2.jpg"
                                                alt="Product" />
                                        </a>
                                    </div>
                                </div>
                                <div class="ec-pro-content">
                                    <div class="ec-pro-option">
                                        <div class="ec-pro-opt-inner">
                                            <div class="ec-pro-color">
                                                <ul class="ec-opt-swatch ec-change-img">
                                                    <li class="active"><a href="#" class="ec-opt-clr-img"
                                                            data-src="assets/images/special-product/4_1.jpg"
                                                            data-src-hover="assets/images/special-product/4_2.jpg"
                                                            data-tooltip="Gray"><span
                                                                style="background-color:#202020;"></span></a></li>
                                                </ul>
                                            </div>
                                            <div class="ec-pro-compare">
                                                <a href="compare.html" class="ec-btn-group compare" title="Compare"><img
                                                        src="assets/images/icons/compare_5.svg" class="svg_img pro_svg"
                                                        alt="" /></a>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Galacy 8 phone 4gb | 64gb </a></h5>
                                    <h6 class="ec-pro-stitle"><a href="shop-left-sidebar-col-3.html">Phone</a></h6>
                                    <div class="ec-pro-rat-price">
                                        <div class="ec-pro-rat-pri-inner">
                                            <span class="ec-price">
                                                <span class="new-price">$159.00</span>
                                                <span class="old-price">$200.00</span>
                                            </span>
                                            <span class="ec-pro-rating">
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star-o"></i>
                                                <i class="ecicon eci-star-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="pro-hidden-block">

                                        <div class="ec-pro-desc">Lorem Ipsum is simply dummy text of the printing.</div>
                                        <div class="ec-pro-actions">
                                            <a class="ec-btn-group wishlist" title="Wishlist"><img
                                                    src="assets/images/icons/pro_wishlist.svg" class="svg_img pro_svg"
                                                    alt="" /></a>
                                            <button title="Add To Cart" class="add-to-cart btn btn-primary">Add To
                                                Cart</button>
                                            <a href="#" class="ec-btn-group quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#ec_quickview_modal"><img
                                                    src="assets/images/icons/quickview.svg" class="svg_img pro_svg"
                                                    alt="" /></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ec-product-content">
                            <div class="ec-product-inner">
                                <div class="ec-product-hover"></div>
                                <div class="ec-pro-image-outer">
                                    <div class="ec-pro-image">
                                        <a href="product-left-sidebar.html" class="image">
                                            <img class="main-image" src="assets/images/special-product/6_1.jpg"
                                                alt="Product" />
                                            <img class="hover-image" src="assets/images/special-product/6_2.jpg"
                                                alt="Product" />
                                        </a>
                                    </div>
                                </div>
                                <div class="ec-pro-content">
                                    <div class="ec-pro-option">
                                        <div class="ec-pro-opt-inner">
                                            <div class="ec-pro-color">
                                                <ul class="ec-opt-swatch ec-change-img">
                                                    <li class="active"><a href="#" class="ec-opt-clr-img"
                                                            data-src="assets/images/special-product/6_1.jpg"
                                                            data-src-hover="assets/images/special-product/6_1.jpg"
                                                            data-tooltip="Gray"><span
                                                                style="background-color:#dfdfdf;"></span></a></li>
                                                    <li><a href="#" class="ec-opt-clr-img"
                                                            data-src="assets/images/special-product/6_2.jpg"
                                                            data-src-hover="assets/images/special-product/6_2.jpg"
                                                            data-tooltip="Orange"><span
                                                                style="background-color:#91b6ff;"></span></a></li>
                                                </ul>
                                            </div>
                                            <div class="ec-pro-compare">
                                                <a href="compare.html" class="ec-btn-group compare" title="Compare"><img
                                                        src="assets/images/icons/compare_5.svg" class="svg_img pro_svg"
                                                        alt="" /></a>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Ultra sound smart speaker</a></h5>
                                    <h6 class="ec-pro-stitle"><a href="shop-left-sidebar-col-3.html">Multimedia</a></h6>
                                    <div class="ec-pro-rat-price">
                                        <div class="ec-pro-rat-pri-inner">
                                            <span class="ec-price">
                                                <span class="new-price">$768.00</span>
                                                <span class="old-price">$845.00</span>
                                            </span>
                                            <span class="ec-pro-rating">
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star-o"></i>
                                                <i class="ecicon eci-star-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="pro-hidden-block">

                                        <div class="ec-pro-desc">Lorem Ipsum is simply dummy text of the printing.</div>
                                        <div class="ec-pro-actions">
                                            <a class="ec-btn-group wishlist" title="Wishlist"><img
                                                    src="assets/images/icons/pro_wishlist.svg" class="svg_img pro_svg"
                                                    alt="" /></a>
                                            <button title="Add To Cart" class="add-to-cart btn btn-primary">Add To
                                                Cart</button>
                                            <a href="#" class="ec-btn-group quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#ec_quickview_modal"><img
                                                    src="assets/images/icons/quickview.svg" class="svg_img pro_svg"
                                                    alt="" /></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  Feature Section End -->

            </div>
        </div>
    </section>
    <!-- Feature & Special Section End -->

    <!--  offer Section Start -->
    <section class="section ec-offer-section section-space-mt section-space-mb">
        <h2 class="d-none">Offer</h2>
        <div class="container">
            <div class="ec-offer-inner ofr-img">
                <!-- <img src="assets/images/offer-image/offer_bg.png" alt="" class="offer_bg" /> -->
                <div class="col-sm-6 ec-offer-content">
                    <div class="ec-offer-content-inner">
                        <h2 class="ec-offer-stitle">black friday</h2>
                        <h2 class="ec-offer-title">up to 60 % off</h2>
                        <span class="ec-offer-desc">Select accessories for your favourites gadgets</span>
                        <span class="ec-offer-btn"><a href="#" class="btn btn-primary">Shop Now</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- offer Section End --> --}}

    <!-- All Product Start -->
    <section class="section ec-all-products section-space-p">
        <h2 class="d-none">all product</h2>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-6 ec-all-product-content ec-new-product-content margin-b-30">
                    <div class="col-md-12 text-left">
                        <div class="section-title">
                            <h2 class="ec-title">New Arrivals</h2>
                        </div>
                    </div>
                    <div class="ec-new-slider">
                        <div class="col-sm-12 ec-all-product-block">
                            <div class="ec-all-product-inner">
                                <div class="ec-pro-image-outer">
                                    <div class="ec-pro-image">
                                        <a href="product-left-sidebar.html" class="image">
                                            <img class="main-image" src="{{asset('web/assets/images/product-image/39_1.jpg')}}"
                                                alt="Product" />
                                        </a>
                                    </div>
                                </div>
                                <div class="ec-pro-content">
                                    <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Camera instant image</a></h5>
                                    <h6 class="ec-pro-stitle">Camera</h6>
                                    <div class="ec-pro-rat-price">
                                        <div class="ec-pro-rat-pri-inner">
                                            <span class="ec-price">
                                                <span class="new-price">$589.00</span>
                                                <span class="old-price">$658.00</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-6 ec-all-product-content ec-special-product-content margin-b-30">
                    <div class="col-md-12 text-left">
                        <div class="section-title">
                            <h2 class="ec-title">Special offer</h2>
                        </div>
                    </div>
                    <div class="ec-special-slider">
                        <div class="col-sm-12 ec-all-product-block">
                            <div class="ec-all-product-inner">
                                <div class="ec-pro-image-outer">
                                    <div class="ec-pro-image">
                                        <a href="product-left-sidebar.html" class="image">
                                            <img class="main-image" src="assets/images/product-image/42_1.jpg"
                                                alt="Product" />
                                        </a>
                                    </div>
                                </div>
                                <div class="ec-pro-content">
                                    <h5 class="ec-pro-title"><a href="product-left-sidebar.html">iPhone 13 max</a></h5>
                                    <h6 class="ec-pro-stitle">Phone</h6>
                                    <div class="ec-pro-rat-price">
                                        <div class="ec-pro-rat-pri-inner">
                                            <span class="ec-price">
                                                <span class="new-price">$2580.00</span>
                                                <span class="old-price">$3650.00</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-6 ec-all-product-content ec-best-product-content">
                    <div class="col-md-12 text-left">
                        <div class="section-title">
                            <h2 class="ec-title">Best Sellers</h2>
                        </div>
                    </div>
                    <div class="ec-best-slider">
                        <div class="col-sm-12 ec-all-product-block">
                            <div class="ec-all-product-inner">
                                <div class="ec-pro-image-outer">
                                    <div class="ec-pro-image">
                                        <a href="product-left-sidebar.html" class="image">
                                            <img class="main-image" src="assets/images/product-image/44_1.jpg"
                                                alt="Product" />
                                        </a>
                                    </div>
                                </div>
                                <div class="ec-pro-content">
                                    <h5 class="ec-pro-title"><a href="product-left-sidebar.html">Wireless headphone</a></h5>
                                    <h6 class="ec-pro-stitle">Music</h6>
                                    <div class="ec-pro-rat-price">
                                        <div class="ec-pro-rat-pri-inner">
                                            <span class="ec-price">
                                                <span class="new-price">$159.00</span>
                                                <span class="old-price">$200.00</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- All Item end -->

    <!-- ec testimonial Start -->
    <section class="section ec-test-section section-space-ptb-100 section-space-mt section-space-mb"
        style="background-image: url('assets/images/testimonial/testimonial_bg.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-title-block">
                    <div class="section-title">
                        <h2 class="ec-title">Client Testimonials</h2>
                        <h6 class="ec-sub-title">Lorem Ipsum is simply dummy text of the printing</h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="ec-test-outer">
                    <ul id="ec-testimonial-slider">
                        <li class="ec-test-item">
                            <div class="ec-test-inner">
                                <div class="ec-test-img"><img alt="testimonial" title="testimonial"
                                        src="assets/images/testimonial/1.jpg" /></div>
                                <div class="ec-test-content">
                                    <div class="ec-test-name">david james</div>
                                    <div class="ec-test-designation">united states of america</div>
                                    <div class="ec-test-rating">
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                    </div>
                                    <div class="ec-test-desc">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry</div>

                                </div>
                            </div>
                        </li>
                        <li class="ec-test-item">
                            <div class="ec-test-inner">
                                <div class="ec-test-img"><img alt="testimonial" title="testimonial"
                                        src="assets/images/testimonial/2.jpg" /></div>
                                <div class="ec-test-content">
                                    <div class="ec-test-name">david james</div>
                                    <div class="ec-test-designation">united states of america</div>
                                    <div class="ec-test-rating">
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                    </div>
                                    <div class="ec-test-desc">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry</div>

                                </div>
                            </div>
                        </li>
                        <li class="ec-test-item">
                            <div class="ec-test-inner">
                                <div class="ec-test-img"><img alt="testimonial" title="testimonial"
                                        src="assets/images/testimonial/3.jpg" /></div>
                                <div class="ec-test-content">
                                    <div class="ec-test-name">david james</div>
                                    <div class="ec-test-designation">united states of america</div>
                                    <div class="ec-test-rating">
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                    </div>
                                    <div class="ec-test-desc">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry</div>

                                </div>
                            </div>
                        </li>
                        <li class="ec-test-item">
                            <div class="ec-test-inner">
                                <div class="ec-test-img"><img alt="testimonial" title="testimonial"
                                        src="assets/images/testimonial/1.jpg" /></div>
                                <div class="ec-test-content">
                                    <div class="ec-test-name">david james</div>
                                    <div class="ec-test-designation">united states of america</div>
                                    <div class="ec-test-rating">
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                    </div>
                                    <div class="ec-test-desc">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry</div>

                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ec testimonial end -->

    {{-- <!-- Ec Brand Section Start -->
    <section class="section ec-brand-area section-space-p">
        <h2 class="d-none">Brand</h2>
        <div class="container">
            <div class="row">
                <div class="ec-brand-outer">
                    <ul id="ec-brand-slider">
                        <li class="ec-brand-item">
                            <div class="ec-brand-img"><a href="#"><img alt="brand" title="brand"
                                        src="assets/images/brand-image/1.png" /></a></div>
                        </li>
                        <li class="ec-brand-item">
                            <div class="ec-brand-img"><a href="#"><img alt="brand" title="brand"
                                        src="assets/images/brand-image/2.png" /></a></div>
                        </li>
                        <li class="ec-brand-item">
                            <div class="ec-brand-img"><a href="#"><img alt="brand" title="brand"
                                        src="assets/images/brand-image/3.png" /></a></div>
                        </li>
                        <li class="ec-brand-item">
                            <div class="ec-brand-img"><a href="#"><img alt="brand" title="brand"
                                        src="assets/images/brand-image/4.png" /></a></div>
                        </li>
                        <li class="ec-brand-item">
                            <div class="ec-brand-img"><a href="#"><img alt="brand" title="brand"
                                        src="assets/images/brand-image/5.png" /></a></div>
                        </li>
                        <li class="ec-brand-item">
                            <div class="ec-brand-img"><a href="#"><img alt="brand" title="brand"
                                        src="assets/images/brand-image/6.png" /></a></div>
                        </li>
                        <li class="ec-brand-item">
                            <div class="ec-brand-img"><a href="#"><img alt="brand" title="brand"
                                        src="assets/images/brand-image/7.png" /></a></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Ec Brand Section End --> --}}

    <!-- Ec Instagram Start -->
    <section class="section ec-instagram-section section-space-pt">
        <div class="ec-insta-wrapper">
            <div class="ec-insta-outer">
                <div class="insta-auto">
                    <h2 class="d-none">Instagram</h2>
                    <!-- instagram item -->
                    <div class="ec-insta-item">
                        <div class="ec-insta-inner">
                            <a href="#" target="_blank"><img src="assets/images/instragram-image/1.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- instagram item -->
                    <div class="ec-insta-item">
                        <div class="ec-insta-inner">
                            <a href="#" target="_blank"><img src="assets/images/instragram-image/2.jpg" alt="">

                            </a>
                        </div>
                    </div>
                    <!-- instagram item -->
                    <div class="ec-insta-item">
                        <div class="ec-insta-inner">
                            <a href="#" target="_blank"><img src="assets/images/instragram-image/3.jpg" alt="">

                            </a>
                        </div>
                    </div>
                    <!-- instagram item -->
                    <div class="ec-insta-item">
                        <div class="ec-insta-inner">
                            <a href="#" target="_blank"><img src="assets/images/instragram-image/4.jpg" alt="">

                            </a>
                        </div>
                    </div>
                    <!-- instagram item -->
                    <div class="ec-insta-item">
                        <div class="ec-insta-inner">
                            <a href="#" target="_blank"><img src="assets/images/instragram-image/5.jpg" alt="">

                            </a>
                        </div>
                    </div>
                    <!-- instagram item -->
                </div>
            </div>
        </div>
    </section>
    <!-- Ec Instagram End -->

    <!--  services Section Start -->
    <section class="section ec-services-section">
        <h2 class="d-none">Services</h2>
        <div class="container">
            <div class="row">
                <div class="ec_ser_content ec_ser_content_1 col-sm-12 col-md-3">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <img src="assets/images/icons/service_5_1.svg" class="svg_img" alt="" />
                        </div>
                        <div class="ec-service-desc">
                            <h2>Free shipping</h2>
                            <p>Free shipping on all US orders</p>
                        </div>
                    </div>
                </div>
                <div class="ec_ser_content ec_ser_content_2 col-sm-12 col-md-3">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <img src="assets/images/icons/service_2.svg" class="svg_img" alt="" />
                        </div>
                        <div class="ec-service-desc">
                            <h2>money gaurntee</h2>
                            <p>30 days money back guarantee</p>
                        </div>
                    </div>
                </div>
                <div class="ec_ser_content ec_ser_content_3 col-sm-12 col-md-3">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <img src="assets/images/icons/service_3.svg" class="svg_img" alt="" />
                        </div>
                        <div class="ec-service-desc">
                            <h2>online support</h2>
                            <p>We support online 24/7 on day</p>
                        </div>
                    </div>
                </div>
                <div class="ec_ser_content ec_ser_content_4 col-sm-12 col-md-3">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <img src="assets/images/icons/service_5_4.svg" class="svg_img" alt="" />
                        </div>
                        <div class="ec-service-desc">
                            <h2>Member Discount</h2>
                            <p>Onevery order over $120.00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--services Section End -->
@endsection
