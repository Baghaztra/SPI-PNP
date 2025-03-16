<nav class="navbar navbar-expand navbar-light">
    <div class="container-fluid">
        <button class="btn btn-link px-3 sidebar-toggler d-md-none" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>

        <div class="navbar-collapse">
            <!-- Search Form -->
            <form class="d-none d-md-flex ms-4 flex-grow-1">
                <div class="input-group">
                    <span class="input-group-text border-0 bg-light">
                        <i class="fas fa-search text-secondary"></i>
                    </span>
                    <input type="text" class="form-control border-0 bg-light" placeholder="Search...">
                </div>
            </form>

            <ul class="navbar-nav ms-auto">
                <!-- Notifications -->
                <li class="nav-item dropdown">
                    <a class="nav-link px-3" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-bell"></i>
                        <span class="position-absolute top-25 start-75 translate-middle badge rounded-pill bg-danger">
                            3
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                        <h6 class="dropdown-header">Notifications</h6>
                        <a class="dropdown-item py-2" href="#">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-envelope fa-fw text-primary"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="mb-0">You have 3 new messages</p>
                                    <small class="text-muted">15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-center small text-secondary" href="#">Show all notifications</a>
                    </div>
                </li>

                <!-- User Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link px-3 dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                        <img src="https://ui-avatars.com/api/?name=Admin&background=ff6b2b&color=fff" 
                             class="rounded-circle me-2" 
                             width="32" 
                             height="32">
                        <span>{{ Auth::user()->name ?? "Admin" }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                        <a class="dropdown-item" href="{{ route('admin.profile') }}">
                            <i class="fas fa-user fa-fw me-2 text-secondary"></i>
                            My Profile
                        </a>
                        <a class="dropdown-item" href="{{ route('admin.settings') }}">
                            <i class="fas fa-cog fa-fw me-2 text-secondary"></i>
                            Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="fas fa-sign-out-alt fa-fw me-2"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav> 