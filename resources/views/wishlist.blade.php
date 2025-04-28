@extends('layouts.layout')

<?php
    $title = 'Wishlist Page';
    $subTitle = 'Home';
?>

@section('content')
    <!-- wishlist area start -->
    <div class="wishlist-area pt-140 pb-110">
        <div class="container">
            <div class="table-responsive wishlist-wrap mb-30">
                <table class="table wishlist-table tp_fade_bottom">
                    <thead>
                        <tr>
                            <th scope="col" class="first">Product</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Stock Status</th>
                            <th scope="col" class="end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="product">
                                <a href="#" ><i class="fa-regular fa-xmark"></i></a>
                                <div class="product-inner">
                                    <img src="{{ asset('assets/images/shop/common/1.png') }}" alt="">
                                    <h6>CreatBot Mindful Arts</h6>
                                </div>
                            </td>
                            <td>
                                <h6>$15.00 – $20.00</h6>
                            </td>
                            <td>
                                <h6>In stock</h6>
                            </td>
                            <td>
                                <a href="#" class="theme-btn-2">Add to Cart</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="product">
                                <a href="#" ><i class="fa-regular fa-xmark"></i></a>
                                <div class="product-inner">
                                    <img src="{{ asset('assets/images/shop/common/2.png') }}" alt="">
                                    <h6>CreatBot Mindful Arts</h6>
                                </div>
                            </td>
                            <td>
                                <h6>$18.00 – $20.00</h6>
                            </td>
                            <td>
                                <h6>In stock</h6>
                            </td>
                            <td>
                                <a href="#" class="theme-btn-2">Add to Cart</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="product">
                                <a href="#" ><i class="fa-regular fa-xmark"></i></a>
                                <div class="product-inner">
                                    <img src="{{ asset('assets/images/shop/common/3.png') }}" alt="">
                                    <h6>CreatBot Mindful Arts</h6>
                                </div>
                            </td>
                            <td>
                                <h6>$11.00 – $20.00</h6>
                            </td>
                            <td>
                                <h6>In stock</h6>
                            </td>
                            <td>
                                <a href="#" class="theme-btn-2">Add to Cart</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="product">
                                <a href="#" ><i class="fa-regular fa-xmark"></i></a>
                                <div class="product-inner">
                                    <img src="{{ asset('assets/images/shop/common/4.png') }}" alt="">
                                    <h6>CreatBot Mindful Arts</h6>
                                </div>
                            </td>
                            <td>
                                <h6>$12.00 – $20.00</h6>
                            </td>
                            <td>
                                <h6>In stock</h6>
                            </td>
                            <td>
                                <a href="#" class="theme-btn-2">Add to Cart</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="product">
                                <a href="#" ><i class="fa-regular fa-xmark"></i></a>
                                <div class="product-inner">
                                    <img src="{{ asset('assets/images/shop/common/5.png') }}" alt="">
                                    <h6>CreatBot Mindful Arts</h6>
                                </div>
                            </td>
                            <td>
                                <h6>$10.00 – $20.00</h6>
                            </td>
                            <td>
                                <h6>In stock</h6>
                            </td>
                            <td>
                                <a href="#" class="theme-btn-2">Add to Cart</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-xxl-12 tp_has_fade_anim" data-fade-from="right" data-delay=".5">
                    <div class="wishlist-cart mb-30">
                        <a href="#">Add Selected to Cart</a>
                        <a href="#">Add all to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- wishlist area end -->
@endsection
