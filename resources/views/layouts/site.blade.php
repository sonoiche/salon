<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.utils.header_css')
    @yield('css')
    <style>
        .cart-count {
            background: red;
            color: #fff;
            padding: 3px;
            font-size: 13px;
            border-radius: 999px;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: -5px;
            right: -12px;
        }
    </style>
</head>
<body class="home-one">
    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader"></div>

        <!-- main header -->
        <header class="main-header">
            <!--Header-Upper-->
            <div class="header-upper">
                <div class="container-fluid clearfix">

                    <div class="header-inner d-flex align-items-center bg-white">
                        <div class="logo-outer">
                            <div class="logo"><a href="{{ url('/') }}"><img src="{{ url('assets/images/logos/logo.png') }}" alt="Logo" title="Logo"></a></div>
                        </div>

                        <div class="nav-outer clearfix">
                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-lg">
                                <div class="navbar-header">
                                    <!-- Toggle Button -->
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    
                                   <div class="mobile-logo p-15 m-auto">
                                       <a href="{{ url('/') }}">
                                            <img src="{{ url('assets/images/logos/logo.png') }}" alt="Logo" title="Logo">
                                       </a>
                                   </div>
                                </div>

                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <li><a href="{{ url('/') }}">Home</a></li>
                                        <li><a href="{{ url('/products') }}">Products</a></li>
                                        <li><a href="{{ url('/salons') }}">Salons</a></li>
                                        @if (auth()->check())
                                        <li><a href="{{ url('/appointment') }}">My Appointments</a></li>
                                        <li><a href="{{ url('/dashboard') }}">{{ auth()->user()->role }} Dashboard</a></li>
                                        @else
                                        <li><a href="{{ url('/login') }}">Login</a></li>
                                        @endif
                                    </ul>
                                </div>

                            </nav>
                            <!-- Main Menu End-->
                        </div>
                        
                        <!-- Menu Button -->
                        <div class="menu-icons">
                            <a href="{{ url('cart') }}" class="cart" style="position: relative">
                                <i class="fas fa-shopping-cart"></i>
                                @if (Cart::count() > 0)
                                <div class="cart-count">
                                    {{ Cart::content()->count() }}
                                </div>
                                @endif
                            </a>
                            
                            @if (auth()->check())
                            <!-- Nav Search -->
                            <div class="nav-search py-15">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="fas fa-sign-out-alt"></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!--End Header Upper-->
        </header>
       
       
        <!--Form Back Drop-->
        <div class="form-back-drop"></div>
        
        <!-- Hidden Sidebar -->
        <section class="hidden-bar">
            <div class="inner-box text-center">
                <div class="cross-icon"><span class="fa fa-times"></span></div>
                <div class="title">
                    <h4>Get Appointment</h4>
                </div>

                <!--Appointment Form-->
                <div class="appointment-form">
                    <form method="post" action="https://demo.webtend.net/html/lezar_preview/contact.html">
                        <div class="form-group">
                            <input type="text" name="text" value="" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" value="" placeholder="Email Address" required>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Message" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="theme-btn">Submit now</button>
                        </div>
                    </form>
                </div>

                <!--Social Icons-->
                <div class="social-style-one">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </div>
            </div>
        </section>
        <!--End Hidden Sidebar -->
        @yield('content')
        <!-- Footer Area Start -->
        <footer class="main-footer footer-three bg-black text-white pt-85">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget menu-widget">
                            <h4 class="footer-title">About</h4>
                            <ul>
                                <li><a href="{{ url('products') }}">Products</a></li>
                                <li><a href="{{ url('services') }}">Services</a></li>
                                <li><a href="{{ (auth()->check()) ? url('appointment') : url('login') }}">Appointments</a></li>
                                <li><a href="{{ url('login') }}">Login</a></li>
                                <li><a href="{{ url('register') }}">Register</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget menu-widget">
                            <h4 class="footer-title">Services</h4>
                            <ul>
                                @foreach ($global_services as $service)
                                <li><a href="{{ url('appointment', $service->id) }}">{{ $service->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget contact-widget">
                            <h4 class="footer-title">Contact</h4>
                            <ul>
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <div class="info-content">
                                        <h5>Location</h5>
                                        <p>Lingayen Pangasinan</p>
                                    </div>
                                </li>
                                <li>
                                    <i class="fas fa-phone-alt"></i>
                                    <div class="info-content">
                                        <h5>Hotline</h5>
                                        <p>Call : +012 (345) 6789</p>
                                    </div>
                                </li>
                                <li>
                                    <i class="far fa-comment"></i>
                                    <div class="info-content">
                                        <h5>Email</h5>
                                        <a href="#">info@salon.site</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget newsletter-widget">
                            <h4 class="footer-title">Newsletter</h4>
                            <form action="#" method="post">
                                <input type="email" name="EMAIL" placeholder="Enter Email" required>
                                <button value="submit"><i class="fas fa-long-arrow-alt-right"></i></button>
                            </form>
                            <div class="social-style-one pt-40">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright-area pt-25 pb-15">
                    <ul class="footer-menu py-5">
                        <li><a href="{{ url('services') }}">Services</a></li>
                        <li><a href="#">FAQS</a></li>
                        <li><a href="{{ url('dashboard') }}">My Account</a></li>
                        <li><a href="#">Privacy</a></li>
                    </ul>
                    <p>© 2023 Lezar, All Rights Reserved</p>
                </div>
            </div>
        </footer>
        <!-- Footer Area End -->

    </div>
    <!--End pagewrapper-->
   
    <!-- Scroll Top Button -->
    <button class="scroll-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></button>
    @include('layouts.utils.footer_js')
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