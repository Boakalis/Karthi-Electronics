@extends('admin.layouts.master')
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Coupons</h2>
                        {{-- <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Coupons
                                </li>
                            </ol>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    <div class="dropdown">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="javascript:void(0)" data-bs-target="#couponModal" data-bs-toggle="modal" ><i class="me-1" data-feather="plus-square"></i><span class="align-middle">Create</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="content-body">
     <!-- Basic Tables start -->
     <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h4 class="card-title"></h4>
                </div> --}}
                <div class="card-body">
                        <div class="table-responsive table-bordered">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Description</th>
                                        <th>Promo-Code</th>
                                        {{-- <th>Min Amount(To Apply)</th> --}}
                                        {{-- <th>Type</th>
                                        <th>Product</th> --}}
                                        <th>Valid Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!$coupons->isEmpty())
                                        @foreach ($coupons as $key => $coupon)
                                            <tr>
                                                <td>
                                                    <span class="fw-bold">{{ $key+1 }}</span>
                                                </td>
                                                <td>
                                                    <span class="fw-bold">{{ $coupon->description }}</span>
                                                </td>
                                                <td>
                                                    <span class="fw-bold">{{ $coupon->code }}</span>
                                                </td>
                                                {{-- <td>
                                                    <span class="fw-bold">{{ $coupon->min_amount }}</span>
                                                </td> --}}
                                                {{-- <td>
                                                    <span class="fw-bold">{{ $coupon->type }}</span>
                                                </td> --}}
                                                {{-- <td>
                                                    <span class="fw-bold">{{ $coupon->product_id }}</span>
                                                </td> --}}
                                                <td>
                                                    <span class="fw-bold">{{ $coupon->valid_date }}</span>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <div class="form-check form-check-success form-switch">
                                                            <input type="checkbox" {{(@$coupon->status == 1)?'checked': ''}} class="form-check-input coupon-status" data-id={{@$coupon->id}} id="switch{{@$coupon->id}}" />
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="javascript:void(0)" onClick="viewCoupon({{@$coupon->id}})" class="btn btn-warning btn-sm"><i class=' text-danger fa fa-eye'></i></a>
                                                        <a href="javascript:void(0)" onClick="editCoupon({{@$coupon->id}})" class="btn btn-primary btn-sm "><i  class="text-danger fas fa-edit"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                            <tr>
                                                <td colspan="6"><center>No coupons Found (S)</center></td>
                                            </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-between mx-0 row mt-1">
                            <div class="col-sm-12 col-md-6">
                                Showing {{ $coupons->firstItem() }} to {{ $coupons->lastItem() }} of {{ $coupons->total() }} entries
                            </div>
                            <div class="col-sm-12 col-md-6 col-auto">
                                {{ $coupons->links( ) }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic Tables end -->
</div>
</div>
{{-- @livewire('admin.modal', ['user' => $user], key($user->id)) --}}

<div class="modal fade text-start" wire:ignore.self  id="couponModal" tabindex="-1" aria-labelledby="couponModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg  modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="couponModalLabel">Create Coupon</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" name="couponStore" id="couponStore">
            <div class="modal-body">
                <div class="alert alert-danger" style="display: none;"></div>
                <div class="container " >
                    <div class="row" >
                        <div class="mb-1 col-4 ">
                            <label>Promo-Code: </label>
                            <input type="text" name="code" placeholder="Enter Promocode" wire:model="code" class="form-control" />
                            @error('code') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1 col-4 ">
                            <label>Description:</label>
                            <textarea class="form-control"  name="description" wire:model="description" ></textarea>
                            @error('description') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1 col-4 ">
                            <label>Min.Amount for using coupon: </label>
                            <input type="text" name="min_amount" placeholder="Enter Min.Amount" wire:model="min_amount" class="form-control" />
                            @error('min_amount') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1 col-4 ">
                            <label>Type: </label>
                            <select  name="type" wire:model="type" class="form-control type" id="type" >
                                <option value="1" selected >Percentage</option>
                                <option value="2"  >Amount</option>
                            </select>
                        </div>
                        <div class="mb-1 col-4 percentage " id="percentage" >
                                <label >Enter Percentage: </label>
                                <input type="text" name="percentage" wire:model="percentage" placeholder="Enter Percentage for coupon" class="form-control" />
                                @error('percentage') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1  col-4 percentage " id="max_amount" >
                                <label >Maximum Amount: </label>
                                <input type="text" name="max_amount" wire:model="max_amount"  placeholder="Maximum Amount for coupon" class="form-control" />
                                @error('max_amount') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1 col-4 amount " id="amount" >
                            <label>Enter Amount: </label>
                            <input type="text" name="amount" placeholder="Enter Amount for coupon" wire:model="amount"  class="form-control" />
                            @error('amount') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1 col-4 offer"  >
                            <label>Offer Type: </label>
                            <select  name="offer_type" id="offer_type"  class="form-control offer-type " wire:model="offer_type" >
                                <option value="1" selected >New</option>
                                <option value="2"  >Category</option>
                                <option value="3"  >Product</option>
                            </select>
                            @error('offer_type') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1 col-4 category">
                            <label>Select Category: </label>
                            <select  name="category_id"  class="form-control" wire:model="category_id" >
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}"  >{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1 col-4  product">
                            <label>Select Product: </label>
                            <select  name="product_id"  class="form-control" wire:model="product_id" >
                                @foreach ($products as $product)
                                <option value="{{$product->id}}"  >{{$product->english_name}}</option>
                                @endforeach
                            </select>
                            @error('product_id') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1  col-4">
                            <label >User Limit: </label>
                            <input type="text" name="user_limit" placeholder="Maximum Amount for coupon" wire:model="user_limit" class="form-control" />
                            @error('user_limit') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1  col-4">
                            <label >Coupon Limit: </label>
                            <input type="text" name="max_limit" placeholder="Maximum Amount for coupon" class="form-control" wire:model="max_limit" />
                            @error('max_limit') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1 col-4 ">
                            <label>Expiry Date: </label>
                            <input type="text" wire:model="valid_date" name="valid_date" placeholder="Exipiry-Date" class="form-control flatpickr-basic flatpickr-input" />
                            @error('valid_date') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}" id="">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Submit</button>
            </div>
        </form>
    </div>
