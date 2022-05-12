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
    <div class="row">
        @include('admin.layouts.error')
        <div class="col-12">
            <div class="card card-default">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="" class="table"
                            style="width:100%">
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
                                            <td>{{ Str::limit(@$data->orderId, 15, '...')  }}</td>
                                            <td>{{@$data->user->name}}</td>
                                            <td>{{@$data->amount}}</td>
                                            <td>{{@$data->payment_type == 1 ? 'COD' : 'ONLINE'}}</td>
                                            <td>{{ \Carbon\Carbon::parse(@$data->order_date)->format('d-m-Y') }}</td>
                                            <td>{{ $data->delivery_date ? \Carbon\Carbon::parse(@$data->order_date)->format('d-m-Y') : 'NA' }}</td>
                                            <td>
                                                <select name="" {{@$data->status >= 2 ? 'disabled' : ''}} class="form-select" id="">
                                                    <option value="1">Owner</option>
                                                    <option value="0">Dealer</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="" onchange="status(event,{{@$data->id}})" class="form-select" id="">
                                                    <option {{@$data->status == 0 ? 'selected' : '' }} {{@$data->status >= 5 ? 'disabled' : ''}} value="0">Rejeccted</option>
                                                    <option {{@$data->status == 1 ? 'selected' : ''}}  {{@$data->status >= 2 ? 'disabled' : ''}} value="1">Order Received</option>
                                                    <option {{@$data->status == 2 ? 'selected' : '' }} {{@$data->status >= 5 ? 'disabled' : ''}}  value="2">Dispatching</option>
                                                    {{-- <option {{@$data->status == }} value="3">Order Received</option> --}}
                                                    <option {{@$data->status >= 5 ? 'disabled' : ''}} {{@$data->status == 4 ? 'selected' : '' }} value="4">On the way</option>
                                                    <option {{@$data->status == 5 ? 'selected' : '' }} {{@$data->status >= 5 ? 'disabled' : ''}} value="5">Delivered</option>

                                                </select>
                                            </td>
                                            <td>
                                                <a href="{{route('invoice',@$data->id)}}" class="btn btn-success my-2 btn-sm" >View Invoice</a>
                                                <a href="{{route('pdf',@$data->id)}}" class="btn btn-success btn-sm my-2" >Download Invoice</a>
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

</div>
@push('scripts')
    <script>
        function status(event,id) {
           console.log(event.target.value , id);
           Livewire.emit('orderId',id);
           Livewire.emit('statusChange',event.target.value);
        }

        Livewire.on('updated',function(){
            location.reload(true);
        })


    </script>
@endpush
