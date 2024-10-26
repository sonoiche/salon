<!-- Start::app-sidebar -->
<aside class="app-sidebar sticky" id="sidebar">
    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="index.html" class="header-logo">
            <img src="{{ url('backend/images/brand-logos/desktop-logo.png') }}" alt="logo" class="desktop-logo" />
            <img src="{{ url('backend/images/brand-logos/toggle-dark.png') }}" alt="logo" class="toggle-dark" />
            <img src="{{ url('backend/images/brand-logos/desktop-dark.png') }}" alt="logo" class="desktop-dark" />
            <img src="{{ url('backend/images/brand-logos/toggle-logo.png') }}" alt="logo" class="toggle-logo" />
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">
        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path></svg>
            </div>
            <ul class="main-menu">
                <!-- Start::slide -->
                <li class="slide">
                    <a href="{{ url('home') }}" class="side-menu__item">
                        <i class="bi bi-house side-menu__icon"></i>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bi bi-award side-menu__icon"></i>
                        <span class="side-menu__label">Services</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1 services-ul">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Services</a>
                        </li>
                        <li class="slide">
                            <a href="{{ url('admin/services') }}" class="side-menu__item">List of Services</a>
                        </li>
                        <li class="slide">
                            <a href="{{ url('admin/services/create') }}" class="side-menu__item">Add Service</a>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a href="{{ url('admin/products') }}" class="side-menu__item">
                        <i class="bi bi-basket3 side-menu__icon"></i>
                        <span class="side-menu__label">Products</span>
                    </a>
                </li>
                <li class="slide">
                    <a href="{{ url('admin/clients') }}" class="side-menu__item">
                        <i class="bi bi-people-fill side-menu__icon"></i>
                        <span class="side-menu__label">Clients</span>
                    </a>
                </li>
                <li class="slide">
                    <a href="{{ url('admin/users') }}" class="side-menu__item">
                        <i class="bi bi-people-fill side-menu__icon"></i>
                        <span class="side-menu__label">Users</span>
                    </a>
                </li>
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bi bi-bar-chart side-menu__icon"></i>
                        <span class="side-menu__label">Reports</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1 reports-ul">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Reports</a>
                        </li>
                        <li class="slide">
                            <a href="{{ url('admin/reports/customers') }}" class="side-menu__item">Customers</a>
                        </li>
                        <li class="slide">
                            <a href="{{ url('admin/reports/subscriptions') }}" class="side-menu__item">Subscriptions</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="slide-right" id="slide-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path></svg>
            </div>
        </nav>
        <!-- End::nav -->
    </div>
    <!-- End::main-sidebar -->
</aside>
<!-- End::app-sidebar -->