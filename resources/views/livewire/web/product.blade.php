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
                                        <div class="col-lg-3 col-md-4 my-2 col-sm-6 col-6 pro-gl-content">
                                            <div class="ec-product-inner">
                                                <div class="ec-pro-image-outer">
                                                    <div class="text-center
                                                    {{-- ec-pro-image --}}
                                                    ">
                                                        <a href="{{route('web.product.detail',['category' => $category ,'product' =>$slug ,'slug' => $data->slug])}}" class="">
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
                                                    <h5 class="ec-pro-title"><a href="{{route('web.product.detail',['category' => $category ,'product' =>$slug ,'slug' => $data->slug])}}">{{ Str::limit(@$data->name, 35, '...') }}</a></h5>

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
                            {{ $datas->withQueryString()->links('pagination::bootstrap-5') }}
                        </div>
                        <!-- Ec Pagination End -->
                    </div>
                    <!--Shop content End -->
                </div>
                <!-- Sidebar Area Start -->


            </div>
        </div>
    </section>
</div>
