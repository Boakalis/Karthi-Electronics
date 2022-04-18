@extends('admin.layouts.master') @section('content')
<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
    <div>
        <h1>Add Product</h1>
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
                    {{--
                    <div class="col-lg-4">
                        <div class="ec-vendor-img-upload">
                            <div class="ec-vendor-main-img">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type="file" name="image" id="imageUpload" class="ec-image-upload" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"><img src="{{ asset('admin-assets/assets/img/icons/edit.svg') }}" class="svg_img header_svg" alt="edit" /></label>
                                    </div>
                                    <div class="avatar-preview ec-preview">
                                        <div class="imagePreview ec-div-preview">
                                            <img class="ec-image-preview" src="{{ asset('admin-assets/assets/img/products/vender-upload-preview.jpg') }}" alt="edit" />
                                        </div>
                                    </div>
                                </div>
                                <div class="thumb-upload-set colo-md-12">
                                    <div class="thumb-upload">
                                        <div class="thumb-edit">
                                            <input type="file" name="images[]" id="thumbUpload01" class="ec-image-upload" accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"><img src="{{ asset('admin-assets/assets/img/icons/edit.svg') }}" class="svg_img header_svg" alt="edit" /></label>
                                        </div>
                                        <div class="thumb-preview ec-preview">
                                            <div class="image-thumb-preview">
                                                <img class="image-thumb-preview ec-image-preview" src="{{ asset('admin-assets/assets/img/products/vender-upload-thumb-preview.jpg') }}" alt="edit" />
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
                                                <img class="image-thumb-preview ec-image-preview" src="{{ asset('admin-assets/assets/img/products/vender-upload-thumb-preview.jpg') }}" alt="edit" />
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
                                                <img class="image-thumb-preview ec-image-preview" src="{{ asset('admin-assets/assets/img/products/vender-upload-thumb-preview.jpg') }}" alt="edit" />
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
                                                <img class="image-thumb-preview ec-image-preview" src="{{ asset('admin-assets/assets/img/products/vender-upload-thumb-preview.jpg') }}" alt="edit" />
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
                                                <img class="image-thumb-preview ec-image-preview" src="{{ asset('admin-assets/assets/img/products/vender-upload-thumb-preview.jpg') }}" alt="edit" />
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
                                                <img class="image-thumb-preview ec-image-preview" src="{{ asset('admin-assets/assets/img/products/vender-upload-thumb-preview.jpg') }}" alt="edit" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    --}}
                    <div class="col-lg-12">
                        <div class="ec-vendor-upload-detail">
                            <form action="{{ route('product.store') }}" class="row g-3" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-4">
                                        <div class="ec-vendor-img-upload">
                                            <div class="ec-vendor-main-img">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type="file" name="image" id="imageUpload" required class="ec-image-upload" accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"><img src="{{ asset('admin-assets/assets/img/icons/edit.svg') }}" class="svg_img header_svg" alt="edit" /></label>
                                                    </div>
                                                    <div class="avatar-preview ec-preview">
                                                        <div class="imagePreview ec-div-preview">
                                                            <img class="ec-image-preview" src="{{ asset('admin-assets/assets/img/products/vender-upload-preview.jpg') }}" alt="edit" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="thumb-upload-set colo-md-12">
                                                    <div class="thumb-upload">
                                                        <div class="thumb-edit">
                                                            <input type="file" name="images[]" id="thumbUpload01" class="ec-image-upload" accept=".png, .jpg, .jpeg" />
                                                            <label for="imageUpload"><img src="{{ asset('admin-assets/assets/img/icons/edit.svg') }}" class="svg_img header_svg" alt="edit" /></label>
                                                        </div>
                                                        <div class="thumb-preview ec-preview">
                                                            <div class="image-thumb-preview">
                                                                <img class="image-thumb-preview ec-image-preview" src="{{ asset('admin-assets/assets/img/products/vender-upload-thumb-preview.jpg') }}" alt="edit" />
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
                                                                <img class="image-thumb-preview ec-image-preview" src="{{ asset('admin-assets/assets/img/products/vender-upload-thumb-preview.jpg') }}" alt="edit" />
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
                                                                <img class="image-thumb-preview ec-image-preview" src="{{ asset('admin-assets/assets/img/products/vender-upload-thumb-preview.jpg') }}" alt="edit" />
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
                                                                <img class="image-thumb-preview ec-image-preview" src="{{ asset('admin-assets/assets/img/products/vender-upload-thumb-preview.jpg') }}" alt="edit" />
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
                                                                <img class="image-thumb-preview ec-image-preview" src="{{ asset('admin-assets/assets/img/products/vender-upload-thumb-preview.jpg') }}" alt="edit" />
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
                                                                <img class="image-thumb-preview ec-image-preview" src="{{ asset('admin-assets/assets/img/products/vender-upload-thumb-preview.jpg') }}" alt="edit" />
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
                                            <input type="text" name="name" required placeholder="Enter Product Name" class="form-control" id="name" />
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
                                                            <option value="{{ $dealer->id }}">{{ $dealer->name }}</option>
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
                                                    @if (isset($category->subcategory) && !empty($category->subcategory)) @foreach ($category->subcategory as $subcategory)
                                                    <option value="{{ $subcategory->id }}"> {{ $subcategory->name }}</option>
                                                    @endforeach @endif
                                                </optgroup>
                                                @endforeach @endif
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Product Description</label>
                                            <textarea  class="form-control tinymce-editor" name="description"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Short Description</label>
                                            <textarea  class="form-control" name="short_description" required></textarea>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <label class="form-label">Is Product had variants?</label>
                                            <div class="form-check form-check-inline">
                                                <input  type="checkbox" onClick="variant(event)" name="is_products_variant" id="productVariant" value="0" />
                                                <label></label>
                                            </div>
                                        </div>
                                        <div class="col-4 normal">
                                            <label for="dealer" class="col-12 col-form-label">Dealer Price <span>(In &#8377; )</span></label>
                                            <div class="col-12">
                                                <input  id="dealer" name="dealer_price" class="form-control" type="number" />
                                            </div>
                                        </div>
                                        @if (Auth::user()->user_type ==1)
                                            <div class="col-4 normal">
                                                <label for="sale" class="col-12 col-form-label">Sale Price <span>(In &#8377; )</span></label>
                                                <div class="col-12">
                                                    <input id="sale" name="sale_price" class="form-control" type="number" />
                                                </div>
                                            </div>
                                            <div class="col-4 normal">
                                                <label for="sale" class="col-12 col-form-label">Discount Price</label>
                                                <div class="col-12">
                                                    <input id="ds" name="discounted_price" class="form-control" type="number" />
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
                                                            <div class="col-md-3">
                                                                <label for="sp" class="col-12 col-form-label">Discount Price</label>
                                                                <div class="col-12">
                                                                    <input id="spd" data-name="discounted_price" class="form-control"  type="number" />
                                                                </div>
                                                            </div>
                                                            @endif
                                                            <div class="col-md-3">
                                                                <label for="sp" class="col-12 col-form-label">Status</label>
                                                                <div class="col-12">
                                                                    <select data-name="status" id="" class=" form-control ">
                                                                    <option value="1">Active</option>
                                                                    <option value="0">Ina   ctive</option>
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
                                                <input type="color" name="colors[]" class="form-control form-control-color" id="exampleColorInput1" title="Choose your color" />
                                                <input type="color" name="colors[]" class="form-control form-control-color" id="exampleColorInput2" title="Choose your color" />
                                                <input type="color" name="colors[]" class="form-control form-control-color" id="exampleColorInput3" title="Choose your color" />
                                                <input type="color" name="colors[]" class="form-control form-control-color" id="exampleColorInput4" title="Choose your color" />
                                            </div>
                                        </div>
                                        <div class="col-8 form mb-25 mt-1">
                                            <label class="form-label">Trend Section</label>
                                            <div class="form-checkbox-box">
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox" name="is_featured" value="1" />
                                                    <label>Featured</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox" name="is_exclusive" value="1" />
                                                    <label>Exclusive</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox" name="is_trending" value="1" />
                                                    <label>Trending</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox" name="is_best_sellers" value="1" />
                                                    <label>Best Sellers</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Meta Title</label>
                                            <input type="text" class="form-control" id="meta_title" name="meta_title" value="" placeholder="Enter Meta Title" />
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Meta Description</label>
                                            <input type="text" class="form-control" id="meta_description" name="meta_description" value="" placeholder="Enter Meta Description" />
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Meta Keywords</label>
                                            <input type="text" class="form-control" id="keywords" name="keywords" value="" placeholder="Enter Meta Keywords" />
                                        </div>
                                        @if (Auth::user()->user_type == 1)
                                        <div class="col-md-6">
                                            <label for="sp" class="col-12 col-form-label">Status</label>
                                            <div class="col-12">
                                                <select name="status" id="" class=" form-control ">
                                                <option value="1">Active</option>
                                                {{-- <option value="2">Waiting for Approval</option> --}}
                                                <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        @endif
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
    function variant(e) {
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




</script>
@endsection