</div>
</div>

{{-- Edit Modal --}}
<div class="modal fade text-start" wire:ignore.self  id="couponModalEdit" tabindex="-1" aria-labelledby="couponModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg  modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="couponModalLabel">Edit Coupon</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" name="couponUpdate" id="couponUpdate">
            <div class="modal-body">
                <div class="alert alert-danger" style="display: none;"></div>
                <div class="container " >
                    <div class="row" >
                        <div class="mb-1 col-4 ">
                            <label>Promo-Code: </label>
                            <input type="text" name="code" placeholder="Enter Promocode" wire:model="code" id="nameEdit" class="form-control" />
                            @error('code') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1 col-4 ">
                            <label>Description:</label>
                            <textarea class="form-control"  name="description" wire:model="description" id="descriptionEdit" ></textarea>
                            @error('description') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1 col-4 ">
                            <label>Min.Amount for using coupon: </label>
                            <input type="text" name="min_amount" placeholder="Enter Min.Amount" wire:model="min_amount" id="min_amountEdit"  class="form-control" />
                            @error('min_amount') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1 col-4 ">
                            <label>Type: </label>
                            <select  name="type" wire:model="type" class="form-control type" id="typeEdit" >
                                <option value="1" selected >Percentage</option>
                                <option value="2"  >Amount</option>
                            </select>
                        </div>
                        <div class="mb-1 col-4 percentage-edit "  >
                                <label >Enter Percentage: </label>
                                <input type="text" name="percentage" wire:model="percentage" placeholder="Enter Percentage for coupon" class="form-control" id="percentageEdit" />
                                @error('percentage') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1  col-4 percentage-edit "  >
                                <label >Maximum Amount: </label>
                                <input type="text" name="max_amount" wire:model="max_amount"  placeholder="Maximum Amount for coupon" class="form-control" id="max_amountEdit" />
                                @error('max_amount') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1 col-4 amount-edit "  >
                            <label>Enter Amount: </label>
                            <input type="text" name="amount" placeholder="Enter Amount for coupon" wire:model="amount"  class="form-control" id="amountEdit" />
                            @error('amount') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1 col-4 offer"  >
                            <label>Offer Type: </label>
                            <select  name="offer_type" id="offer_typeEdit"  class="form-control offer-type " wire:model="offer_type" >
                                <option value="1" selected >New</option>
                                <option value="2"  >Category</option>
                                <option value="3"  >Product</option>
                            </select>
                            @error('offer_type') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1 col-4 category-edit">
                            <label>Select Category: </label>
                            <select  name="category_id"  class="form-control" wire:model="category_id" id="categoryIdEdit" >
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}"  >{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1 col-4  product-edit">
                            <label>Select Product: </label>
                            <select  name="product_id"  class="form-control" wire:model="product_id" id="productIdEdit" >
                                @foreach ($products as $product)
                                <option value="{{$product->id}}"  >{{$product->english_name}}</option>
                                @endforeach
                            </select>
                            @error('product_id') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1  col-4">
                            <label >User Limit: </label>
                            <input type="text" name="user_limit" placeholder="Maximum Amount for coupon" wire:model="user_limit" class="form-control" id="userLimitEdit"/>
                            @error('user_limit') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1  col-4">
                            <label >Coupon Limit: </label>
                            <input type="text" name="max_limit" placeholder="Maximum Amount for coupon" class="form-control" wire:model="max_limit" id="maxLimitEdit" />
                            @error('max_limit') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1 col-4 ">
                            <label>Expiry Date: </label>
                            <input type="text" wire:model="valid_date" name="valid_date" placeholder="Exipiry-Date" class="form-control flatpickr-basic flatpickr-input" id="validDateEdit" />
                            @error('valid_date') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <input type="hidden" name="id" id="couponId" />
                        <input type="hidden" name="_token" value="{{csrf_token()}}" id="">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Submit</button>
            </div>
        </form>
    </div>
