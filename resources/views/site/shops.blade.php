@extends('layouts.site')
@section('content')
<!-- Team Section Start -->
<section class="team-section text-center pt-140 rpt-90 pb-90 rpb-40">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-9 col-sm-11">
                <div class="section-title mb-65">
                    <span class="bg-text">Salon Shops</span>
                    <span class="sub-title">Expert Salons</span>
                    <h2>Meet Our Professional Salons</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($salons as $salon)
            <div class="col-lg-4 col-sm-6">
                <div class="team-member wow fadeInUp delay-0-2s">
                    <a href="{{ url('salons', $salon->id) }}">
                        <img src="{{ $salon->display_photo }}" style="width: 300px; height: 300px; object-fit: cover">
                        <div class="member-description">
                            <h5>{{ $salon->name }}</h5>
                            <span class="designations">{{ $salon->user->fullname ?? '' }}</span>
                            {{-- <div class="social-style-three">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </div> --}}
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Team Section End -->


<!-- Contact Section Start -->
<section class="team-page-contact overlay bgs-cover rel py-150 rpt-90 rpb-100" style="background-image: url(assets/images/contacts/team-page.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="team-contact-left rmb-55 wow fadeInUp delay-0-2s">
                    <div class="section-title text-white mb-25">
                        <span class="sub-title" style="color: #fff">Make Appointment</span>
                        <h2>Get Hair Treatment Booking Seat</h2>
                    </div>
                    <a href="#" class="read-more">learn more <i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
            </div>
            <div class="col-lg-7">
                <form action="#" class="team-page-form wow fadeInUp delay-0-4s">
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" id="full-name" name="full-name" class="form-control" value="" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="email" id="email" name="email" class="form-control" value="" placeholder="Email Address" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" id="number" name="number" class="form-control" value="" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="col-sm-6 mb-30">
                            <div class="form-group">
                                <select name="services" id="services">
                                   <option value="services">Services</option>
                                   <option value="service1">Hair Cutting</option>
                                   <option value="service2">Foot Massage</option>
                                   <option value="service3">Nail Colors</option>
                               </select>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-6">
                            <div class="form-group mb-0">
                                <button type="submit" class="theme-btn w-100 style-six">Make appointment <i class="fas fa-long-arrow-alt-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <img src="{{ url('assets/images/shapes/team-conteact.png') }}" alt="Circle" class="team-contact-circle">
</section>
@endsection