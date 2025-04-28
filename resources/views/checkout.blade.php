@extends('layouts.layout')

<?php
    $title = 'Checkout';
    $subTitle = 'Home';
?>

@section('content')
    <!-- checkout area start -->
    <section class="checkout-area pt-140 mb-100">
        <div class="container">
            <div class="checkout-top mb-60">
                <div class="checkout-top-item  tp_has_fade_anim" data-fade-from="left">
                    <span><a href="{{ url('cart') }}">01</a></span>
                    <p><a href="{{ url('cart') }}">Shopping Cart</a></p>
                </div>
                <div class="checkout-top-item  tp_has_fade_anim" data-fade-from="left" data-delay=".8">
                    <span><a href="#">02</a></span>
                    <p><a href="#">Payment & Delivery Options</a></p>
                </div>
                <div class="checkout-top-item last-item  tp_has_fade_anim" data-fade-from="left" data-delay="1.1">
                    <span>03</span>
                    <p>Order Received</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-left mr-50 mb-40">
                        <h2 class="checkout-title tp_has_text_reveal_anim">Billing details</h2>
                        <div class="checkout-form tp_fade_right">
                            <form action="#">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="checkout-form-item mb-25">
                                            <input type="text" placeholder="Fast Name">
                                            <i class="fa-light fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="checkout-form-item mb-25">
                                            <input type="text" placeholder="Last Name">
                                            <i class="fa-light fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="checkout-form-item mb-25">
                                            <input type="email" placeholder="Your Email">
                                            <i class="fa-light fa-envelope"></i>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="checkout-form-item mb-25">
                                            <input type="text" placeholder="Phone Number">
                                            <i class="fa-light fa-phone"></i>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="checkout-form-item mb-25">
                                            <input type="text" placeholder="Company Name (optional)">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="checkout-form-item mb-25">
                                            <input type="text" placeholder="Town / City">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="checkout-form-item mb-25">
                                            <input type="text" placeholder="State">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="checkout-form-item mb-25">
                                            <input type="text" placeholder="ZIP Code">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="checkout-form-item mb-25">
                                            <input type="text" placeholder="Address">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="checkout-form-item">
                                            <textarea name="message" placeholder="Additional Information"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-right mb-40">
                        <div class="checkout-order-wrap mb-30">
                            <h2 class="checkout-title tp_has_text_reveal_anim">Your order</h2>
                            <div class="checkout-order tp_fade_left">
                                <h5>Total Cart (05)</h5>
                                <ul>
                                    <li>Subtotal : <span>$755.00</span></li>
                                    <li>Delivery : <span>$55.00</span></li>
                                    <li>Discount : <span>$75.00</span></li>
                                    <li>Total : <span>$856.00</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="checkout-payment-wrap">
                            <h2 class="checkout-title tp_has_text_reveal_anim">Payment</h2>
                            <div class="checkout-payment tp_fade_left">
                                <div class="checkout-payment-item">
                                    <label class="condition-checkbox">
                                        Check payments
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>Please send a check to Store Name, Store Street, Town, Store State / County, Store Postcode.</p>
                                </div>
                                <div class="checkout-payment-item">
                                    <label class="condition-checkbox">
                                        Check on delivery
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout-payment-text">
                                    <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#">Privacy policy.</a></p>
                                </div>
                                <a href="#" class="checkout-payment-btn">Place Order</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- checkout area end -->
@endsection
