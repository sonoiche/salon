<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">
<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> UDON - Bootstrap 5 Premium Admin & Dashboard Template </title>
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
	<meta name="keywords" content="admin dashboard,admin template,admin panel,bootstrap admin dashboard,html template,sales dashboard,dashboard,template dashboard,admin,html and css template,admin dashboard bootstrap,personal dashboard,crypto dashboard,stocks dashboard,admin panel template">
    
    <!-- Favicon -->
    <link rel="icon" href="{{ url('backend/images/brand-logos/favicon.ico') }}" type="image/x-icon">
    
    <!-- Choices JS -->
    <script src="{{ url('backend/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <!-- Main Theme Js -->
    <script src="{{ url('backend/js/main.js') }}"></script>
    <!-- Bootstrap Css -->
    <link id="style" href="{{ url('backend/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Style Css -->
    <link href="{{ url('backend/css/styles.css') }}" rel="stylesheet">
    <!-- Icons Css -->
    <link href="{{ url('backend/css/icons.css') }}" rel="stylesheet">
    <!-- Node Waves Css -->
    <link href="{{ url('backend/libs/node-waves/waves.min.css') }}" rel="stylesheet"> 
    <!-- Simplebar Css -->
    <link href="{{ url('backend/libs/simplebar/simplebar.min.css') }}" rel="stylesheet">
    <!-- Color Picker Css -->
    <link rel="stylesheet" href="{{ url('backend/libs/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ url('backend/libs/@simonwep/pickr/themes/nano.min.css') }}">
    <!-- Choices Css -->
    <link rel="stylesheet" href="{{ url('backend/libs/choices.js/public/assets/styles/choices.min.css') }}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
    @yield('css')
</head>

<body>
<!-- Loader -->
<div id="loader">
    <img src="{{ url('backend/images/media/loader.svg') }}" alt="" />
</div>
<!-- Loader -->

<div class="page">
    @include('layouts.app_header')
    @include('layouts.menus.' . strtolower(auth()->user()->role))
    <!-- Start::app-content -->
    <div class="main-content app-content">
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div>
                    <h1 class="page-title fw-medium fs-18 mb-2">{{ $page_title }}</h1>
                    <div class="">
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ url('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $header ?? '' }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            @if(session('inline_error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session('inline_error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button>
            </div>
            @endif
            <!-- Page Header Close -->
            @yield('content')
        </div>
    </div>
    <!-- End::app-content -->

    <!-- Footer Start -->
    <footer class="footer mt-auto py-3 bg-white text-center">
        <div class="container">
            <span class="text-muted">
                Copyright © <span id="year"></span> <a href="javascript:void(0);" class="text-dark fw-medium">Udon</a>. Designed with <span class="bi bi-heart-fill text-danger"></span> by
                <a href="javascript:void(0);">
                    <span class="fw-medium text-primary text-decoration-underline">Spruko</span>
                </a>
                All rights reserved
            </span>
        </div>
    </footer>
    <!-- Footer End -->
    <div class="modal fade" id="header-responsive-search" tabindex="-1" aria-labelledby="header-responsive-search" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="input-group">
                        <input type="text" class="form-control border-end-0" placeholder="Search Anything ..." aria-label="Search Anything ..." aria-describedby="button-addon2" />
                        <button class="btn btn-primary" type="button" id="button-addon2"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scroll To Top -->
<div class="scrollToTop">
    <span class="arrow"><i class="ti ti-arrow-narrow-up fs-20"></i></span>
</div>
<div id="responsive-overlay"></div>
<!-- Scroll To Top -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Popper JS -->
<script src="{{ url('backend/libs/@popperjs/core/umd/popper.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ url('backend/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Defaultmenu JS -->
<script src="{{ url('backend/js/defaultmenu.min.js') }}"></script>
<!-- Node Waves JS-->
<script src="{{ url('backend/libs/node-waves/waves.min.js') }}"></script>
<!-- Sticky JS -->
<script src="{{ url('backend/js/sticky.js') }}"></script>
<!-- Simplebar JS -->
<script src="{{ url('backend/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ url('backend/js/simplebar.js') }}"></script>
<!-- Color Picker JS -->
<script src="{{ url('backend/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>
<!-- Custom-Switcher JS -->
{{-- <script src="{{ url('backend/js/custom-switcher.min.js') }}"></script> --}}
<!-- Mail Settings -->
<script src="{{ url('backend/js/mail-settings.js') }}"></script>
<!-- Custom JS -->
<script src="{{ url('backend/js/custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="{{ url('vendor/datatables/buttons.server-side.js') }}"></script>
@stack('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</body>
</html>