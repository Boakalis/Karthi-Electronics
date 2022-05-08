<footer class="ec-footer">
    <div class="footer-container">
        <div class="footer-top section-space-footer-p p-0 pt-4">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-3 ec-footer-contact">
                        <div class="ec-footer-widget">
                            <div class="ec-footer-logo"><a href="#"><img style="width: 50px;height:50px;" src="{{asset(@$globalSetting->logo)}}" alt="Site Logo" />
                                {{-- <img style="width: 50px;height:50px;" src="{{asset(@$globalSetting->logo)}}" alt="Site Logo" /> --}}
                                    </a></div>
                            <p>{!!@$globalSetting->address!!}</p>
                            <h4 class="ec-footer-heading">Ask Me questions</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link">
                                        <span class="call-img"><img src="{{asset('web/bassets/images/icons/call_5.svg')}}"
                                                class="svg_img foo_img" alt="" /></span>
                                        <span class="call-desc">
                                            <span>Got questions? Call us 12/7! (10AM -10PM)</span>
                                            <span><a href="tel:+91{{@$globalSetting->phone}}">+91 {{@$globalSetting->phone}}</a></span>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                       
                    </div>
                    <div class="col-sm-12 col-lg-3 ec-footer-info">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Account</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link"><a href="about-us.html">My Account</a></li>
                                    <li class="ec-footer-link"><a href="track-order.html">Order History</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 ec-footer-account">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Services</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link"><a href="privacy-policy.html">Privacy policy </a></li>
                                    <li class="ec-footer-link"><a href="terms-condition.html">Terms & conditions</a></li>
                                    <li class="ec-footer-link"><a href="contact-us.html">Contact us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 ec-footer-news">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Information</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link"><a href="privacy-policy.html">About Us </a></li>
                                    <li class="ec-footer-link"><a href="terms-condition.html">Track Order</a></li>
                                    <li class="ec-footer-link"><a href="contact-us.html">Contact us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="ec-footer-widget ec-share">
                            <ul>
                                <li class="ec-share-link"><a href="#"><img src="{{asset('web/bassets/images/icons/iphone.png')}}"
                                            alt="" /></a></li>
                                <li class="ec-share-link"><a href="#"><img src="{{asset('web/bassets/images/icons/google.png')}}"
                                            alt="" /></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Footer Copyright Start -->
                    <div class="col footer-copy">
                        <div class="footer-bottom-copy ">
                            <div class="ec-copy">© 2022 <a class="site-name text-uppercase" href="{{route('home')}}">{{@$globalSetting->name}}</a>. {{@$globalSetting->footer_text}}
                            </div>
                        </div>
                    </div>
                    <!-- Footer Copyright End -->
                    <!-- Footer payment -->
                    <div class="col footer-bottom-right">
                        <div class="footer-bottom-payment d-flex justify-content-end">
                            <div class="payment-link">
                                <img src="{{asset('web/bassets/images/icons/payment.png')}}" alt="">
                            </div>

                        </div>
                    </div>
                    <!-- Footer payment -->
                </div>
            </div>
        </div>
    </div>
</footer>
