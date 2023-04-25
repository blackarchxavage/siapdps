<!-- Sidebar scroll-->
<div class="scroll-sidebar">
    <!-- User profile -->
    <div class="user-profile position-relative" style="background: url({{ url('materialpro/images/background/user-info.jpg') }}) no-repeat;">
        <!-- User profile image -->
        <div class="profile-img"> <img src="{{ url('materialpro/images/users/profile.png') }}" alt="user" class="w-100 rounded-circle" /> </div>
    </div>
    <!-- End User profile text-->
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li class="nav-small-cap py-0"><i class="mdi mdi-menu-down"></i>
                <span class="hide-menu">Home</span></li>
            <li class="sidebar-item my-1"> <a class="sidebar-link"
                href="{{ url('dashboard') }}" aria-expanded="false"><i
                class="mdi mdi-windows"></i><span class="hide-menu">Dashboard</span></a>
            </li>
            <li class="nav-small-cap py-0"><i class="mdi mdi-menu-down"></i>
                <span class="hide-menu">Apps</span></li>
            {{-- <li class="sidebar-item">
                <a class="sidebar-link has-arrow" href="javascript:void(0)"
                    aria-expanded="false">
                    <i class="mdi mdi-hamburger"></i>
                    <span class="hide-menu">Data Pensiun </span>
                </a>
                <ul aria-expanded="false" class="collapse first-level">
                    <li class="sidebar-item my-0">
                        <a href="{{ url('pensiunalami') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu">Pensiun Alami </span>
                        </a>
                    </li>
                    <li class="sidebar-item my-0">
                        <a href="{{ url('pensiundini') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu">Pensiun Dini </span>
                        </a>
                    </li>
                    <li class="sidebar-item my-0">
                        <a href="{{ url('pensiunmeninggal') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu">Meninggal </span>
                        </a>
                    </li>
                    <li class="sidebar-item my-0">
                        <a href="{{ url('pensiundudajanda') }}" class="sidebar-link">
                            <i class="mdi mdi-adjust"></i>
                            <span class="hide-menu">Duda / Janda </span>
                        </a>
                    </li>   
                </ul>
            </li> --}}
            {{-- <li class="sidebar-item"> <a class="sidebar-link"
                href="{{ url('nominatif') }}" aria-expanded="false"><i
                class="mdi mdi-content-paste"></i><span class="hide-menu">Nominatif</span></a>
            </li> --}}
            <li class="sidebar-item my-1"> <a class="sidebar-link"
                href="{{ url('pensiun') }}" aria-expanded="false"><i
                class="mdi mdi-clipboard-account"></i><span class="hide-menu">Data Pensiun</span></a>
            </li>
            {{-- <li class="nav-small-cap py-0"><i class="mdi mdi-dots-horizontal"></i>
                <span class="hide-menu">Reports</span></li>
            <li class="sidebar-item my-1"> <a class="sidebar-link"
                href="{{ url('rekappensiun') }}" aria-expanded="false"><i
                class="mdi mdi-content-paste"></i><span class="hide-menu">Rekap Pensiun</span></a>
            </li> --}}
            <li class="nav-small-cap py-0"><i class="mdi mdi-menu-down"></i>
                <span class="hide-menu">Admin</span></li>
            <li class="sidebar-item my-1"> <a class="sidebar-link"
                href="{{ url('add') }}" aria-expanded="false"><i
                class="mdi mdi-account-plus"></i><span class="hide-menu">Tambah Personel</span></a>
            </li>
                        
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>
<!-- End Sidebar scroll-->
<!-- Bottom points-->
{{-- <div class="sidebar-footer">
    <!-- item-->
    <a href="#" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
    <!-- item-->
    <a href="#" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-account"></i></a>
    <!-- item-->
    <a href="#" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
</div> --}}
<!-- End Bottom points-->