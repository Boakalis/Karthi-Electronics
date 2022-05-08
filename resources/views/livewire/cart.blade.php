<div>
    <style>
        .lavender{
            background: lavender;
        }
    </style>
    <section class="ec-page-content section-space-p">
        <div class="container">
            @if (isset($datas) && $datas->count() > 0)
                <div class="row">
                    <div class="ec-cart-leftside col-lg-8 col-md-12 ">
                        <div class="ec-cart-content">
                            <div class="ec-cart-inner">
                                <div class="row">
                                    <form action="#">
                                        <div class="table-content cart-table-content">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Price</th>
                                                        <th style="text-align: center;">Quantity</th>
                                                        <th>Total</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($datas as $item)
                                                        <tr>
                                                            <td data-label="Product" class="ec-cart-pro-name">
                                                                <a href="javascript:void(0)">
                                                                    <img class="ec-cart-pro-img mr-4"
                                                                        src="{{ asset($item->product->image) }}"
                                                                        alt="" />{{ $item->product->name }}
                                                                </a>
                                                            </td>
                                                            <td data-label="Price" class="ec-cart-pro-price">
                                                                @php

                                                                @endphp
                                                                <span
                                                                    class="amount">&#8377;<span class="">{{ $item->amount }}</span> </span>
                                                            </td>
                                                            <td data-label="Quantity" class="ec-cart-pro-qty"
                                                                style="text-align: center;">
                                                                <div class="qty my-2">
                                                                    <span class="minus bg-dark"
                                                                        wire:click="decrease({{ $item->id }})">-</span>
                                                                    <input type="number" style="height: 100%;"
                                                                        class="count" name="qty"
                                                                        value="{{ @$item->qty }}" />
                                                                    <span class="plus bg-dark"
                                                                        wire:click="increase({{ $item->id }})">+</span>
                                                                </div>
                                                            </td>
                                                            <td data-label="Total" class="ec-cart-pro-subtotal">
                                                                &#8377;<span class="amount-ind">{{ $item->amount * $item->qty }}</span>
                                                            </td>
                                                            <td data-label="Remove" class="ec-cart-pro-remove">
                                                                <a href="javascript:void(0)"
                                                                    wire:click="remove({{ $item->id }})"><i
                                                                        class="ecicon eci-trash-o"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>

                                        </div>
                                        {{-- <div class="row">
                                            <div class="col-lg-12">
                                                <div class="ec-cart-update-bottom">
                                                    <span>&nbsp;</span>
                                                    <button class="btn btn-primary" type="button" onclick="calc_total()" >Check Out</button>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </form>
                                </div>

                            </div>
                        </div>
                        <!--cart content End -->

                    </div>
                    <!-- Sidebar Area Start -->
                    <div class="ec-cart-rightside col-lg-4 col-md-12">
                        <div class="ec-sidebar-wrap">
                            <!-- Sidebar Summary Block -->
                            <div class="ec-sidebar-block">

                                <div class="ec-sb-block-content">
                                    <h5>Address Book &nbsp; <a href="javascript:void(0)" data-bs-target="#addAddress" data-bs-toggle="modal" class="badge bg-success" >Add New</a></h5>
                                    @if (isset($addresses) && $addresses->count() != 0 )
                                        @foreach ($addresses as $add)

                                        <div class="card  {{$add->id == $addressSelect ? 'lavender' :''}} "  >
                                            <div class="card-body">
                                                {{-- <h6>Address 1:</h6> --}}
                                                <p class="m-0 font-weight-bold">{{$add->name}}</p>
                                                <p class="m-0" >{{$add->address_1}}</p>
                                                @if (!empty($add->address_2))
                                                <p class="m-0" >{{$add->address_2}}</p>
                                                @endif
                                                <p class="m-0" >{{$add->city}}-{{$add->pincode}}</p>
                                                <p class="m-0" >Phone Number:{{$add->mobile}}</p>
                                                <button class="btn btn-success mt-1" wire:click="setAddress({{$add->id}})" >Select</button>
                                                <button class="btn btn-primary mt-1" wire:click="editAddress({{$add->id}})" >Edit</button>
                                                <button class="btn btn-danger mt-1" wire:click="removeAddress({{$add->id}})" >Remove</button>

                                            </div>
                                        </div>
                                        @endforeach
                                    @else
                                    <p class="text-center">No Address Found</p>
                                    @endif
                                </div>
                                <h6 class=" text-center"  >You will earn <span><i class="fa-solid text-warning fa-bolt-lightning"></i>&nbsp;{{@$ultraCoin}}</span>&nbsp;UltraCoins</h6>
                                <div class="ec-sb-block-content">
                                    <div class="ec-cart-summary-bottom">
                                        <div class="ec-cart-summary">
                                            <div>
                                                <span class="text-left">Sub-Total</span>
                                                <span class="text-right">&#8377; <span id="sum">{{@$sum}}</span></span>
                                            </div>
                                            <div>
                                                <span class="text-left">Delivery Charges</span>
                                                <span class="text-right "> <span class="text-decoration-line-through">&#8377;50</span>&nbsp;<span class="fw-bold">FREE</span> </span>
                                            </div>

                                            @if ( @Auth::user()->wallet->amount > 0)
                                                <div class="form-check form-check-inline" style="    height: 20px;
                                                margin: 0 5px 0 0;
                                                padding: 0;
                                                display: -webkit-inline-box;
                                                display: -ms-inline-flexbox;
                                                display: inline-flex;
                                                -webkit-box-align: center;
                                                -ms-flex-align: center;
                                                align-items: center;">
                                                    <input type="checkbox" style="   width: 35px !important;
                                                    height: 100% !important;

                                                    margin: 0;"  id="wallet" name="wallet" onclick="wallet(event)"  value="1">
                                                    <label style="    margin: 5px 5px 2px 7px;
                                                    line-height: 11px;
                                                    color: hsl(0, 0%, 0%);">Use Ultra Coin :
                                                    <small><i class="fa-solid text-warning fa-bolt-lightning"></i>{{ @Auth::user()->wallet->amount}}</small>
                                                    </label>


                                                </div>
                                            @endif
                                            <div class="ec-cart-summary-total">
                                                <span class="text-left">Total Amount</span>
                                                <span class="text-right">&#8377;{{@$sum -$walletAmount }}</span>
                                            </div>

                                            <div class="row">
                                                {{-- <div class="col-lg-6">
                                                    <div class="ec-cart-update-bottom">
                                                        <span>&nbsp;</span>
                                                        <button class="btn btn-warning" type="button" onclick="calc_total()" >Pay By Online</button>
                                                    </div>
                                                </div> --}}
                                                <div class="col-lg-6">
                                                    <div class="ec-cart-update-bottom">
                                                        <span>&nbsp;</span>
                                                        <button class="btn btn-success" type="button" wire:click="buyNow()" >Pay By COD</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Sidebar Summary Block -->
                        </div>
                    </div>
                </div>
            @else
                <center>
                    <h1>Cart is Empty</h1>
                </center>
                <center>
                    <div class="ec-bg-swipe">
                        <button class=" bg-success ec-btn-bg-swipe">
                            <span class="circle bg-dark " aria-hidden="true">
                                <span class="icon arrow"></span>
                            </span>
                            <span class="button-text text-light ">GO HOME</span>
                        </button>
                    </div>
                </center>
            @endif
        </div>
    </section>

  <!-- Modal -->
  <div class="modal fade" wire:ignore.self id="addAddress" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add Address</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
                <div class="mb-3">
                  <label for="name" class="form-label">Full Name</label>
                  <input type="text" wire:model="name" class="form-control" id="Name" >
                  {{-- <div id="" class="form-text">We'll never share your email with anyone else.</div> --}}
                  @error('name')
                    <span style="font-size: 10px;" class="text-danger" >{{$errors->first('name')}}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="number" class="form-label">Mobile Number</label>
                  <input type="number" wire:model="mobile" class="form-control" id="number">
                  @error('mobile')
                  <span style="font-size: 10px;" class="text-danger" >{{$errors->first('mobile')}}</span>
                @enderror
                </div>
                <div class="mb-3">
                  <label for="pincode" class="form-label">Pincode</label>
                  <input type="number" wire:model="pincode" class="form-control" maxlength="6" id="pincode">
                  <span style="font-size: 10px">Pincode is used for service availability</span>
                  @error('pincode')
                  <span style="font-size: 10px;" class="text-danger" >{{$errors->first('pincode')}}</span>
                @enderror
                </div>
                <div class="mb-3">
                  <label for="address1" class="form-label">Flat, House no., Builkding, Company, Apartment</label>
                  <input type="text" wire:model="address_1" class="form-control" id="address1">
                  @error('address_1')
                  <span style="font-size: 10px;" class="text-danger" >{{$errors->first('address_1')}}</span>
                @enderror
                {{-- <input type="hidden" wire:model="address_id" > --}}
                </div>
                <div class="mb-3">
                  <label for="address2" class="form-label">Area, Street, Sector, Village</label>
                  <input type="text" wire:model="address_2" class="form-control" id="address2">
                  @error('address_2')
                  <span style="font-size: 10px;" class="text-danger" >{{$errors->first('address_2')}}</span>
                @enderror
                </div>
                <div class="mb-3">
                  <label for="landmark" class="form-label">Landmark</label>
                  <input type="text" wire:model="landmark" class="form-control" id="landmark">
                  @error('landmark')
                  <span style="font-size: 10px;" class="text-danger" >{{$errors->first('landmark')}}</span>
                @enderror
                </div>
                <div class="mb-3">
                  <label for="town" class="form-label">Town/City</label>
                  <input type="text" wire:model="city" class="form-control" id="town">
                  @error('city')
                  <span style="font-size: 10px;" class="text-danger" >{{$errors->first('city')}}</span>
                @enderror
                </div>

                <button type="button" wire:click="add" class="btn btn-primary">Submit</button>
              </form>
        </div>

      </div>
    </div>
  </div>
  {{-- Pincode Modal --}}
  <div class="modal fade modal-md" wire:ignore.self tabindex="-1" id="couponModal">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Available Coupon</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                @if (isset($coupons) && !empty($coupons))
                    @foreach ($coupons as $coup)
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="font-weught-bold">{{$coup->code}}</h4>
                                    <p>{{$coup->description}}</p>

                                    <span>Valid Till: {{$coup->valid_date}}</span>
                                    {{-- <button class="float-right btn btn-success btn-sm" onclick="copy({{$coup->code}})">Copy Coupon</button> --}}

                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <center><p>No Coupons Found</p></center>
                @endif

            </div>
        </div>
        </div>
    </div>
  </div>
</div>
@push('scripts')
    <script>
        $(window).on('load',function(){
            calc_total();
        });
        function calc_total(){
        var sum = 0;
        $(".amount-ind").each(function(){

            sum += parseFloat($(this).text());
        });

        Livewire.emit('total',sum);
        }
        Livewire.on("min-limit", function(data) {
            toastr.error("Reached Minimum Quantity");
        });
        Livewire.on("increase", function(data) {
            calc_total();
        });
        Livewire.on("decrease", function(data) {
            calc_total();
        });
        Livewire.on("max-limit", function(data) {
            toastr.error("Reached Maximum Quantity");
        });
        Livewire.on("address-added", function(data) {
            $('#addAddress').modal('hide');
            toastr.success('Address Added');
        });
        Livewire.on("remove", function(data) {

            toastr.error('Address Removed');
        });
        Livewire.on("address-selected", function(data) {

            toastr.success('Address Selected');
        });
        Livewire.on("edit-address", function(data) {

            $('#addAddress').modal('show');
        });
        Livewire.on("address-updated", function(data) {
            $('#addAddress').modal('hide');
            toastr.success('Address updated');
        });
        Livewire.on("no-address", function(data) {
            toastr.success('Please Provide Address');
        });
        Livewire.on("not-deliverable",function(){

            Swal.fire({
                icon: 'error',
                title: 'We are not servicable at this location currently.',
                text: 'Our Team expanding and we will inform as soon as we are available at your zone!',
            });
        });
        function copy(code) {
            console.log(code);
            Livewire.emit('copy',code);
        }

        function wallet(event) {

            if (document.getElementById('wallet').checked) {
                Livewire.emit("walletCheck", 1);
            } else {
                Livewire.emit("walletCheck", 0);
            }

        }

    </script>
@endpush
