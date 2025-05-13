@extends('layouts.layout')

<?php
    $title = 'Cart';
    $subTitle = 'Home';
?>

@section('content')

    <!-- cart area start -->
    <div class="cart-area pt-140 pb-110">
        <div class="container">
            <div class="table-responsive cart-wrap mb-60">
                <table class="table cart-table tp_fade_bottom">
                    <thead>
                        <tr>
                            <th scope="col" class="first">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col" class="end">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="product">
                                <img src="{{ asset('assets/images/shop/common/1.png') }}" alt="">
                                <h6><a href="{{ url('shop') }}">CreatBot Mindful Arts</a></h6>
                            </td>
                            <td>
                                <h6>$35.65</h6>
                            </td>
                            <td>
                                <div class="cart-action-box quantity-box ">
                                    <a  href="#0" class="minus"><i class="fa-regular fa-minus"></i></a>
                                    <input type="text" readonly name="quantity" value="1">
                                    <a href="#0" class="plus"><i class="fa-regular fa-plus"></i></a>
                                </div>
                            </td>
                            <td>
                                <h6>70.65</h6>
                            </td>
                            <td>
                                <a href="#" class="close"><i class="fa-regular fa-xmark"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="product">
                                <img src="{{ asset('assets/images/shop/common/2.png') }}" alt="">
                                <h6><a href="{{ url('shop') }}">CreatBot Mindful Arts</a></h6>
                            </td>
                            <td>
                                <h6>$35.65</h6>
                            </td>
                            <td>
                                <div class="cart-action-box quantity-box ">
                                    <a  href="#0" class="minus"><i class="fa-regular fa-minus"></i></a>
                                    <input type="text" readonly name="quantity" value="1">
                                    <a href="#0" class="plus"><i class="fa-regular fa-plus"></i></a>
                                </div>
                            </td>
                            <td>
                                <h6>70.65</h6>
                            </td>
                            <td>
                                <a href="#" class="close"><i class="fa-regular fa-xmark"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="product">
                                <img src="{{ asset('assets/images/shop/common/3.png') }}" alt="">
                                <h6><a href="{{ url('shop') }}">CreatBot Mindful Arts</a></h6>
                            </td>
                            <td>
                                <h6>$35.65</h6>
                            </td>
                            <td>
                                <div class="cart-action-box quantity-box ">
                                    <a  href="#0" class="minus"><i class="fa-regular fa-minus"></i></a>
                                    <input type="text" readonly name="quantity" value="1">
                                    <a href="#0" class="plus"><i class="fa-regular fa-plus"></i></a>
                                </div>
                            </td>
                            <td>
                                <h6>70.65</h6>
                            </td>
                            <td>
                                <a href="#" class="close"><i class="fa-regular fa-xmark"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="product">
                                <img src="{{ asset('assets/images/shop/common/4.png') }}" alt="">
                                <h6><a href="{{ url('shop') }}">CreatBot Mindful Arts</a></h6>
                            </td>
                            <td>
                                <h6>$35.65</h6>
                            </td>
                            <td>
                                <div class="cart-action-box quantity-box ">
                                    <a  href="#0" class="minus"><i class="fa-regular fa-minus"></i></a>
                                    <input type="text" readonly name="quantity" value="1">
                                    <a href="#0" class="plus"><i class="fa-regular fa-plus"></i></a>
                                </div>
                            </td>
                            <td>
                                <h6>70.65</h6>
                            </td>
                            <td>
                                <a href="#" class="close"><i class="fa-regular fa-xmark"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="product">
                                <img src="{{ asset('assets/images/shop/common/5.png') }}" alt="">
                                <h6><a href="{{ url('shop') }}">CreatBot Mindful Arts</a></h6>
                            </td>
                            <td>
                                <h6>$35.65</h6>
                            </td>
                            <td>
                                <div class="cart-action-box quantity-box ">
                                    <a  href="#0" class="minus"><i class="fa-regular fa-minus"></i></a>
                                    <input type="text" readonly name="quantity" value="1">
                                    <a href="#0" class="plus"><i class="fa-regular fa-plus"></i></a>
                                </div>
                            </td>
                            <td>
                                <h6>70.65</h6>
                            </td>
                            <td>
                                <a href="#" class="close"><i class="fa-regular fa-xmark"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-8 col-md-8 tp_has_fade_anim" data-fade-from="left">
                    <div class="cart-coupon mb-30">
                        <input type="text" placeholder="Coupon Code">
                        <button type="submit">Apply coupon</button>

                    </div>
                </div>
                <div class="col-xl-6 col-lg-4 col-md-4 tp_has_fade_anim" data-fade-from="right">
                    <div class="cart-buttons mb-30 text-md-end" >
                        <a href="#" class="disable-cart-btn">Update Cart</a>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row justify-content-end">
                        <div class="col-xl-4 col-lg-5  col-md-6 tp_has_fade_anim" data-fade-from="right">
                            <div class="cart-order mb-30 mt-40">
                                <h5>Total Cart (05)</h5>
                                <ul>
                                    <li>Subtotal : <span>$755.00</span></li>
                                    <li>Delivery : <span>$55.00</span></li>
                                    <li>Discount : <span>$75.00</span></li>
                                    <li>Total : <span>$856.00</span></li>
                                </ul>
                                <a href="#" class="cart-order-btn mt-30">Proceed To Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- cart area end -->
@endsection
