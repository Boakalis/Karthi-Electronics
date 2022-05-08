<div>
 <!-- Sart Single product -->
 <section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <div class="ec-pro-rightside ec-common-rightside col-lg-12 col-md-12">

                <!-- Single product content Start -->
                <div class="single-pro-block">
                    <div class="single-pro-inner" >
                        <div class="row">
                            {{-- <div class="single-pro-img single-pro-img-no-sidebar">
                                <div class="single-product-scroll">
                                    <a class="ec-360-lbl" data-link-action="quickview" title="360 view" data-bs-toggle="modal" data-bs-target="#ec_360_view_modal">
                                        <img src="assets/images/icons/360-degrees.png" alt="view image">
                                    </a>
                                    <div class="single-product-cover">
                                        <div class="single-slide zoom-image-hover">
                                            <img class="img-responsive" src="{{asset($data->image)}}.jpg"
                                                alt="">
                                        </div>
                                        @if (isset($data->images) && !empty($data->images))
                                            @foreach ( json_decode($data->images) as $image)
                                                <div class="single-slide zoom-image-hover">
                                                    <img class="img-responsive" src="{{asset($image)}}.jpg"
                                                        alt="">
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="single-nav-thumb">
                                        <div class="single-slide">
                                            <img class="img-responsive" src="{{asset($data->image)}}.jpg"
                                                alt="">
                                        </div>
                                        @if (isset($data->images) && !empty($data->images))
                                            @foreach ( json_decode($data->images) as $image)
                                            <div class="single-slide">
                                                <img class="img-responsive" src="{{asset($image)}}.jpg"
                                                    alt="">
                                            </div>
                                            @endforeach
                                        @endif


                                    </div>
                                </div>
                            </div> --}}
                            <div class="single-pro-img single-pro-img-no-sidebar" wire:ignore >
                                <div class="single-product-scroll">
                                    <div class="single-product-cover">
                                        <div class="single-slide zoom-image-hover">
                                            <img style="height:500px;width:100%;" class="" src="{{asset($data->image)}}"
                                                alt="">
                                        </div>
                                        @if (isset($data->images) && !empty($data->images))
                                            @foreach ( json_decode($data->images) as $image)
                                                <div class="single-slide zoom-image-hover">
                                                    <img  class="" style="height:500px;width:100%;" src="{{asset($image)}}"
                                                        alt="">
                                                </div>
                                            @endforeach
                                        @endif

                                    </div>
                                    <div class="single-nav-thumb">
                                        <div class="single-slide">
                                            <img style="height: 50px;width:50px;" class="img-responsive" src="{{asset($data->image)}}"
                                                alt="">
                                        </div>
                                        @if (isset($data->images) && !empty($data->images))
                                            @foreach ( json_decode($data->images) as $image)
                                            <div class="single-slide">
                                                <img style="height: 50px;width:50px;" class="img-responsive" src="{{asset($image)}}"
                                                    alt="">
                                            </div>
                                            @endforeach
                                        @endif

                                    </div>
                                </div>
                            </div>

                            <div class="single-pro-desc single-pro-desc-no-sidebar">
                                <div class="single-pro-content">
                                    <h5 class="ec-single-title">{{ @$data->name }}</h5>
                                    {{-- <div class="ec-single-rating-wrap">
                                        <div class="ec-single-rating">
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star-o"></i>
                                        </div>
                                        <span class="ec-read-review"><a href="#ec-spt-nav-review">Be the first to
                                                review this product</a></span>
                                    </div> --}}
                                    <div class="ec-single-desc">{!!@$data->short_description!!}</div>

                                    {{-- <div class="ec-single-sales">
                                        <div class="ec-single-sales-inner">
                                            <div class="ec-single-sales-title">sales accelerators</div>
                                            <div class="ec-single-sales-visitor">real time <span>24</span> visitor
                                                right now!</div>
                                            <div class="ec-single-sales-progress">
                                                <span class="ec-single-progress-desc">Hurry up!left 29 in
                                                    stock</span>
                                                <span class="ec-single-progressbar"></span>
                                            </div>
                                            <div class="ec-single-sales-countdown">
                                                <div class="ec-single-countdown"><span
                                                        id="ec-single-countdown"></span></div>
                                                <div class="ec-single-count-desc">Time is Running Out!</div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="ec-single-price-stoke">
                                        <div class="ec-single-price">
                                            <span class="ec-single-ps-title">M.R.P Price</span>
                                            <span class="ec-single-sku"  text-decoration: line-through; >&#8377;&nbsp;{{ $seller_price }}</span>
                                        </div>
                                        <div class="ec-single-price">
                                            <span class="ec-single-ps-title">Price</span>
                                            <span class="new-price">&#8377;&nbsp;{{ $discounted_price }}</span>
                                        </div>
                                        <div class="ec-single-price">
                                            <span class="ec-single-ps-title">You Save</span>
                                            <span class="new-price">&#8377;&nbsp;{{ $seller_price - $discounted_price }}</span>
                                        </div>
                                        <div class="ec-single-stoke">
                                            <span class="ec-single-ps-title "> <span class="badge btn-success badge-sm"> IN STOCK</span></span>
                                            <span class="ec-single-ps-title "> <span data-bs-placement="top" title="On Every Successfull purchase, Ultra-Coin will be added to the wallet ,which will be used for purchase. One Ultracoin is equal to 1 rupees" class="badge btn-light text-dark p-0 badge-sm"><i class="fa-solid text-warning fa-bolt-lightning"></i>&nbsp;{{@$data->ultra_coin}} Ultra-Coin</span></span>
                                        </div>
                                    </div>

                                    <div class="ec-pro-variation">
                                        @if ($data->is_products_variant != null)
                                            <div class="ec-pro-variation-inner ec-pro-variation-size"  >
                                                <span>Available Variants</span>
                                                <div class="ec-pro-variation-content">
                                                    <ul>
                                                        @foreach ($data->variants as $key => $variant)
                                                            <li class="mx-2" ><button id="variant{{ $key }}" onclick="variant({{ $variant->id }})" class="badge float-left variant-class variant-{{ $variant->id }} {{@$selectedVariant->id == $variant->id ? 'btn-warning' : '' }} text-uppercase text-dark">{{ $variant->name }}</button></li>

                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="ec-pro-variation-inner ec-pro-variation-color">
                                            <span>Color</span>
                                            <div class="ec-pro-variation-content">
                                                <ul>
                                                    @foreach (array_unique(json_decode($data->colors)) as $key => $item)
                                                        <li onclick="color({{ $key }})"  class=" {{$key == $color ? 'active' : '' }} color-class color-{{$key}}"><span id="color{{$key}}"
                                                                style="background-color:{{$item}};"></span></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="ec-single-qty" >
                                        @if (!empty($cart))
                                            <div class="" style="width:120px;"  >
                                                <div class="qty my-2">
                                                    <span class="minus bg-dark" wire:click="decrease">-</span>
                                                    <input type="number" style="height: 100%;" class="count" name="qty" value="{{ @$cart->qty }}" />
                                                    <span class="plus bg-dark" wire:click="increase">+</span>
                                                </div>

                                            </div>
                                        @endif

                                        <div class="ec-single-cart ">
                                            <button class="btn btn-primary cart {{empty($cart)?'' :'d-none'}} "  wire:click="cart" >Add To Cart</button>
                                        </div>
                                        <div class="ec-single-cart ">
                                            <a href="{{route('cart')}}" class="btn btn-success buy {{!empty($cart)?'' :'d-none'}} ">Buy Now</a>
                                        </div>
                                        {{-- <div class="ec-single-wishlist">
                                            <a class="ec-btn-group wishlist" title="Wishlist"><img
                                                    src="assets/images/icons/wishlist.svg" class="svg_img pro_svg"
                                                    alt="" /></a>
                                        </div>
                                        <div class="ec-single-quickview">
                                            <a href="#" class="ec-btn-group quickview" data-link-action="quickview"
                                                title="Quick view" data-bs-toggle="modal"
                                                data-bs-target="#ec_quickview_modal"><img
                                                    src="assets/images/icons/quickview.svg" class="svg_img pro_svg"
                                                    alt="" /></a>
                                        </div> --}}
                                    </div>
                                    {{-- <div class="ec-single-social">
                                        <ul class="mb-0">
                                            <li class="list-inline-item facebook"><a href="#"><i
                                                        class="ecicon eci-facebook"></i></a></li>
                                            <li class="list-inline-item twitter"><a href="#"><i
                                                        class="ecicon eci-twitter"></i></a></li>
                                            <li class="list-inline-item instagram"><a href="#"><i
                                                        class="ecicon eci-instagram"></i></a></li>
                                            <li class="list-inline-item youtube-play"><a href="#"><i
                                                        class="ecicon eci-youtube-play"></i></a></li>
                                            <li class="list-inline-item behance"><a href="#"><i
                                                        class="ecicon eci-behance"></i></a></li>
                                            <li class="list-inline-item whatsapp"><a href="#"><i
                                                        class="ecicon eci-whatsapp"></i></a></li>
                                            <li class="list-inline-item plus"><a href="#"><i
                                                        class="ecicon eci-plus"></i></a></li>
                                        </ul>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Single product content End -->
                <!-- Single product tab start -->
                <div class="ec-single-pro-tab">
                    <div class="ec-single-pro-tab-wrapper">
                        <div class="ec-single-pro-tab-nav">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#ec-spt-nav-details" role="tablist">Detail</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-info"
                                        role="tablist">More Information</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-review"
                                        role="tablist">Reviews</a>
                                </li> --}}
                            </ul>
                        </div>
                        <div class="tab-content  ec-single-pro-tab-content">
                            <div id="ec-spt-nav-details" class="tab-pane fade show active">
                                <div class="ec-single-pro-tab-desc">
                                   {!!$data->description!!}
                                </div>
                            </div>
                            {{-- <div id="ec-spt-nav-info" class="tab-pane fade">
                                <div class="ec-single-pro-tab-moreinfo">
                                    <ul>
                                        <li><span>Weight</span> 1000 g</li>
                                        <li><span>Dimensions</span> 35 × 30 × 7 cm</li>
                                        <li><span>Color</span> Black, Pink, Red, White</li>
                                    </ul>
                                </div>
                            </div> --}}

                            {{-- <div id="ec-spt-nav-review" class="tab-pane fade">
                                <div class="row">
                                    <div class="ec-t-review-wrapper">
                                        <div class="ec-t-review-item">
                                            <div class="ec-t-review-avtar">
                                                <img src="assets/images/review-image/1.jpg" alt="" />
                                            </div>
                                            <div class="ec-t-review-content">
                                                <div class="ec-t-review-top">
                                                    <div class="ec-t-review-name">Jeny Doe</div>
                                                    <div class="ec-t-review-rating">
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star-o"></i>
                                                    </div>
                                                </div>
                                                <div class="ec-t-review-bottom">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and
                                                        typesetting industry. Lorem Ipsum has been the industry's
                                                        standard dummy text ever since the 1500s, when an unknown
                                                        printer took a galley of type and scrambled it to make a
                                                        type specimen.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ec-t-review-item">
                                            <div class="ec-t-review-avtar">
                                                <img src="assets/images/review-image/2.jpg" alt="" />
                                            </div>
                                            <div class="ec-t-review-content">
                                                <div class="ec-t-review-top">
                                                    <div class="ec-t-review-name">Linda Morgus</div>
                                                    <div class="ec-t-review-rating">
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star-o"></i>
                                                        <i class="ecicon eci-star-o"></i>
                                                    </div>
                                                </div>
                                                <div class="ec-t-review-bottom">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and
                                                        typesetting industry. Lorem Ipsum has been the industry's
                                                        standard dummy text ever since the 1500s, when an unknown
                                                        printer took a galley of type and scrambled it to make a
                                                        type specimen.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="ec-ratting-content">
                                        <h3>Add a Review</h3>
                                        <div class="ec-ratting-form">
                                            <form action="#">
                                                <div class="ec-ratting-star">
                                                    <span>Your rating:</span>
                                                    <div class="ec-t-review-rating">
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star-o"></i>
                                                        <i class="ecicon eci-star-o"></i>
                                                        <i class="ecicon eci-star-o"></i>
                                                    </div>
                                                </div>
                                                <div class="ec-ratting-input">
                                                    <input name="your-name" placeholder="Name" type="text" />
                                                </div>
                                                <div class="ec-ratting-input">
                                                    <input name="your-email" placeholder="Email*" type="email"
                                                        required />
                                                </div>
                                                <div class="ec-ratting-input form-submit">
                                                    <textarea name="your-commemt"
                                                        placeholder="Enter Your Comment"></textarea>
                                                    <button class="btn btn-primary" type="submit"
                                                        value="Submit">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <!-- product details description area end -->
            </div>

        </div>
    </div>
</section>
<!-- End Single product -->
<div class="modal fade" wire:ignore.self id="modal-login" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close qty_close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 col-sm-12 col-xs-12">
   
                        <img src="{{asset('12.jpg')}}" style="height: 100%;" alt="" />
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="login">
                            <center><h6 class="text-uppercase">Login</h6></center>
                            <div class="mb-2">
                                <span class="mt-1" for="email">Email address</span>
                                <input type="email" class="form-control" wire:model="email" id="email" placeholder="Enter Email Address" />
                                @error('email')
                                <span class="text-danger" style="font-size: 10px;"> {{$errors->first('email')}} </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <span class="mt-1" for="password">Password</span>
                                <input type="password" class="form-control" id="password" wire:model="password" placeholder="Enter Password" />
                                @error('password')
                                <span class="text-danger" style="font-size: 10px;"> {{$errors->first('password')}} </span>
                                @enderror
                                <div class="container col-12 m-0 p-0 mt-2">
                                    <span><a href="" style="font-size: 8px; text-decoration: underline;" class="text-primary float-left">Forget Password ?</a></span>
                                    <span><a href="{{route('register')}}" style="font-size: 8px; text-decoration: underline;" class="text-primary float-right">Register with us</a></span>
                                </div>
                            </div>
                            <div class="container m-0 p-0 mt-4">
                                <span class="text-center" style="display: flex; align-items: center; justify-content: center;"><button class="btn btn-success" wire:click="login">Login</button></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@push('scripts')
<script>


    // Livewire.on('initial-variant',function(){
    //     alert(1);
    //     $("#variant0").click();

    // })
    // window.onload = function () {
    //     $("#variant0").click();
    //     $("#color0").click();
    // };


    function variant(variantId) {
        Livewire.emit("variant", variantId);
    }

    Livewire.on("alert", function (data) {
        $(".variant-class").removeClass("btn-warning");

        $(".variant-" + data.id).addClass("btn-warning");
    });

    function color(colorId) {
        Livewire.emit("color", colorId);
    }

    Livewire.on("color-emit", function (data) {
        // console.log(data);
        // $(".color-class").removeClass("active");
        // $(".color-"+data).addClass("active");
    });
    Livewire.on("min-limit", function (data) {
        toastr.error("Reached Minimum Quantity");
    });
    Livewire.on("max-limit", function (data) {
        toastr.error("Reached Maximum Quantity");
    });
    Livewire.on("login", function (data) {
        $("#modal-login").modal("show");
    });
    Livewire.on("no-user", function (data) {
        toastr.error("Account not Exists.Please Register");
    });
    Livewire.on("credentials", function (data) {
        toastr.error("Please Check Credentials");
    });
    Livewire.on("cart-updated", function (data) {
        toastr.success("Cart Updated");
    });
    Livewire.on("login-success", function (data) {
        // const buy = "{{$buybutton}}";
        // const cart = "{{$cartbutton}}";
        if (data.buy == 1) {
            $(".buy").click();
        } else if (data.cart == 1) {
            $(".cart").click();
        }
        $("#modal-login").modal("hide");
    });
</script>
@endpush

