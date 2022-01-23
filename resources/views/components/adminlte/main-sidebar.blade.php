<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                @auth
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                @else
                    <a href="#" class="d-block">User</a>
                @endauth
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}"
                        class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.products.index') }}"
                        class="nav-link {{ request()->routeIs(['admin.products.index', 'admin.products.create', 'admin.products.edit']) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bread-slice"></i>
                        <p>
                            Products
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.banners.index') }}"
                        class="nav-link {{ request()->routeIs(['admin.banners.index', 'admin.banners.create', 'admin.banners.edit']) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-photo-video"></i>
                        <p>
                            Banners
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.categories.index') }}"
                        class="nav-link {{ request()->routeIs(['admin.categories.index']) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-photo-video"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li>
                <li class="nav-header">EXAMPLES</li>
                <li class="nav-item">
                    <a href="pages/gallery.html" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Gallery
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-search"></i>
                        <p>
                            Search
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/search/simple.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Simple Search</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/search/enhanced.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Enhanced</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">ACCOUNT</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Edit Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('index') }}" class="nav-link">
                        <i class="nav-icon far fa-circle text-primary"></i>
                        <p>Exit Admin Panel</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/logout" class="nav-link" id="logoutButton">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<form action="{{ route('logout') }}" method="post" id="logout" class="d-none">
    @csrf
</form>

<script>
    const logoutForm = document.getElementById('logout');
    const logoutButton = document.getElementById('logoutButton');

    logoutButton.addEventListener('click', (e) => {
        e.preventDefault();
        logoutForm.submit();
    })
</script>
