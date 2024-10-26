@extends('layouts.site')
@section('content')
<!-- Hero Section Start -->
<section class="hero-section rel z-1 bg-butter">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="hero-content mt-200 mb-220">
                    <span class="bg-text">Beauty</span>
                    <h1 class="wow fadeInUp delay-0-2s">Natural Beaulty spa salon</h1>
                    <div class="hero-btn mt-30 wow fadeInUp delay-0-4s">
                        <a href="{{ url('products') }}" class="theme-btn">Shop Now <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-right-image" style="background-image: url(assets/images/hero/hero-right.jpg);"></div>
</section>
<!-- Hero Section End -->


<!-- About Section Start -->
<section class="about-section pt-150 rpt-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-left rmb-55 wow fadeInLeft delay-0-2s">
                    <img src="assets/images/about/about-left.jpg" alt="About">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content wow fadeInRight delay-0-2s">
                    <div class="section-title mb-30">
                        <span class="bg-text">about</span>
                        <span class="sub-title">Who We Are</span>
                        <h2>Quality & Natural Beauty Salon</h2>
                    </div>
                    <p>Sed ut persiciatis unde omnis iste natus error sit voluptate maccusantium doloremque laudantium, totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explic aboemo enim ipsa</p>
                    <ul class="list-style-one pt-20 pb-25">
                        <li>Natural Beauty Salon</li>
                        <li>Professional Women Spa Service</li>
                        <li>Experience Hair Treatments</li>
                    </ul>
                    <a href="{{ url('services') }}" class="theme-btn style-two">Services <i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->




<!-- Features Section Start -->
<section class="features-section rel z-1 pt-150 rpt-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 align-self-end">
                <div class="features-image left-image wow fadeInDown delay-0-2s">
                    <img src="assets/images/services/feature-left.jpg" alt="Feature">
                </div>
            </div>
            <div class="col-xl-6">
                <div class="features-section-content">
                    <div class="section-title text-center mb-15">
                        <span class="bg-text">Features</span>
                        <span class="sub-title">What We Do</span>
                        <h2>We provide Natural Treatments</h2>
                    </div>
                    <div class="features-item-wrap pb-150">
                        <div class="feature-item wow fadeInUp delay-0-2s">
                            <div class="icon">
                                <i class="flaticon-laser"></i>
                            </div>
                            <div class="feature-content">
                                <h4><a href="service-details.html">Clinical Treatments</a></h4>
                                <span>Organic Modern Treatments</span>
                            </div>
                        </div>
                        <div class="feature-item wow fadeInUp delay-0-4s">
                            <div class="icon">
                                <i class="flaticon-relax"></i>
                            </div>
                            <div class="feature-content">
                                <h4><a href="service-details.html">Toxins Free</a></h4>
                                <span>Organic Modern Treatments</span>
                            </div>
                        </div>
                        <div class="feature-item wow fadeInUp delay-0-6s">
                            <div class="icon">
                                <i class="flaticon-spa"></i>
                            </div>
                            <div class="feature-content">
                                <h4><a href="service-details.html">Organic Products</a></h4>
                                <span>Organic Modern Treatments</span>
                            </div>
                        </div>
                        <div class="feature-item wow fadeInUp delay-0-8s">
                            <div class="icon">
                                <i class="flaticon-hand-cream"></i>
                            </div>
                            <div class="feature-content">
                                <h4><a href="service-details.html">No Side Affects</a></h4>
                                <span>Organic Modern Treatments</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="features-image right-image wow fadeInUp delay-0-2s">
                    <img src="assets/images/services/feature-right.jpg" alt="Feature">
                </div>
            </div>
        </div>
    </div>
    <div class="reatures-leaf">
        <img src="assets/images/shapes/feature-leaf.png" alt="Leaf">
    </div>
</section>
<!-- Features Section End -->

