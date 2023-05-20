<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SI - Artikel</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if (Request::segment(1) == 'dashboard') active @endif">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Artikel -->
    <li class="nav-item @if (Request::segment(1) == 'artikel') active @endif">
        <a class="nav-link" href="{{ route('artikel.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Artikel</span></a>
    </li>

    <!-- Nav Item - Komentar -->
    <li class="nav-item @if (Request::segment(1) == 'komentar') active @endif">
        <a class="nav-link" href="{{ route('komentar.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Komentar</span></a>
    </li>

    @if (Session::get('role') == 'admin')
    <!-- Nav Item - Penulis -->
    <li class="nav-item @if (Request::segment(1) == 'penulis') active @endif">
        <a class="nav-link" href="{{ route('penulis.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Penulis</span></a>
    </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>