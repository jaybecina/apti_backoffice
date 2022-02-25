<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                {{-- <li class="menu-title" key="t-menu">Main Platform</li> --}}

                <li class="sidebar-link">
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <img src = "{{ asset('assets/icons/home.svg') }}" class="sidebar-svg-icons" alt="" />
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>

                {{-- <li class="menu-title" key="t-apps">Platform CMS</li> --}}

                <li class="sidebar-link">
                    <a href="javascript: void(0);" class="waves-effect">
                        <img src = "{{ asset('assets/icons/house-user.svg') }}" class="sidebar-svg-icons" alt="" />
                        <span key="t-ecommerce">Home Page</span>
                        <div class="float-end sidebar-dropdown-div">
                            <img src = "{{ asset('assets/icons/angle-right.svg') }}" class="dropdown-icon" alt="" />
                        </div>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.product.list') }}" key="t-products">Featured Image</a></li>
                        <li><a href="{{ route('admin.product.create') }}" key="t-products">Create Featured Image</a></li>
                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <span key="t-ecommerce">Product Type</span>
                                <div class="float-end sidebar-dropdown-div">
                                    <img src = "{{ asset('assets/icons/angle-right.svg') }}" class="dropdown-icon" alt="" />
                                </div>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.product.type.list') }}" key="t-products">Product Type List</a></li>
                                <li><a href="{{ route('admin.product.type.create') }}" key="t-products">Create Product Type</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-link">
                    <a href="{{ route('admin.about.index') }}" class="waves-effect">
                        <img src = "{{ asset('assets/icons/info-circle.svg') }}" class="sidebar-svg-icons" alt="" style="color: #4E5771;" />
                        <span key="t-layouts">About Us</span>
                    </a>
                </li>

                <li class="sidebar-link">
                    <a href="javascript: void(0);" class="waves-effect">
                        <img src = "{{ asset('assets/icons/newspaper.svg') }}" class="sidebar-svg-icons" alt="" />
                        <span key="t-ecommerce">News</span>
                        <div class="float-end sidebar-dropdown-div">
                            <img src = "{{ asset('assets/icons/angle-right.svg') }}" class="dropdown-icon" alt="" />
                        </div>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.news.list') }}" key="t-products">News List</a></li>
                        <li><a href="{{ route('admin.news.create') }}" key="t-products">Create News</a></li>
                        <li><a href="{{ route('admin.news.category.list') }}" key="t-products">Category List</a></li>
                    </ul>
                </li>

                <li class="sidebar-link">
                    <a href="javascript: void(0);" class="waves-effect">
                        <img src = "{{ asset('assets/icons/person-64.png') }}" class="sidebar-svg-icons" alt="" />
                        <span key="t-ecommerce">Partners</span>
                        <div class="float-end sidebar-dropdown-div">
                            <img src = "{{ asset('assets/icons/angle-right.svg') }}" class="dropdown-icon" alt="" />
                        </div>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.partner.list') }}" key="t-products">Partners List</a></li>
                        <li><a href="{{ route('admin.partner.create') }}" key="t-products">Create Partners</a></li>
                    </ul>
                </li>

                <li class="sidebar-link">
                    <a href="javascript: void(0);" class="waves-effect">
                        <img src = "{{ asset('assets/icons/person-64.png') }}" class="sidebar-svg-icons" alt="" />
                        <span key="t-ecommerce">Customers</span>
                        <div class="float-end sidebar-dropdown-div">
                            <img src = "{{ asset('assets/icons/angle-right.svg') }}" class="dropdown-icon" alt="" />
                        </div>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.customer.list') }}" key="t-products">Customers List</a></li>
                        <li><a href="{{ route('admin.customer.create') }}" key="t-products">Create Customers</a></li>
                    </ul>
                </li>

                <li class="sidebar-link">
                    <a href="javascript: void(0);" class="waves-effect">
                        <img src = "{{ asset('assets/icons/cogs.svg') }}" class="sidebar-svg-icons" alt="" />
                        <span key="t-ecommerce">Services</span>
                        <div class="float-end sidebar-dropdown-div">
                            <img src = "{{ asset('assets/icons/angle-right.svg') }}" class="dropdown-icon" alt="" />
                        </div>
                    </a>
                </li>

                <li class="sidebar-link">
                    <a href="javascript: void(0);" class="waves-effect">
                        <img src = "{{ asset('assets/icons/map-pin.svg') }}" class="sidebar-svg-icons" alt="" />
                        <span key="t-ecommerce">Locations</span>
                        <div class="float-end sidebar-dropdown-div">
                            <img src = "{{ asset('assets/icons/angle-right.svg') }}" class="dropdown-icon" alt="" />
                        </div>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.service-center.list') }}" key="t-products">Service Center List</a></li>
                        <li><a href="{{ route('admin.service-center.create') }}" key="t-products">Create Locations</a></li>
                    </ul>
                </li>

                <li class="sidebar-link">
                    <a href="{{ route('admin.contact_us.index') }}" class="waves-effect">
                        <img src = "{{ asset('assets/icons/info-circle.svg') }}" class="sidebar-svg-icons" alt="" style="color: #4E5771;" />
                        <span key="t-layouts">Contact Us</span>
                    </a>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
  </div>
