@extends('admin.layouts.master')
@section('content')
    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1>Order Details</h1>
            <p class="breadcrumbs"><span><a href="{{ route('dashboard') }}">Home</a></span>
                <span><i class=" mdi mdi-chevron-right"></i></span>Ordesssrs
            </p>
        </div>
        <div>
            <a href="{{ route('product.create') }}" class="btn btn-primary">
                Add
            </a>
        </div>
    </div>
    <div class="row">
        @include('admin.layouts.error')
        <div class="col-12">
            <div class="card card-default">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-data-table" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>OrderId</th>
                                    <th>User Name</th>
                                    <th>Amount</th>
                                    <th>Payment Type</th>
                                    <th>Order Date</th>
                                    <th>Assigned To</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($datas) && !empty($datas))
                                    @foreach ($datas as $key => $data)
                                        <tr>
                                            <td>{{ @$key + 1 }}</td>
                                            <td onclick="openOrders()">{{ @$data->orderId }}</td>
                                            <td>{{ @$data->user->name }}</td>
                                            <td>{{ @$data->amount }}</td>
                                            <td>{{ @$data->payment_type }}</td>
                                            <td>{{ @$data->order_date }}</td>
                                            <td>{{ @$data->user->name }}</td>
                                            <td>
                                                @if ($product->status != 2)
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            onclick="statusChange({{ @$product->id }})"
                                                            id="flexSwitchCheckChecked"
                                                            {{ @$product->status == 1 ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="flexSwitchCheckChecked"></label>
                                                    </div>
                                                @else
                                                    <badge
                                                        class="badge badge-{{ $product->status == 1 ? 'success' : ($product->status == 2 ? 'warning' : 'danger') }}">
                                                        {{ $product->status == 1 ? 'Active' : ($product->status == 2 ? 'Waiting for Approval' : 'Inactive') }}
                                                    </badge>
                                                @endif
                                            </td>
                                            <td id="status{{ $product->id }}">
                                                <badge
                                                    class="badge badge-{{ $product->status == 1 ? 'success' : ($product->status == 2 ? 'warning' : 'danger') }}">
                                                    {{ $product->status == 1 ? 'Active' : ($product->status == 2 ? 'Waiting for Approval' : 'Inactive') }}
                                                </badge>
                                            </td>
                                            <td>
                                                <div class=" mb-1">

                                                    <button type="button"
                                                        class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                        data-display="static">
                                                        <span class="sr-only">Info</span>
                                                    </button>

                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="{{ route('product.show', $product->slug) }}">View</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('product.edit', $product->slug) }}">Edit</a>
                                                        <a class="dropdown-item"
                                                            onclick="deleteData('{{ route('product.delete') }}','{{ @$product->id }}')"
                                                            href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('javascript')
    <script>
        function statusChange(id) {
            // let token = "{{ csrf_token() }}" ;
            $.ajax({
                type: 'POST',
                url: '/admin/change-status/' + id,
                data: {
                    '_token': "{{ csrf_token() }}"
                },
                success: function(response) {

                    if (response.status == 200) {
                        toastr.success('Status Updated Successfully');
                        if (response.currentStatus == 1) {

                            $('#status' + id).html('<badge class="badge badge-success">Active</badge>');
                        } else {
                            $('#status' + id).html('<badge class="badge badge-danger">InActive</badge>');

                        }
                    }
                    // else if(response.status == 0) {
                    //     toastr.error(' Product requires Atleast One variant');
                    // }
                    // else {
                    //     toastr.error('Something went wrong. Try again later');
                    // }
                }
            });
        }

      
    </script>
@endsection
