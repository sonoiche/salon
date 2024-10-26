@extends('layouts.site', ['page_title' => 'Dashboard', 'header' => ''])
@section('content')
<section class="page-banner text-white py-165 rpy-130" style="background-image: url(assets/images/banners/page-banner-four.jpg);">
    <div class="container">
        <div class="banner-inner text-center">
            <span class="bg-text">Checkout</span>
            <h1 class="page-title wow fadeInUp delay-0-2s">Checkout</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb wow fadeInUp delay-0-4s">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<!-- Page Banner End -->

<form action="{{ url('checkout') }}" method="post">
    @csrf
    <!-- Checkout Form Area Start -->
    <div class="checkout-form-area pt-145 pb-150 rpt-95 rpb-100">
        <div class="container">
            <h4 class="form-title mb-25">Billing Details</h4>
            <div class="row">
                <div class="col-lg-12">
                    <h6>Personal Information</h6>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" id="fname" name="fname" class="form-control" value="{{ $customer->fname ?? '' }}" placeholder="First Name" required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" id="lname" name="lname" class="form-control" value="{{ $customer->lname ?? '' }}" placeholder="Last Name" required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" id="contact_number" name="contact_number" class="form-control" value="{{ $customer->contact_number ?? '' }}" placeholder="Phone Number" required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-control" value="{{ $customer->email ?? '' }}" placeholder="Email Address" required />
                    </div>
                </div>
                <div class="col-lg-12">
                    <h6>Your Address</h6>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" id="street_name" name="street_name" class="form-control" value="{{ $customer->address ?? '' }}" placeholder="House, street name" required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" id="city" name="city" class="form-control" value="{{ $customer->city ?? '' }}" placeholder="City" required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" id="zip" name="zip" class="form-control" value="{{ $customer->zip_code ?? '' }}" placeholder="Zip" required />
                    </div>
                </div>
                <div class="col-lg-12">
                    <h6>Order Notes (optional)</h6>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-0">
                        <textarea name="order_note" id="order-note" class="form-control" rows="5" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                    </div>
                </div>
            </div>
            <div class="payment-cart-total pt-25">
                <div class="row justify-content-between">
                    <div class="col-lg-6">
                        <div class="payment-method mt-45 wow fadeInUp delay-0-2s">
                            <h4 class="form-title my-25">Payment Method</h4>
                            <ul id="paymentMethod" class="mb-30">
                                <!-- Default unchecked -->
                                <li class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="methodone" name="payment_method" value="GCash" checked>
                                    <label class="custom-control-label" for="methodone" data-toggle="collapse" data-target="#collapseOne" aria-controls="collapseOne">GCash Transfer</label>

                                    <div id="collapseOne" class="collapse show" data-parent="#paymentMethod">
                                        <p>Make your payment directly into our GCash account. Please use your Order ID as the payment reference. Your order will be ship once the payment has been verified.</p>
                                    </div>
                                </li>

                                <!-- Default unchecked -->
                                <li class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="methodtwo" name="payment_method" value="Cash">
                                    <label class="custom-control-label collapsed" for="methodtwo" data-toggle="collapse" data-target="#collapseTwo" aria-controls="collapseTwo">Cash On Delivery</label>

                                    <div id="collapseTwo" class="collapse" data-parent="#paymentMethod">
                                        <p>Pay with cash upon delivery.</p>
                                    </div>
                                </li>

                            </ul>
                            <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
                            <button type="submit" class="theme-btn style-two mt-15">Place order</button>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="shoping-cart-total mt-45 wow fadeInUp delay-0-4s">
                            <h4 class="form-title m-25">Cart Totals</h4>
                            <table>
                                <tbody>
                                    @foreach ($carts as $cart)
                                    <input type="hidden" name="product_name[]" value="{{ $cart->name }}" />
                                    <input type="hidden" name="quantity[]" value="{{ $cart->qty }}" />
                                    <input type="hidden" name="subtotal[]" value="{{ $cart->subtotal }}" />
                                    <input type="hidden" name="product_id[]" value="{{ $cart->options->product_id }}" />
                                    <tr>
                                        <td>{{ $cart->name }} <strong>× {{ $cart->qty }}</strong></td>
                                        <td class="text-right">P{{ number_format($cart->subtotal, 2) }}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td>Vat</td>
                                        <td class="text-right">P{{ Cart::tax() }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Order Total</strong></td>
                                        <td class="text-right"><strong>P{{ Cart::total() }}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="total_amount" value="{{ Cart::total() }}" />
    <input type="hidden" name="tax" value="{{ Cart::tax() }}" />
</form>
<!-- Checkout Form Area End -->
@endsection

@section('css')
<style>
.form-control {
    padding: 12px 10px;
    font-weight: 400;
    font-size: 14px;
}
</style>
@endsection