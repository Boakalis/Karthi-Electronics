<div>
    @section('stylesheet')
    <link rel="stylesheet" type="text/css" href="{{asset('css/modal.css')}}" />
    @endsection
    <div class="container my-3">
        <h4 class="float-left">Shop</h4>
        <small class="float-right"> <a href="">Home</a>&nbsp;-<a href="">Product Details</a> </small>
    </div>

    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="container">
                        <section class="section ec-offer-section section-space-mt section-space-mb">
                            <div class="container">
                                <div class="ec-offer-inner ofr-img img-fluid" style=" background-size:contain; background-image:url({{ asset(@$data->image) }})"></div>
                                @if (isset($data->images) && !empty($data->images))
                                <section class="section ec-brand-area section-space-p">
                                    <h2 class="d-none">Brand</h2>
                                    <div class="container">
                                        <div class="row">
                                            <div class="ec-brand-outer">
                                                <ul id="ec-brand-slider">
                                                    @foreach ( json_decode($data->images) as $image)
                                                    <li class="ec-brand-item">
                                                        <div class="ec-brand-img">
                                                            <a href="javascript:void(0)"><img alt="{{ $data->name }}" src="{{ asset($image) }}" /></a>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                @endif
                            </div>
                        </section>
                    </div>
                </div>
                <div class="col-6">
                    <div class="container">
                        <h3>{{ @$data->name }}</h3>
                        <hr class="bg-dark" />
                        <div class="ec-single-price-stoke">
                            <div class="container">
                                <div class="row">
                                    @if ($data->is_products_variant != null)
                                    <div class="col-4">
                                        <h6>
                                            <span class="float-right">Select Variant: </span>
                                        </h6>
                                    </div>
                                    <div class="col-8">
                                        @foreach ($data->variants as $key => $variant)
                                        <button id="variant{{ $key }}" onclick="variant({{ $variant->id }})" class="badge float-left variant-class variant-{{ $variant->id }} text-dark">{{ $variant->name }}</button>
                                        @endforeach
                                    </div>
                                    @endif
                                    <div class="col-4">
                                        <span class="float-right" style="font-size: 1.3rem;">M.R.P:</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="float-left" style="font-size: 1.3rem; text-decoration: line-through;">&#8377;&nbsp;{{ $seller_price }}</span>
                                    </div>
                                    <div class="col-4">
                                        <span class="float-right" style="font-size: 1.3rem;">Price:</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="float-left" style="font-size: 1.3rem;">&#8377;&nbsp;{{ $discounted_price }}</span>
                                    </div>
                                    <div class="col-4">
                                        <span class="float-right" style="font-size: 1.3rem;">You Save:</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="float-left" style="font-size: 1.3rem;">&#8377;&nbsp;{{ $seller_price - $discounted_price }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="buy-now-container">
                            <div class="container">
                                <hr class="bg-dark" />
                                <div class="row">
                                    <div class="col-6">
                                        <h6 class="float-left col-12">Select Color:</h6>
                                        @foreach (array_unique(json_decode($data->colors)) as $key => $item)
                                        <btn class="btn float-left m-2" wire:click="colorChange({{ $key }})" style="border-radius:50%;height:30px;width:30px;background-color: {{ $item }}"> &nbsp;</btn>
                                        @endforeach
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="text-center col-12">
                                                @if ($data->is_products_variant != null)
                                                <small>
                                                    Selected Variant:{{ @$selectedVariant->name }} <btn class="badge" style="border-radius:50%;height:20px;width:20px;background-color: {{ json_decode($data->colors)[$color] }}"> &nbsp;</btn>
                                                </small>
                                                @endif
                                                <div class="row">
                                                    <style>
                                                        /* Chrome, Safari, Edge, Opera */
                                                        input::-webkit-outer-spin-button,
                                                        input::-webkit-inner-spin-button {
                                                            -webkit-appearance: none;
                                                            margin: 0;
                                                        }

                                                        /* Firefox */
                                                        input[type="number"] {
                                                            -moz-appearance: textfield;
                                                        }
                                                    </style>

                                                    @if (!empty($cart))
                                                    <div class="qty my-2">
                                                        <span class="minus bg-dark" wire:click="decrease">-</span>
                                                        <input type="number" style="height: 100%;" class="count" name="qty" value="{{ @$cart->qty }}" />
                                                        <span class="plus bg-dark" wire:click="increase">+</span>

                                                    </div>
                                                    <div  class="d-flex my-1" style="justify-content: center;" >
                                                        <button
                                                        class="btn-success buy p-2 m-1"
                                                        wire:click="buy"
                                                        style="
                                                            border-width: 1px;
                                                            border-style: solid;
                                                            font-size: 10px;
                                                            border-radius: 50px;

                                                            padding: 0px 23px;
                                                            text-transform: uppercase;
                                                            text-align: center;
                                                            display: block;
                                                            font-weight: 500;
                                                        "
                                                    >
                                                        <span>Buy Now</span>
                                                    </button>

                                                    </div>
                                                    @endif @if (empty($cart))

                                                    <div class="d-flex my-1" style="justify-content: center;">
                                                        <div class="row">

                                                            <button
                                                                class="btn-primary p-2 cart m-2"
                                                                wire:click="cart"
                                                                style="
                                                                    border-width: 1px;
                                                                    border-style: solid;
                                                                    font-size: 10px;
                                                                    border-radius: 50px;
                                                                    padding: 0px 23px;
                                                                    text-transform: uppercase;
                                                                    text-align: center;
                                                                    display: block;
                                                                    font-weight: 500;
                                                                "
                                                            >
                                                                <span>Add To Cart</span>
                                                            </button>

                                                            <button
                                                                class="btn-success buy p-2 m-1"
                                                                wire:click="buy"
                                                                style="
                                                                    border-width: 1px;
                                                                    border-style: solid;
                                                                    font-size: 10px;
                                                                    border-radius: 50px;

                                                                    padding: 0px 23px;
                                                                    text-transform: uppercase;
                                                                    text-align: center;
                                                                    display: block;
                                                                    font-weight: 500;
                                                                "
                                                            >
                                                                <span>Buy Now</span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                    @endif

                                                    <div class="d-flex my-1" style="justify-content: center;"></div>
                                                </div>
                                            </div>
                                            {{--
                                            <div class="col-6">
                                                <span class="float-right">Variant:</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="float-left">4gb</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="float-right">Color:</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="float-left">red</span>
                                            </div>
                                            --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>{!! @$data->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" wire:ignore.self id="modal-login" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close qty_close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            {{--
                            <!-- Swiper -->
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
                            </div>
                            --}}
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
                                        <span><a href="" style="font-size: 8px; text-decoration: underline;" class="text-primary float-right">Register with us</a></span>
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
    <!-- Modal end -->
</div>
@push('scripts')
<script>
    let variantId = $("#variant").val();
    window.onload = function () {
        $("#variant0").click();
    };
    $("#variant0").click();

    function variant(variantId) {
        Livewire.emit("variant", variantId);
    }

    Livewire.on("alert", function (data) {
        $(".variant-class").removeClass("btn-warning");
        $(".variant-" + data.id).addClass("btn-warning");
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
    Livewire.on("login-success", function (data) {
        // const buy = "{{$buybutton}}";
        // const cart = "{{$cartbutton}}";
        console.log(data);

        if (data.buy == 1) {
            $(".cart").click();
        } else if (data.cart == 1) {
            $(".buy").click();
        }
        $("#modal-login").modal("hide");
    });
</script>
@endpush
