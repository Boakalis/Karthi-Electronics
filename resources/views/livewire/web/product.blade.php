<div>
    <div class="container my-3 ">
        <h4 class="float-left" >Shop</h4>
        <small class="float-right" > <a href="">Home</a>&nbsp;-<a href="">Products</a>  </small>
    </div>
    <section class="section ec-product-tab section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-title-block">
                    <div class="section-title">
                        <h2 class="ec-title">All Products from {{@$subcategory->name}}</h2>
                        {{-- <h6 class="ec-sub-title">Lorem Ipsum is simply dummy text of the printing</h6> --}}

                    </div>
                </div>

            </div>
            <div class="row m-tb-minus-15">
                <div class="col">
                    <div class="tab-content">
                        <div class="row">
                            @if (isset($datas) && !empty($datas))
                                @foreach ($datas as $data)
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ec-product-content">
                                        <div class="ec-product-inner">
                                            <div class="ec-product-hover"></div>
                                            <div class="ec-pro-image-outer">
                                                <div class="ec-pro-image">
                                                    <a href="{{route('web.product.detail',['category' => $category ,'product' =>$slug ,'slug' => $data->slug])}}" class="image">
                                                        <img class="main-image" src="{{asset($data->image)}}"
                                                            alt="Product" />
                                                        <img class="hover-image" src="{{asset($data->image)}}"
                                                            alt="Product" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="ec-pro-content">
                                                <div class="ec-pro-option">
                                                    <div class="ec-pro-opt-inner">
                                                        {{-- <div class="ec-pro-color">
                                                            <ul class="ec-opt-swatch ec-change-img">
                                                                <li class="active"><a href="#" class="ec-opt-clr-img"
                                                                        data-src="{{asset($data->image)}}"
                                                                        data-src-hover="{{asset($data->image)}}"
                                                                        data-tooltip="Gray"><span
                                                                            style="background-color:#ef7ca3;"></span></a></li>
                                                            </ul>
                                                        </div> --}}

                                                    </div>
                                                </div>
                                                <h5 class="ec-pro-title"><a href="{{route('web.product.detail',['category' => $category ,'product' =>$slug ,'slug' => $data->slug])}}">{{$data->name}}</a></h5>
                                                {{-- <h6 class="ec-pro-stitle"><a href="shop-left-sidebar-col-3.html">{{@$data->category->name}}</a></h6> --}}
                                                <div class="ec-pro-rat-price">
                                                    <div class="ec-pro-rat-pri-inner">
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
                                                        <span class=""  >
                                                          <small>Product Details:</small>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="pro-hidden-block bg-light">
                                                    <div class="ec-pro-desc">{{ \Illuminate\Support\Str::limit(@$data->short_description, 150, $end='...') }}</div>
                                                    <div class="ec-pro-actions ">
                                                        <a class="ec-btn-group wishlist" title="Wishlist"><img
                                                                src="assets/images/icons/pro_wishlist.svg"
                                                                class="svg_img pro_svg" alt="" /></a>
                                                                @if ($data->is_products_variant != 1)
                                                                    <button title="Add To Cart" class="add-to-cart btn btn-primary">Add To
                                                                        Cart</button>
                                                                @else
                                                                    <a href="{{route('web.product.detail',['category' => $category ,'product' =>$slug ,'slug' => $data->slug])}}" title="Add To Cart" class="add-to-cart btn btn-primary">View </a >
                                                                @endif
                                                        <a href="{{route('web.product.detail',['category' => $category ,'product' =>$slug ,'slug' => $data->slug])}}" class="ec-btn-group quickview" data-link-action="quickview"
                                                            title="Quick view" data-bs-toggle="modal"
                                                            data-bs-target="#ec_quickview_modal"><img
                                                                src="assets/images/icons/quickview.svg" class="svg_img pro_svg"
                                                                alt="" /></a>
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
        </div>
    </section>
</div>
