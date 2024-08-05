<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-info elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link bg-info">
        @if (!empty($setting->logo))
            <img src="{{ asset('public/storage/logo/' . $setting->logo) }}" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
        @endif
        @if (!empty($setting->title))
            <strong class="brand-text">{{ $setting->title }}</strong>
        @endif
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="form-inline mt-2">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-gauge"></i>
                        <p>
                            Dashboard
                            <span class="right badge badge-light text-dark">New</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            System Setting
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('form') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Forms</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../forms/advanced.html" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fields</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../forms/editors.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Menu</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
