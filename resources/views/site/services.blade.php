@extends('layouts.site')
@section('content')
<section class="page-banner text-white py-165 rpy-130" style="background-image: url(assets/images/banners/page-banner-five.jpg') }});">
    <div class="container">
        <div class="banner-inner text-center">
            <span class="bg-text">services</span>
            <h1 class="page-title wow fadeInUp delay-0-2s">Our services</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb wow fadeInUp delay-0-4s">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">services</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<!-- Page Banner End -->


<!-- Services Section Start -->
<section class="services-page pt-140 rpt-90 pb-90 rpb-40">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-title text-center mb-65">
                    <img class="bg-image" src="{{ url('assets/images/shapes/service-bg.png') }}" alt="Leaf">
                    <span class="sub-title">What We Offer</span>
                    <h3>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-6">
                <div class="service-item wow fadeInUp delay-0-2s">
                    <img src="{{ url('assets/images/services/service-1.jpg') }}" alt="Service">
                    <div class="service-content">
                        <i class="flaticon-cut"></i>
                        <h5><a href="{{ url('appointment/1') }}">Hair Cutting</a></h5>
                        <a href="{{ url('appointment/1') }}" class="read-more">read more <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item wow fadeInUp delay-0-4s">
                    <img src="{{ url('assets/images/services/service-2.jpg') }}" alt="Service">
                    <div class="service-content">
                        <i class="flaticon-nail"></i>
                        <h5><a href="{{ url('appointment/2') }}">Nail Polish</a></h5>
                        <a href="{{ url('appointment/2') }}" class="read-more">read more <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item wow fadeInUp delay-0-6s">
                    <img src="{{ url('assets/images/services/service-3.jpg') }}" alt="Service">
                    <div class="service-content">
                        <i class="flaticon-massage-1"></i>
                        <h5><a href="{{ url('appointment/3') }}">Body Massage</a></h5>
                        <a href="{{ url('appointment/3') }}" class="read-more">read more <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item wow fadeInUp delay-0-8s">
                    <img src="{{ url('assets/images/services/service-4.jpg') }}" alt="Service">
                    <div class="service-content">
                        <i class="flaticon-relax"></i>
                        <h5><a href="{{ url('appointment/4') }}">Spa & Foot</a></h5>
                        <a href="{{ url('appointment/4') }}" class="read-more">read more <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item wow fadeInUp delay-1-0s">
                    <img src="{{ url('assets/images/services/service-5.jpg') }}" alt="Service">
                    <div class="service-content">
                        <i class="flaticon-beauty-treatment-1"></i>
                        <h5><a href="{{ url('appointment/5') }}">Hair Colors</a></h5>
                        <a href="{{ url('appointment/5') }}" class="read-more">read more <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item wow fadeInUp delay-1-2s">
                    <img src="{{ url('assets/images/services/service-6.jpg') }}" alt="Service">
                    <div class="service-content">
                        <i class="flaticon-liner"></i>
                        <h5><a href="{{ url('appointment/6') }}">Brow Polish</a></h5>
                        <a href="{{ url('appointment/6') }}" class="read-more">read more <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->


<!-- Counter Section Start -->
<div class="counter-section text-white bg-yellow pt-60 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="counter-item wow fadeInUp delay-0-2s">
                    <span class="count-text" data-speed="5000" data-stop="6203">0</span>
                    <p>project complete</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="counter-item wow fadeInUp delay-0-4s">
                    <span class="count-text" data-speed="5000" data-stop="456">0</span>
                    <p>Expert Members</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="counter-item wow fadeInUp delay-0-6s">
                    <span class="count-text" data-speed="5000" data-stop="35">0</span>
                    <p>Years Experience</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="counter-item wow fadeInUp delay-0-8s">
                    <span class="count-text" data-speed="5000" data-stop="7563">0</span>
                    <p>Saticfied Clients</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counter Section End -->

<!-- Video Section Start -->
{{-- <div class="video-section-two wow fadeInUp delay-0-2s" style="background-image: url(assets/images/video/service-page-video.jpg') }});">
    <a href="https://www.youtube.com/watch?v=9Y7ma241N8k" class="mfp-iframe video-play"><i class="fas fa-play"></i></a>
</div> --}}
<!-- Video Section End -->
@endsection