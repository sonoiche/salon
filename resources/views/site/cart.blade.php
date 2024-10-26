@extends('layouts.site', ['page_title' => 'Dashboard', 'header' => ''])
@section('content')
<section class="page-banner text-white py-165 rpy-130" style="background-image: url(assets/images/banners/page-banner-four.jpg);">
    <div class="container">
        <div class="banner-inner text-center">
            <span class="bg-text">Cart</span>
            <h1 class="page-title wow fadeInUp delay-0-2s">Cart Page</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb wow fadeInUp delay-0-4s">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Cart</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<!-- Page Banner End -->


<!-- Cart Area Start -->
<div class="cart-area py-130 rpy-100">
    <div class="container">
        @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
        @endif
        <div class="cart-item-wrap mb-35 wow fadeInUp delay-0-2s">
            @foreach ($carts as $cart)
            <div class="cart-single-item">
                <button type="button" class="close" onclick="removeToCart('{{ $cart->rowId }}')"><span aria-hidden="true">&times;</span></button>
                <div class="cart-img">
                    <img src="{{ url($cart->options->photo) }}" alt="Product Image" />
                </div>
                <h5 class="product-name">{{ $cart->name }}</h5>
                <span class="product-price">{{ number_format($cart->price, 2) }}</span>
                <div class="quantity-input">
                    <button class="quantity-down">-</button>
                    <input class="quantity" type="text" value="{{ $cart->qty }}" name="quantity">
                    <button class="quantity-up">+</button>
                </div>
                <span class="product-total-price">{{ number_format($cart->subtotal, 2) }}</span>
            </div>
            @endforeach
        </div>
        
        {{-- <div class="row text-center text-lg-left align-items-center wow fadeInUp delay-0-2s">
            <div class="col-lg-6">
                <div class="discount-wrapper rmb-30">
                    <form action="#" class="d-sm-flex justify-content-center justify-content-lg-start">
                        <input type="text" placeholder="Coupon Code" required>
                        <button class="theme-btn flex-none" type="submit">apply Coupon <i class="fas fa-angle-double-right"></i></button>
                    </form>
                </div>
            </div>
        </div> --}}
        
        <div class="payment-cart-total pt-25 wow fadeInUp delay-0-2s">
            <div class="row justify-content-end">
                <div class="col-lg-5">
                    <div class="shoping-cart-total mt-45">
                        <h4 class="form-title m-25">Cart Totals</h4>
                        <table>
                            <tbody>
                                <tr>
                                    <td>Cart Subtotal</td>
                                    <td class="sub-total-price text-right">{{ Cart::subtotal() }}</td>
                                </tr>
                                {{-- <tr>
                                    <td>Shipping Fee</td>
                                    <td class="shipping-price">10.00</td>
                                </tr> --}}
                                <tr>
                                    <td>VAT</td>
                                    <td class="text-right">P{{ number_format(Cart::tax(), 2) }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Order Total</strong></td>
                                    <td class="text-right"><strong class="total-price">{{ Cart::total() }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ url('checkout') }}" class="theme-btn style-two mt-25 w-100">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart Area End -->
@endsection

@push('scripts')
<script>
function removeToCart(rowId) {
    $.ajax({
        type: "DELETE",
        url: "{{ url('cart') }}/" + rowId,
        dataType: "json",
        success: function (response) {
            console.log(rowId + 'has been removed.');
            setTimeout(() => {
                location.reload();
            }, 1000);
        }
    });
}
</script>
@endpush