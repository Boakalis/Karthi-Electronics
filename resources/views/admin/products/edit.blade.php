@extends('admin.layouts.master') @section('content')
<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
    <div>
        <h1>Edit Product</h1>
        <p class="breadcrumbs">
            <span><a href="{{route('dashboard')}}">Home</a></span> <span><i class="mdi mdi-chevron-right"></i></span>Product
        </p>
    </div>
    {{--
    <div>
        <a href="product-list.html" class="btn btn-primary"> View All</a>
    </div>
    --}}
</div>
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                {{--
                <h2>Add Product</h2>
                --}}
            </div>

            <div class="card-body">
                <div class="row ec-vendor-uploads">
                    <div class="col-lg-12">
                        <div class="ec-vendor-upload-detail">
                            <form action="{{ route('product.update',$data->slug) }}" class="row g-3" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-4">
                                        <div class="ec-vendor-img-upload">
                                            <div class="ec-vendor-main-img">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type="file" name="image" id="imageUpload"  class="ec-image-upload" accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"><img src="{{ asset('admin-assets/assets/img/icons/edit.svg') }}" class="svg_img header_svg" alt="edit" /></label>
                                                    </div>
                                                    <div class="avatar-preview ec-preview">
                                                        <div class="imagePreview ec-div-preview">
                                                            <img class="ec-image-preview" src="{{ asset($data->image) }}" alt="edit" />
                                                        </div>
                                                    </div>
                                                </div>
                                                @php
                                                    $images = json_decode($data->images);
                                                @endphp
                                                <div class="thumb-upload-set colo-md-12">
                                                    <div class="thumb-upload">
                                                        <div class="thumb-edit">
                                                            <input type="file" name="images[]" id="thumbUpload01" class="ec-image-upload" accept=".png, .jpg, .jpeg" />
                                                            <label for="imageUpload"><img src="{{ asset('admin-assets/assets/img/icons/edit.svg') }}" class="svg_img header_svg" alt="edit" /></label>
                                                        </div>
                                                        <div class="thumb-preview ec-preview">
                                                            <div class="image-thumb-preview">
                                                                <img class="image-thumb-preview ec-image-preview" src="{{ asset( @$images[0] ? @$images[0] : 'admin-assets/assets/img/products/vender-upload-thumb-preview.jpg' )  }}" alt="edit" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="thumb-upload">
                                                        <div class="thumb-edit">
                                                            <input type="file" name="images[]" id="thumbUpload02" class="ec-image-upload" accept=".png, .jpg, .jpeg" />
                                                            <label for="imageUpload"><img src="{{ asset('admin-assets/assets/img/icons/edit.svg') }}" class="svg_img header_svg" alt="edit" /></label>
                                                        </div>
                                                        <div class="thumb-preview ec-preview">
                                                            <div class="image-thumb-preview">
                                                                <img class="image-thumb-preview ec-image-preview" src="{{ asset( @$images[1] ? @$images[1] : 'admin-assets/assets/img/products/vender-upload-thumb-preview.jpg' )  }}" alt="edit" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="thumb-upload">
                                                        <div class="thumb-edit">
                                                            <input type="file" id="thumbUpload03" name="images[]" class="ec-image-upload" accept=".png, .jpg, .jpeg" />
                                                            <label for="imageUpload"><img src="{{ asset('admin-assets/assets/img/icons/edit.svg') }}" class="svg_img header_svg" alt="edit" /></label>
                                                        </div>
                                                        <div class="thumb-preview ec-preview">
                                                            <div class="image-thumb-preview">
                                                                <img class="image-thumb-preview ec-image-preview" src="{{ asset( @$images[2] ? @$images[2] : 'admin-assets/assets/img/products/vender-upload-thumb-preview.jpg' )  }}" alt="edit" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="thumb-upload">
                                                        <div class="thumb-edit">
                                                            <input type="file" name="images[]" id="thumbUpload04" class="ec-image-upload" accept=".png, .jpg, .jpeg" />
                                                            <label for="imageUpload"><img src="{{ asset('admin-assets/assets/img/icons/edit.svg') }}" class="svg_img header_svg" alt="edit" /></label>
                                                        </div>
                                                        <div class="thumb-preview ec-preview">
                                                            <div class="image-thumb-preview">
                                                                <img class="image-thumb-preview ec-image-preview" src="{{ asset( @$images[3] ? @$images[3] : 'admin-assets/assets/img/products/vender-upload-thumb-preview.jpg' )  }}" alt="edit" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="thumb-upload">
                                                        <div class="thumb-edit">
                                                            <input type="file" id="thumbUpload05" name="images[]" class="ec-image-upload" accept=".png, .jpg, .jpeg" />
                                                            <label for="imageUpload"><img src="{{ asset('admin-assets/assets/img/icons/edit.svg') }}" class="svg_img header_svg" alt="edit" /></label>
                                                        </div>
                                                        <div class="thumb-preview ec-preview">
                                                            <div class="image-thumb-preview">
                                                                <img class="image-thumb-preview ec-image-preview" src="{{ asset( @$images[4] ? @$images[4] : 'admin-assets/assets/img/products/vender-upload-thumb-preview.jpg' )  }}" alt="edit" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="thumb-upload">
                                                        <div class="thumb-edit">
                                                            <input type="file" id="thumbUpload06" class="ec-image-upload" accept=".png, .jpg, .jpeg" />
                                                            <label for="imageUpload"><img src="{{ asset('admin-assets/assets/img/icons/edit.svg') }}" class="svg_img header_svg" alt="edit" /></label>
                                                        </div>
                                                        <div class="thumb-preview ec-preview">
                                                            <div class="image-thumb-preview">
                                                                <img class="image-thumb-preview ec-image-preview" src="{{ asset( @$images[5] ? @$images[5] : 'admin-assets/assets/img/products/vender-upload-thumb-preview.jpg' )  }}" alt="edit" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8 row">
                                        @if($errors->any())
                                            <div class="alert alert-danger">
                                                <p><strong>Opps Something went wrong</strong></p>
                                                <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="col-6">
                                            <label for="name" class="form-label">Product name</label>
                                            <input type="text" name="name" required placeholder="Enter Product Name" class="form-control" value="{{@$data->name}}" id="name" />
                                            {{-- @if ($errors->has('name'))
                                                <small class="text-danger">{{$errors->first('name')}}</small>
                                            @endif --}}
                                        </div>
                                        @if (Auth::user()->user_type ==1)
                                        <div class="col-lg-6">
                                            <div class="form-group mb-4">
                                                <label for="serviceArea">Select Dealers</label>
                                                <select name="dealer_id" id="select2Modal"  class=" form-control ">
                                                    @if (isset($dealers) && !empty($dealers))
                                                        @foreach ($dealers as $dealer)
                                                            <option  value="{{ $dealer->id }}" {{$dealer->id == $data->dealer_id ? 'selected':''}}  >{{ $dealer->name }}</option>
                                                        @endforeach

                                                    @endif
                                                </select>
                                                {{-- @if ($errors->has('dealer_id'))
                                                <span class="text-danger">{{ $errors->first('dealer_id') }}</span>
                                            @endif --}}
                                            </div>
                                        </div>
                                        @endif
                                        <div class="col-6">
                                            <label class="form-label">Select Categories</label>
                                            <select name="subcategory_id" required id="categories" class="form-select">
                                                @if (isset($categories) && !empty($categories)) @foreach ($categories as $category)
                                                <optgroup label="{{ @$category->name }}">
                                                    @if (isset($category->subcategory) && !empty($category->subcategory))
                                                     @foreach ($category->subcategory as $subcategory)
                                                    <option value="{{ $subcategory->id }}" {{$subcategory->id == $data->subcategory_id ? 'selected' : ''}}  > {{ $subcategory->name }}</option>
                                                    @endforeach @endif
                                                </optgroup>
                                                @endforeach @endif
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Product Description</label>
                                            <textarea  class="form-control tinymce-editor" name="description"> {{@$data->description}} </textarea>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <label class="form-label">Is Product had variants?</label>
                                            <div class="form-check form-check-inline">
                                                <input  type="checkbox" onclick="variantEvent(event)" name="is_products_variant" id="productVariant"  {{$data->is_products_variant == 1 ? 'checked' : ''}} value="{{$data->is_products_variant == 1 ? '1' : '0'}}" />
                                                <label></label>
                                            </div>
                                        </div>
                                        <div class="col-6 normal">
                                            <label for="dealer" class="col-12 col-form-label">Dealer Price <span>(In &#8377; )</span></label>
                                            <div class="col-12">
                                                <input  id="dealer" value="{{@$data->dealer_price}}" name="dealer_price" class="form-control" type="number" />
                                            </div>
                                        </div>
                                        @if (Auth::user()->user_type ==1)
                                            <div class="col-6 normal">
                                                <label for="sale" class="col-12 col-form-label">Sale Price <span>(In &#8377; )</span></label>
                                                <div class="col-12">
                                                    <input id="sale" name="sale_price" value="{{@$data->sale_price}}" class="form-control" type="number" />
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-12 my-5 variant d-none">
                                            <div id="repeater">
                                                <!-- Repeater Heading -->
                                                <div class="repeater-heading col-12">
                                                    <label class="form-label">
                                                        Variants
                                                        <button type="button" class="btn btn-primary btn-sm float-right repeater-add-btn">
                                                            Add
                                                        </button>
                                                    </label>
                                                </div>
                                                <div class="clearfix"></div>
                                                @if (isset($data->variants) && !empty($data->variants))
                                                @foreach ($data->variants as $key => $variant)
                                                    <div class="item" id="variant{{$variant->id}}">

                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <label for="variant" class="col-12 col-form-label">Varaint Name <span>(In &#8377; )</span></label>
                                                                <div class="col-12">
                                                                    <input id="variant" value="{{$variant->name}}" name="variants_old[{{$key}}][name]" class="form-control"  type="text" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="dp" class="col-12 col-form-label">Dealer Price<span>(In &#8377; )</span></label>
                                                                <div class="col-12">
                                                                    <input id="dp"  value="{{$variant->dealer_price}}"
                                                                    name="variants_old[{{$key}}][dealer_price]" class="form-control"  type="number" />
                                                                </div>
                                                            </div>
                                                            @if (AUth::user()->user_type ==1)
                                                            <div class="col-md-3">
                                                                <label for="sp" class="col-12 col-form-label">Seller Price<span>(In &#8377; )</span></label>
                                                                <div class="col-12">
                                                                    <input id="sp"  value="{{$variant->seller_price}}"  name="variants_old[{{$key}}][sale_price]" class="form-control"  type="number" />
                                                                </div>
                                                            </div>
                                                            @endif
                                                            <input id=""  value="{{$variant->id}}"  name="variants_old[{{$key}}][id]" class="form-control"  type="hidden" />

                                                            <div class="col-md-3">
                                                                <label for="sp" class="col-12 col-form-label">Status</label>
                                                                <div class="col-12">
                                                                    <select name="variants_old[{{$key}}][status]" id="" class=" form-control ">
                                                                    <option value="1" {{$variant->status ==1 ? 'selected' : ''}}>Active</option>
                                                                    <option value="0" {{$variant->status == 0 ? 'selected' : ''}}  >Inactive</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <!-- Repeater Remove Btn -->

                                                        <div class="pull-right repeater-remove-btn">
                                                            <button id="remove-btn" class="btn btn-danger btn-sm" type="button" onClick="deleteVariant({{$variant->id}})">
                                                                Remove
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                @endif
                                                <!-- Repeater Items -->
                                                <div class="items" data-group="variants">
                                                    <!-- Repeater Content -->

                                                    <div class="item-content">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <label for="variant" class="col-12 col-form-label">Varaint Name <span>(In &#8377; )</span></label>
                                                                <div class="col-12">
                                                                    <input id="variant" data-name="variant_name" class="form-control"  type="text" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="dp" class="col-12 col-form-label">Dealer Price<span>(In &#8377; )</span></label>
                                                                <div class="col-12">
                                                                    <input id="dp" data-name="dealer_prices" class="form-control"  type="number" />
                                                                </div>
                                                            </div>
                                                            @if (AUth::user()->user_type ==1)
                                                            <div class="col-md-3">
                                                                <label for="sp" class="col-12 col-form-label">Seller Price<span>(In &#8377; )</span></label>
                                                                <div class="col-12">
                                                                    <input id="sp" data-name="sale_prices" class="form-control"  type="number" />
                                                                </div>
                                                            </div>
                                                            @endif
                                                            <div class="col-md-3">
                                                                <label for="sp" class="col-12 col-form-label">Status</label>
                                                                <div class="col-12">
                                                                    <select data-name="status" id="" class=" form-control ">
                                                                    <option value="1">Active</option>
                                                                    <option value="0">Inactive</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Repeater Remove Btn -->
                                                    <div class="pull-right repeater-remove-btn">
                                                        <button id="remove-btn" class="btn btn-danger btn-sm" type="button" onClick="$(this).parents('.items').remove();">
                                                            Remove
                                                        </button>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 mb-25 mt-1">
                                            <label class="form-label">Colors </label>
                                            <div class="row">
                                                @php
                                                    $color = json_decode($data->colors);
                                                @endphp

                                                <input type="color" name="colors[]" value="{{$color[0]}}"  class="form-control form-control-color" id="exampleColorInput1" title="Choose your color" />
                                                <input type="color" name="colors[]" value="{{$color[1]}}" class="form-control form-control-color" id="exampleColorInput2" title="Choose your color" />
                                                <input type="color" name="colors[]" class="form-control  form-control-color" id="exampleColorInput3" value="{{$color[2]}}" title="Choose your color" />
                                                <input type="color" name="colors[]" value="{{$color[3]}}" class="form-control form-control-color" id="exampleColorInput4" title="Choose your color" />
                                            </div>
                                        </div>
                                        <div class="col-8 form mb-25 mt-1">
                                            <label class="form-label">Trend Section</label>
                                            <div class="form-checkbox-box">
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox"  name="is_featured" {{$data->is_featured == 1 ? 'checked' : ''}} value="1" />
                                                    <label>Featured</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox"  {{$data->is_exclusive == 1 ? 'checked' : ''}} name="is_exclusive" value="1" />
                                                    <label>Exclusive</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox" name="is_trending" {{$data->is_trending == 1 ? 'checked' : ''}} value="1" />
                                                    <label>Trending</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox" {{$data->is_best_sellers == 1 ? 'checked' : ''}} name="is_best_sellers" value="1" />
                                                    <label>Best Sellers</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Meta Title</label>
                                            <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{@$data->meta_title}}" placeholder="Enter Meta Title" />
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Meta Description</label>
                                            <input type="text" class="form-control" id="meta_description" name="meta_description" value="{{@$data->meta_decription}}" placeholder="Enter Meta Description" />
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Meta Keywords</label>
                                            <input type="text" class="form-control" id="keywords" name="keywords" value="{{@$data->keywords}}" placeholder="Enter Meta Keywords" />
                                        </div>
                                        @if ($data->status != 2)
                                        <div class="col-md-6">
                                            <label for="sp" class="col-12 col-form-label">Status</label>
                                            <div class="col-12">
                                                <select name="status" id="" class=" form-control ">
                                                <option value="1" {{$data->status ==1 ?'selected' : ''}}  >Active</option>
                                                {{-- <option value="2" {{$data->status ==2 ?'selected' : ''}}  >Waiting for Approval</option> --}}
                                                <option value="0" {{$data->status ==0 ?'selected' : ''}}  >Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        @endif
                                        <input type="hidden" value="{{@$data->slug}}" name="slug" >
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('javascript')
<script type="text/javascript">
    function variantEvent(e) {

        if (e.target.value == 1) {
            $('#productVariant').val('0');
            $('.normal').show();
            $('.variant').addClass('d-none');
        } else {
            $('#productVariant').val('1');
            $('.variant').removeClass('d-none');
            $('.repeater-add-btn').click();

            $('.normal').hide();
        }
    }

    function deleteVariant(id) {
        // let token = "{{csrf_token()}}" ;
        $.ajax({
            type:'POST',
            url: '/admin/delete-variant/'+id,
            data: {
                '_token' : "{{csrf_token()}}"
            },
            success:function(response){

                if (response.status == 200) {
                    toastr.success('Deleted Successfully');
                    $('#variant'+id).remove();
                    if ($('.item').length == 0) {
                        $("#productVariant").prop('checked', false);
                        $("#productVariant").val(0);
                        $('.normal').show();
            $('.variant').addClass('d-none');
                    }
                }
                // else if(response.status == 0) {
                //     toastr.error(' Product requires Atleast One variant');
                // }
                else {
                    toastr.error('Something went wrong. Try again later');
                }
            }
        });
    }

    function remove(e){
        // {{-- $(this).parents('.items').remove();  --}}

        if ($('.items').length <= 1) {
            toastr.error('Last Row !!!');
        } else {
            $(e.currentTarget).parent('.items').remove();

           var data= $(this).parent('.items').remove();
        //    console.log(data);
        }
    }

    if ($('#productVariant').val() == 1) {
        $('#productVariant').val('1');
            $('.variant').removeClass('d-none');
            $('.normal').hide();
    }



</script>
@endsection
