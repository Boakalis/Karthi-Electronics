<footer class="ec-footer section-space-mt">
    <div class="footer-container">
        {{-- <div class="footer-offer">
            <div class="container">
                <div class="row">
                    <div class="text-center footer-off-msg">
                        <span>Win a contest! Get this limited-editon</span><a href="#" target="_blank">View
                            Detail</a>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="footer-top section-space-footer-p">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-3 ec-footer-contact">
                        <div class="ec-footer-widget">
                            <div class="ec-footer-logo"><a href="#"><img style="width: 100px;height:100px;" src="{{asset(@$globalSetting->logo)}}" alt="Site Logo" /></a></div>
                            <h4 class="ec-footer-heading">Contact us</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link">{!!@$globalSetting->address!!}</li>
                                    <li class="ec-footer-link">Got questions? Call us 12/7! (10AM -10PM)&nbsp;<a href="tel:+91{{@$globalSetting->phone}}">+91{{@$globalSetting->phone}}</a></li>

                                    <li class="ec-footer-link"><span>Email:</span><a
                                            href="{{@$globalSetting->email}}">{{@$globalSetting->email}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-3 ec-footer-account">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Account</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link"><a href="#">My Account</a></li>
                                    <li class="ec-footer-link"><a href="track-order.html">Order History</a></li>
                                    {{-- <li class="ec-footer-link"><a href="#">Wish List</a></li> --}}
                                    {{-- <li class="ec-footer-link"><a href="#">Specials</a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 ec-footer-service">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Services</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    {{-- <li class="ec-footer-link"><a href="#">Discount Returns</a></li> --}}
                                    <li class="ec-footer-link"><a href="#">Privacy policy </a></li>
                                    <li class="ec-footer-link"><a href="terms-condition.html">Term & condition</a>
                                        <li class="ec-footer-link"><a href="#">Contact Us</a></li>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 ec-footer-info">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Information</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link"><a href="about-us.html">About us</a></li>
                                    {{-- <li class="ec-footer-link"><a href="faq.html">FAQ</a></li> --}}
                                    <li class="ec-footer-link"><a href="#">Track Order</a></li>
                                    <li class="ec-footer-link"><a href="contact-us.html">Contact us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Footer social Start -->
                    <div class="col text-left footer-bottom-left">
                        {{-- <div class="footer-bottom-social">
                            <span class="social-text text-upper">Follow us on:</span>
                            <ul class="mb-0">
                                <li class="list-inline-item"><a class="hdr-facebook" href="#"><i
                                            class="ecicon eci-facebook"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-twitter" href="#"><i
                                            class="ecicon eci-twitter"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-instagram" href="#"><i
                                            class="ecicon eci-instagram"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-linkedin" href="#"><i
                                            class="ecicon eci-linkedin"></i></a></li>
                            </ul>
                        </div> --}}
                    </div>
                    <!-- Footer social End -->
                    <!-- Footer Copyright Start -->
                    <div class="col text-center footer-copy">
                        <div class="footer-bottom-copy ">
                            <div class="ec-copy">Copyright © 2022 <a class="site-name text-upper"
                                    href="{{route('home')}}">{{@$globalSetting->name}}<span>.</span></a>. {{@$globalSetting->footer_text}}</div>
                        </div>
                    </div>
                    <!-- Footer Copyright End -->
                    <!-- Footer payment -->
                    <div class="col footer-bottom-right">
                        {{-- <div class="footer-bottom-payment d-flex justify-content-end">
                            <div class="payment-link">
                                <img src="assets/images/icons/payment.png" alt="">
                            </div>

                        </div> --}}
                    </div>
                    <!-- Footer payment -->
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- Footer navigation panel for responsive display -->
<div class="ec-nav-toolbar">
    <div class="container">
        <div class="ec-nav-panel">
            <div class="ec-nav-panel-icons">
                <a href="#ec-mobile-menu" class="navbar-toggler-btn ec-header-btn ec-side-toggle"><img
                        src="{{asset('web/assets/images/icons/menu.svg')}}" class="svg_img header_svg" alt="" /></a>
            </div>
            <div class="ec-nav-panel-icons">
                <a href="#ec-side-cart" class="toggle-cart ec-header-btn ec-side-toggle"><img
                        src="{{asset('web/assets/images/icons/cart.svg')}}" class="svg_img header_svg" alt="" /><span
                        class="ec-cart-noti ec-header-count cart-count-lable">3</span></a>
            </div>
            <div class="ec-nav-panel-icons">
                <a href="index.html" class="ec-header-btn"><img src="{{asset('web/assets/images/icons/home.svg')}}"
                        class="svg_img header_svg" alt="icon" /></a>
            </div>
            <div class="ec-nav-panel-icons">
                <a href="wishlist.html" class="ec-header-btn"><img src="{{asset('web/assets/images/icons/wishlist.svg')}}"
                        class="svg_img header_svg" alt="icon" /><span class="ec-cart-noti">4</span></a>
            </div>
            <div class="ec-nav-panel-icons">
                <a href="login.html" class="ec-header-btn"><img src="{{asset('web/assets/images/icons/user.svg')}}"
                        class="svg_img header_svg" alt="icon" /></a>
            </div>

        </div>
    </div>
</div>
<!-- Footer navigation panel for responsive display end -->


<!-- Cart Floating Button -->
<div class="ec-cart-float">
    <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
        <div class="header-icon"><img src="{{asset('web/assets/images/icons/cart.svg')}}" class="svg_img header_svg" alt="" /></div>
        <span class="ec-cart-count cart-count-lable">3</span>
    </a>
</div>
<!-- Cart Floating Button end -->

<!-- Whatsapp -->
{{-- <div class="ec-style ec-right-bottom">
    <!-- Start Floating Panel Container -->
    <div class="ec-panel">
        <!-- Panel Header -->
        <div class="ec-header">
            <strong>Need Help?</strong>
            <p>Chat with us on WhatsApp</p>
        </div>
        <!-- Panel Content -->
        <div class="ec-body">
            <ul>
                <!-- Start Single Contact List -->
                <li>
                    <a class="ec-list" data-number="918866774266"
                        data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                        <div class="d-flex bd-highlight">
                            <!-- Profile Picture -->
                            <div class="ec-img-cont">
                                <img src="assets/images/whatsapp/profile_01.jpg" class="ec-user-img"
                                    alt="Profile image">
                                <span class="ec-status-icon"></span>
                            </div>
                            <!-- Display Name & Last Seen -->
                            <div class="ec-user-info">
                                <span>Sahar Darya</span>
                                <p>Sahar left 7 mins ago</p>
                            </div>
                            <!-- Chat iCon -->
                            <div class="ec-chat-icon">
                                <i class="fa fa-whatsapp"></i>
                            </div>
                        </div>
                    </a>
                </li>
                <!--/ End Single Contact List -->
                <!-- Start Single Contact List -->
                <li>
                    <a class="ec-list" data-number="918866774266"
                        data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                        <div class="d-flex bd-highlight">
                            <!-- Profile Picture -->
                            <div class="ec-img-cont">
                                <img src="assets/images/whatsapp/profile_02.jpg" class="ec-user-img"
                                    alt="Profile image">
                                <span class="ec-status-icon ec-online"></span>
                            </div>
                            <!-- Display Name & Last Seen -->
                            <div class="ec-user-info">
                                <span>Yolduz Rafi</span>
                                <p>Yolduz is online</p>
                            </div>
                            <!-- Chat iCon -->
                            <div class="ec-chat-icon">
                                <i class="fa fa-whatsapp"></i>
                            </div>
                        </div>
                    </a>
                </li>
                <!--/ End Single Contact List -->
                <!-- Start Single Contact List -->
                <li>
                    <a class="ec-list" data-number="918866774266"
                        data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                        <div class="d-flex bd-highlight">
                            <!-- Profile Picture -->
                            <div class="ec-img-cont">
                                <img src="assets/images/whatsapp/profile_03.jpg" class="ec-user-img"
                                    alt="Profile image">
                                <span class="ec-status-icon ec-offline"></span>
                            </div>
                            <!-- Display Name & Last Seen -->
                            <div class="ec-user-info">
                                <span>Nargis Hawa</span>
                                <p>Nargis left 30 mins ago</p>
                            </div>
                            <!-- Chat iCon -->
                            <div class="ec-chat-icon">
                                <i class="fa fa-whatsapp"></i>
                            </div>
                        </div>
                    </a>
                </li>
                <!--/ End Single Contact List -->
                <!-- Start Single Contact List -->
                <li>
                    <a class="ec-list" data-number="918866774266"
                        data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                        <div class="d-flex bd-highlight">
                            <!-- Profile Picture -->
                            <div class="ec-img-cont">
                                <img src="assets/images/whatsapp/profile_04.jpg" class="ec-user-img"
                                    alt="Profile image">
                                <span class="ec-status-icon ec-offline"></span>
                            </div>
                            <!-- Display Name & Last Seen -->
                            <div class="ec-user-info">
                                <span>Khadija Mehr</span>
                                <p>Khadija left 50 mins ago</p>
                            </div>
                            <!-- Chat iCon -->
                            <div class="ec-chat-icon">
                                <i class="fa fa-whatsapp"></i>
                            </div>
                        </div>
                    </a>
                </li>
                <!--/ End Single Contact List -->
            </ul>
        </div>
    </div>
    <!--/ End Floating Panel Container -->
    <!-- Start Right Floating Button-->
    <div class="ec-right-bottom">
        <div class="ec-box">
            <div class="ec-button rotateBackward">
                <img class="whatsapp" src="assets/web/images/common/whatsapp.png" alt="whatsapp icon" />
            </div>
        </div>
    </div>
    <!--/ End Right Floating Button-->
</div> --}}
<!-- Whatsapp end -->