</div>
</div>

{{-- View Modal --}}
<div class="modal fade text-start" wire:ignore.self  id="couponModalView" tabindex="-1" aria-labelledby="couponModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg  modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="couponModalLabelView">View Coupon</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" name="couponUpdate" id="couponUpdate">
            <div class="modal-body">
                <div class="alert alert-danger" style="display: none;"></div>
                <div class="container " >
                    <div class="row" >
                        <div class="mb-1 col-4 ">
                            <label>Promo-Code: </label>
                            <input type="text" name="code" placeholder="Enter Promocode" wire:model="code" id="nameview" class="form-control" />
                            @error('code') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1 col-4 ">
                            <label>Description:</label>
                            <textarea class="form-control"  name="description" wire:model="description" id="descriptionview" ></textarea>
                            @error('description') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1 col-4 ">
                            <label>Min.Amount for using coupon: </label>
                            <input type="text" name="min_amount" placeholder="Enter Min.Amount" wire:model="min_amount" id="min_amountview"  class="form-control" />
                            @error('min_amount') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1 col-4 ">
                            <label>Type: </label>
                            <select  name="type" wire:model="type" disabled class="form-control type" id="typeview" >
                                <option value="1" selected >Percentage</option>
                                <option value="2"  >Amount</option>
                            </select>
                        </div>
                        <div class="mb-1 col-4 percentage-view "  >
                                <label >Enter Percentage: </label>
                                <input type="text" name="percentage" wire:model="percentage" placeholder="Enter Percentage for coupon" class="form-control" id="percentageview" />
                                @error('percentage') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1  col-4 percentage-view "  >
                                <label >Maximum Amount: </label>
                                <input type="text" name="max_amount" wire:model="max_amount"  placeholder="Maximum Amount for coupon" class="form-control" id="max_amountview" />
                                @error('max_amount') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1 col-4 amount-view "  >
                            <label>Enter Amount: </label>
                            <input type="text" name="amount" placeholder="Enter Amount for coupon" wire:model="amount"  class="form-control" id="amountview" />
                            @error('amount') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1 col-4 offer"  >
                            <label>Offer Type: </label>
                            <select  name="offer_type" id="offer_typeview" disabled  class="form-control offer-type " wire:model="offer_type" >
                                <option value="1" selected >New</option>
                                <option value="2"  >Category</option>
                                <option value="3"  >Product</option>
                            </select>
                            @error('offer_type') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1 col-4 category-view">
                            <label>Select Category: </label>
                            <select  name="category_id"  disabled class="form-control" wire:model="category_id" id="categoryIdview" >
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}"  >{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1 col-4  product-view">
                            <label>Select Product: </label>
                            <select  name="product_id" disabled  class="form-control" wire:model="product_id" id="productIdview" >
                                @foreach ($products as $product)
                                <option value="{{$product->id}}"  >{{$product->english_name}}</option>
                                @endforeach
                            </select>
                            @error('product_id') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1  col-4">
                            <label >User Limit: </label>
                            <input type="text" name="user_limit" placeholder="Maximum Amount for coupon" wire:model="user_limit" class="form-control" id="userLimitview"/>
                            @error('user_limit') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1  col-4">
                            <label >Coupon Limit: </label>
                            <input type="text" name="max_limit" placeholder="Maximum Amount for coupon" class="form-control" wire:model="max_limit" id="maxLimitview" />
                            @error('max_limit') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-1 col-4 ">
                            <label>Expiry Date: </label>
                            <input type="text" wire:model="valid_date" name="valid_date" placeholder="Exipiry-Date" class="form-control " id="validDateview" />
                            @error('valid_date') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <input type="hidden" name="id" id="couponId" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

