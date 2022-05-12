<div>
    <style>
        .danger-red {
            background-color: red;
        }

        .my-actions {
            margin: 0 2em;
        }

        .order-1 {
            order: 1;
        }

        .order-2 {
            order: 2;
        }

        .order-3 {
            order: 3;
        }

        .right-gap {
            margin-right: auto;
        }

    </style>
    <section class="ec-page-content ec-vendor-uploads ec-user-account section-space-p">
        <div class="container">
            <div class="row">
                <!-- Sidebar Area Start -->

                <div class="ec-shop-rightside col-lg-12 col-md-12">
                    <div class="ec-vendor-dashboard-card">
                        <div class="ec-vendor-card-header">
                            <h5>Order History</h5>
                            {{-- <div class="ec-header-btn">
                                <a class="btn btn-primary" href="#">Shop Now</a>
                            </div> --}}
                        </div>
                        <div class="ec-vendor-card-body">
                            <div class="ec-vendor-card-table">
                                @if (isset($datas) && $datas->count() > 0)
                                    @foreach ($datas as $data)
                                        <div class="card d-lg-block my-4">
                                            <div class="card-header">
                                                <div class="row">
                                                    <div class="col-lg-3 col-6 ">
                                                        <div class="container my-1">
                                                            <div class="col-lg-12 ">
                                                                <p class="my-0 text-uppercase col-12">ORDER PLACED</p>
                                                                <p class=" my-0 text-uppercase col-12">
                                                                    {{ \Carbon\Carbon::parse(@$data->order_date)->format('d-M-Y') }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-6 ">
                                                        <div class="container my-1">
                                                            <div class="col-lg-12 ">
                                                                <p class="my-0 text-uppercase col-12">TOTAL</p>
                                                                <p class=" my-0 text-uppercase col-12">
                                                                    &#8377;{{ @$data->amount }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3  d-none d-lg-block">
                                                        <div class="container my-1">
                                                            <div class="col-lg-12">
                                                                <p class="my-0 text-uppercase col-12">SHIP TO</p>
                                                                <p class=" my-0 text-uppercase col-12">
                                                                    {{ @$data->user->name }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-12 ">
                                                        <div class="container my-1">
                                                            <div class="col-lg-12 ">
                                                                <p class="my-0  text-uppercase col-12">ORDER : <span
                                                                        style="">{{ @$data->orderId }}</span>
                                                                </p>
                                                                <p><a href="{{route('pdf',@$data->id)}}" class=" text-uppercase btn-sm badge text-dark btn-light ">Download Invoice</a></p>
                                                                {{-- <span class="col-6 my-0 text-primary"
                                                                    style="font-size: 10px;">Order Details</span> --}}
                                                                {{-- <span class="col-6 my-0 text-primary" style="font-size: 10px;">Invoice</span> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="card my-1">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="card mb-1">
                                                                    <div class="card-body">
                                                                        <p class="m-0 p-0">Ship To:</p>
                                                                        <p class="m-0 p-0">
                                                                            {{ @$data->user->name }}</p>
                                                                        <p class="m-0 p-0">
                                                                            {{ @$data->address->address_1 }}</p>
                                                                        <p class="m-0 p-0">
                                                                            {{ @$data->address->address_2 }}</p>
                                                                        <p class="m-0 p-0">
                                                                            {{ @$data->address->city }}-{{ @$data->address->pincode }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <table class="col-12">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <p class="p-0 m-0">
                                                                                            Item(s) SubTotal</p>
                                                                                    </td>
                                                                                    <td>
                                                                                        <p class="p-0 m-0 float-right">
                                                                                            &#8377;{{ @$data->amount == 0 ? @$data->wallet_amount : @$data->amount }}
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <p class="p-0 m-0">
                                                                                            Shipping</p>
                                                                                    </td>
                                                                                    <td>
                                                                                        <p class="p-0 m-0 float-right">
                                                                                            <span
                                                                                                style="text-decoration: line-through">&#8377;50</span>
                                                                                            <span>Free</span>
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                {{-- <tr>
                                                                                    <td>
                                                                                        <p class="p-0 m-0" >Total</p>
                                                                                    </td>
                                                                                    <td>
                                                                                        <p class="p-0 m-0 float-right" >&#8377;{{@$data->amount }}</p>
                                                                                    </td>
                                                                                </tr> --}}
                                                                                <tr>
                                                                                    <td>
                                                                                        <p class="p-0 m-0">Ultra
                                                                                            Coin Applied</p>
                                                                                    </td>
                                                                                    <td>
                                                                                        <p class="p-0 m-0 float-right">
                                                                                            {{ @$data->wallet_amount ? @$data->wallet_amount . ' coins' : 'NA' }}
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <p class="p-0 m-0">Grand
                                                                                            Total</p>
                                                                                    </td>
                                                                                    <td>
                                                                                        <p class="p-0 m-0 float-right">
                                                                                            &#8377;{{ @$data->amount }}
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                {{-- <p class="m-0 p-0">Order Summary:</p>
                                                                <p class="m-0 p-0">Item(s) SubTotal:{{@$data->user->name}}</p>
                                                                <p class="m-0 p-0">Shipping{{@$data->address->address_1}}</p>
                                                                <p class="m-0 p-0">{{@$data->address->address_2}}</p>
                                                                <p class="m-0 p-0">{{@$data->address->city}}-{{@$data->address->pincode}}</p> --}}
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div class=" text-center my-2">

                                                                            <a href="{{ route('track-order') }}"
                                                                                class="badge bg-primary text-dark  badge-sm col-12 p-2 mb-1">Track
                                                                                Package</a>
                                                                            @if (@$data->status == 5)
                                                                                @php
                                                                                    $startDate = \Carbon\Carbon::parse(@$data->delivery_date);

                                                                                    $endDate = \Carbon\Carbon::parse(@$data->delivery_date)->addDays(3);
                                                                                    $check = \Carbon\Carbon::now()->between($startDate, $endDate);
                                                                                @endphp
                                                                                @if ($check == true)
                                                                                    <a href="javascript:void(0)"
                                                                                        wire:click="return({{ @$data->id }})"
                                                                                        class="badge bg-danger text-dark badge-sm col-12 p-2 mb-1">Return
                                                                                        Items</a>
                                                                                @endif
                                                                            @endif
                                                                            @if (@$data->status == 1 || @$data->status == 2 || @$data->status == 3 || @$data->status == 4)
                                                                                <a href="javascript:void(0)"
                                                                                    wire:click="cancel({{ @$data->id }})"
                                                                                    class="badge bg-danger badge-sm text-dark col-12 p-2 mb-1">
                                                                                    Cancel</a>
                                                                            @endif


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @foreach ($data->orders as $single)
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="col-lg-12 my-12 container">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <p class="my-2 text-success fw-bold">
                                                                            @if ($data->delivery_date == null)
                                                                                @if (@$data->status == 0)
                                                                                    <span class="text-danger">Package
                                                                                        Cancelled</span>
                                                                                @else
                                                                                    Arriving on
                                                                                    <span>
                                                                                        {{ \Carbon\Carbon::parse(@$data->order_date)->addDays(2)->format('d-M-Y') }}</span>
                                                                                @endif
                                                                            @else
                                                                                @if (@$data->status == 6 || @$data->status == 7)
                                                                                    <span class="text-danger">
                                                                                        Return Started</span>
                                                                                    @if (@$data->status == 6)
                                                                                        <p class="text-success"
                                                                                            style="font-size:12px;">
                                                                                            Return Process Initiated</p>
                                                                                    @else
                                                                                        @if (@$data->status == 7 && @$data->remarks == null)
                                                                                        <p class="text-success"
                                                                                            style="font-size:12px;">
                                                                                            Refunded</p>
                                                                                        @else
                                                                                        <p class="text-danger p-0 m-0"
                                                                                        style="font-size:12px;">
                                                                                        Return Cancelled</p>
                                                                                        <p class="text-dark p-0 "
                                                                                        style="font-size:11px;">
                                                                                        Reason:{{@$data->remarks}}</p>
                                                                                        @endif
                                                                                    @endif
                                                                                @else
                                                                                    Delivered
                                                                                    {{ \Carbon\Carbon::parse(@$data->delivery_date)->format('d-M-Y') }}
                                                                                @endif
                                                                            @endif
                                                                        <div class="col-12">
                                                                            <div class="row">
                                                                                <div class="col-3">
                                                                                    <img style="height: 100px;width:100px;"
                                                                                        src="{{ asset(@$single->product->image) }}"
                                                                                        alt="">
                                                                                </div>
                                                                                <div class="col-9">
                                                                                    <p class="p-0 m-0 text-primary">
                                                                                        {{ @$single->product->name }}
                                                                                        {{ @$single->variant->name ? '-' . $single->variant->name : '' }}
                                                                                    </p>
                                                                                    <p class="p-0 m-0 text-dark">
                                                                                        Selected Color:<span
                                                                                            class="px-1"
                                                                                            style="background-color:{{ @$single->color_id }}">&nbsp;&nbsp;</span>
                                                                                    </p>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        </p>

                                                                    </div>
                                                                    {{-- <div class="col-lg-3">
                                                                        <div class=" text-center my-2">

                                                                                <a href="{{ route('track-order') }}"
                                                                                    class="badge bg-primary text-dark  badge-sm col-12 p-2 mb-1">Track Package</a>
                                                                                    @if (@$data->status == 5)

                                                                                        @php
                                                                                            $startDate = \Carbon\Carbon::parse(@$data->delivery_date);

                                                                                            $endDate = \Carbon\Carbon::parse(@$data->delivery_date)->addDays(3);
                                                                                            $check = \Carbon\Carbon::now()->between($startDate,$endDate);
                                                                                        @endphp
                                                                                        @if ($check == true)
                                                                                            <a href="javascript:void(0)"
                                                                                                class="badge bg-danger text-dark badge-sm col-12 p-2 mb-1">Return Items</a>
                                                                                        @endif
                                                                                    @endif
                                                                                @if (@$data->status == 1 || @$data->status == 2 || @$data->status == 3 || @$data->status == 4)

                                                                                <a href="javascript:void(0)" wire:click="cancel({{@$data->id}})"
                                                                                    class="badge bg-danger badge-sm text-dark col-12 p-2 mb-1">
                                                                                        Cancel</a>
                                                                                @endif


                                                                        </div>
                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="text-dark">
                                                @endforeach

                                            </div>
                                        </div>
                                    @endforeach

                                    {{-- <table class="table ec-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">OrderID</th>
                                                <th scope="col">Order Date</th>
                                                <th scope="col">Amount</th>

                                                <th scope="col">Payment Type</th>
                                                <th scope="col">Status</th>
                                                <th scope="col text-center">
                                                    <center>Actions</center>

                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($datas as $data)

                                                <tr>
                                                    <th scope="row"><span>{{@$data->orderId}}</span></th>
                                                    <td> <span> {{\Carbon\Carbon::parse(@$data->order_date)->format('d-M-Y')}}</span>
                                                    </td>
                                                    <td class="text-center"> <span> <button class=" btn bdage-sm btn-light">&#8377;{{@$data->amount}}</button ></span></td>
                                                    <td class="text-center" > <span> <button class=" badge badge-sm bg-{{@$data->payment_type == 1? 'success':'primary'}}" >
                                                        {{@$data->payment_type == 1? 'COD':'Online'}}</button></span></td>

                                                    <td><span><button class="text-dark badge badge-sm bg-{{@$data->status == 1? 'info':
                                                    (@$data->status == 2? 'primary': (
                                                        @$data->status == 4? 'warning': (
                                                            @$data->status == 5? 'success': 'danger'
                                                        )
                                                    ))
                                                    }}" >
                                                       {{@$data->status == 1? 'Order Received':
                                                       (@$data->status == 2? 'Order Dispatching': (
                                                           @$data->status == 4? 'On the way': (
                                                               @$data->status == 5? 'Delivered': 'Cancelled'
                                                           )
                                                       ))
                                                       }}</button></span></td>
                                                    <td><span>
                                                        <div class=" text-center">

                                                            @if (@$data->status != 5 && @$data->status > 0)
                                                            <button class="badge  badge-sm btn-warning col-12 p-2 mb-1"><a
                                                                class="text-dark text-center" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#orderDetails" >View
                                                                </a></button>
                                                                <button class="badge btn-warning  badge-sm col-12 p-2 mb-1"><a
                                                                    class="text-dark text-center"
                                                                    href="{{route('track-order')}}">Track</a></button>
                                                                <button class="badge bg-danger badge-sm col-12 p-2 mb-1"><a
                                                                        class="text-center text-dark"
                                                                        href="javascript:void(0)">Cancel</a></button>
                                                            @endif


                                                            @if (@$data->status == 5 || @$data->status == 0)
                                                            <button class="badge p-2 mb-1 btn-primary "><a
                                                                class="text-dark text-center" href="javascript:void(0)">View
                                                                </a></button>

                                                             @endif

                                                        </div>
                                                    </span>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table> --}}
                                @else
                                    <center>
                                        <h1>No Orders Found</h1>
                                    </center>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" wire:ignore.self id="orderDetails" tabindex="-1" data-keyboard="false"
        data-backdrop="static" role="dialog">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close qty_close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="details">
                                <center>
                                    <h6 class="text-uppercase">Order Details</h6>
                                </center>

                            </div>
                            <button wire:click="click">as</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        Livewire.on('order-cancelled', function() {
            Swal.fire(
                'Order Cancelled Successfully'
            )
            location.reload();
        });
        Livewire.on('order-returned', function() {
            Swal.fire(
                'Return Process Started. Our Executives will call you shortly!'
            )
            location.reload();
        });
        Livewire.on('cancel-alert', function() {
            Swal.fire({
                title: 'Do you want to Cancel the Order?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: 'No',
                customClass: {
                    actions: 'my-actions',
                    cancelButton: 'order-1 right-gap',
                    confirmButton: 'order-2',
                    denyButton: 'order-3',
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('confirmCancel');
                } else if (result.isDenied) {
                    // Swal.fire('Changes are not saved', '', 'info')
                }
            })
        })
        Livewire.on('return-alert', function() {
            Swal.fire({
                title: 'Do you want to Return this Order?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: 'No',
                customClass: {
                    actions: 'my-actions',
                    cancelButton: 'order-1 right-gap',
                    confirmButton: 'order-2',
                    denyButton: 'order-3',
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('confirmReturn');
                } else if (result.isDenied) {
                    // Swal.fire('Changes are not saved', '', 'info')
                }
            })
        })
    </script>
@endpush
