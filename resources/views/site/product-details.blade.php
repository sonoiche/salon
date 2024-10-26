@extends('layouts.site', ['page_title' => 'Dashboard', 'header' => ''])
@section('content')
<!-- Page Banner Start -->
<section class="page-banner text-white py-165 rpy-130" style="background-image: url({{ url('assets/images/banners/page-banner-four.jpg')}});">
    <div class="container">
        <div class="banner-inner text-center">
            <span class="bg-text">Product Details</span>
            <h1 class="page-title wow fadeInUp delay-0-2s">Product Details</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb wow fadeInUp delay-0-4s">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Product Details</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<!-- Page Banner End -->


<!-- Product Details Start -->
<section class="product-details-area pt-150 rpt-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="product-image-tab rmb-50 wow fadeInLeft delay-0-2s">
                    <div class="preview-images tab-content">
                        @foreach ($product->photos as $key => $photo)
                        <div class="preview-item tab-pane fade {{ ($key == 0) ? 'show active' : '' }}" id="preview-{{ $key }}">
                            <img src="{{ url($photo->photo) }}" alt="Preview">
                        </div>
                        @endforeach
                    </div>
                    <div class="thumb-images nav">
                        @foreach ($product->photos as $key => $photo)
                        <a class="thumb-item nav-item {{ ($key == 0) ? 'active' : '' }}" href="#preview-{{ $key }}" data-toggle="tab">
                            <img src="{{ url($photo->photo) }}" alt="Thumb" />
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product-details-content wow fadeInRight delay-0-2s">
                    <h2>{{ $product->product->name ?? '' }}</h2>
                    <div class="rating-text">
                        <span class="price">Price {{ $product->amount }}</span>
                        {{-- <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <a href="#">(5k Reviews)</a> --}}
                   </div>
                    <p>{{ $product->description }}</p>
                    <form action="{{ url('cart') }}" method="post">
                        @csrf
                        <table>
                            <tr>
                                <td><b>SKU</b></td>
                                <td><span>:</span></td>
                                <td>{{ $product->product_sku }}</td>
                            </tr>
                            {{-- <tr>
                                <td><b>Category</b></td>
                                <td><span>:</span></td>
                                <td>{{ $product->category->name ?? '' }}</td>
                            </tr> --}}
                            <tr>
                                <td><b>Quantity</b></td>
                                <td><span>:</span></td>
                                <td>
                                    <div class="add-to-cart">
                                        <div class="quantity-input">
                                            <button class="quantity-down" id="quantityDown" type="button">
                                                -
                                            </button>
                                            <input id="quantity" type="number" value="1" name="quantity" />
                                            <button class="quantity-up" id="quantityUP" type="button">
                                                +
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                    @if (auth()->user()->role == 'Customer')
                                    <button class="theme-btn style-six" type="submit">add to cart <i class="fas fa-long-arrow-alt-right"></i></button>
                                    @else
                                    <button class="theme-btn style-six" type="button" id="seller-btn">add to cart <i class="fas fa-long-arrow-alt-right"></i></button>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="product-details-information pt-50 pb-60 wow fadeInUp delay-0-2s" id="product-details-information">
            <ul class="nav nav-tabs product-information-tab mb-30">
                <li><a href="#details" data-toggle="tab" class="active show">Description</a></li>
                {{-- <li><a href="#information" data-toggle="tab">Additional Information</a></li>
                <li><a href="#review" data-toggle="tab">Review (02)</a></li> --}}
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="details">
                    <p>{{ $product->description }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details End -->


<!-- Review Form Start -->
{{-- <div class="review-form-area wow fadeInUp delay-0-4s">
    <div class="container">
        <div class="review-form-wrap">
           <h3 class="review-form-title mb-0">Leave a Reviews</h3>
           <div class="rating-text">
                Please Leave your valiable rating : 
               <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
           </div>
            <form action="#" class="review-form mt-35">
                <div class="row clearfix">
                    <div class="col-md-4">
                        <div class="form-group">
                           <label for="name"><i class="far fa-user"></i></label>
                            <input type="text" id="name" name="name" class="form-control" value="" placeholder="Full Name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                           <label for="email"><i class="far fa-envelope"></i></label>
                            <input type="email" id="email" name="email" class="form-control" value="" placeholder="Email Us" required="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" id="website" name="website" class="form-control" value="" placeholder="Website">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <textarea rows="5" class="form-control" placeholder="Write Comments" required></textarea>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-8">
                        <div class="form-group mb-0">
                            <button type="submit" class="theme-btn w-100 style-six">send  Review <i class="fas fa-long-arrow-alt-right"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> --}}
<!-- Review Form End -->


<!-- Related Product Start -->
{{-- <section class="related-product pt-135 pb-95 rpt-85 rpb-45">
    <div class="container">
        <div class="section-title text-center mb-65">
            <span class="bg-text">Product</span>
            <span class="sub-title">Our Product</span>
            <h2>Best Related Products</h2>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-6 col-small">
                <div class="product-grid-item wow fadeInUp delay-0-2s">
                    <div class="rating-sale">
                        <i class="fas fa-star"></i>
                        <span>5</span>
                    </div>
                    <div class="image">
                        <img src="{{ url('assets/images/products/product1.jpg') }}" alt="Product">
                        <div class="action-btns">
                            <a href="#"><i class="fas fa-cart-plus"></i></a>
                            <a href="#"><i class="fas fa-heart"></i></a>
                        </div>
                    </div>
                    <h6><a href="product-details.html">Organic Fresh Soap</a></h6>
                    <span class="price">Price $29</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6 col-small">
                <div class="product-grid-item wow fadeInUp delay-0-4s">
                    <div class="rating-sale">
                        <i class="fas fa-star"></i>
                        <span>3</span>
                    </div>
                    <div class="image">
                        <img src="{{ url('assets/images/products/product2.jpg') }}" alt="Product">
                        <div class="action-btns">
                            <a href="#"><i class="fas fa-cart-plus"></i></a>
                            <a href="#"><i class="fas fa-heart"></i></a>
                        </div>
                    </div>
                    <h6><a href="product-details.html">Organic Fresh Soap</a></h6>
                    <span class="price">Price $29</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6 col-small">
                <div class="product-grid-item wow fadeInUp delay-0-6s">
                    <div class="rating-sale">
                        <span>Sale</span>
                    </div>
                    <div class="image">
                        <img src="{{ url('assets/images/products/product3.jpg') }}" alt="Product">
                        <div class="action-btns">
                            <a href="#"><i class="fas fa-cart-plus"></i></a>
                            <a href="#"><i class="fas fa-heart"></i></a>
                        </div>
                    </div>
                    <h6><a href="product-details.html">Organic Fresh Soap</a></h6>
                    <span class="price">Price $29</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6 col-small">
                <div class="product-grid-item wow fadeInUp delay-0-8s">
                    <div class="rating-sale">
                        <i class="fas fa-star"></i>
                        <span>5</span>
                    </div>
                    <div class="image">
                        <img src="{{ url('assets/images/products/product4.jpg') }}" alt="Product">
                        <div class="action-btns">
                            <a href="#"><i class="fas fa-cart-plus"></i></a>
                            <a href="#"><i class="fas fa-heart"></i></a>
                        </div>
                    </div>
                    <h6><a href="product-details.html">Organic Fresh Soap</a></h6>
                    <span class="price">Price $29</span>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- Related Product End -->
@endsection

@push('scripts')
<script>
$(document).ready(function () {
    $('#seller-btn').click(function (e) { 
        e.preventDefault();
        alert('As a salon owner, you are not allowed to buy products from other salon. Please login using your customer account.');
    });
});
</script>
@endpush