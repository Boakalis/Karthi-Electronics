<div>
    <style>
        .danger-red{
            background-color: red;
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
                                    <table class="table ec-table">
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

                                                            @if (@$data->status !=5 && @$data->status >0)
                                                            <button class="badge  badge-sm btn-primary col-4 p-2 mb-1"><a
                                                                class="text-dark text-center" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#orderDetails" >View
                                                                </a></button>
                                                                <button class="badge btn-warning  badge-sm col-4 p-2 mb-1"><a
                                                                    class="text-dark text-center"
                                                                    href="{{route('track-order')}}">Track</a></button>
                                                                <button class="badge bg-danger badge-sm col-4 p-2 mb-1"><a
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
                                    </table>
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
    <div class="modal fade" wire:ignore.self id="orderDetails" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close qty_close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="details">
                                <center><h6 class="text-uppercase">Order Details</h6></center>

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

@endpush
