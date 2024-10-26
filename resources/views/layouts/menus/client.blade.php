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

                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bi bi-gear side-menu__icon"></i>
                        <span class="side-menu__label">Settings</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1 settings-ul">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Settings</a>
                        </li>
                        <li class="slide">
                            <a href="{{ url('client/settings/users') }}" class="side-menu__item">Personal Settings</a>
                        </li>
                        <li class="slide">
                            <a href="{{ url('client/settings/account') }}" class="side-menu__item">Account Settings</a>
                        </li>
                        <li class="slide">
                            <a href="{{ url('client/settings/subscription') }}" class="side-menu__item">Subscription</a>
                        </li>
                        <li class="slide">
                            <a href="{{ url('client/settings/company') }}" class="side-menu__item">Client Settings</a>
                        </li>
                    </ul>
                </li>
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bi bi-basket3 side-menu__icon"></i>
                        <span class="side-menu__label">Products</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1 products-ul">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Products</a>
                        </li>
                        <li class="slide">
                            <a href="{{ url('client/products') }}" class="side-menu__item">List of Products</a>
                        </li>
                        <li class="slide">
                            <a href="{{ url('client/products/create') }}" class="side-menu__item">Add Product</a>
                        </li>
                    </ul>
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
                            <a href="{{ url('client/services') }}" class="side-menu__item">My Services</a>
                        </li>
                        <li class="slide">
                            <a href="{{ url('client/services/create') }}" class="side-menu__item">Add Service</a>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a href="{{ url('client/appointments') }}" class="side-menu__item">
                        <i class="bi bi-calendar side-menu__icon"></i>
                        <span class="side-menu__label">Appointments</span>
                    </a>
                </li>
                <li class="slide">
                    <a href="{{ url('client/orders') }}" class="side-menu__item">
                        <i class="bi bi-cart4 side-menu__icon"></i>
                        <span class="side-menu__label">Orders</span>
                    </a>
                </li>
                <li class="slide">
                    <a href="{{ url('client/customers') }}" class="side-menu__item">
                        <i class="bi bi-people-fill side-menu__icon"></i>
                        <span class="side-menu__label">Customers</span>
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
                            <a href="{{ url('client/reports/customers') }}" class="side-menu__item">Customers</a>
                        </li>
                        <li class="slide">
                            <a href="{{ url('client/reports/appointments') }}" class="side-menu__item">Appointments</a>
                        </li>
                        <li class="slide">
                            <a href="{{ url('client/reports/sales') }}" class="side-menu__item">Sales</a>
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