</div>
@endsection
@push('scripts')

<script>
    $("#couponStore").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('admin.coupon.store') }}",
            type: "post",
            data: $(this).serialize(),
            beforeSend: function () {
                // Show image container
                $("#loader").show();
            },
            success: function (response) {
                if (response.errors) {
                    $(".alert-danger").html("");
                    $.each(response.errors, function (key, value) {
                        $(".alert-danger").show();
                        $(".alert-danger").append("<li>" + value + "</li>");
                    });
                    setTimeout(function(){
                          $(".alert-danger").hide();
                    }, 3000);
                } else {
                    $(".alert-danger").hide();
                    $("#couponModal").modal("hide");
                    location.reload(true);
                }
            },
            complete: function (response) {
                $("#loader").hide();
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
</script>

<script>
    $("#couponUpdate").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('admin.coupon.update') }}",
            type: "post",
            data: $(this).serialize(),
            beforeSend: function () {
                // Show image container
                $("#loader").show();
            },
            success: function (response) {
                if (response.errors) {
                    $(".alert-danger").html("");
                    $.each(response.errors, function (key, value) {
                        $(".alert-danger").show();
                        $(".alert-danger").append("<li>" + value + "</li>");
                    });
                    setTimeout(function(){
                          $(".alert-danger").hide();
                    }, 3000);
                } else {
                    $(".alert-danger").hide();
                    $("#couponModalEdit").modal("hide");
                    location.reload(true);
                }
            },
            complete: function (response) {
                $("#loader").hide();
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
</script>


<script>

   $('.delete').click(function(e){
    e.preventDefault();
    var url= $(this).data('href');
    Swal.fire({
        title: `Are you sure to delete?`,
        text: "If you delete this, it will be gone forever.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        customClass: {
          confirmButton: 'btn btn-primary',
          cancelButton: 'btn btn-outline-danger ms-1'
        },
        buttonsStyling: false
      }).then(function (result) {
            if(result.value) {
                if (result.isConfirmed){
                    window.location.href = url;
                }
            }
      });
   })

</script>
<script>
    $('.coupon-status').on('change', function(){
    var id=$(this).attr('data-id');
    var value = this.checked ? 1 : 0;
    $.ajax({
        type:"POST",
        url:"{{route('admin.coupon.status')}}",
        dataType: 'json',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data:{'value':value,
              'id' : id ,
              'coupon': 1,
        },
        success:(function(result){
            if (result.status == 407) {
                    Swal.fire({
                    title: `Oops`,
                    text: "Coupon code already in active disable it and try again",
                    icon: 'warning',
                    })
                    location.reload();
                } else {
                    $('#success').css("display","block");
                    $("#success").delay(1500).fadeOut(300);
                }
        })
    });
    });
</script>

<script>
       let val = $("#type :selected").val();
       if (val == 1) {
        $('.percentage').css('display','block');
        $('.amount').css('display','none');
       }else{
        $('.percentage').css('display','none');
        $('.amount').css('display','block');
       }
</script>

<script>
       let offer_value = $("#offer_type :selected").val();
       if (offer_value == 2) {
        $('.category').css('display','block');
        $('.product').css('display','none');
       }else if(offer_value == 3){
        $('.category').css('display','none');
        $('.product').css('display','block');
       }else{
        $('.category').css('display','none');
        $('.product').css('display','none');
       }
</script>

<script>
    $('.type').on('change',function(){
        let val = $('#type').val();
        if (val == 1) {
            $('.percentage').css('display','block');
        $('.amount').css('display','none');
        }else{
            $('.percentage').css('display','none');
            $('.amount').css('display','block');
        }
    });
</script>

