@extends('layouts.layout1')

@section('header')
    <header class="h3_header-area header-sticky">
        <div class="container custom-container-1">
            <div class="row align-items-center">

                <div class="col-xl-2 col-lg-2 col-6">
                    <div class="h3_header-logo">
                        <a href="{{ url('index') }}"><img src="{{ asset('assets/images/logo/scope-purple-black-horizontal.svg') }}" alt="Image Not Found"></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-8 d-none d-lg-block text-center">
                    <div class="h3_header-menu ">
                        <nav class="h3_header-nav-menu" id="mobile-menu">
                            <ul>
                                <li class="menu-has-child">
                                    <a href="{{ url('index') }}">Home</a>
                                    <ul class="submenu">
                                        <li><a href="{{ url('index') }}">AI Doodle</a></li>
                                        <li><a href="{{ url('index-2') }}">AI Co-Pilot</a></li>
                                        <li><a href="{{ url('index-3') }}">AI Image Generator</a></li>
                                        <li><a href="{{ url('index-4') }}">AI Text Generator</a></li>
                                        <li><a href="{{ url('index-5') }}">AI Photostock</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ url('about') }}">About</a></li>
                                <li class="menu-has-child">
                                    <a href="#">Pages</a>
                                    <ul class="submenu">
                                        <li><a href="{{ url('service') }}">Services</a></li>
                                        <li><a href="{{ url('team') }}">Team</a></li>
                                        <li><a href="{{ url('work') }}">Portfolio</a></li>
                                        <li><a href="{{ url('price') }}">Pricing</a></li>
                                        <li><a href="{{ url('faq') }}">FAQ's</a></li>
                                        <li><a href="{{ url('testimonial') }}">Testimonials</a></li>
                                        <li><a href="{{ url('wishlist') }}">Wishlist</a></li>
                                        <li><a href="{{ url('cart') }}">Cart</a></li>
                                        <li><a href="{{ url('checkout') }}">Checkout</a></li>
                                        <li><a href="{{ url('login') }}">Login</a></li>
                                        <li><a href="{{ url('404') }}">404</a></li>
                                    </ul>
                                </li>
                                <li class="menu-has-child">
                                    <a href="{{ url('shop') }}">Shop</a>
                                    <ul class="submenu">
                                        <li><a href="{{ url('shop') }}">Shop</a></li>
                                        <li><a href="{{ url('shop-details') }}">Shop Details</a></li>
                                    </ul>
                                </li>
                                <li class="menu-has-child">
                                    <a href="{{ url('blog') }}">Blog</a>
                                    <ul class="submenu">
                                        <li><a href="{{ url('blog') }}">Blog</a></li>
                                        <li><a href="{{ url('blog-details') }}">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ url('contact') }}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-2 col-6">
                    <div class="h2_header-action-wrap d-flex align-items-center justify-content-end justify-content-xl-center">
                        <div class="h3_header-action d-none d-sm-flex">
                            <a href="#" class="h3_header-action-btn">
                                Get The App
                            </a>
                        </div>
                        <div class="header-menu-bar d-lg-none ml-10">
                            <span class="header-menu-bar-icon side-toggle">
                                <i class="fa-light fa-bars"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <main>
        <!-- banner area start -->
        <section class="h3_banner-area">
            <div class="container custom-container-1">
                <div class="h3_banner-single">
                    <div class="h3_banner-content">
                        <span class="h3_banner-content-subtitle tp_fade_left">Next-Generation of AI Images</span>
                        <h1 class="h3_banner-content-title tp_title_anim">Artificially intelligent
                            tools for naturally
                            <span>creative</span> Images</h1>
                        <div class="h3_banner-form tp_fade_bottom">
                            <form action="#">
                                <input type="text" placeholder="Start with a detailed description">
                                <button type="submit">Generate</button>
                            </form>
                        </div>
                    </div>
                    <div class="h3_banner-right d-none d-lg-flex">
                        <div class="inner-item">
                            <div class="swiper h3_banner-active">
                                <div class="swiper-wrapper ">
                                    <div class="swiper-slide">
                                        <div class="h3_banner-img">
                                            <img src="{{ asset('assets/images/banner/home3/1.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="h3_banner-img">
                                            <img src="{{ asset('assets/images/banner/home3/2.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="h3_banner-img">
                                            <img src="{{ asset('assets/images/banner/home3/3.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="inner-item">
                            <div class="swiper h3_banner-active-2">
                                <div class="swiper-wrapper ">
                                    <div class="swiper-slide">
                                        <div class="h3_banner-img">
                                            <img src="{{ asset('assets/images/banner/home3/4.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="h3_banner-img">
                                            <img src="{{ asset('assets/images/banner/home3/5.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="h3_banner-img">
                                            <img src="{{ asset('assets/images/banner/home3/6.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="h3_banner-shape d-none d-sm-block">
                <img src="{{ asset('assets/images/banner/home3/shape-1.png') }}" alt="Image Not Found" class="h3_banner-shape-1" data-speed="0.8">
                <img src="{{ asset('assets/images/banner/home3/shape-2.png') }}" alt="Image Not Found" class="h3_banner-shape-2" data-speed="0.7">
                <img src="{{ asset('assets/images/banner/home3/shape-3.png') }}" alt="Image Not Found" class="h3_banner-shape-3" data-speed="0.9">
            </div>
        </section>
        <!-- banner area end -->

        <!-- service area start -->
        <section class="h3_service-area pt-130 pb-110">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-8">
                        <div class="h3_section-area text-center mb-50">
                            <h2 class="h3_section-title tp_title_slideup mb-0">Create stunning visual
                                in second!</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left">
                        <div class="h3_service-item mb-30">
                            <span class="h3_service-item-number">01</span>
                            <div class="h3_service-item-icon">
                                <img src="{{ asset('assets/images/service/home3/1.png') }}" alt="">
                            </div>
                            <h5 class="h3_service-item-title"><a href="{{ url('service-details') }}">Speed and efficiency</a></h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting is One of te best AI.</p>
                            <a href="{{ url('service-details') }}" class="h3_service-item-btn">Learn More<i class="fa-light fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay=".8">
                        <div class="h3_service-item mb-30">
                            <span class="h3_service-item-number">02</span>
                            <div class="h3_service-item-icon">
                                <img src="{{ asset('assets/images/service/home3/2.png') }}" alt="">
                            </div>
                            <h5 class="h3_service-item-title"><a href="{{ url('service-details') }}">Very Lower cost</a></h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting is One of te best AI.</p>
                            <a href="{{ url('service-details') }}" class="h3_service-item-btn">Learn More<i class="fa-light fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.1">
                        <div class="h3_service-item mb-30">
                            <span class="h3_service-item-number">03</span>
                            <div class="h3_service-item-icon">
                                <img src="{{ asset('assets/images/service/home3/3.png') }}" alt="">
                            </div>
                            <h5 class="h3_service-item-title"><a href="{{ url('service-details') }}">High quality & realism</a></h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting is One of te best AI.</p>
                            <a href="{{ url('service-details') }}" class="h3_service-item-btn">Learn More<i class="fa-light fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.3">
                        <div class="h3_service-item mb-30">
                            <span class="h3_service-item-number">04</span>
                            <div class="h3_service-item-icon">
                                <img src="{{ asset('assets/images/service/home3/4.png') }}" alt="">
                            </div>
                            <h5 class="h3_service-item-title"><a href="{{ url('service-details') }}">Customizable & unlimited
                                generated</a></h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                            <a href="{{ url('service-details') }}" class="h3_service-item-btn">Learn More<i class="fa-light fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- service area end -->

        <!-- work area start -->
        <section class="h3_work-area pt-130 pb-140">
            <div class="container">
                <div class="row mb-30 align-items-center">
                    <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-9">
                        <div class="h3_section-area mb-20">
                            <h2 class="h3_section-title tp_title_slideup mb-0">A journey trough the art of
                                our community</h2>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-5 col-lg-4 col-md-3">
                        <div class="h3_work-top-btn mb-30">
                            <a href="#">Showcase</a>
                        </div>
                    </div>
                </div>
                <div class="h3_work-wrap">
                    <div class="h3_work-item tp_fade_right">
                        <div class="h3_work-item-img">
                            <a href="assets/images/work/home3/1.png" class="popup-image"><img src="{{ asset('assets/images/work/home3/1.png') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="h3_work-item d-flex flex-column gap-20 h3_work-item-2 tp_fade_bottom">
                        <div class="h3_work-item-img">
                            <a href="assets/images/work/home3/2.png" class="popup-image"><img src="{{ asset('assets/images/work/home3/2.png') }}" alt=""></a>
                        </div>
                        <div class="h3_work-item-img">
                            <a href="assets/images/work/home3/3.png" class="popup-image"><img src="{{ asset('assets/images/work/home3/3.png') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="h3_work-item h3_work-item-3 tp_fade_left">
                        <div class="h3_work-item-img">
                            <a href="assets/images/work/home3/4.png" class="popup-image"><img src="{{ asset('assets/images/work/home3/4.png') }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- work area end -->

        <!-- price area start -->
        <section class="h3_price-area pt-130">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-10">
                        <div class="h3_section-area text-center mb-50">
                            <h2 class="h3_section-title tp_title_slideup mb-0">Ready to get started? we'll
                                keep you under budget</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="h3_price-tab tp_fade_bottom">
                            <ul class="nav nav-pills mb-40" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Monthly</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Annually</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                        <div class="row align-items-end">
                            <div class="col-xl-4 col-md-6 tp_fade_left" data-fade-from="left">
                                <div class="price-item price-item-1">
                                    <div class="price-item-head">
                                        <h5 class="price-item-title">Free Trial</h5>
                                        <h2 class="price-item-amount-title">Free</h2>
                                        <p>No Need For Credit Card</p>
                                        <a class="price-item-btn" href="#">Choose Plan<i class="fa-light fa-angle-right"></i></a>
                                    </div>
                                    <ul class="price-item-list">
                                        <li>
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Priority email & chat support 0
                                        </li>
                                        <li>
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Access 12+ use-cases
                                        </li>
                                        <li class="not-abatable">
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Generate 1,000 AI Words / month
                                        </li>
                                        <li class="not-abatable">
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Google Docs style editor
                                        </li>
                                        <li class="not-abatable">
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Compose & command features
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay=".8">
                                <div class="price-item active">
                                    <div class="price-item-head">
                                        <h5 class="price-item-title">Standard Plan</h5>
                                        <div class="price-item-amount"><del>$85</del><h2 class="price-item-amount-title">$35<span>.8</span></h2><span class="amount-offer">49.2%</span></div>
                                        <p>/Month (annually billed)</p>
                                        <span class="price-item-offer">SAVE UP TO $54.2</span>
                                        <a class="price-item-btn" href="#">Choose Plan<i class="fa-light fa-angle-right"></i></a>
                                    </div>
                                    <ul class="price-item-list">
                                        <li>
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Priority email & chat support 0
                                        </li>
                                        <li>
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Access 12+ use-cases
                                        </li>
                                        <li>
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Generate 1,000 AI Words / month
                                        </li>
                                        <li class="not-abatable">
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Google Docs style editor
                                        </li>
                                        <li class="not-abatable">
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Compose & command features
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.1">
                                <div class="price-item">
                                    <div class="price-item-head">
                                        <h5 class="price-item-title">Premium Plan</h5>
                                        <div class="price-item-amount"><del>$99</del><h2 class="price-item-amount-title">$89<span>.8</span></h2><span class="amount-offer">30%</span></div>
                                        <p>/Month (annually billed)</p>
                                        <span class="price-item-offer">SAVE UP TO $27.2</span>
                                        <a class="price-item-btn" href="#">Choose Plan<i class="fa-light fa-angle-right"></i></a>
                                    </div>
                                    <ul class="price-item-list">
                                        <li>
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Priority email & chat support 0
                                        </li>
                                        <li>
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Access 12+ use-cases
                                        </li>
                                        <li>
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Generate 1,000 AI Words / month
                                        </li>
                                        <li>
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Google Docs style editor
                                        </li>
                                        <li>
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Compose & command features
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                        <div class="row align-items-end">
                            <div class="col-xl-4 col-md-6 tp_fade_left" data-fade-from="left">
                                <div class="price-item price-item-1">
                                    <div class="price-item-head">
                                        <h5 class="price-item-title">Free Trial</h5>
                                        <h2 class="price-item-amount-title">Free</h2>
                                        <p>No Need For Credit Card</p>
                                        <a class="price-item-btn" href="#">Choose Plan<i class="fa-light fa-angle-right"></i></a>
                                    </div>
                                    <ul class="price-item-list">
                                        <li>
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Priority email & chat support 0
                                        </li>
                                        <li>
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Access 12+ use-cases
                                        </li>
                                        <li class="not-abatable">
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Generate 1,000 AI Words / month
                                        </li>
                                        <li class="not-abatable">
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Google Docs style editor
                                        </li>
                                        <li class="not-abatable">
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Compose & command features
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay=".8">
                                <div class="price-item active">
                                    <div class="price-item-head">
                                        <h5 class="price-item-title">Standard Plan</h5>
                                        <div class="price-item-amount"><del>$85</del><h2 class="price-item-amount-title">$55<span>.8</span></h2><span class="amount-offer">49.2%</span></div>
                                        <p>/Month (annually billed)</p>
                                        <span class="price-item-offer">SAVE UP TO $54.2</span>
                                        <a class="price-item-btn" href="#">Choose Plan<i class="fa-light fa-angle-right"></i></a>
                                    </div>
                                    <ul class="price-item-list">
                                        <li>
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Priority email & chat support 0
                                        </li>
                                        <li>
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Access 12+ use-cases
                                        </li>
                                        <li>
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Generate 1,000 AI Words / month
                                        </li>
                                        <li class="not-abatable">
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Google Docs style editor
                                        </li>
                                        <li class="not-abatable">
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Compose & command features
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.1">
                                <div class="price-item">
                                    <div class="price-item-head">
                                        <h5 class="price-item-title">Premium Plan</h5>
                                        <div class="price-item-amount"><del>$105</del><h2 class="price-item-amount-title">$95<span>.8</span></h2><span class="amount-offer">30%</span></div>
                                        <p>/Month (annually billed)</p>
                                        <span class="price-item-offer">SAVE UP TO $27.2</span>
                                        <a class="price-item-btn" href="#">Choose Plan<i class="fa-light fa-angle-right"></i></a>
                                    </div>
                                    <ul class="price-item-list">
                                        <li>
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Priority email & chat support 0
                                        </li>
                                        <li>
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Access 12+ use-cases
                                        </li>
                                        <li>
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Generate 1,000 AI Words / month
                                        </li>
                                        <li>
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Google Docs style editor
                                        </li>
                                        <li>
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.74927 6.38277C5.74927 6.38277 4.0184 5.19279 1.96289 4.76003L5.9657 9.30371L13.1058 -3.8147e-06C13.1058 -3.8147e-06 8.12943 2.70451 5.74927 6.38277Z" fill="currentColor"/>
                                                <path d="M10.085 6.25711C9.82712 6.25711 9.61806 6.46617 9.61806 6.72406C9.61806 7.88424 9.16634 8.97444 8.34583 9.79428C7.52632 10.6145 6.43621 11.0662 5.27594 11.0662C2.88165 11.0662 0.933817 9.11835 0.933817 6.72406C0.933817 5.56379 1.38564 4.4736 2.20614 3.65384C3.02548 2.83366 4.11576 2.38193 5.27594 2.38193C5.51669 2.38193 5.75803 2.40175 5.99318 2.4408C6.24739 2.48312 6.48806 2.3111 6.53029 2.05664C6.57252 1.80226 6.40051 1.56184 6.14621 1.51961C5.86047 1.47212 5.5677 1.44812 5.27594 1.44812C3.86606 1.44812 2.54122 1.9971 1.54585 2.99355C0.549067 3.98934 0 5.31426 0 6.72406C0 9.63322 2.36678 12 5.27594 12C6.68582 12 8.01058 11.451 9.00603 10.4545C10.003 9.45861 10.5519 8.13394 10.5519 6.72406C10.5519 6.46617 10.3429 6.25711 10.085 6.25711Z" fill="currentColor"/>
                                            </svg>
                                            Compose & command features
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- price area end -->

        <!-- testimonial area start -->
        <section class="h3_testimonial-area pb-90 pt-130">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-8">
                        <div class="h3_section-area text-center">
                            <h2 class="h3_section-title tp_title_slideup mb-0">What our 25K+ client
                                says about us</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid p-0">
                <div class="h3_testimonial-active swiper pb-40 pt-50 tp_fade_bottom">
                    <div class="swiper-wrapper roll-slider">
                        <div class="swiper-slide">
                            <div class="h3_testimonial-item">
                                <div class="h3_testimonial-icon">
                                    <svg width="48" height="36" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g opacity="0.06">
                                        <path d="M28.6981 18.7847L46.3344 34.5144C46.9789 35.0893 48 34.6318 48 33.7682V1C48 0.447715 47.5523 0 47 0H29.3637C28.8114 0 28.3637 0.447714 28.3637 0.999998V18.0384C28.3637 18.3235 28.4854 18.595 28.6981 18.7847Z" fill="currentColor"/>
                                        <path d="M0.336773 18.7847L17.9731 34.5144C18.6176 35.0893 19.6387 34.6318 19.6387 33.7682V1C19.6387 0.447715 19.191 0 18.6387 0H1.00239C0.450104 0 0.00238991 0.447714 0.00238991 0.999998V18.0384C0.00238991 18.3235 0.124039 18.595 0.336773 18.7847Z" fill="currentColor"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="h3_testimonial-head">
                                    <div class="h3_testimonial-head-img">
                                        <img src="{{ asset('assets/images/testimonial/1.png') }}" alt="Image Not Found">
                                    </div>
                                    <div class="h3_testimonial-head-info">
                                        <h6>Hanson Deck</h6>
                                        <span>Blogger</span>
                                    </div>
                                </div>
                                <ul class="h3_testimonial-rating">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-thin fa-star"></i></li>
                                </ul>
                                <p>Maecenas eget ullamcorper dolor placerat one ipsum. Aliquam dictum massa eu libero vehicula, id dapibus ligula vulputate. Donec arcu elit, pulvinar quis orci ut.</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="h3_testimonial-item">
                                <div class="h3_testimonial-icon">
                                    <svg width="48" height="36" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g opacity="0.06">
                                        <path d="M28.6981 18.7847L46.3344 34.5144C46.9789 35.0893 48 34.6318 48 33.7682V1C48 0.447715 47.5523 0 47 0H29.3637C28.8114 0 28.3637 0.447714 28.3637 0.999998V18.0384C28.3637 18.3235 28.4854 18.595 28.6981 18.7847Z" fill="currentColor"/>
                                        <path d="M0.336773 18.7847L17.9731 34.5144C18.6176 35.0893 19.6387 34.6318 19.6387 33.7682V1C19.6387 0.447715 19.191 0 18.6387 0H1.00239C0.450104 0 0.00238991 0.447714 0.00238991 0.999998V18.0384C0.00238991 18.3235 0.124039 18.595 0.336773 18.7847Z" fill="currentColor"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="h3_testimonial-head">
                                    <div class="h3_testimonial-head-img">
                                        <img src="{{ asset('assets/images/testimonial/2.png') }}" alt="Image Not Found">
                                    </div>
                                    <div class="h3_testimonial-head-info">
                                        <h6>Nigel Nigel</h6>
                                        <span>President of Sales</span>
                                    </div>
                                </div>
                                <ul class="h3_testimonial-rating">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-thin fa-star"></i></li>
                                </ul>
                                <p>Maecenas eget ullamcorper dolor placerat one ipsum. Aliquam dictum massa eu libero vehicula, id dapibus ligula vulputate. Donec arcu elit, pulvinar quis orci ut.</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="h3_testimonial-item">
                                <div class="h3_testimonial-icon">
                                    <svg width="48" height="36" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g opacity="0.06">
                                        <path d="M28.6981 18.7847L46.3344 34.5144C46.9789 35.0893 48 34.6318 48 33.7682V1C48 0.447715 47.5523 0 47 0H29.3637C28.8114 0 28.3637 0.447714 28.3637 0.999998V18.0384C28.3637 18.3235 28.4854 18.595 28.6981 18.7847Z" fill="currentColor"/>
                                        <path d="M0.336773 18.7847L17.9731 34.5144C18.6176 35.0893 19.6387 34.6318 19.6387 33.7682V1C19.6387 0.447715 19.191 0 18.6387 0H1.00239C0.450104 0 0.00238991 0.447714 0.00238991 0.999998V18.0384C0.00238991 18.3235 0.124039 18.595 0.336773 18.7847Z" fill="currentColor"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="h3_testimonial-head">
                                    <div class="h3_testimonial-head-img">
                                        <img src="{{ asset('assets/images/testimonial/3.png') }}" alt="Image Not Found">
                                    </div>
                                    <div class="h3_testimonial-head-info">
                                        <h6>Max Conversion</h6>
                                        <span>SEO Contain Writer</span>
                                    </div>
                                </div>
                                <ul class="h3_testimonial-rating">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-thin fa-star"></i></li>
                                </ul>
                                <p>Maecenas eget ullamcorper dolor placerat one ipsum. Aliquam dictum massa eu libero vehicula, id dapibus ligula vulputate. Donec arcu elit, pulvinar quis orci ut.</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="h3_testimonial-item">
                                <div class="h3_testimonial-icon">
                                    <svg width="48" height="36" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g opacity="0.06">
                                        <path d="M28.6981 18.7847L46.3344 34.5144C46.9789 35.0893 48 34.6318 48 33.7682V1C48 0.447715 47.5523 0 47 0H29.3637C28.8114 0 28.3637 0.447714 28.3637 0.999998V18.0384C28.3637 18.3235 28.4854 18.595 28.6981 18.7847Z" fill="currentColor"/>
                                        <path d="M0.336773 18.7847L17.9731 34.5144C18.6176 35.0893 19.6387 34.6318 19.6387 33.7682V1C19.6387 0.447715 19.191 0 18.6387 0H1.00239C0.450104 0 0.00238991 0.447714 0.00238991 0.999998V18.0384C0.00238991 18.3235 0.124039 18.595 0.336773 18.7847Z" fill="currentColor"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="h3_testimonial-head">
                                    <div class="h3_testimonial-head-img">
                                        <img src="{{ asset('assets/images/testimonial/4.png') }}" alt="Image Not Found">
                                    </div>
                                    <div class="h3_testimonial-head-info">
                                        <h6>Nathaneal Down</h6>
                                        <span>Blogger</span>
                                    </div>
                                </div>
                                <ul class="h3_testimonial-rating">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-thin fa-star"></i></li>
                                </ul>
                                <p>Maecenas eget ullamcorper dolor placerat one ipsum. Aliquam dictum massa eu libero vehicula, id dapibus ligula vulputate. Donec arcu elit, pulvinar quis orci ut.</p>
                            </div>
                        </div>
                    </div>
                    <div class="h3_testimonial-pagination pt-35 text-center"></div>
                </div>
            </div>
        </section>
        <!-- testimonial area end -->

        <!-- faq area start -->
        <section class="h3_faq-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7">
                        <div class="h3_section-area text-center mb-50">
                            <h2 class="h3_section-title tp_title_slideup mb-0">We answer your questions</h2>
                        </div>
                    </div>
                </div>
                <div class="h3_faq-wrap">
                    <div class="h3_faq-content">
                        <div class="accordion" id="Expp">
                            <div class="row">
                                <div class="col-xl-6 tp_has_fade_anim" data-fade-from="bottom">
                                    <div class="accordion-item mb-30">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Does Doodle To Write Long Articles?
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#Expp">
                                            <div class="accordion-body">
                                                <p>
                                                Sed Mattis eros lectors, eu fermentum Felis laborites convallis. Nam Felis arco, sed  mi Faubus quips. Fusco id dui nil. Sed ac lorem a dolor one of incident suscept quips Purus.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item mb-30">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">What is Doodle Content Writing Tool?
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#Expp">
                                            <div class="accordion-body">
                                                <p>
                                                Sed Mattis eros lectors, eu fermentum Felis laborites convallis. Nam Felis arco, sed  mi Faubus quips. Fusco id dui nil. Sed ac lorem a dolor one of incident suscept quips Purus.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item mb-30">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">How does the learning process of AI Image work?
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#Expp">
                                            <div class="accordion-body">
                                                <p>
                                                Sed Mattis eros lectors, eu fermentum Felis laborites convallis. Nam Felis arco, sed  mi Faubus quips. Fusco id dui nil. Sed ac lorem a dolor one of incident suscept quips Purus.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 tp_has_fade_anim" data-fade-from="bottom" data-delay=".8">
                                    <div class="accordion-item mb-30">
                                        <h2 class="accordion-header" id="headingFour">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">How are AI writers impacting the writing industry?
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#Expp">
                                            <div class="accordion-body">
                                                <p>
                                                Sed Mattis eros lectors, eu fermentum Felis laborites convallis. Nam Felis arco, sed  mi Faubus quips. Fusco id dui nil. Sed ac lorem a dolor one of incident suscept quips Purus.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item mb-30">
                                        <h2 class="accordion-header" id="headingFive">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">What Languages Does It Supports?
                                            </button>
                                        </h2>
                                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#Expp">
                                            <div class="accordion-body">
                                                <p>
                                                Sed Mattis eros lectors, eu fermentum Felis laborites convallis. Nam Felis arco, sed  mi Faubus quips. Fusco id dui nil. Sed ac lorem a dolor one of incident suscept quips Purus.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item mb-30">
                                        <h2 class="accordion-header" id="headingSix">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">What is the benefit of AI tools?
                                            </button>
                                        </h2>
                                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#Expp">
                                            <div class="accordion-body">
                                                <p>
                                                Sed Mattis eros lectors, eu fermentum Felis laborites convallis. Nam Felis arco, sed  mi Faubus quips. Fusco id dui nil. Sed ac lorem a dolor one of incident suscept quips Purus.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item mb-30">
                                        <h2 class="accordion-header" id="headingSeven">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">Does Doodle To Write Long Articles?
                                            </button>
                                        </h2>
                                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#Expp">
                                            <div class="accordion-body">
                                                <p>
                                                Sed Mattis eros lectors, eu fermentum Felis laborites convallis. Nam Felis arco, sed  mi Faubus quips. Fusco id dui nil. Sed ac lorem a dolor one of incident suscept quips Purus.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- faq area end -->

        <!-- blog area start -->
        <section class="h3_blog-area pt-100 pb-130">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="h3_section-area text-center mb-50">
                            <h2 class="h3_section-title tp_title_slideup mb-0">See our latest from blog</h2>
                        </div>
                    </div>
                </div>
                <div class="swiper h3_blog-active tp_fade_bottom">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="h3_blog-item">
                                <div class="h3_blog-img w_img">
                                    <a href="{{ url('blog-details') }}"><img src="{{ asset('assets/images/blog/home3/1.png') }}" alt="Image Not Found"></a>
                                    <span class="h3_blog-date">Jul <b>20</b></span>
                                </div>
                                <div class="h3_blog-content">
                                    <a href="#" class="h3_blog-content-meta">Creative</a>
                                    <h4 class="h3_blog-content-title">
                                        <a href="{{ url('blog-details') }}">How to choose the right line an app development?</a>
                                    </h4>
                                    <span class="h3_blog-content-admin">by <a href="#">John Smith</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="h3_blog-item">
                                <div class="h3_blog-img w_img">
                                    <a href="{{ url('blog-details') }}"><img src="{{ asset('assets/images/blog/home3/2.png') }}" alt="Image Not Found"></a>
                                    <span class="h3_blog-date">Mar <b>15</b></span>
                                </div>
                                <div class="h3_blog-content">
                                    <a href="#" class="h3_blog-content-meta">Animation</a>
                                    <h4 class="h3_blog-content-title">
                                        <a href="{{ url('blog-details') }}">AI Content Creation Tools: 7 Tools to Supercharge.</a>
                                    </h4>
                                    <span class="h3_blog-content-admin">by <a href="#">Robert Smith</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="h3_blog-item">
                                <div class="h3_blog-img w_img">
                                    <a href="{{ url('blog-details') }}"><img src="{{ asset('assets/images/blog/home3/3.png') }}" alt="Image Not Found"></a>
                                    <span class="h3_blog-date">Feb <b>15</b></span>
                                </div>
                                <div class="h3_blog-content">
                                    <a href="#" class="h3_blog-content-meta">Creative</a>
                                    <h4 class="h3_blog-content-title">
                                        <a href="{{ url('blog-details') }}">Innovative Developments in AI Chatbot Technologies</a>
                                    </h4>
                                    <span class="h3_blog-content-admin">by <a href="#">Rohit Smith</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h3_blog-pagination text-center pt-50"></div>
                </div>
            </div>
        </section>
        <!-- blog area end -->

        <!-- brand area start -->
        <section class="h3_brand-area pb-140">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-7 col-xl-6 col-lg-7 col-md-11">
                        <div class="h3_section-area text-center mb-45">
                            <h2 class="h3_section-title tp_title_slideup mb-0">Trusted by 20,000+
                                Marketing Departments.</h2>
                        </div>
                    </div>
                </div>
                <div class="h3_brand-wrap">
                    <img src="{{ asset('assets/images/brand/home3_brand-bg.png') }}" alt="" class="d- h3_brand-wrap-bg">
                    <div class="h3_brand-img tp_has_fade_anim" data-fade-from="bottom">
                        <img src="{{ asset('assets/images/brand/1.png') }}" alt="Image Not Found">
                    </div>
                    <div class="h3_brand-img tp_has_fade_anim" data-fade-from="bottom">
                        <img src="{{ asset('assets/images/brand/2.png') }}" alt="Image Not Found">
                    </div>
                    <div class="h3_brand-img tp_has_fade_anim" data-fade-from="bottom">
                        <img src="{{ asset('assets/images/brand/3.png') }}" alt="Image Not Found">
                    </div>
                    <div class="h3_brand-img tp_has_fade_anim" data-fade-from="bottom">
                        <img src="{{ asset('assets/images/brand/4.png') }}" alt="Image Not Found">
                    </div>
                    <div class="h3_brand-img tp_has_fade_anim" data-fade-from="bottom">
                        <img src="{{ asset('assets/images/brand/5.png') }}" alt="Image Not Found">
                    </div>
                    <div class="h3_brand-img tp_has_fade_anim" data-fade-from="bottom">
                        <img src="{{ asset('assets/images/brand/6.png') }}" alt="Image Not Found">
                    </div>
                    <div class="h3_brand-img tp_has_fade_anim" data-fade-from="bottom">
                        <img src="{{ asset('assets/images/brand/7.png') }}" alt="Image Not Found">
                    </div>
                    <div class="h3_brand-img tp_has_fade_anim" data-fade-from="bottom">
                        <img src="{{ asset('assets/images/brand/8.png') }}" alt="Image Not Found">
                    </div>
                    <div class="h3_brand-img tp_has_fade_anim" data-fade-from="bottom">
                        <img src="{{ asset('assets/images/brand/9.png') }}" alt="Image Not Found">
                    </div>
                    <div class="h3_brand-img tp_has_fade_anim" data-fade-from="bottom">
                        <img src="{{ asset('assets/images/brand/10.png') }}" alt="Image Not Found">
                    </div>
                    <div class="h3_brand-img tp_has_fade_anim" data-fade-from="bottom">
                        <img src="{{ asset('assets/images/brand/11.png') }}" alt="Image Not Found">
                    </div>
                    <div class="h3_brand-img tp_has_fade_anim" data-fade-from="bottom">
                        <img src="{{ asset('assets/images/brand/12.png') }}" alt="Image Not Found">
                    </div>
                    <div class="h3_brand-img tp_has_fade_anim" data-fade-from="bottom">
                        <img src="{{ asset('assets/images/brand/13.png') }}" alt="Image Not Found">
                    </div>
                    <div class="h3_brand-img tp_has_fade_anim" data-fade-from="bottom">
                        <img src="{{ asset('assets/images/brand/14.png') }}" alt="Image Not Found">
                    </div>
                    <div class="h3_brand-img tp_has_fade_anim" data-fade-from="bottom">
                        <img src="{{ asset('assets/images/brand/15.png') }}" alt="Image Not Found">
                    </div>
                    <div class="h3_brand-img tp_has_fade_anim" data-fade-from="bottom">
                        <img src="{{ asset('assets/images/brand/16.png') }}" alt="Image Not Found">
                    </div>
                    <div class="h3_brand-img tp_has_fade_anim" data-fade-from="bottom">
                        <img src="{{ asset('assets/images/brand/17.png') }}" alt="Image Not Found">
                    </div>
                </div>
            </div>
        </section>
        <!-- brand area end -->

        <!-- instagram area start -->
        <div class="h3_instagram-area">
            <div class="h3_instagram-wrap">
                <div class="h3_instagram-item tp_fade_bottom" data-fade-from="bottom">
                    <img src="{{ asset('assets/images/instagram/home2/1.png') }}" alt="Image Not Found">
                    <div class="h3_instagram-item-content">
                        <h5>Follow Us on</h5>
                        <svg width="106" height="106" viewBox="0 0 106 106" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M78 3H28C14.1929 3 3 14.1929 3 28V78C3 91.8071 14.1929 103 28 103H78C91.8071 103 103 91.8071 103 78V28C103 14.1929 91.8071 3 78 3Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M73.0005 49.8515C73.6175 54.0127 72.9068 58.2626 70.9693 61.9966C69.0318 65.7306 65.9662 68.7586 62.2086 70.6499C58.451 72.5412 54.1927 73.1995 50.0394 72.5312C45.8861 71.8628 42.0493 69.9019 39.0747 66.9273C36.1001 63.9527 34.1391 60.1159 33.4708 55.9626C32.8025 51.8093 33.4608 47.551 35.3521 43.7934C37.2434 40.0358 40.2714 36.9702 44.0054 35.0327C47.7394 33.0952 51.9893 32.3844 56.1505 33.0015C60.3951 33.6309 64.3247 35.6088 67.359 38.643C70.3932 41.6773 72.3711 45.6069 73.0005 49.8515Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M80.5 25.5H80.55" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a href="#">&commat;Doodle_543</a>
                    </div>
                </div>
                <div class="h3_instagram-item tp_fade_bottom" data-fade-from="bottom" data-delay=".8">
                    <img src="{{ asset('assets/images/instagram/home2/2.png') }}" alt="Image Not Found">
                    <div class="h3_instagram-item-content">
                        <h5>Follow Us on</h5>
                        <svg width="106" height="106" viewBox="0 0 106 106" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M78 3H28C14.1929 3 3 14.1929 3 28V78C3 91.8071 14.1929 103 28 103H78C91.8071 103 103 91.8071 103 78V28C103 14.1929 91.8071 3 78 3Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M73.0005 49.8515C73.6175 54.0127 72.9068 58.2626 70.9693 61.9966C69.0318 65.7306 65.9662 68.7586 62.2086 70.6499C58.451 72.5412 54.1927 73.1995 50.0394 72.5312C45.8861 71.8628 42.0493 69.9019 39.0747 66.9273C36.1001 63.9527 34.1391 60.1159 33.4708 55.9626C32.8025 51.8093 33.4608 47.551 35.3521 43.7934C37.2434 40.0358 40.2714 36.9702 44.0054 35.0327C47.7394 33.0952 51.9893 32.3844 56.1505 33.0015C60.3951 33.6309 64.3247 35.6088 67.359 38.643C70.3932 41.6773 72.3711 45.6069 73.0005 49.8515Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M80.5 25.5H80.55" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a href="#">&commat;Doodle_543</a>
                    </div>
                </div>
                <div class="h3_instagram-item tp_fade_bottom" data-fade-from="bottom" data-delay="1.1">
                    <img src="{{ asset('assets/images/instagram/home2/3.png') }}" alt="Image Not Found">
                    <div class="h3_instagram-item-content">
                        <h5>Follow Us on</h5>
                        <svg width="106" height="106" viewBox="0 0 106 106" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M78 3H28C14.1929 3 3 14.1929 3 28V78C3 91.8071 14.1929 103 28 103H78C91.8071 103 103 91.8071 103 78V28C103 14.1929 91.8071 3 78 3Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M73.0005 49.8515C73.6175 54.0127 72.9068 58.2626 70.9693 61.9966C69.0318 65.7306 65.9662 68.7586 62.2086 70.6499C58.451 72.5412 54.1927 73.1995 50.0394 72.5312C45.8861 71.8628 42.0493 69.9019 39.0747 66.9273C36.1001 63.9527 34.1391 60.1159 33.4708 55.9626C32.8025 51.8093 33.4608 47.551 35.3521 43.7934C37.2434 40.0358 40.2714 36.9702 44.0054 35.0327C47.7394 33.0952 51.9893 32.3844 56.1505 33.0015C60.3951 33.6309 64.3247 35.6088 67.359 38.643C70.3932 41.6773 72.3711 45.6069 73.0005 49.8515Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M80.5 25.5H80.55" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a href="#">&commat;Doodle_543</a>
                    </div>
                </div>
                <div class="h3_instagram-item tp_fade_bottom" data-fade-from="bottom" data-delay="1.3">
                    <img src="{{ asset('assets/images/instagram/home2/4.png') }}" alt="Image Not Found">
                    <div class="h3_instagram-item-content">
                        <h5>Follow Us on</h5>
                        <svg width="106" height="106" viewBox="0 0 106 106" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M78 3H28C14.1929 3 3 14.1929 3 28V78C3 91.8071 14.1929 103 28 103H78C91.8071 103 103 91.8071 103 78V28C103 14.1929 91.8071 3 78 3Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M73.0005 49.8515C73.6175 54.0127 72.9068 58.2626 70.9693 61.9966C69.0318 65.7306 65.9662 68.7586 62.2086 70.6499C58.451 72.5412 54.1927 73.1995 50.0394 72.5312C45.8861 71.8628 42.0493 69.9019 39.0747 66.9273C36.1001 63.9527 34.1391 60.1159 33.4708 55.9626C32.8025 51.8093 33.4608 47.551 35.3521 43.7934C37.2434 40.0358 40.2714 36.9702 44.0054 35.0327C47.7394 33.0952 51.9893 32.3844 56.1505 33.0015C60.3951 33.6309 64.3247 35.6088 67.359 38.643C70.3932 41.6773 72.3711 45.6069 73.0005 49.8515Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M80.5 25.5H80.55" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a href="#">&commat;Doodle_543</a>
                    </div>
                </div>
                <div class="h3_instagram-item tp_fade_bottom" data-fade-from="bottom" data-delay="1.5">
                    <img src="{{ asset('assets/images/instagram/home2/5.png') }}" alt="Image Not Found">
                    <div class="h3_instagram-item-content">
                        <h5>Follow Us on</h5>
                        <svg width="106" height="106" viewBox="0 0 106 106" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M78 3H28C14.1929 3 3 14.1929 3 28V78C3 91.8071 14.1929 103 28 103H78C91.8071 103 103 91.8071 103 78V28C103 14.1929 91.8071 3 78 3Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M73.0005 49.8515C73.6175 54.0127 72.9068 58.2626 70.9693 61.9966C69.0318 65.7306 65.9662 68.7586 62.2086 70.6499C58.451 72.5412 54.1927 73.1995 50.0394 72.5312C45.8861 71.8628 42.0493 69.9019 39.0747 66.9273C36.1001 63.9527 34.1391 60.1159 33.4708 55.9626C32.8025 51.8093 33.4608 47.551 35.3521 43.7934C37.2434 40.0358 40.2714 36.9702 44.0054 35.0327C47.7394 33.0952 51.9893 32.3844 56.1505 33.0015C60.3951 33.6309 64.3247 35.6088 67.359 38.643C70.3932 41.6773 72.3711 45.6069 73.0005 49.8515Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M80.5 25.5H80.55" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a href="#">&commat;Doodle_543</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- instagram area end -->
    </main>
