<nav class="navbar top-navbar navbar-expand-md navbar-dark">
    <div class="navbar-header">
        <!-- This is for the sidebar toggle which is visible on mobile only -->
        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <a class="navbar-brand" href="{{url('dashboard')}}">
            <!-- Logo icon -->
            <b class="logo-icon">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <img src="{{ asset('materialpro/images/logo_secapaad.png') }}" alt="homepage" class="dark-logo" style="width:2.5em;"/>
                <!-- Light Logo icon -->
                <img src="{{ asset('materialpro/images/logo_secapaad.png') }}" alt="homepage" class="light-logo" style="width:2.5em;"/>
            </b>
            <!--End Logo icon -->
            <!-- Logo text -->
            <span class="logo-text">
                <!-- dark Logo text -->
                <img src="{{ asset('materialpro/images/siapdps-dark.png') }}" alt="SIAPDPS" class="dark-logo" />
                {{-- <span class="dark-logo mt- text-dark h3">SECAPA AD</span> --}}
                <!-- Light Logo text -->
                <img src="{{ asset('materialpro/images/siapdps-light.png') }}" class="light-logo" alt="SIAPDPS" />
                {{-- <span class="light-logo font-weight-bold m-1">SECAPA AD</span> --}}
            </span>
        </a>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Toggle which is visible on mobile only -->
        <!-- ============================================================== -->
        <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
            data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="ti-more"></i></a>
    </div>
    <!-- ============================================================== -->
    <!-- End Logo -->
    <!-- ============================================================== -->
    <div class="navbar-collapse collapse" id="navbarSupportedContent">
        <!-- ============================================================== -->
        <!-- toggle and nav items -->
        <!-- ============================================================== -->
        <ul class="navbar-nav mr-auto float-left">
            <!-- This is  -->
            <li class="nav-item"> 
                    <a class="nav-link sidebartoggler d-none d-md-block waves-effect waves-dark" href="javascript:void(0)">
                    <i class="ti-menu"></i></a>
            </li>
            <!-- ============================================================== -->
            <!-- Search -->
            <!-- ============================================================== -->
            {{-- <li class="nav-item d-none d-md-block search-box"> <a
                    class="nav-link d-none d-md-block waves-effect waves-dark" href="javascript:void(0)"><i
                        class="ti-search"></i></a>
                <form class="app-search">
                    <input type="text" class="form-control" placeholder="Search & enter"> 
                    <a class="srh-btn"><i class="ti-close"></i></a> 
                </form>
            </li> --}}
        </ul>
        <!-- ============================================================== -->
        <!-- Right side toggle and nav items -->
        <!-- ============================================================== -->
        <ul class="navbar-nav float-right">
            <!-- ============================================================== -->
            <!-- Profile -->
            <!-- ============================================================== -->
            @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('materialpro/images/users/profile.png') }}" alt="user" width="30" class="profile-pic rounded-circle" />
                </a>
                <div class="dropdown-menu mailbox dropdown-menu-right scale-up">
                    <ul class="dropdown-user list-style-none">
                        <li>
                            <div class="dw-user-box p-3 d-flex">
                                <div class="u-img"><img src="{{ asset('materialpro/images/users/profile.png') }}" alt="user" class="rounded" width="80">
                                </div>
                                <div class="u-text ml-2"> 
                                    <h4 class="mb-0 text-capitalize">{{ auth()->user()->nama }}</h4>
                                    <p class="text-muted mb-1 font-14">{{ auth()->user()->username }}</p>
                                    <a href="#" class="btn btn-rounded btn-danger btn-sm text-white d-inline-block">View Profile</a>
                                </div>
                            </div>
                        </li>
                        {{-- <li role="separator" class="dropdown-divider"></li>
                        <li class="user-list"><a class="px-3 py-2" href="#"><i class="ti-user"></i> My Profile</a></li> --}}
                        <li role="separator" class="dropdown-divider"></li>
                        <li class="user-list"><a class="px-3 py-2 mdi mdi-settings" href="#"> Account Setting</a></li>
                        <li role="separator" class="dropdown-divider"></li>
                        <li class="user-list">
                        <form action="{{ url('logout') }}" method="POST">@csrf
                            <button type="submit" class="btn px-3 py-2 mdi mdi-logout"> Logout</button>
                        </form>
                        </li>
                    </ul>
                </div>
            </li>
            @else
            LOGIN PLEASE
            @endauth
            <!-- ============================================================== -->
            <!-- Language -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown">                            
                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href=""
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                        class="flag-icon flag-icon-id"></i></a>
                <div class="dropdown-menu dropdown-menu-right scale-up"> <a class="dropdown-item"
                        href="#"><i class="flag-icon flag-icon-id"></i> Indonesia</a> <a class="dropdown-item"
                        href="#"><i class="flag-icon flag-icon-us"></i> English</a> </div>
            </li>
        </ul>
    </div>
</nav>