<!-- Feedback Section Start -->
<div class="feedback-section rel z-1 bg-butter">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-xl-6">
                <div class="feedback-left-image bgs-cover h-100 wow fadeInLeft delay-0-2s" style="background-image: url(assets/images/testimonials/testimonial-left.jpg);"></div>
            </div>
            <div class="col-xl-6">
                <div class="feedback-wrap rel my-145 rm-100 text-center wow fadeInRight delay-0-2s">
                    <span class="bg-text">Feedback</span>
                    <div class="feedback-item-wrap mb-35">
                        <div class="feedback-content-item">
                            Ut enim ad minima veniam, <span class="font-weight-bold">quis nostrum</span> exercitationem ullam corporis suscipit <span class="font-weight-normal">laboriosam nisi ut aliquid exea commodi consequatur</span>
                        </div>
                        <div class="feedback-content-item">
                            Ut enim ad minima veniam, <span class="font-weight-bold">quis nostrum</span> exercitationem ullam <span class="font-weight-normal">laboriosam nisi ut aliquid exea commodi consequatur corporis suscipit</span>
                        </div>
                        <div class="feedback-content-item">
                            Ut enim ad minima veniam, <span class="font-weight-bold">quis nostrum</span> exercitationem ullam corporis suscipit <span class="font-weight-normal">laboriosam nisi ut aliquid exea commodi consequatur</span>
                        </div>
                        <div class="feedback-content-item">
                            Ut enim ad minima veniam, <span class="font-weight-bold">quis nostrum</span> exercitationem ullam <span class="font-weight-normal">laboriosam nisi ut aliquid exea commodi consequatur corporis suscipit</span>
                        </div>
                    </div>
                    <div class="feedback-logo-wrap">
                        <img src="assets/images/testimonials/logo-1.png" alt="Feedback">
                        <img src="assets/images/testimonials/logo-2.png" alt="Feedback">
                        <img src="assets/images/testimonials/logo-3.png" alt="Feedback">
                        <img src="assets/images/testimonials/logo-1.png" alt="Feedback">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="feedback-leaf">
        <img src="assets/images/shapes/feedback-leaf.png" alt="Feedback Leaf">
    </div>
</div>
<!-- Feedback Section End -->

<!-- Category Section Start -->
<section class="category-section">
    <div class="category-item bg-butter wow fadeInUp delay-0-2s">
        <i class="flaticon-nail"></i>
        <div class="category-title">
            <span class="bg-text">Category</span>
            <h4><a href="service-details.html">Nail Polish</a></h4>
        </div>
        <p>Quis autem velum reprender eoluptate velit esse</p>
            <a href="service-details.html" class="read-more">read more <i class="fas fa-long-arrow-alt-right"></i></a>
        <div class="for-border"></div>
    </div>
    <div class="category-item bg-light-gray wow fadeInUp delay-0-4s">
        <i class="flaticon-eyebrow"></i>
        <div class="category-title">
            <span class="bg-text">Category</span>
            <h4><a href="service-details.html">Brow Polish</a></h4>
        </div>
        <p>Quis autem velum reprender eoluptate velit esse</p>
            <a href="service-details.html" class="read-more">read more <i class="fas fa-long-arrow-alt-right"></i></a>
            <div class="for-border"></div>
    </div>
    <div class="category-item bg-butter wow fadeInUp delay-0-6s">
        <i class="flaticon-hairdresser"></i>
        <div class="category-title">
            <span class="bg-text">Category</span>
            <h4><a href="service-details.html">Hair Dresser</a></h4>
        </div>
        <p>Quis autem velum reprender eoluptate velit esse</p>
            <a href="service-details.html" class="read-more">read more <i class="fas fa-long-arrow-alt-right"></i></a>
            <div class="for-border"></div>
    </div>
    <div class="category-item bg-light-gray wow fadeInUp delay-0-8s">
        <i class="flaticon-pedicure"></i>
        <div class="category-title">
            <span class="bg-text">Category</span>
            <h4><a href="service-details.html">Foot Massage</a></h4>
        </div>
        <p>Quis autem velum reprender eoluptate velit esse</p>
            <a href="service-details.html" class="read-more">read more <i class="fas fa-long-arrow-alt-right"></i></a>
            <div class="for-border"></div>
    </div>
    <div class="category-item bg-butter wow fadeInUp delay-1-0s">
        <i class="flaticon-cosmetics"></i>
        <div class="category-title">
            <span class="bg-text">Category</span>
            <h4><a href="service-details.html">Cosmetics</a></h4>
        </div>
        <p>Quis autem velum reprender eoluptate velit esse</p>
            <a href="service-details.html" class="read-more">read more <i class="fas fa-long-arrow-alt-right"></i></a>
            <div class="for-border"></div>
    </div>
</section>
<!-- Category Section End -->
@endsection