@endsection

@section('footer')
    <footer class="h3_footer-area pt-110 pb-105">
        <div class="container">
            <div class="h3_footer-top">
                <div class="row justify-content-sm-between align-items-center justify-content-center">
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-auto tp_has_fade_anim" data-fade-from="left">
                        <div class="h3_footer-logo mb-20 mb-sm-0">
                            <a href="{{ url('index') }}"><img src="{{ asset('assets/images/logo/scope-purple-black-horizontal.svg') }}" alt="Image Not Found"></a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-8 d-none d-md-block tp_has_fade_anim" data-fade-from="bottom" data-delay=".5">
                        <div class="h3_footer-menu">
                            <ul>
                                <li><a href="{{ url('index-3') }}">Home</a></li>
                                <li><a href="{{ url('about') }}">Process</a></li>
                                <li><a href="{{ url('price') }}">Pricing</a></li>
                                <li><a href="{{ url('blog') }}">Blogs</a></li>
                                <li><a href="{{ url('about') }}">FAQ’s</a></li>
                                <li><a href="{{ url('about') }}">Company</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-12 col-sm-6 col-auto tp_has_fade_anim" data-fade-from="right" data-delay=".7">
                        <div class="h3_footer-social mb-20 mb-sm-0">
                            <ul>
                                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="h3_footer-bottom-copyright tp_fade_bottom_footer">
                        <p>&copy;2023 Doodle All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection
