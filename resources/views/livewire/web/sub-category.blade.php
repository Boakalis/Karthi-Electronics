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
    <div>
        <section class="ec-page-content section-space-p">
            <div class="container">
                <div class="row">
                    <div class="ec-shop-rightside col-lg-12 col-md-12">
                        {{-- <!-- Shop Top Start -->
                        <div class="ec-pro-list-top d-flex">
                            <div class="col-md-6 ec-grid-list">
                                <div class="ec-gl-btn">
                                    <button class="btn sidebar-toggle-icon"><img src="assets/images/icons/filter.svg"
                                            class="svg_img gl_svg" alt="filter" /></button>
                                    <button class="btn btn-grid-50 active"><img src="assets/images/icons/grid.svg"
                                            class="svg_img gl_svg" alt="grid" /></button>
                                    <button class="btn btn-list-50"><img src="assets/images/icons/list.svg"
                                            class="svg_img gl_svg" alt="list" /></button>
                                </div>
                            </div>
                            <div class="col-md-6 ec-sort-select">
                                <span class="sort-by">Sort by</span>
                                <div class="ec-select-inner">
                                    <select name="ec-select" id="ec-select">
                                        <option selected disabled>Position</option>
                                        <option value="1">Relevance</option>
                                        <option value="2">Name, A to Z</option>
                                        <option value="3">Name, Z to A</option>
                                        <option value="4">Price, low to high</option>
                                        <option value="5">Price, high to low</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Shop Top End --> --}}
                        <div class="col-md-12 section-title-block">
                            <div class="section-title text-center">
                                <h2 class="ec-title">Shop By Category</h2>
                            </div>
                        </div>
                        <!-- Shop content Start -->
                        <div class="shop-pro-content">
                            <div class="shop-pro-inner">
                                <div class="row">
                                    @if (isset($datas) && $datas->count() >0)
                                        @foreach ($datas as $data)
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 my-1 pro-gl-content">
                                                <div class="ec-product-inner">
                                                    <div class="">
                                                        <div class="ec-pro-image" style="border-radius: 10%" >
                                                            <a href="{{route('web.product',['category'=>$data->category->slug,'slug' => $data->slug])}}" class="">
                                                                <img class="responsive-image" style="width:100%"
                                                                    src="{{asset('storage/media/'.@$data->image)}}"  alt="Product" />
                                                                {{-- <img class="hover-image"
                                                                    src="assets/images/product-image/6_2.jpg" alt="Product" /> --}}
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
                                                        <h5 class="ec-pro-title text-center "><a href="{{route('web.product',['category'=>$data->category->slug,'slug' => $data->slug])}}">{{ Str::limit(@$data->name, 30, '...') }}</a></h5>

                                                        {{-- <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text.</div> --}}
                                                        {{-- <span class="ec-price">
                                                            <span class="old-price">$27.00</span>
                                                            <span class="new-price">$22.00</span>
                                                        </span> --}}
                                                        {{-- <div class="ec-pro-option">
                                                            <div class="ec-pro-color">
                                                                <span class="ec-pro-opt-label">Color</span>
                                                                <ul class="ec-opt-swatch ec-change-img">
                                                                    <li class="active"><a href="#" class="ec-opt-clr-img"
                                                                            data-src="assets/images/product-image/6_1.jpg"
                                                                            data-src-hover="assets/images/product-image/6_1.jpg"
                                                                            data-tooltip="Gray"><span
                                                                                style="background-color:#e8c2ff;"></span></a></li>
                                                                    <li><a href="#" class="ec-opt-clr-img"
                                                                            data-src="assets/images/product-image/6_2.jpg"
                                                                            data-src-hover="assets/images/product-image/6_2.jpg"
                                                                            data-tooltip="Orange"><span
                                                                                style="background-color:#9cfdd5;"></span></a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="ec-pro-size">
                                                                <span class="ec-pro-opt-label">Size</span>
                                                                <ul class="ec-opt-size">
                                                                    <li class="active"><a href="#" class="ec-opt-sz"
                                                                            data-old="$25.00" data-new="$20.00"
                                                                            data-tooltip="Small">S</a></li>
                                                                    <li><a href="#" class="ec-opt-sz" data-old="$27.00"
                                                                            data-new="$22.00" data-tooltip="Medium">M</a></li>
                                                                    <li><a href="#" class="ec-opt-sz" data-old="$35.00"
                                                                            data-new="$30.00" data-tooltip="Extra Large">XL</a></li>
                                                                </ul>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <center><h1>No Data Found</h1></center>
                                    @endif
                                </div>
                            </div>
                            <!-- Ec Pagination Start -->
                            {{-- <div class="ec-pro-pagination">
                                <span>Showing 1-12 of 21 item(s)</span>
                                <ul class="ec-pro-pagination-inner">
                                    <li><a class="active" href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a class="next" href="#">Next <i class="ecicon eci-angle-right"></i></a></li>
                                </ul>
                            </div> --}}
                            <!-- Ec Pagination End -->
                        </div>
                        <!--Shop content End -->
                        <div class="col-md-12 my-4 section-title-block">
                            <div class="section-title text-center">
                                @php
                                    $title = explode('&',request()->segment(count(request()->segments())));
                                @endphp
                            </h2>
                                <h2 class="ec-title">Browse All {{ str_replace('-', ' ',@$title[0]) }}</h2>
                            </div>
                            <div class="shop-pro-content">
                                <div class="shop-pro-inner">
                                    <div class="row">
                                        @if (isset($allProducts) && $allProducts->count() >0 )
                                            @foreach ($allProducts as $data)
                                                <div class="col-lg-3 col-md-4 my-2 col-sm-6 col-6 pro-gl-content">
                                                    <div class="ec-product-inner">
                                                        <div class="ec-pro-image-outer">
                                                            <div class="text-center
                                                            {{-- ec-pro-image --}}
                                                            ">
                                                                <a href="{{route('web.product.detail',['category' => $slug ,'product' =>$data->subcategory->slug ,'slug' => $data->slug])}}" class="">
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
                                                            <h5 class="ec-pro-title"><a href="{{route('web.product.detail',['category' => $slug ,'product' =>$data->subcategory->slug ,'slug' => $data->slug])}}">{{ Str::limit(@$data->name, 35, '...') }}</a></h5>

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
                                    {{ $allProducts->withQueryString()->links('pagination::bootstrap-5') }}
                                </div>
                                <!-- Ec Pagination End -->
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </section>
        <!-- End Shop page -->


    </div>


</div>
