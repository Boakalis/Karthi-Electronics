<div>
    @section('stylesheet')
    <link rel="stylesheet" type="text/css" href="{{asset('css/modal.css')}}">
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
                                <div class="ec-offer-inner ofr-img img-fluid"
                                    style=" background-size:contain; background-image:url({{ asset(@$data->image) }})">
                                </div>
                                @if (isset($data->images) && !empty($data->images))
                                    <section class="section ec-brand-area section-space-p">
                                        <h2 class="d-none">Brand</h2>
                                        <div class="container">
                                            <div class="row">
                                                <div class="ec-brand-outer">
                                                    <ul id="ec-brand-slider">

                                                        @foreach ($data->images as $image)
                                                            <li class="ec-brand-item">
                                                                <div class="ec-brand-img"><a
                                                                        href="javascript:void(0)"><img
                                                                            alt="{{ $data->name }}"
                                                                            src="{{ asset($image) }}" /></a></div>
                                                            </li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                @endif
                        </section>

                    </div>
                </div>
                <div class="col-6">
                    <div class="container">
                        <h3>{{ @$data->name }}</h3>
                        <hr class="bg-dark">
                        <div class="ec-single-price-stoke">
                            <div class="container">
                                <div class="row">
                                    @if ($data->is_products_variant != null)
                                        <div class=" col-4">
                                            <h6>
                                                <span class="float-right">Select Variant:
                                                </span>
                                            </h6>

                                        </div>
                                        <div class="col-8">
                                            @foreach ($data->variants as $key => $variant)
                                                <button id="variant{{ $key }}"
                                                    onclick="variant({{ $variant->id }})"
                                                    class="badge float-left variant-class variant-{{ $variant->id }} text-dark">{{ $variant->name }}</button>
                                            @endforeach

                                        </div>
                                    @endif
                                    <div class="col-4 ">
                                        <span class="float-right" style="font-size: 1.3rem; ">M.R.P:</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="float-left"
                                            style="font-size: 1.3rem;text-decoration:line-through">&#8377;&nbsp;{{ $seller_price }}</span>

                                    </div>
                                    <div class="col-4 ">
                                        <span class="float-right" style="font-size: 1.3rem;">Price:</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="float-left"
                                            style="font-size: 1.3rem;">&#8377;&nbsp;{{ $discounted_price }}</span>

                                    </div>
                                    <div class="col-4 ">
                                        <span class="float-right" style="font-size: 1.3rem;">You Save:</span>
                                    </div>
                                    <div class="col-8">
                                        <span class="float-left"
                                            style="font-size: 1.3rem;">&#8377;&nbsp;{{ $seller_price - $discounted_price }}</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="buy-now-container">
                            <div class="container">
                                <hr class="bg-dark">
                                <div class="row">
                                    <div class="col-6  ">
                                        <h6 class="float-left col-12 ">Select Color:</h6>
                                        @foreach (array_unique(json_decode($data->colors)) as $key => $item)
                                            <btn class="btn float-left m-2"
                                                wire:click="colorChange({{ $key }})"
                                                style="border-radius:50%;height:30px;width:30px;background-color: {{ $item }}">
                                                &nbsp;</btn>
                                        @endforeach
                                    </div>
                                    <div class=" col-6">
                                        <div class="row">
                                            <div class="text-center col-12">
                                                @if ($data->is_products_variant != null)
                                                    <small>Selected Variant:{{ @$selectedVariant->name }} <btn
                                                            class="badge"
                                                            style="border-radius:50%;height:20px;width:20px;background-color: {{ json_decode($data->colors)[$color] }}">
                                                            &nbsp;</btn></small>
                                                @endif
                                                <div class="row mt-3">
                                                    <style>
                                                        /* Chrome, Safari, Edge, Opera */
                                                        input::-webkit-outer-spin-button,
                                                        input::-webkit-inner-spin-button {
                                                            -webkit-appearance: none;
                                                            margin: 0;
                                                        }

                                                        /* Firefox */
                                                        input[type=number] {
                                                            -moz-appearance: textfield;
                                                        }

                                                    </style>



                                                    @if (!empty($cart))
                                                    <div class="qty my-2">
                                                        <span class="minus bg-dark" wire:click="decrease">-</span>
                                                        <input type="number" style="height: 100%" class="count"
                                                            name="qty" value="{{ @$qty }}">
                                                        <span class="plus bg-dark" wire:click="increase">+</span>
                                                    </div>
                                                    @endif
                                                    @if (empty($cart))

                                                    <div class="d-flex my-1" style="justify-content: center">
                                                        <button class="btn-primary " wire:click="cart" style="    border-width: 1px;
                                                        border-style: solid;
                                                        font-size: 14px;
                                                        border-radius: 23px;
                                                        letter-spacing: 0.6px;
                                                        padding: 0px 23px;
                                                        text-transform: uppercase;
                                                        text-align: center;
                                                        display: block;
                                                        font-weight: 500;"> <span>Add To Cart</span> </button>
                                                    </div>

                                                    @endif

                                                    <div class="d-flex my-1" style="justify-content: center">

                                                        <button class="btn-success" wire:click="buy" style="    border-width: 1px;
                                                        border-style: solid;
                                                        font-size: 14px;
                                                        border-radius: 23px;
                                                        letter-spacing: 0.6px;
                                                        padding: 0px 23px;
                                                        text-transform: uppercase;
                                                        text-align: center;
                                                        display: block;
                                                        font-weight: 500;"> <span>Buy Now</span> </button>

                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-6">
                                                <span class="float-right" >Variant:</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="float-left" >4gb</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="float-right" >Color:</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="float-left" >red</span>
                                            </div> --}}
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



    </div>
@push('scripts')
    <script>
        let variantId = $('#variant').val();
        window.onload = function() {
            $('#variant0').click();
        }
        $('#variant0').click();

        function variant(variantId) {
            Livewire.emit('variant', variantId)
        }

        Livewire.on('alert', function(data) {

            $('.variant-class').removeClass('btn-warning');
            $('.variant-' + data.id).addClass('btn-warning')
        });
        Livewire.on('min-limit', function(data) {
            toastr.error('Reached Minimum Quantity');
        });
        Livewire.on('max-limit', function(data) {

            toastr.error('Reached Maximum Quantity');
        });
        Livewire.on('login', function(data) {

            $('#modal-login').modal('show');

        });
    </script>
@endpush