<script>
    $('#offer_type').on('change',function(){
        let offer_value = $('#offer_type').val();
        if (offer_value == 1) {
            $('.category').css('display','none');
            $('.product').css('display','none');
        }else if(offer_value == 2){
            $('.product').css('display','none');
            $('.category').css('display','block');
        }else{
            $('.product').css('display','block');
            $('.category').css('display','none');
        }
    });
</script>

<script>
    function editCoupon(id) {
        $.get("/admin/edit-coupon/" + id, function (coupon) {

            $('#nameEdit').val(coupon.data.code);
            $('#descriptionEdit').val(coupon.data.description);
            $('#min_amountEdit').val(coupon.data.min_amount);
            $("#typeEdit").val(coupon.data.type).attr("selected","selected");
            if (coupon.data.type == 1) {
                $('.percentage-edit').css('display','block');
                $('.amount-edit').css('display','none');
            }else{
                $('.percentage-edit').css('display','none');
                $('.amount-edit').css('display','block');
            }
            $('#percentageEdit').val(coupon.data.percentage);
            $('#max_amountEdit').val(coupon.data.max_amount);
            $('#amountEdit').val(coupon.data.amount);
            $("#offer_typeEdit").val(coupon.data.offer_type).attr("selected","selected");
            if (coupon.data.offer_type == 2) {
                $('.category-edit').css('display','block');
                $('.product-edit').css('display','none');
                $("#categoryIdEdit").val(coupon.data.category_id).attr("selected","selected");
            }else if(coupon.data.offer_type == 3){
                $('.category-edit').css('display','none');
                $('.product-edit').css('display','block');
                $("#productIdEdit").val(coupon.data.product_id).attr("selected","selected");
            }else{
                $('.category-edit').css('display','none');
                $('.product-edit').css('display','none');
            }
            $('#userLimitEdit').val(coupon.data.user_limit);
            $('#maxLimitEdit').val(coupon.data.max_limit);
            $('#validDateEdit').val(coupon.data.valid_date);
            $('#couponId').val(coupon.data.id);
            $('#couponModalEdit').modal('show');
        });
    }
</script>

<script>
    function viewCoupon(id) {
        $.get("/rrkadminmanager/edit-coupon/" + id, function (coupon) {

            $('#nameview').val(coupon.data.code);
            document.getElementById("nameview").readOnly = true
            $('#descriptionview').val(coupon.data.description);
            document.getElementById("descriptionview").readOnly = true
            $('#min_amountview').val(coupon.data.min_amount);
            document.getElementById("min_amountview").readOnly = true
            $("#typeview").val(coupon.data.type).attr("selected","selected");
            $("#typeview").attr("readOnly","readOnly");
            if (coupon.data.type == 1) {
                $('.percentage-view').css('display','block');
                $('.amount-view').css('display','none');
            }else{
                $('.percentage-view').css('display','none');
                $('.amount-view').css('display','block');
            }
            $('#percentageview').val(coupon.data.min_amount);
            document.getElementById("percentageview").readOnly = true
            $('#max_amountview').val(coupon.data.min_amount);
            document.getElementById("max_amountview").readOnly = true
            $('#amountview').val(coupon.data.min_amount);
            document.getElementById("amountview").readOnly = true
            $("#offer_typeview").val(coupon.data.offer_type).attr("selected","selected");
            $("#offer_typeview").attr("readOnly","readOnly");
            if (coupon.data.offer_type == 2) {
                $('.category-view').css('display','block');
                $('.product-view').css('display','none');
                $("#categoryIdview").val(coupon.data.category_id).attr("selected","selected");
                $("#categoryIdview").attr("readOnly","readOnly");

            }else if(coupon.data.offer_type == 3){
                $('.category-view').css('display','none');
                $('.product-view').css('display','block');
                $("#productIdview").val(coupon.data.product_id).attr("selected","selected");
                $("#productIdview").attr("readOnly","readOnly");

            }else{
                $('.category-view').css('display','none');
                $('.product-view').css('display','none');
            }
            $('#userLimitview').val(coupon.data.user_limit);
            document.getElementById("userLimitview").readOnly = true
            $('#maxLimitview').val(coupon.data.max_limit);
            document.getElementById("maxLimitview").readOnly = true
            $('#validDateview').val(coupon.data.valid_date);
            document.getElementById("validDateview").readOnly = true

            $('#couponId').val(coupon.data.id);
            document.getElementById("couponId").readOnly = true
            $('#couponModalView').modal('show');
        });
    }
</script>


@endpush
