<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 shadow-sm">

    <ul class="navbar-nav ml-auto align-items-center">

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                <span class="mr-2 d-none d-lg-inline text-gray-700 small font-weight-600">
                    {{ auth()->user()->username }}
                </span>
                <i class="fas fa-user-circle fa-lg text-secondary"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="dropdown-item">
                        <i class="fas fa-sign-out-alt mr-2 text-danger"></i>
                        Logout
                    </button>
                </form>
            </div>
        </li>

    </ul>

</nav>