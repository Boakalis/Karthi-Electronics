@extends('admin.layouts.master')
@section('content')

<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
    <div>
        <h1>Settings</h1>
        {{-- <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Product</p> --}}
    </div>
    {{-- <div>
        <a href="product-list.html" class="btn btn-primary"> Add Porduct</a>
    </div> --}}
</div>
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-body">
                <div class="ec-cat-form">
                    @include('admin.layouts.error')

                    <form action="{{route('settings.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="text" class="col-12 col-form-label">Store Name</label>
                            <div class="col-7">
                                <input id="text" name="name"  value="{{ @$data->name}}" class="form-control here slug-title" type="text">
                            </div>
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>


                        <div class="form-group row">
                            <label class="col-12 col-form-label">Description</label>
                            <div class="col-12">
                                <textarea id="sortdescription" name="description"   cols="40" rows="2"
                                    class="form-control">{{ @$data->description}}</textarea>
                            </div>
                            @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>

                        <div class="form-group row">
                            <label for="text" class="col-12 col-form-label">Email</label>
                            <div class="col-7">
                                <input id="email" name="email"   value="{{ @$data->email}}" class="form-control here slug-title" type="email">
                            </div>
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="form-group row">
                            <label for="text" class="col-12 col-form-label">Phone</label>
                            <div class="col-7">
                                <input id="phone"  value="{{ @$data->phone}}" name="phone" class="form-control here slug-title" type="number">
                            </div>
                            @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-form-label">Address</label>
                            <div class="col-12">
                                <textarea name="address"  class="form-control tinymce-editor" placeholder="Please Enter Content"> {{ @$data->address}}</textarea>

                            </div>
                            @if ($errors->has('address'))
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </div>


                        {{-- <div class="form-group row">
                            <label for="text" class="col-12 col-form-label">Default Passoword</label>
                            <div class="col-7">
                                <input id="password"  value="{{ @$data->default_password}}" name="default_password" class="form-control here slug-title" type="password">
                            </div>
                            @if ($errors->has('default_password'))
                            <span class="text-danger">{{ $errors->first('default_password') }}</span>
                            @endif
                        </div> --}}


                        <div class="form-group row">
                            <label for="text" class="col-12 col-form-label">Footer Text </label>
                            <div class="col-7">
                                <input id="footer_text" name="footer_text"  value="{{ @$data->footer_text}}" class="form-control here slug-title" type="footer_text">
                            </div>
                            @if ($errors->has('footer_text'))
                            <span class="text-danger">{{ $errors->first('footer_text') }}</span>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-12 col-form-label">Logo </label>
                            <div class="col-7">
                                <input type="file" name="logo"  class="form-control ">
                            </div>
                            @if ($errors->has('logo'))
                            <span class="text-danger">{{ $errors->first('logo') }}</span>
                            @endif
                        </div>
                        @if(isset($data->logo) && !empty($data->logo))
                        <img src="{{ asset($data->logo) }}" height="50px" style="width: auto" >
                        @endif

                        <div class="form-group row">
                            <label for="text" class="col-12 col-form-label">Favicon </label>
                            <div class="col-7">
                                <input type="file" name="favicon" class="form-control ">
                            </div>
                            @if ($errors->has('favicon'))
                            <span class="text-danger">{{ $errors->first('favicon') }}</span>
                            @endif
                        </div>
                        @if(isset($data->favicon) && !empty($data->favicon))
                        <img src="{{ asset($data->favicon) }}" height="50px" style="width: auto">
                        @endif

                        {{-- <div class="form-group row">
                            <label for="text" class="col-12 col-form-label">Banner Image </label>
                            <div class="col-7">
                                <input type="file" name="banner_image[]" class="form-control" multiple="multiple" >
                            </div>
                        </div>
                        @if(isset($banner_image) && !empty($banner_image))
                        @foreach (($banner_image) as $item)
                        <img src="{{ asset($item->image) }}" height="50px" style="width: auto">
                        <a href="{{route('banner.delete',$item->id)}}" class="btn btn-sm btn-danger">Delete</a>
                        @endforeach
                    @endif
                        @if ($errors->has('banner_image'))
                        <span class="text-danger">{{ $errors->first('banner_image') }}</span>
                        @endif --}}


                        <div class="form-group row">
                            <label for="text" class="col-12 col-form-label">Landline</label>
                            <div class="col-7">
                                <input id="landline" name="landline"  value="{{ @$data->landline}}" class="form-control here slug-title" type="number">
                            </div>
                            @if ($errors->has('landline'))
                            <span class="text-danger">{{ $errors->first('landline') }}</span>
                            @endif
                        </div>

                        <div class="form-group row">
                            <label for="text" class="col-12 col-form-label">Facebook</label>
                            <div class="col-7">
                                <input id="facebook" name="facebook"  value="{{ @$data->facebook}}" class="form-control here slug-title" type="facebook">
                            </div>
                            @if ($errors->has('facebook'))
                            <span class="text-danger">{{ $errors->first('facebook') }}</span>
                            @endif
                        </div>

                        <div class="form-group row">
                            <label for="text" class="col-12 col-form-label">Whatsapp</label>
                            <div class="col-7">
                                <input id="whatsapp" name="whatsapp"  value="{{ @$data->whatsapp}}" class="form-control here slug-title" type="whatsapp">
                            </div>
                            @if ($errors->has('whatsapp'))
                            <span class="text-danger">{{ $errors->first('whatsapp') }}</span>
                            @endif
                        </div>

                        {{-- <div class="form-group row">
                            <label class="col-12 col-form-label">Address <span>( Type and
                                    make comma to separate tags )</span></label>
                            <div class="col-12">
                                <div class="bootstrap-tagsinput"><input type="text" placeholder=""></div><input
                                    type="text" class="form-control" id="group_tag" name="group_tag" value=""
                                    placeholder="" data-role="tagsinput" style="display: none;">
                            </div>
                        </div> --}}

                        <div class="row">
                            <div class="col-12">
                                <button  type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
