@extends('layouts.site', ['page_title' => 'Dashboard', 'header' => ''])
@section('content')
<!-- Shop Grid Start -->
<section class="shop-grid-area py-150 rpy-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop-sidebar rmb-75">
                    <div class="widget products-widget wow fadeInUp delay-0-2s">
                        <h5 class="widget-title">Products</h5>
                        <div class="product-item-wrap">
                            @foreach ($popular_products as $item)
                            @php
                                $slug_name = $item->product->slug_name ?? 'no-name';
                            @endphp
                            <div class="widget-product-item">
                                <div class="widget-product-image">
                                    <img src="{{ $item->feature_photo }}" alt="Popular Product" />
                                </div>
                                <div class="widget-product-content">
                                    <h6><a href="{{ url('products', $slug_name . '-' . $item->id ?? '') }}">{{ $item->product->name ?? '' }}</a></h6>
                                    <span class="price">Price P{{ $item->amount }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                   </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="shop-grid-wrap">
                   <div class="shop-shorter mb-35 wow fadeInUp delay-0-2s">
                        <div class="sort-text mb-15">
                            {{-- <span>Showing 1-09 oh 16 Result</span> --}}
                        </div>
                    </div>
                    <div class="row justify-content-between">
                        @foreach ($products as $product)
                        @php
                            $slug_name = $product->product->slug_name ?? 'no-name';
                        @endphp
                        <div class="col-md-4 col-6 col-small">
                            <div class="product-grid-item wow fadeInUp delay-0-2s">
                                {{-- <div class="rating-sale">
                                    <i class="fas fa-star"></i>
                                    <span>5</span>
                                </div> --}}
                                <div class="image">
                                    <img src="{{ url($product->feature_photo) }}" alt="Product" />
                                    <div class="action-btns">
                                        <a href="{{ url('products', $slug_name . '-' . $product->id ?? '') }}"><i class="fas fa-eye"></i></a>
                                        {{-- <a href="#"><i class="fas fa-heart"></i></a> --}}
                                    </div>
                                </div>
                                <h6><a href="{{ url('products', $slug_name . '-' . $product->id ?? '') }}">{{ $product->product->name ?? '' }}</a></h6>
                                <small>{{ $product->client->name ?? '' }}</small>
                                <span class="price">Price {{ $product->amount }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Pagination -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection