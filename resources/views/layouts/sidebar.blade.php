<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar"
    style="border-right: 1px solid white">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon ">
            <img src="{{ asset('assets/img/suratmasuj.png') }}" width="50px" alt="">

        </div>
        <div class="sidebar-brand-text mx-3">{{ Auth::user()->user_role }} <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    @if (Auth::user()->user_role === 'Admin')
        <!-- Divider -->
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Index Surat
        </div>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('index-surat') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>List Index Surat</span></a>
        </li>
    @endif

    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Surat
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('surat-masuk') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Surat Masuk</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('surat-keluar') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Surat Keluar</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">


    <div class="sidebar-heading">
        Laporan
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{route('laporan')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Laporan</span></a>
    </li>

    @if (Auth::user()->user_role === 'Admin')
        <hr class="sidebar-divider d-none d-md-block">

        <div class="sidebar-heading">
            Register Pegawai
        </div>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Register Akun</span></a>
        </li>
    @endif

    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading">
        Profile
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('profile') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span></a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
