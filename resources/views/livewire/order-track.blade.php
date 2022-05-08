<div>
  <!-- Ec Track Order section -->
  <section class="ec-page-content section-space-p">
    <div class="container">
        <!-- Track Order Content Start -->

        @if (isset($datas) && !empty($datas))
            @foreach ($datas as $data)
                <div class="ec-trackorder-content col-md-12">
                    <div class="ec-trackorder-inner">
                        <div class="ec-trackorder-top">
                            <h2 class="ec-order-id">order #{{@$data->orderId}}</h2>
                            <div class="ec-order-detail">
                                <div>Expected arrival : {{\Carbon\Carbon::parse(@$data->order_date)->addDays(2)->format('d-m-Y')}}</div>
                                {{-- <div>Grasshoppers <span>v534hb</span></div> --}}
                            </div>
                        </div>
                        <div class="ec-trackorder-bottom">
                            <div class="ec-progress-track">
                                <ul id="ec-progressbar">

                                    <li class="step0 {{@$data->status >= 1 ? 'active' : ''}} "><span class="ec-track-icon"> <img
                                                src="{{asset('web/assets/images/icons/track_1.png')}}" alt="track_order"></span><span
                                            class="ec-progressbar-track"></span><span class="ec-track-title">order
                                            <br>received</span></li>
                                    <li class="step0 {{@$data->status >= 2  ? 'active' : ''}} "><span class="ec-track-icon"> <img
                                                src="{{asset('web/assets/images/icons/track_2.png')}}" alt="track_order"></span><span
                                            class="ec-progressbar-track"></span><span class="ec-track-title">preparing for &nbsp; dispatch</span></li>
                                    {{-- <li class="step0 {{@$data->status >= 3  ? 'active' : ''}} "><span class="ec-track-icon"> <img
                                                src="{{asset('web/assets/images/icons/track_3.png')}}" alt="track_order"></span><span
                                            class="ec-progressbar-track"></span><span class="ec-track-title">order
                                                <br>shipped</span></li> --}}
                                    <li class="step0 {{@$data->status >= 4  ? 'active' : ''}} "><span class="ec-track-icon"> <img
                                                src="{{asset('web/assets/images/icons/track_4.png')}}" alt="track_order"></span><span
                                            class="ec-progressbar-track"></span><span class="ec-track-title">order <br>enroute</span></li>
                                    <li class="step0 {{@$data->status >= 5  ? 'active' : ''}} "><span class="ec-track-icon"> <img
                                                src="{{asset('web/assets/images/icons/track_5.png')}}" alt="track_order"></span><span
                                            class="ec-progressbar-track"></span><span class="ec-track-title">order
                                                <br>arrived</span></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <center>

                <div class="ec-bg-swipe {{$perPage == $count ? 'd-none' : ''}} ">
                    <button class="ec-btn-bg-swipe" wire:click="loadMore()">
                        <span class="circle" aria-hidden="true">
                            <span class="icon arrow"></span>
                        </span>
                        <span class="button-text">Show More</span>
                    </button>
                </div>
            </center>
        @else
        <center><h1>No Orders Found</h1></center>
        @endif

        <!-- Track Order Content end -->
    </div>
</section>
<!-- End Track Order section -->
</div>
