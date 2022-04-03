<div class="ec-left-sidebar ec-bg-sidebar">
    <div id="sidebar" class="sidebar ec-sidebar-footer">

        <div class="ec-brand">
            <a href="javascript:void(0)" title="{{@$globalSetting->name }}">
                <img class="ec-brand-icon" src="{{asset(@$globalSetting->logo)}}" alt="" />
                <span class="ec-brand-name text-truncate">{{@$globalSetting->name}}</span>
            </a>
        </div>

        <!-- begin sidebar scrollbar -->
        <div class="ec-navigation" data-simplebar>
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <!-- Dashboard -->
                <li class="active">
                    <a class="sidenav-item-link" href="index.html">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                    <hr>
                </li>

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

                {{-- <!-- Users -->
                <li class="has-sub expand">
                    <a class="sidenav-item-link" href="javascript:void(0)">
                        <i class="mdi mdi-account-group"></i>
                        <span class="nav-text">Users</span> <b class="caret"></b>
                    </a>
                    <div class="collapse" style="display: block">
                        <ul class="sub-menu" id="users" data-parent="#sidebar-menu">
                            <li>
                                <a class="sidenav-item-link" href="user-card.html">
                                    <span class="nav-text">User Grid</span>
                                </a>
                            </li>

                            <li class="">
                                <a class="sidenav-item-link" href="user-list.html">
                                    <span class="nav-text">User List</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="user-profile.html">
                                    <span class="nav-text">Users Profile</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <hr>
                </li> --}}

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
                            <li class="">
                                <a class="sidenav-item-link" href="{{route('product.new')}}">
                                    <span class="nav-text {{@$notificationData > 0 ? ' text-danger flashit':''}}" >New Products</span>


                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="{{route('product.reject')}}">
                                    <span class="nav-text">Rejected Product</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <!-- Orders -->
                <li class="has-sub expand">
                    <a class="sidenav-item-link" href="javascript:void(0)">
                        <i class="mdi-image-filter-frames mdi"></i>
                        <span class="nav-text">Banners</span> <b class="caret"></b>
                    </a>
                    <div class="collapse" style="display: block">
                        <ul class="sub-menu" id="orders" data-parent="#sidebar-menu">
                            <li class="">
                                <a class="sidenav-item-link" href="new-order.html">
                                    <span class="nav-text">Banner Lists</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="has-sub expand">
                    <a class="sidenav-item-link" href="javascript:void(0)">
                        <i class="mdi mdi-cart"></i>
                        <span class="nav-text">Orders</span> <b class="caret"></b>
                    </a>
                    <div class="collapse" style="display: block">
                        <ul class="sub-menu" id="orders" data-parent="#sidebar-menu">
                            <li class="">
                                <a class="sidenav-item-link" href="new-order.html">
                                    <span class="nav-text">New Order</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="order-history.html">
                                    <span class="nav-text">Order History</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="order-detail.html">
                                    <span class="nav-text">Order Detail</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="invoice.html">
                                    <span class="nav-text">Invoice</span>
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

                <li>
                    <a class="sidenav-item-link" href="{{route('user')}}">
                        <i class="mdi mdi-account-group-outline"></i>
                        <span class="nav-text">Users</span>
                    </a>
                </li>

                <!-- Brands -->



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
            </ul>
        </div>
    </div>
</div>
