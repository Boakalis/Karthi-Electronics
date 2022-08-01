<div>
    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1>Order Details</h1>
            <p class="breadcrumbs"><span><a href="{{ route('dashboard') }}">Home</a></span>
                <span><i class=" mdi mdi-chevron-right"></i></span>Orders
            </p>
        </div>

        {{-- <div>
            <a href="{{route('data.create')}}"
                class="btn btn-primary">Add</a>
        </div> --}}
    </div>
    <div class="container">
        <h4 class="mb-2">Export Orders</h4>
        <form action="{{route('pdf-download')}}" method="post">
            @csrf
            <div class="row">
                <div id="reportrange" class="col-4 mx-3"
                    style="background: #fff; cursor: pointer; padding: 10px 10px; border: 1px solid #ccc;width:max-content">
                    <i class="fa fa-calendar"></i>&nbsp;
                    <span></span> <i class="fa fa-caret-down"></i>
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-6">
                            <select name="type" id=""  class="form-select   col-12">
                                <option value="1">
                                    Excel Spreadsheet
                                </option>
                                <option value="2">
                                    PDF
                                </option>
                            </select>
                        </div>
                        <div class="col-6">
                            <input type="hidden" id="start" name="start">
                            <input type="hidden" id="end" name="end">
                            <button type="submit" class="btn btn-primary btn-sm">Download</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <div class="row">
        @include('admin.layouts.error')
        <div class="col-12">
            <div class="card card-default">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    {{-- <th>S.No</th> --}}
                                    <th>OrderId</th>
                                    <th>User Name</th>
                                    <th>Amount</th>
                                    <th>Payment Type</th>
                                    <th>Order Date</th>
                                    <th>Delivered Date</th>
                                    <th>Assigned To</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (isset($datas) && !empty($datas))
                                    @foreach ($datas as $key => $data)
                                        <tr>
                                            {{-- <td>{{@$key +1}}</td> --}}
                                            <td onclick="openOrders({{ @$data->id }})">
                                                <a href="javascript:void(0)">
                                                    {{ Str::limit(@$data->orderId, 15, '...') }}
                                                </a>
                                            </td>
                                            <td>{{ @$data->user->name }}</td>
                                            <td>{{ @$data->amount }}</td>
                                            <td>{{ @$data->payment_type == 1 ? 'COD' : 'ONLINE' }}</td>
                                            <td>{{ \Carbon\Carbon::parse(@$data->order_date)->format('d-m-Y') }}</td>
                                            <td>{{ $data->delivery_date ? \Carbon\Carbon::parse(@$data->delivery_date)->format('d-m-Y') : 'NA' }}
                                            </td>
                                            <td>
                                                <select name="" {{ @$data->status >= 2 ? 'disabled' : '' }}
                                                    class="form-select" id="">
                                                    <option value="1">Owner</option>
                                                    <option value="0">Dealer</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="" onchange="status(event,{{ @$data->id }})"
                                                    class="form-select" id="">
                                                    <option {{ @$data->status == 0 ? 'selected' : '' }}
                                                        {{ @$data->status >= 5 ? 'disabled' : '' }} value="0">
                                                        Rejeccted</option>
                                                    <option {{ @$data->status == 1 ? 'selected' : '' }}
                                                        {{ @$data->status >= 2 ? 'disabled' : '' }} value="1">
                                                        Order Received</option>
                                                    <option {{ @$data->status == 2 ? 'selected' : '' }}
                                                        {{ @$data->status >= 5 ? 'disabled' : '' }} value="2">
                                                        Dispatching</option>
                                                    {{-- <option {{@$data->status == }} value="3">Order Received</option> --}}
                                                    <option {{ @$data->status >= 5 ? 'disabled' : '' }}
                                                        {{ @$data->status == 4 ? 'selected' : '' }} value="4">On
                                                        the way</option>
                                                    <option {{ @$data->status == 5 ? 'selected' : '' }}
                                                        {{ @$data->status >= 5 ? 'disabled' : '' }} value="5">
                                                        Delivered</option>

                                                </select>
                                            </td>
                                            <td>
                                                <a href="{{ route('invoice', @$data->id) }}"
                                                    class="btn btn-success my-2 btn-sm">View Invoice</a>
                                                <a href="javascript:void(0)"
                                                    onclick="invoicePrompt({{ @$data->id }})"
                                                    class="btn btn-success btn-sm my-2">Download Invoice</a>
                                                {{-- <a href="{{ route('pdf', @$data->id) }}"
                                                    class="btn btn-success btn-sm my-2">Download Invoice</a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                        <div class="">
                            @if (isset($datas) && !empty($datas))
                                {{ $datas->withQueryString()->links('pagination::bootstrap-5') }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade text-start" wire:ignore.self id="couponModal" tabindex="-1"
        aria-labelledby="couponModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="couponModalLabel">View Orders</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" style="display: none;"></div>
                    <div class="container ">
                        <div class="row">
                            @if (isset($orders) && !empty($orders))
                                @foreach ($orders as $item)
                                    <div class="my=2 row">
                                        <div class="mb-1 col-3">
                                            <h6>Product Details:</h6>
                                            <div class="row">
                                                <div class="col-4">
                                                    <img style="width: 50px;height:auto"
                                                        src="{{ asset(json_decode(@$item->product->images)[0]) }}"
                                                        alt="">
                                                </div>
                                                <div class="col-8">
                                                    <span>{{ @$item->product->name }}</span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="mb-1 tex-center col-3">
                                            <h6>Color: </h6>
                                            <div style="height: 20px;width:30px;background:{{ @$item->color_id }}">
                                            </div>

                                        </div>
                                        <div class="mb-1 col-3">
                                            <h6>Variant Details: </h6>
                                            <span>{{ @$item->product->is_products_variant != null ? @$item->variant->name : 'NA' }}</span>
                                        </div>
                                        <div class="mb-1 col-3">
                                            <h6>Quantity: </h6>
                                            <span>{{ @$item->qty }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade prompt" wire:ignore.self id="prompt" tabindex="-1" aria-labelledby="couponModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="couponModalLabel">Download Invoice</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" style="display: none;"></div>
                    <div class="container ">
                        <div class="row">
                            <label class="form-label" for="imei">IMEI NUMBER</label>
                            <input type="text" id="imei" class="form-control">
                            <input type="hidden" id="id" class="form-control">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="imei()" class="btn btn-primary">UPDATE</button>
                    <button type="button" onclick="download()" class="btn btn-danger">Dont Need</button>
                </div>
            </div>
        </div>
    </div>

</div>
@push('scripts')
    <script>
        function status(event, id) {
            console.log(event.target.value, id);
            Livewire.emit('orderId', id);
            Livewire.emit('statusChange', event.target.value);
        }

        Livewire.on('updated', function() {
            location.reload(true);
        })

        function openOrders(id) {
            Livewire.emit('get', id);
            $('.text-start').modal('show');
        }

        function invoicePrompt(id) {
            $('#id').val(id)
            $('#prompt').modal('show');
        }

        function imei() {

            var imei = $('#imei').val()
            var id = $('#id').val()
            console.log(imei)
            Livewire.emit('imei', imei);

            download();

        }

        function download() {
            var id = $('#id').val()
            Livewire.emit('download', id);
            $('#prompt').modal('hide')
            $('#imei').val('')
            $('#id').val('')
        }
    </script>

    <script type="text/javascript">
        $(function() {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                $('#start').val(start.format('YYYY-MM-DD'))
                $('#end').val(end.format('YYYY-MM-DD'))
            }

            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                }
            }, cb);

            cb(start, end);

        });
    </script>
@endpush
