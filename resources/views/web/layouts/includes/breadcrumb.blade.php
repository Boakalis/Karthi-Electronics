<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        @php
                            $title = explode('&',request()->segment(count(request()->segments())));
                        @endphp
                        <h2 class="ec-breadcrumb-title">{{@$title[0]}}
                        </h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- ec-breadcrumb-list start -->
                        <ul class="ec-breadcrumb-list">
                            <a href="/">Home</a> >                
                            <?php $link = "" ?>
                            @for($i = 1; $i <= count(Request::segments()); $i++)
                                @if($i < count(Request::segments()) & $i > 0)
                                <?php $link .= "/" . Request::segment($i); ?>
                                <a href="<?= $link ?>">{{ ucwords(str_replace('-',' ', Str::limit(Request::segment($i), 16, '...')))}}</a> >
                                @else {{ucwords(str_replace('-',' ', Str::limit(Request::segment($i), 16, '...')))}}
                                @endif
                            @endfor
                            
                        </ul>
                        <!-- ec-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
