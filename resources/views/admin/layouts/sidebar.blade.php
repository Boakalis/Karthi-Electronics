<div class="ec-left-sidebar ec-bg-sidebar">
    <div id="sidebar" class="sidebar ec-sidebar-footer">

        <div class="ec-brand">
            <a href="javascript:void(0)" title="{{@$globalSetting->name }}">
                <img class="ec-brand-icon" src="{{asset(@$globalSetting->logo)}}" alt="" />
                <span class="ec-brand-name text-truncate" style="" >{{@$globalSetting->name}}</span>
            </a>
        </div>

        <!-- begin sidebar scrollbar -->
        <div class="ec-navigation" data-simplebar>
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <!-- Dashboard -->
                <li class="active">
                    <a class="sidenav-item-link" href="javascript:void(0)">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                    <hr>
                </li>

                @if (Auth::user()->user_type ==1)
                    <!-- Vendors -->
                    <li class="has-sub expand">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <i class="mdi mdi-account-group-outline"></i>
                            <span class="nav-text">Dealers</span> <b class="caret"></b>
                        </a>
                        <div class="collapse" style="display: block">
                            <ul class="sub-menu" id="vendors" data-parent="#sidebar-menu">
                                <li class="">
                                    <a class="sidenav-item-link" href="{{route('vendor')}}">
                                        <span class="nav-text">Dealers List</span>
                                    </a>
                                </li>


                            </ul>
                        </div>
                    </li>
                @endif


                @if (Auth::user()->user_type ==1)
                    <!-- Category -->
                    <li class="has-sub expand">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <i class="mdi mdi-dns-outline"></i>
                            <span class="nav-text">CATEGORY SECTION</span> <b class="caret"></b>
                        </a>
                        <div class="collapse" style="display: block">
                            <ul class="sub-menu" id="categorys" data-parent="#sidebar-menu">
                                <li class="">
                                    <a class="sidenav-item-link" href="{{route('category')}}">
                                        <span class="nav-text">Category</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="sidenav-item-link" href="{{route('subcategory')}}">
                                        <span class="nav-text">Sub-Category</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                <!-- Products -->
                <li class="has-sub expand">
                    <a class="sidenav-item-link" href="javascript:void(0)">
                        <i class="mdi mdi-palette-advanced"></i>
                        <span class="nav-text">PRODUCTS </span>

                            @if (@$notificationData > 0)
                            <button type="button" class=" btn-sm btn text-warning glow-button">New</button>
                            <b class="caret"></b>
                            @endif

                    </a>
                    <div class="collapse" style="display: block">
                        <ul class="sub-menu" id="products" data-parent="#sidebar-menu">
                            <li class="">
                                <a class="sidenav-item-link" href="{{route('product.index')}}">
                                    <span class="nav-text">Products List</span>
                                </a>
                            </li>
                            @if (Auth::user()->user_type ==1)
                            <li class="">
                                <a class="sidenav-item-link" href="{{route('product.new')}}">
                                    <span class="nav-text {{@$notificationData > 0 ? ' text-danger flashit':''}}" >New Products</span>


                                </a>
                            </li>
                            @endif
                            <li class="">
                                <a class="sidenav-item-link" href="{{route('product.reject')}}">
                                    <span class="nav-text  {{(@$notificationData > 0 && Auth::user()->user_type ==2) ? ' text-danger flashit':''}}">Rejected Product</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                @if (Auth::user()->user_type ==1)
                <!-- Orders -->
                <li class="has-sub expand">
                    <a class="sidenav-item-link" href="javascript:void(0)">
                        <i class="mdi-image-filter-frames mdi"></i>
                        <span class="nav-text">Banners</span> <b class="caret"></b>
                    </a>
                    <div class="collapse" style="display: block">
                        <ul class="sub-menu" id="orders" data-parent="#sidebar-menu">
                            <li class="">
                                <a class="sidenav-item-link" href="{{route('banner')}}">
                                    <span class="nav-text">Banner Lists</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endif
                <li class="has-sub expand">
                    <a class="sidenav-item-link" href="">
                        <i class="mdi mdi-cart"></i>
                        <span class="nav-text">Orders</span> <b class="caret"></b>
                    </a>
                    <div class="collapse" style="display: block">
                        <ul class="sub-menu" id="orders" data-parent="#sidebar-menu">
                            <li class="">
                                <a class="sidenav-item-link" href="{{route('order')}}">
                                    <span class="nav-text">All Orders</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="{{route('order.new')}}">
                                    <span class="nav-text">Today Order</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="{{route('order.reject')}}">
                                    <span class="nav-text">Returned Order</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="{{route('order.cancel')}}">
                                    <span class="nav-text">Cancelled Order</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                {{-- <li>
                    <a class="sidenav-item-link" href="{{route('referals')}}">
                        <i class="mdi mdi-star-half"></i>
                        <span class="nav-text">Referal</span>
                    </a>
                </li> --}}
                @if (Auth::user()->user_type ==1)
                <li>
                    <a class="sidenav-item-link" href="{{route('user')}}">
                        <i class="mdi mdi-account-group-outline"></i>
                        <span class="nav-text">Users</span>
                    </a>
                </li>
                @endif
                <!-- Brands -->


                @if (Auth::user()->user_type ==1)
                <!-- Icons -->
                <li class="has-sub expand">
                    <a class="sidenav-item-link" href="javascript:void(0)">
                        <i class="mdi mdi-diamond-stone"></i>
                        <span class="nav-text">Area Management</span> <b class="caret"></b>
                    </a>
                    <div class="collapse" style="display: block">
                        <ul class="sub-menu" id="icons" data-parent="#sidebar-menu">
                            <li class="">
                                <a class="sidenav-item-link" href="{{route('state')}}">
                                    <span class="nav-text">State List</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="{{route('district')}}">
                                    <span class="nav-text">District List</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="{{route('area')}}">
                                    <span class="nav-text">Area List</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endif
                @if (Auth::user()->user_type ==1)
                <!-- Other Pages -->
                <li class="has-sub expand">
                    <a class="sidenav-item-link" href="{{route('settings')}}">
                        <i class="mdi mdi-settings-outline"></i>
                        <span class="nav-text">Settings</span>
                    </a>

                    {{-- <div class="collapse" style="display: block">
                        <ul class="sub-menu" id="otherpages" data-parent="#sidebar-menu">
                            <li class="has-sub expand">
                                <a href="404.html">404 Page</a>
                            </li>
                        </ul>
                    </div> --}}
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>
