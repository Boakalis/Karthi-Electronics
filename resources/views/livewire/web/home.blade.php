<div>

   <style>

      .responsive-image{
        width: 800px;
        height: 300px;
        }

        @media only screen and (min-width: 801px) and (max-width: 1010px) {
        .responsive-image {

            width: 800px;
            height: 100px !important ;
        }
        }
        @media only screen and (min-width: 450px) and (max-width: 800px) {
            .responsive-image {
                width: 800px;
                height: 200px;
            }
        }
        @media only screen and (max-width: 449px) {
            .responsive-image {
                width: 800px;
                height: 100px;
            }
        }

   </style>
    @include('web.layouts.includes.slider')
    <!--  category Section Start -->
    <section class="section ec-category-section d-none d-lg-block d-xl-block section-space-mb"
        style="background: white;">
        <div class="container">
            <div class="row">
                <div class="ec_cat_slider">
                    @if (isset($categories) && !empty($categories))
                        @foreach ($categories as $category)
                            <div class="ec_cat_content">
                                <div class="ec_cat_inner">
                                    <a href="{{ route('web.subcategory', $category->slug) }}">

                                        <div class="ec-cat-image">
                                            <img src="{{ asset('storage/media/' . $category->image) }}"
                                                class="svg_img cat_svg" alt="" />
                                        </div>
                                        <div class="ec-cat-desc">
                                            <span class="ec-section-title text-uppercase">{{ @$category->name }}</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--category Section End -->

    <!-- Product tab Area Start -->
    <section class="section  section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-title-block">
                    <div class="section-title">
                        <h2 class="ec-title">Featured Products</h2>

                    </div>
                </div>

            </div>
            <div class="row m-tb-minus-15 my-2">
                <div class="col">
                    <div class="row">
                        @if (isset($featuredProduct) && !empty($featuredProduct))
                            @foreach ($featuredProduct as $featured)
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6 ">
                                    <div class="ec-product-inner">
                                        {{-- <div class="ec-product-hover"></div> --}}
                                        <div class="ec-pro-image-outer">
                                            <div class="text-center">
                                                <a href="{{ route('web.product.detail', ['category' => $featured->subcategory->category->slug, 'product' => $featured->subcategory->slug, 'slug' => $featured->slug]) }}" class="image">
                                                    <img class="responsive-image"  src="{{ asset($featured->image) }}"
                                                        alt="Product" />
                                                </a>
                                            </div>
                                        </div>
                                        <center>
                                            <h6 class="ec-pro-title fw-bold"><a
                                                    href="{{ route('web.product.detail', ['category' => $featured->subcategory->category->slug, 'product' => $featured->subcategory->slug, 'slug' => $featured->slug]) }}">
                                                    {{ Str::limit($featured->name, 35 , '...') }}</a></h6>
                                        </center>
                                        <center>
                                            <span class="ec-price">
                                                @if ($featured->is_products_variant != 1)
                                                    <span class="new-price"
                                                        style="    color: #0d4fcf;
                                                            font-weight: 700;
                                                            font-size: 16px;">&#8377;{{ @$featured->discounted_price != null ? $featured->discounted_price : $featured->sale_price }}</span>
                                                    @if (isset($featured->discounted_price) && !empty($featured->discounted_price))
                                                        <span class="old-price"
                                                            style="    font-size: 16px;
                                                                text-decoration: line-through;
                                                                color: #777;
                                                                margin-left: 9px;">&#8377;{{ $featured->sale_price }}</span>
                                                    @endif
                                                @else
                                                    <span class="new-price" style="    color: #0d4fcf;
                                                            font-weight: 700;
                                                            font-size: 16px;"> From
                                                        &#8377;{{ @$featured->variants->first()->seller_price }}</span>
                                                @endif
                                            </span>
                                        </center>

                                    </div>
                                </div>
                            @endforeach
                        @endif

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
                <div class="">
                    <div class="row">
                        @if (isset($productBannerData[0]) && !empty($productBannerData[0]))
                        <div class="ec-banner-left col-6">
                            <div class="ec-banner-block ec-banner-block-1 col-sm-12">
                                <div class="banner-block">
                                    <img class="img-fluid" style="width:670px;height:250px;"
                                        src="{{ asset('storage/media/' . @$productBannerData[0]['image']) }}" alt="" />
                                    <div class="banner-content">
                                        <span class="ec-banner-stitle">{{ @$productBannerData[0]['title'] }}</span>
                                        <span class="ec-banner-title">{{ @$productBannerData[0]['name'] }}</span>
                                        <span class="ec-banner-btn"><a href="{{route('web.product.detail',['category'=>@$productBannerData[0]['product']['subcategory']['category']['slug'] ,'product' =>@$productBannerData[0]['product']['subcategory']['slug'] ,'slug' => @$productBannerData[0]['product']['slug']])}}" class="btn-primary">
                                            Shop
                                                Now</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if (isset($productBannerData[1]) && !empty($productBannerData[1]))
                            <div class="ec-banner-right col-6">
                                <div class="ec-banner-block ec-banner-block-2 col-sm-12">
                                    <div class="banner-block">
                                        <img class="img-fluid" style="width:670px;height:250px;"
                                            src="{{ asset('storage/media/' . $productBannerData[0]['image']) }}"
                                            alt="" />
                                        <div class="banner-content">
                                            <span class="ec-banner-stitle">{{ @$productBannerData[1]['title'] }}</span>
                                            <span class="ec-banner-title">{{ @$productBannerData[1]['name'] }}</span>
                                            <span class="ec-banner-btn"><a href="{{route('web.product.detail',['category'=>@$productBannerData[1]['product']['subcategory']['category']['slug'] ,'product' =>@$productBannerData[1]['product']['subcategory']['slug'] ,'slug' => @$productBannerData[1]['product']['slug']])}}" class="btn-primary">Shop
                                                    Now</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ec Banner Section End -->



    <!-- All Product Start -->
    <section class="section ec-all-products section-space-p">
        <h2 class="d-none">all product</h2>
        <div class="container">
            <div class="row">
                <div
                    class="col-lg-4 col-md-6 col-sm-12 col-xs-6 ec-all-product-content ec-new-product-content margin-b-30">
                    <div class="col-md-12 text-left">
                        <div class="section-title">
                            <h2 class="ec-title">Trending Products</h2>
                        </div>
                    </div>
                    <div class="ec-new-slider">
                        @if (isset($trendingProduct) && !empty($trendingProduct))
                            @foreach ($trendingProduct as $trending)
                                <div class="col-sm-12 ec-all-product-block">
                                    <div class="ec-all-product-inner">
                                        <div class="ec-pro-image-outer">
                                            <div class="ec-pro-image">
                                                <a href="product-left-sidebar.html" class="image">
                                                    <img class="main-image  " style="height: 70px;"
                                                        src="{{ @$trending->image }}" alt="Product" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ec-pro-content">
                                            <h5 class="ec-pro-title"><a
                                                    href="product-left-sidebar.html">{{ $trending->name }}</a></h5>
                                            {{-- <h6 class="ec-pro-stitle">Camera</h6> --}}
                                            <div class="ec-pro-rat-price">
                                                <div class="ec-pro-rat-pri-inner">
                                                    <span class="ec-price">
                                                        @if ($trending->is_products_variant != 1)
                                                            <span
                                                                class="new-price">&#8377;{{ @$trending->discounted_price != null ? $trending->discounted_price : $trending->sale_price }}</span>
                                                            @if (isset($trending->discounted_price) && !empty($trending->discounted_price))
                                                                <span
                                                                    class="old-price">&#8377;{{ $trending->sale_price }}</span>
                                                            @endif
                                                        @else
                                                            <span class="new-price"> From
                                                                &#8377;{{ @$trending->variants->first()->seller_price }}</span>
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
                {{-- <div class="col-lg-3 col-md-6 col-sm-12 col-xs-6 ec-all-product-content ec-special-product-content margin-b-30">
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
                    </div> --}}
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-6 ec-all-product-content ec-best-product-content">
                    <div class="col-md-12 text-left">
                        <div class="section-title">
                            <h2 class="ec-title">Best Sellers</h2>
                        </div>
                    </div>
                    <div class="ec-best-slider">
                        @if (isset($bestProduct) && !empty($bestProduct))
                            @foreach ($bestProduct as $best)
                                <div class="col-sm-12 ec-all-product-block">
                                    <div class="ec-all-product-inner">
                                        <div class="ec-pro-image-outer">
                                            <div class="ec-pro-image">
                                                <a href="product-left-sidebar.html" class="image">
                                                    <img class="main-image  " style="height: 70px;"
                                                        src="{{ @$best->image }}" alt="Product" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ec-pro-content">
                                            <h5 class="ec-pro-title"><a
                                                    href="product-left-sidebar.html">{{ $best->name }}</a></h5>
                                            {{-- <h6 class="ec-pro-stitle">Camera</h6> --}}
                                            <div class="ec-pro-rat-price">
                                                <div class="ec-pro-rat-pri-inner">
                                                    <span class="ec-price">
                                                        @if ($best->is_products_variant != 1)
                                                            <span
                                                                class="new-price">&#8377;{{ @$best->discounted_price != null ? $best->discounted_price : $best->sale_price }}</span>
                                                            @if (isset($best->discounted_price) && !empty($best->discounted_price))
                                                                <span
                                                                    class="old-price">&#8377;{{ $best->sale_price }}</span>
                                                            @endif
                                                        @else
                                                            <span class="new-price"> From
                                                                &#8377;{{ @$best->variants->first()->seller_price }}</span>
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-6 ec-all-product-content ec-best-product-content">
                    <div class="col-md-12 text-left">
                        <div class="section-title">
                            <h2 class="ec-title">Exclusive Product</h2>
                        </div>
                    </div>
                    <div class="ec-best-slider">
                        @if (isset($exclusiveProduct) && !empty($exclusiveProduct))
                            @foreach ($exclusiveProduct as $exclusive)
                                <div class="col-sm-12 ec-all-product-block">
                                    <div class="ec-all-product-inner">
                                        <div class="ec-pro-image-outer">
                                            <div class="ec-pro-image">
                                                <a href="product-left-sidebar.html" class="image">
                                                    <img class="main-image  " style="height: 70px;"
                                                        src="{{ @$exclusive->image }}" alt="Product" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ec-pro-content">
                                            <h5 class="ec-pro-title"><a
                                                    href="product-left-sidebar.html">{{ $exclusive->name }}</a></h5>
                                            {{-- <h6 class="ec-pro-stitle">Camera</h6> --}}
                                            <div class="ec-pro-rat-price">
                                                <div class="ec-pro-rat-pri-inner">
                                                    <span class="ec-price">
                                                        @if ($exclusive->is_products_variant != 1)
                                                            <span
                                                                class="new-price">&#8377;{{ @$exclusive->discounted_price != null ? $exclusive->discounted_price : $exclusive->sale_price }}</span>
                                                            @if (isset($exclusive->discounted_price) && !empty($exclusive->discounted_price))
                                                                <span
                                                                    class="old-price">&#8377;{{ $exclusive->sale_price }}</span>
                                                            @endif
                                                        @else
                                                            <span class="new-price"> From
                                                                &#8377;{{ @$exclusive->variants->first()->seller_price }}</span>
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- All Item end -->

    <section class="section ec-offer-section section-space-mt section-space-mb">
        <h2 class="d-none">Offer</h2>
        <div class="container">
            <div class="ec-offer-inner ofr-img"
                style="background-image:url({{ asset('storage/media/' . @$adData->image) }})">
                {{-- <img src="{{asset('storage/media/'.@$adData->image)}}" alt="" class="offer_bg" /> --}}
                <div class="col-sm-6 ec-offer-content">
                    <div class="ec-offer-content-inner">
                        {{-- <h2 class="ec-offer-stitle">{{@$adData->title}}</h2>
                            <h2 class="ec-offer-title">{{@$adData->name}}</h2> --}}
                        {{-- <span class="ec-offer-desc">Select accessories for your favourites gadgets</span> --}}
                        {{-- <span class="ec-offer-btn"><a href="#" class="btn btn-primary">Shop Now</a></span> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section  section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-title-block">
                    <div class="section-title">
                        <h2 class="ec-title">Shop By Category</h2>
                    </div>
                </div>
            </div>
            <div class="row m-tb-minus-15 my-2">
                <div class="col">
                    <div class="row">
                        @if (isset($categories) && !empty($categories))
                        @foreach ($categories as $category)
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6 my-2">
                                    <div class="ec-product-inner">
                                        {{-- <div class="ec-product-hover"></div> --}}
                                        <div class="ec-pro-image-outer">
                                            <div class="text-center">

                                                <a href="{{ route('web.subcategory', $category->slug) }}" class="image">
                                                    <img class="responsive-image"  src="{{ asset('storage/media/' . @$category->image) }}"
                                                        alt="Product" />
                                                </a>
                                            </div>
                                        </div>
                                        <center  >
                                            <h6 class="ec-pro-title fw-bold mt-3"><a
                                                    href="{{ route('web.subcategory', $category->slug) }}">
                                                    {{ Str::limit(@$category->name, 35, '...') }}</a></h6>
                                        </center>


                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="section  section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-title-block">
                    <div class="section-title">
                        <h2 class="ec-title">Browse Our Products</h2>

                    </div>
                </div>

            </div>
            <div class="row m-tb-minus-15 my-2">
                <div class="col">
                    <div class="row">
                        @if (isset($products) && !empty($products))
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6 ">
                                    <div class="ec-product-inner">
                                        {{-- <div class="ec-product-hover"></div> --}}
                                        <div class="ec-pro-image-outer">
                                            <div class="text-center">
                                                <a href="{{ route('web.product.detail', ['category' => $product->subcategory->category->slug, 'product' => $product->subcategory->slug, 'slug' => $product->slug]) }}" class="image">
                                                    <img class="responsive-image"  src="{{ asset($product->image) }}"
                                                        alt="Product" />
                                                </a>
                                            </div>
                                        </div>
                                        <center>
                                            <h6 class="ec-pro-title fw-bold"><a
                                                    href="{{ route('web.product.detail', ['category' => $product->subcategory->category->slug, 'product' => $product->subcategory->slug, 'slug' => $product->slug]) }}">
                                                    {{ Str::limit($product->name, 30, '...') }}</a></h6>
                                        </center>
                                        <center>
                                            <span class="ec-price">
                                                @if ($product->is_products_variant != 1)
                                                    <span class="new-price"
                                                        style="    color: #0d4fcf;
                                                            font-weight: 700;
                                                            font-size: 16px;">&#8377;{{ @$product->discounted_price != null ? $product->discounted_price : $product->sale_price }}</span>
                                                    @if (isset($product->discounted_price) && !empty($product->discounted_price))
                                                        <span class="old-price"
                                                            style="    font-size: 16px;
                                                                text-decoration: line-through;
                                                                color: #777;
                                                                margin-left: 9px;">&#8377;{{ $product->sale_price }}</span>
                                                    @endif
                                                @else
                                                    <span class="new-price" style="    color: #0d4fcf;
                                                            font-weight: 700;
                                                            font-size: 16px;"> From
                                                        &#8377;{{ @$product->variants->first()->seller_price }}</span>
                                                @endif
                                            </span>
                                        </center>

                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
            <center><a class="px-3 my-2 btn btn-primary" style="    border-width: 1px;
                border-style: solid;
                font-size: 12px;
                border-radius: 23px;


                text-transform: uppercase;
                text-align: center;

                font-weight: 500;" href="{{route('web.single.product')}}" class="btn btn-primary">View All Products</a></center>


        </div>
    </section>
    <!-- ec testimonial Start -->
    {{-- <section class="section ec-test-section section-space-ptb-100 section-space-mt section-space-mb"
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
        </section> --}}
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
    {{-- <section class="section ec-instagram-section section-space-pt">
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
        </section> --}}
    <!-- Ec Instagram End -->

    <!--  services Sect/ion Start -->
    <section class="section ec-services-section ">
        <h2 class="d-none">Services</h2>
        <div class="container">
            <div class="row">
                <div class="ec_ser_content ec_ser_content_1 col-sm-12 col-md-3">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <img src="{{ asset('web/assets/images/icons/service_5_1.svg') }}" class="svg_img"
                                alt="" />
                        </div>
                        <div class="ec-service-desc">
                            <h2>Free shipping</h2>
                            <p>Free shipping on all orders</p>
                        </div>
                    </div>
                </div>
                <div class="ec_ser_content ec_ser_content_2 col-sm-12 col-md-3">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <img src="{{ asset('web/assets/images/icons/service_2.svg') }}" class="svg_img"
                                alt="" />
                        </div>
                        <div class="ec-service-desc">
                            <h2>Lowest Price</h2>
                            <p>We gurantee that our product is best and low price</p>
                        </div>
                    </div>
                </div>
                <div class="ec_ser_content ec_ser_content_3 col-sm-12 col-md-3">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <img src="{{ asset('web/assets/images/icons/service_3.svg') }}" class="svg_img"
                                alt="" />
                        </div>
                        <div class="ec-service-desc">
                            <h2>online support</h2>
                            <p>We support online 9AM-9PM on all weekdays</p>
                        </div>
                    </div>
                </div>
                <div class="ec_ser_content ec_ser_content_4 col-sm-12 col-md-3">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <img src="{{ asset('web/assets/images/icons/service_5_4.svg') }}" class="svg_img"
                                alt="" />
                        </div>
                        <div class="ec-service-desc">
                            <h2>Member Discount</h2>
                            <p>Get Ultra-coins on every purchase</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--services Section End -->

</div>
@push('scripts')
<script>

</script>
@endpush
