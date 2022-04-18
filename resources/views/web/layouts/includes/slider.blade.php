<div class="ec-main-slider section ">
    <div class="ec-slider">

        @if (isset($sliderData) && !empty($sliderData))
            @foreach ($sliderData as $slider)
                <div class="ec-slide-item d-flex slide-1" style="background-image: url({{asset('storage/media/'.@$slider->image)}})" >
                    <div class="container align-self-center">
                        <div class="row">
                            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 align-self-center">
                                <div class="ec-slide-content slider-animation">
                                    <h2 class="ec-slide-stitle">{{@$slider->title}}</h2>
                                    <h1 class="ec-slide-title">{{@$slider->name}}</h1>
                                    <p>{{@$slider->description}}</p>
                                    <a href="{{route('web.subcategory',@$slider->option_id)}}" class="btn btn-lg btn-secondary">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
