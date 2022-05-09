<div>
    <style>

        .responsive-image{
          /* width: 800px; */
          height: 300px;
          }

          @media only screen and (min-width: 801px) and (max-width: 1010px) {
          .responsive-image {

              /* width: 800px; */
              height: 100px !important ;
          }
          }
          @media only screen and (min-width: 450px) and (max-width: 800px) {
              .responsive-image {
                  /* width: 800px; */
                  height: 200px;
              }
          }
          @media only screen and (max-width: 449px) {
              .responsive-image {
                  /* width: 800px; */
                  height: 100px;
              }
          }

     </style>
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="ec-shop-rightside col-lg-12 col-md-12">

                    <!-- Shop content Start -->
                    <div class="shop-pro-content">
                        <div class="shop-pro-inner">
                            <div class="row">
                                @if (isset($datas) && $datas->count() >0 )
                                    @foreach ($datas as $data)
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-6 pro-gl-content">
                                            <div class="ec-product-inner">
                                                <div class="ec-pro-image-outer">
                                                    <div class=" text-center
                                                    ">
                                                        <a href="{{route('web.product.detail',['category' => $data->subcategory->category->slug ,'product' =>$data->subcategory->slug ,'slug' => $data->slug])}}" class="">
                                                            <img class="main-image responsive-image"
                                                                src="{{asset($data->image)}}" alt="Product" />
                                                            {{-- <img class="hover-image"
                                                                src="{{asset($data->image)}}" alt="Product" /> --}}
                                                        </a>
                                                        {{-- <a href="#" class="quickview" data-link-action="quickview"
                                                            title="Quick view" data-bs-toggle="modal"
                                                            data-bs-target="#ec_quickview_modal"><img
                                                                src="assets/images/icons/quickview.svg" class="svg_img pro_svg"
                                                                alt="" /></a> --}}
                                                        {{-- <div class="ec-pro-actions">
                                                            <a href="compare.html" class="ec-btn-group compare"
                                                                title="Compare"><img src="assets/images/icons/compare.svg"
                                                                    class="svg_img pro_svg" alt="" /></a>
                                                            <button title="Add To Cart" class=" add-to-cart"><img
                                                                    src="assets/images/icons/cart.svg" class="svg_img pro_svg"
                                                                    alt="" /> Add To Cart</button>
                                                            <a class="ec-btn-group wishlist" title="Wishlist"><img
                                                                    src="assets/images/icons/wishlist.svg"
                                                                    class="svg_img pro_svg" alt="" /></a>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <div class="ec-pro-content">
                                                    <h5 class="ec-pro-title "><a href="{{route('web.product.detail',['category' => $data->subcategory->category->slug ,'product' =>$data->subcategory->slug ,'slug' => $data->slug])}}">{{ Str::limit(@$data->name, 30, '...') }}</a></h5>

                                                    <div class="ec-pro-list-desc">{{ \Illuminate\Support\Str::limit(@$data->short_description, 150, $end='...') }}</div>
                                                    <span class="ec-price">
                                                        @if ($data->is_products_variant != 1)
                                                            <span class="new-price">&#8377;{{@$data->discounted_price != null ? $data->discounted_price:$data->sale_price}}</span>
                                                            @if (isset($data->discounted_price) && !empty($data->discounted_price))
                                                                <span class="old-price">&#8377;{{$data->sale_price}}</span>
                                                            @endif
                                                        @else
                                                            <span class="new-price"> From &#8377;{{@$data->variants->first()->seller_price }}</span >
                                                        @endif

                                                    </span>
                                                    <div class="ec-pro-option">
                                                        <div class="ec-pro-color">
                                                            <span class="ec-pro-opt-label">Color</span>
                                                            <ul class="">
                                                                @foreach (array_unique(json_decode($data->colors)) as $key => $item)
                                                                <li class="active"><a href="#" class="ec-opt-clr-img"
                                                                        {{-- data-src="{{asset('web/assets/images/product-image/4_1.jpg')}}"
                                                                        data-src-hover="{{asset('web/assets/images/product-image/4_1.jpg')}}" --}}
                                                                        {{-- data-tooltip="Gray" --}}
                                                                        ><span
                                                                            style="background-color:{{$item}};"></span></a></li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                <center><h1>No Products Found</h1></center>
                                @endif

                            </div>
                        </div>
                        <!-- Ec Pagination Start -->
                        <div class="">
                            {{-- <ul class="ec-pro-pagination-inner"> --}}
                                {{ $datas->withQueryString()->links('pagination::bootstrap-5') }}
                            {{-- </ul> --}}
                        </div>
                        <!-- Ec Pagination End -->
                    </div>
                    <!--Shop content End -->
                </div>
                <!-- Sidebar Area Start -->
                <div class="filter-sidebar-overlay"></div>
                <div class="ec-shop-leftside filter-sidebar">
                    <div class="ec-sidebar-heading">
                        <h1>Filter Products By</h1>
                        <a class="filter-cls-btn" href="javascript:void(0)">×</a>
                    </div>
                    <div class="ec-sidebar-wrap">
                        <!-- Sidebar Category Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Category</h3>
                            </div>
                            <div class="ec-sb-block-content">
                                <ul>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" checked /> <a href="#">clothes</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" /> <a href="#">Bags</a><span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" /> <a href="#">Shoes</a><span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" /> <a href="#">cosmetics</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" /> <a href="#">electrics</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" /> <a href="#">phone</a><span class="checked"></span>
                                        </div>
                                    </li>
                                    <li id="ec-more-toggle-content" style="padding: 0; display: none;">
                                        <ul>
                                            <li>
                                                <div class="ec-sidebar-block-item">
                                                    <input type="checkbox" /> <a href="#">Watch</a><span
                                                        class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-block-item">
                                                    <input type="checkbox" /> <a href="#">Cap</a><span
                                                        class="checked"></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item ec-more-toggle">
                                            <span class="checked"></span><span id="ec-more-toggle">More
                                                Categories</span>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar Size Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Size</h3>
                            </div>
                            <div class="ec-sb-block-content">
                                <ul>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" value="" checked /><a href="#">S</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" value="" /><a href="#">M</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" value="" /> <a href="#">L</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" value="" /><a href="#">XL</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" value="" /><a href="#">XXL</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar Color item -->
                        <div class="ec-sidebar-block ec-sidebar-block-clr">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Color</h3>
                            </div>
                            <div class="ec-sb-block-content">
                                <ul>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#c4d6f9;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#ff748b;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#000000;"></span></div>
                                    </li>
                                    <li class="active">
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#2bff4a;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#ff7c5e;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#f155ff;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#ffef00;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#c89fff;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#7bfffa;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#56ffc1;"></span></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar Price Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Price</h3>
                            </div>
                            <div class="ec-sb-block-content es-price-slider">
                                <div class="ec-price-filter">
                                    <div id="ec-sliderPrice" class="filter__slider-price" data-min="0" data-max="250"
                                        data-step="10"></div>
                                    <div class="ec-price-input">
                                        <label class="filter__label"><input type="text" class="filter__input"></label>
                                        <span class="ec-price-divider"></span>
                                        <label class="filter__label"><input type="text" class="filter__input"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
