<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{route('admin.dashboard')}}" class="logo logo-dark navbar-logo">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/img/APTI_Logo.png') }}" class="navbar-logo-img" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/img/APTI_Logo.png') }}" class="navbar-logo-img" alt="" height="17">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars text-warning"></i>
            </button>

            <!-- App Search-->
            {{-- <form class="app-search d-none d-lg-block">
                <div class="position-relative search-icon-group">
                    <input type="text" class="form-control custom-search" placeholder="Search...">
                    <img src = "{{ asset('assets/icons/search.svg') }}" class="input-svg-icons mx-1 icon-overlay" alt="" />
                </div>
            </form> --}}

            <div class="dropdown text-warning d-inline-block system-datetime">
                <span><strong>Good Morning, {{ auth()->user()->name }}</strong></span>
            </div>

        </div>

        <div class="d-flex header-contents">
            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown text-warning d-inline-block system-datetime d-flex">
                <!-- <span><strong>Hello! Today is {{ date("l, F j, Y | g:i a") }}</strong></span> -->
                <span class="d-flex flex-row mx-2"><strong>Hello! Today is {{ date("l, F j, Y") }}</strong></span>|<span class="digital-clock mx-2" style="font-weight: bold;"></span>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{-- <span class="rounded-circle header-profile-user bg-warning text-white py-2 h-29 w-18 d-inline-block">A</span> --}}
                    {{-- <span class="d-none d-xl-inline-block ms-1" key="t-henry">Admin</span> --}}
                    <img class="rounded-circle header-profile-user" src="{{ asset('assets/img/avatar.png') }}" alt="Header Avatar">
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="#"><i class="fas fa-user font-size-16 align-middle me-1"></i></i>&nbsp; <span key="t-profile">Profile</span></a>
                    <a class="dropdown-item d-block" href="#"><i class="fas fa-cog font-size-16 align-middle me-1"></i>&nbsp; <span key="t-settings">Settings</span></a>
                    <a class="dropdown-item d-block" href="{{ route('admin.user-management.list') }}"><i class="fas fa-users-cog font-size-16 align-middle me-1"></i>&nbsp; <span key="t-settings">User Management</span></a>
                    <div class="dropdown-divider"></div>

                </div>
            </div>
            <div class="dropdown d-inline-block">
                <a class="btn header-item text-danger waves-effect" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt fa-2x mt-3 align-middle me-1 text-warning"></i></a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>

        </div>
    </div>
  </header>
