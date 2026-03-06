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

    <li class="nav-item {{ request()->routeIs('jamaahs.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('jamaahs.index') }}">
            <i class="fas fa-user-check"></i>
            Manajemen Jamaah
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('jamaah-groups.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('jamaah-groups.index') }}">
            <i class="fas fa-layer-group"></i>
            Jamaah Groups
        </a>
    </li>





</ul>