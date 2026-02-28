<ul class="navbar-nav sidebar sidebar-dark accordion corporate-sidebar" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center"
       href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-mosque"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Travel System</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-tachometer-alt"></i>
            Dashboard
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-users"></i>
            Manajemen User
        </a>
    </li>


<li class="nav-item {{ request()->routeIs('packages.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('packages.index') }}">
        <i class="fas fa-box-open"></i>
        Manajemen Packages
    </a>
</li>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-box-open"></i>
            Paket Umrah & Haji
        </a>
    </li>

</ul>