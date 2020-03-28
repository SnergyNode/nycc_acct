<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ url('img/logo/logo.png') }}" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ url('img/user.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ $person->names() }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ @$sidebar['dashboard'] }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('mybusiness') }}" class="nav-link {{ @$sidebar['my-business'] }}">
                        <i class="nav-icon fas fa-store"></i>
                        <p>
                            My Business
                        </p>
                    </a>
                </li>

                <li class="nav-header">Activities</li>

                <li class="nav-item">
                    <a href="{{ route('activities') }}" class="nav-link {{ @$sidebar['activity'] }}">
                        <i class="nav-icon fas fa-eye"></i>
                        <p>
                            Overview
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('new.activity') }}" class="nav-link {{ @$sidebar['new_activity'] }}">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>
                            New Activity
                        </p>
                    </a>
                </li>

                <li class="nav-header">Reports</li>

                <li class="nav-item">
                    <a href="#" class="nav-link {{ @$sidebar['reports'] }}">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            Get Reports
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>