<div class="ec-main-slider section ">
    <div class="ec-slider">

        @if (isset($sliderData) && !empty($sliderData))
            @foreach ($sliderData as $slider)
                <a href="{{route('web.subcategory',@$slider->category->slug)}}" class="ec-slide-item d-flex slide-1"  style="background-image: url({{asset('storage/media/'.@$slider->image)}})" >
                    @if (isset($slider->title) && !empty($slider->title))

                    <div class="container align-self-center">
                        <div class="row">
                            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 align-self-center">
                                <div class="ec-slide-content slider-animation">
                                    @if (isset($slider->title) && !empty($slider->title))
                                        <h2 class="ec-slide-stitle">{{@$slider->title}}</h2>
                                    @endif
                                    <h1 class="ec-slide-title">{{@$slider->name}}</h1>
                                    <p>{{@$slider->description}}</p>
                                    @if (isset($slider->title) && !empty($slider->title))
                                    <a href="{{route('web.subcategory',@$slider->category->slug)}}" class="btn btn-lg btn-secondary">Shop Now</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </a>
            @endforeach
        @endif
    </div>
</div>
