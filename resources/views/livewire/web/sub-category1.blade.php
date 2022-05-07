<div>
    <div class="container my-3 ">
        <h4 class="float-left" >Shop</h4>
        <small class="float-right" > <a href="">Home</a>&nbsp;-<a href="">Shop</a>  </small>
    </div>
    <section class="section ec-product-tab section-space-p">
        <div class="container">
            {{-- <div class="row my-3">
                <div class="col-md-12 section-title-block ">
                    <div class="section-title">
                        <h2 class="ec-title">Browse Our Store</h2>


                    </div>
                </div>

            </div> --}}
            <div class="row m-tb-minus-15 mt-5 ">
                <div class="col">
                    <div class="tab-content">
                        <div class="row">

                            @if (isset($datas) && !empty($datas))
                                @foreach ($datas as $data)
                                <div class="col-lg-2 col-xl-2 col-xxl-2 my-2">
                                    {{-- <div class="card card-default mt-24px"  > --}}

                                        <div class="text-center">
                                            <a href="{{route('web.product',['category'=>$slug,'slug'=>$data->slug])}}" class="text-secondary d-inline-block mb-3">
                                                <div class="image mb-3">
                                                    <img src="{{asset('storage/media/'.@$data->image)}}" style="width:100px;height:100px;"  class="rounded-circle" alt="Avatar Image">
                                                </div>

                                                <h5 class="card-title text-dark">{{@$data->name}}</h5>


                                            </a>

                                        </div>
                                    {{-- </div> --}}
                                </div>

                                @endforeach
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
