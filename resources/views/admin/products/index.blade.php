@extends('admin.layouts.master')
@section('content')
    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1>Product Details</h1>
            <p class="breadcrumbs"><span><a href="{{ route('dashboard') }}">Home</a></span>
                <span><i class=" mdi mdi-chevron-right"></i></span>Products
            </p>
        </div>
        <div>
            <a href="{{route('product.create')}}"
                class="btn btn-primary">Add</a>
        </div>
    </div>
    <div class="row">
        @include('admin.layouts.error')
        <div class="col-12">
            <div class="card card-default">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-data-table" class="table"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Dealer Price</th>
                                    @if (Auth::user()->user_type == 1)
                                    <th>Sale Price</th>
                                    @endif
                                    <th>Is Trending</th>
                                    <th>Is Featured</th>
                                    <th>Dealer Name</th>
                                    <th class="text-center">Is Variant Available</th>
                                    <th>Toggle Status</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (isset($products) && !empty($products))
                                    @foreach ($products as $product)
                                        <tr>
                                            <td><img class="tbl-thumb" src="{{asset($product->image)}}" alt="product-image" /></td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->dealer_price == null ? 'NA'  : $product->dealer_price }}</td>
                                            @if (Auth::user()->user_type == 1)
                                            <td>{{$product->sale_price == null ? 'NA' : $product->sale_price }}
                                            </td>
                                            @endif
                                            <td class="text-center"><span class="mdi {{$product->is_trending != null ?'mdi-check-circle text-success' : 'mdi-mixer text-danger'}} "></span>
                                            </td>
                                            <td class="text-center"><span class="mdi {{$product->is_featured != null ?'mdi-check-circle text-success' : 'mdi-mixer text-danger'}} "></span>
                                            </td>
                                            <td>{{$product->dealer->name}}</td>
                                            <td class="text-center"><span class="mdi {{$product->is_products_variant != null ?'mdi-check-circle text-success' : 'mdi-mixer text-danger'}} "></span>
                                            </td>
                                            <td>
                                                @if ($product->status !=2)

                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" onclick="statusChange({{@$product->id}})"
                                                        id="flexSwitchCheckChecked" {{@$product->status == 1 ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                                </div>
                                                @else
                                                <badge class="badge badge-{{$product->status == 1 ? 'success' : ($product->status == 2 ? 'warning' : 'danger')}}">{{$product->status == 1 ? 'Active' : ($product->status == 2 ? 'Waiting for Approval' : 'Inactive')}}</badge>
                                                @endif
                                            </td>
                                            <td id="status{{$product->id}}"><badge class="badge badge-{{$product->status == 1 ? 'success' : ($product->status == 2 ? 'warning' : 'danger')}}">{{$product->status == 1 ? 'Active' : ($product->status == 2 ? 'Waiting for Approval' : 'Inactive')}}</badge>
                                            </td>
                                            <td>
                                                <div class=" mb-1">

                                                    <button type="button"
                                                        class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" data-display="static">
                                                        <span class="sr-only">Info</span>
                                                    </button>

                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{route('product.show',$product->slug)}}">View</a>
                                                        <a class="dropdown-item" href="{{route('product.edit',$product->slug)}}">Edit</a>
                                                        <a class="dropdown-item" onclick="deleteData('{{route('product.delete')}}','{{@$product->id}}')" href="#">Delete</a>
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
        // let token = "{{csrf_token()}}" ;
        $.ajax({
            type:'POST',
            url: '/admin/change-status/'+id,
            data: {
                '_token' : "{{csrf_token()}}"
            },
            success:function(response){

                if (response.status == 200) {
                    toastr.success('Status Updated Successfully');
                    if (response.currentStatus == 1) {

                        $('#status'+id).html('<badge class="badge badge-success">Active</badge>');
                    } else {
                        $('#status'+id).html('<badge class="badge badge-danger">InActive</badge>');

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

