@extends('layouts.layout1')

@section('header')
    <header class="header-area">
{{--        <div class="header-top d-none d-md-flex">--}}
{{--            <div class="container custom-container-1">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-xl-9 col-lg-9">--}}
{{--                        <div class="header-top-text">--}}
{{--                            <p>New members: get your first 7 days of turitor Premium for free! Unlock discount now!</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-3 col-lg-3 d-none d-lg-block">--}}
{{--                        <div class="header-top-social">--}}
{{--                            <ul>--}}
{{--                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>--}}
{{--                                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>--}}
{{--                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>--}}
{{--                                <li><a href="#"><i class="fa-brands fa-google-plus-g"></i></a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="header-main header-sticky">
            <div class="container custom-container-1">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-2 col-6">
                        <div class="header-logo">
                            <a href="{{ url('index') }}"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="Image Not Found"></a>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 text-center d-none d-lg-block">
                        <div class="header-menu ">
                            <nav class="header-nav-menu" id="mobile-menu">
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
                    <div class="col-xl-3 col-lg-3 col-6">
                        <div class="header-action-wrap d-flex align-items-center justify-content-end">
                            <div class="header-action d-none d-sm-flex">
                                <a href="#" class="header-action-login">
                                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.01172 8C8.94472 8 10.5117 6.433 10.5117 4.5C10.5117 2.567 8.94472 1 7.01172 1C5.07872 1 3.51172 2.567 3.51172 4.5C3.51172 6.433 5.07872 8 7.01172 8Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M13.026 15C13.026 12.291 10.331 10.1 7.013 10.1C3.695 10.1 1 12.291 1 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    Login
                                </a>
                                <a href="#" class="header-action-btn">
                                    Join AI
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
        </div>
    </header>
@endsection

@section('content')
    <main>
        <!-- banner area start -->
        <section class="banner-area">
            <div class="container custom-container-1">
                <div class="banner-single">
                    <div class="banner-content">
                        <span class="banner-content-subtitle tp_fade_left">Today special offer</span>
                        <h1 class="banner-content-title tp_has_text_reveal_anim">Best Chatbot Creating Customer Service</h1>
                        <p class="tp_desc_anim">An all-in-one platform to build and launch chatbots conversational <br> without coding. Lorem Ipsum is simply dumm printin.</p>
                        <div class="banner-content-btn">
                            <a href="#" class="theme-btn tp_fade_bottom">Get Started For Free</a>
                            <span class="tp_fade_bottom">
                                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.4555 0.0244961C16.2201 0.206689 15.2018 0.523653 14.0862 1.07023C12.6337 1.78153 11.3259 2.7424 10.0056 4.06517C8.07885 5.9969 6.49652 8.40034 5.42334 11.0359C5.33349 11.258 5.25612 11.4427 5.25113 11.4477C5.24863 11.4502 5.22118 11.3304 5.19123 11.1781C4.88425 9.64324 3.79359 8.26307 2.56067 7.84877C2.20128 7.72898 1.8369 7.70152 1.50745 7.77141C1.27784 7.81882 0.920944 8.00102 0.736256 8.16574C0.481686 8.38786 0.204654 8.80716 0.0524114 9.1965L0 9.32378L0.292007 9.34125C0.983338 9.37869 1.43258 9.58584 1.8943 10.0725C2.14388 10.3346 2.32357 10.6041 2.53322 11.0259C2.75534 11.4727 2.89511 11.8395 3.26448 12.9327C3.62887 14.0084 3.77362 14.3877 3.9658 14.7721C4.21288 15.2662 4.52485 15.683 4.80438 15.8952L4.94415 16L5.08391 15.9052C5.30853 15.7504 5.78273 15.2612 6.0348 14.9243C6.53645 14.2455 6.90084 13.6065 7.8717 11.6898C8.97733 9.50348 9.39912 8.71731 10.0231 7.68405C12.0621 4.30227 14.4106 1.90632 17.3157 0.24163C17.5279 0.121832 17.7076 0.0170088 17.7126 0.00952148C17.73 -0.00794792 17.6377 -0.000461578 17.4555 0.0244961Z" fill="currentColor"/>
                                </svg>
                                No credit card Required
                            </span>
                        </div>
                    </div>
                    <div class="banner-img tp_fade_left">
                        <img src="{{ asset('assets/images/banner/home1/bg.png') }}" alt="Image Not Found">
                    </div>
                </div>
            </div>
            <div class="banner-shape d-none d-lg-block">
                <img src="{{ asset('assets/images/banner/home1/shape-1.png') }}" alt="Image Not Found" class="banner-shape-1" data-speed="0.7">
                <img src="{{ asset('assets/images/banner/home1/shape-2.png') }}" alt="Image Not Found" class="banner-shape-2" data-speed="0.8">
                <img src="{{ asset('assets/images/banner/home1/shape-3.png') }}" alt="Image Not Found" class="banner-shape-3" data-speed="0.8">
                <img src="{{ asset('assets/images/banner/home1/shape-4.png') }}" alt="Image Not Found" class="banner-shape-4" data-speed="0.7">
                <img src="{{ asset('assets/images/banner/home1/shape-5.png') }}" alt="Image Not Found" class="banner-shape-5">
            </div>
        </section>
        <!-- banner area end -->

        <!-- choose area start -->
        <section class="choose-area pt-140">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-area text-center mb-50">
                            <span class="section-subtitle tp_fade_left">Why Choose Us</span>
                            <h2 class="section-title tp_title_slideup mb-0">Why Choose Doodle</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left">
                        <div class="choose-item mb-30">
                            <span class="choose-item-count">01</span>
                            <div class="choose-item-img">
                                <img src="{{ asset('assets/images/choose/1.png') }}" alt="Image Not Found">
                            </div>
                            <div class="choose-item-content">
                                <h5 class="choose-item-content-title"><a href="#">Fast Text Generate</a></h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <a href="#" class="choose-item-content-btn">Learn More<i class="fa-light fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay=".8">
                        <div class="choose-item mb-30">
                            <span class="choose-item-count">02</span>
                            <div class="choose-item-img">
                                <img src="{{ asset('assets/images/choose/2.png') }}" alt="Image Not Found">
                            </div>
                            <div class="choose-item-content">
                                <h5 class="choose-item-content-title"><a href="#">High Quality Content</a></h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <a href="#" class="choose-item-content-btn">Learn More<i class="fa-light fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.1">
                        <div class="choose-item mb-30">
                            <span class="choose-item-count">03</span>
                            <div class="choose-item-img">
                                <img src="{{ asset('assets/images/choose/3.png') }}" alt="Image Not Found">
                            </div>
                            <div class="choose-item-content">
                                <h5 class="choose-item-content-title"><a href="#">40+ Language...</a></h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <a href="#" class="choose-item-content-btn">Learn More<i class="fa-light fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.3">
                        <div class="choose-item mb-30">
                            <span class="choose-item-count">04</span>
                            <div class="choose-item-img">
                                <img src="{{ asset('assets/images/choose/4.png') }}" alt="Image Not Found">
                            </div>
                            <div class="choose-item-content">
                                <h5 class="choose-item-content-title"><a href="#">24/7 Hours Support</a></h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <a href="#" class="choose-item-content-btn">Learn More<i class="fa-light fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- choose area end -->

        <!-- feature area start -->
        <section class="feature-area pt-110 pb-110">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-area text-center mb-50">
                            <span class="section-subtitle tp_fade_left">Our Features</span>
                            <h2 class="section-title tp_title_slideup mb-0">What’s Included: Our Core Features</h2>
                        </div>
                    </div>
                </div>
                <div class="feature-top mb-50 tp_fade_bottom">
                    <div class="feature-item feature-item-1">
                        <h5 class="feature-item-title">Welcome screen</h5>
                        <p>Lorem Ipsum is simply dummy text’s of the one most printing and typesetting is an one of the best.</p>
                    </div>
                    <div class="feature-item feature-item-2">
                        <h5 class="feature-item-title">One-click management</h5>
                        <p>Lorem Ipsum is simply dummy text’s of the one most printing and typesetting is an one of the best.</p>
                    </div>
                    <div class="feature-item feature-item-3">
                        <h5 class="feature-item-title">Custom greetings</h5>
                        <p>Lorem Ipsum is simply dummy text’s of the one most printing and typesetting is an one of the best.</p>
                    </div>
                </div>
                <div class="row align-items-end">
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                        <div class="feature-left-img mb-30 tp_fade_right">
                            <img src="{{ asset('assets/images/feature/bg.png') }}" alt="Image Not Found">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                        <div class="feature-right-img mb-30">
                            <img src="{{ asset('assets/images/feature/bg-1.png') }}" alt="Image Not Found" class="f-main-img tp_fade_left">
                            <img src="{{ asset('assets/images/feature/shape-1.png') }}" alt="Image Not Found" class="feature-shape-1" data-speed="0.7">
                            <img src="{{ asset('assets/images/feature/shape-2.png') }}" alt="Image Not Found" class="feature-shape-2" data-speed="0.8">
                            <img src="{{ asset('assets/images/feature/shape-3.png') }}" alt="Image Not Found" class="feature-shape-3" data-speed="0.7">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- feature area end -->

        <!-- apps area start -->
        <section class="apps-area pt-140 pb-140">
            <div class="container">
                <div class="apps-icon tp_fade_bottom">
                    <div class="apps-icon-item">
                        <img src="{{ asset('assets/images/apps/1.png') }}" alt="Image Not Found">
                    </div>
                    <div class="apps-icon-item">
                        <img src="{{ asset('assets/images/apps/2.png') }}" alt="Image Not Found">
                    </div>
                    <div class="apps-icon-item">
                        <img src="{{ asset('assets/images/apps/3.png') }}" alt="Image Not Found">
                    </div>
                    <div class="apps-icon-item">
                        <img src="{{ asset('assets/images/apps/4.png') }}" alt="Image Not Found">
                    </div>
                    <div class="apps-icon-item">
                        <img src="{{ asset('assets/images/apps/5.png') }}" alt="Image Not Found">
                    </div>
                    <div class="apps-icon-item">
                        <img src="{{ asset('assets/images/apps/6.png') }}" alt="Image Not Found">
                    </div>
                    <div class="apps-icon-item">
                        <img src="{{ asset('assets/images/apps/7.png') }}" alt="Image Not Found">
                    </div>
                    <div class="apps-icon-item">
                        <img src="{{ asset('assets/images/apps/8.png') }}" alt="Image Not Found">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-9">
                        <div class="apps-content">
                            <h2 class="tp_title_slideup">Easily Bring AI in Your
                                Workflow to Create Content</h2>
                            <p class="tp_fade_bottom">There are many variations of passages of Lorem Ipsum available <br> but the majority have suffered alteration in some form, by more and <br> more injected humour.</p>
                            <a href="#" class="theme-btn tp_fade_bottom">Integrate With Your App</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="apps-shape d-none d-md-block">
                <img src="{{ asset('assets/images/apps/shape-1.png') }}" alt="Image Not Found" class="apps-shape-1" data-speed="0.6">
                <img src="{{ asset('assets/images/apps/shape-2.png') }}" alt="Image Not Found" class="apps-shape-2" data-speed="0.8">
                <img src="{{ asset('assets/images/apps/shape-3.png') }}" alt="Image Not Found" class="apps-shape-3">
                <img src="{{ asset('assets/images/apps/shape-4.png') }}" alt="Image Not Found" class="apps-shape-4" data-speed="0.7">
                <img src="{{ asset('assets/images/apps/shape-5.png') }}" alt="Image Not Found" class="apps-shape-5" data-speed="0.7">
                <img src="{{ asset('assets/images/apps/shape-6.png') }}" alt="Image Not Found" class="apps-shape-6" data-speed="0.8">
            </div>
        </section>
        <!-- apps area end -->

        <!-- price area start -->
        <section class="price-area price-tab pt-140 pb-140">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-6 col-xl-7 col-lg-9 col-md-10">
                        <div class="section-area text-center mb-45">
                            <span class="section-subtitle tp_fade_left">Pricing Plan</span>
                            <h2 class="section-title tp_title_slideup mb-0 section-title tp_title_slideup-big">Personalized Pricing Plans
                                Suited to You.</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="price-switch-wrapper">
                            <label class="toggler toggler--is-active" id="filt-monthly">Pay Monthly</label>
                            <div class="toggle">
                            <input type="checkbox" id="switcher" class="tp-check">
                            <b class="switch"></b>
                            </div>
                            <label class="toggler yearly-pack" id="filt-yearly">Pay Yearly<span class="amount-offer">Save 34%</span></label>
                        </div>
                    </div>
                </div>
                <div id="monthly" class="wrapper-full">
                    <div class="row align-items-end">
                        <div class="col-xl-3 col-lg-6 col-md-6 tp_fade_left" data-fade-from="left">
                            <div class="price-item price-item-1">
                                <div class="price-item-head">
                                    <h5 class="price-item-title">Free Trial</h5>
                                    <h2 class="price-item-amount-title">Free</h2>
                                    <p>No Need For Credit Card</p>
                                    <a class="price-item-btn" href="#">Choose Plan<i class="fa-light fa-angle-right"></i></a>
                                </div>
                                <ul class="price-item-list">
                                    <li>Priority email & chat support 0</li>
                                    <li>Access 12+ use-cases</li>
                                    <li class="not-abatable">Generate 1,000 AI Words / month</li>
                                    <li class="not-abatable">Google Docs style editor</li>
                                    <li class="not-abatable">Compose & command features</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 tp_fade_left" data-fade-from="left" data-delay=".8">
                            <div class="price-item active">
                                <div class="price-item-option">
                                    <span>Best Choice</span>
                                </div>
                                <div class="price-item-head">
                                    <h5 class="price-item-title">Standard Plan</h5>
                                    <div class="price-item-amount"><del>$85</del><h2 class="price-item-amount-title">$35<span>.8</span></h2><span class="amount-offer">49.2%</span></div>
                                    <p>/Month (annually billed)</p>
                                    <span class="price-item-offer">SAVE UP TO $54.2</span>
                                    <a class="price-item-btn" href="#">Choose Plan<i class="fa-light fa-angle-right"></i></a>
                                </div>
                                <ul class="price-item-list">
                                    <li>Priority email & chat support 0</li>
                                    <li>Access 12+ use-cases</li>
                                    <li>Generate 1,000 AI Words / month</li>
                                    <li class="not-abatable">Google Docs style editor</li>
                                    <li class="not-abatable">Compose & command features</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.1">
                            <div class="price-item">
                                <div class="price-item-head">
                                    <h5 class="price-item-title">Liter Plan</h5>
                                    <div class="price-item-amount"><del>$89</del><h2 class="price-item-amount-title">$56<span>.8</span></h2><span class="amount-offer">30%</span></div>
                                    <p>/Month (annually billed)</p>
                                    <span class="price-item-offer">SAVE UP TO $54.2</span>
                                    <a class="price-item-btn" href="#">Choose Plan<i class="fa-light fa-angle-right"></i></a>
                                </div>
                                <ul class="price-item-list">
                                    <li>Priority email & chat support 0</li>
                                    <li>Access 12+ use-cases</li>
                                    <li>Generate 1,000 AI Words / month</li>
                                    <li>Google Docs style editor</li>
                                    <li class="not-abatable">Compose & command features</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.4">
                            <div class="price-item">
                                <div class="price-item-head">
                                    <h5 class="price-item-title">Premium Plan</h5>
                                    <div class="price-item-amount"><del>$99</del><h2 class="price-item-amount-title">$89<span>.8</span></h2><span class="amount-offer">30%</span></div>
                                    <p>/Month (annually billed)</p>
                                    <span class="price-item-offer">SAVE UP TO $27.2</span>
                                    <a class="price-item-btn" href="#">Choose Plan<i class="fa-light fa-angle-right"></i></a>
                                </div>
                                <ul class="price-item-list">
                                    <li>Priority email & chat support 0</li>
                                    <li>Access 12+ use-cases</li>
                                    <li>Generate 1,000 AI Words / month</li>
                                    <li>Google Docs style editor</li>
                                    <li>Compose & command features</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="hourly" class="wrapper-full hide">
                    <div class="row align-items-end">
                        <div class="col-xl-3 col-lg-6 col-md-6 tp_fade_left" data-fade-from="left">
                            <div class="price-item price-item-1">
                                <div class="price-item-head">
                                    <h5 class="price-item-title">Free Trial</h5>
                                    <h2 class="price-item-amount-title">Free</h2>
                                    <p>No Need For Credit Card</p>
                                    <a class="price-item-btn" href="#">Choose Plan<i class="fa-light fa-angle-right"></i></a>
                                </div>
                                <ul class="price-item-list">
                                    <li>Priority email & chat support 0</li>
                                    <li>Access 12+ use-cases</li>
                                    <li class="not-abatable">Generate 1,000 AI Words / month</li>
                                    <li class="not-abatable">Google Docs style editor</li>
                                    <li class="not-abatable">Compose & command features</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 tp_fade_left" data-fade-from="left" data-delay=".8">
                            <div class="price-item active">
                                <div class="price-item-option">
                                    <span>Best Choice</span>
                                </div>
                                <div class="price-item-head">
                                    <h5 class="price-item-title">Standard Plan</h5>
                                    <div class="price-item-amount"><del>$95</del><h2 class="price-item-amount-title">$55<span>.8</span></h2><span class="amount-offer">49.2%</span></div>
                                    <p>/Month (annually billed)</p>
                                    <span class="price-item-offer">SAVE UP TO $54.2</span>
                                    <a class="price-item-btn" href="#">Choose Plan<i class="fa-light fa-angle-right"></i></a>
                                </div>
                                <ul class="price-item-list">
                                    <li>Priority email & chat support 0</li>
                                    <li>Access 12+ use-cases</li>
                                    <li>Generate 1,000 AI Words / month</li>
                                    <li class="not-abatable">Google Docs style editor</li>
                                    <li class="not-abatable">Compose & command features</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.1">
                            <div class="price-item">
                                <div class="price-item-head">
                                    <h5 class="price-item-title">Liter Plan</h5>
                                    <div class="price-item-amount"><del>$99</del><h2 class="price-item-amount-title">$76<span>.8</span></h2><span class="amount-offer">30%</span></div>
                                    <p>/Month (annually billed)</p>
                                    <span class="price-item-offer">SAVE UP TO $54.2</span>
                                    <a class="price-item-btn" href="#">Choose Plan<i class="fa-light fa-angle-right"></i></a>
                                </div>
                                <ul class="price-item-list">
                                    <li>Priority email & chat support 0</li>
                                    <li>Access 12+ use-cases</li>
                                    <li>Generate 1,000 AI Words / month</li>
                                    <li>Google Docs style editor</li>
                                    <li class="not-abatable">Compose & command features</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.4">
                            <div class="price-item">
                                <div class="price-item-head">
                                    <h5 class="price-item-title">Premium Plan</h5>
                                    <div class="price-item-amount"><del>$240</del><h2 class="price-item-amount-title">$99<span>.8</span></h2><span class="amount-offer">30%</span></div>
                                    <p>/Month (annually billed)</p>
                                    <span class="price-item-offer">SAVE UP TO $27.2</span>
                                    <a class="price-item-btn" href="#">Choose Plan<i class="fa-light fa-angle-right"></i></a>
                                </div>
                                <ul class="price-item-list">
                                    <li>Priority email & chat support 0</li>
                                    <li>Access 12+ use-cases</li>
                                    <li>Generate 1,000 AI Words / month</li>
                                    <li>Google Docs style editor</li>
                                    <li>Compose & command features</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- price area end -->

        <!-- testimonial area start -->
        <section class="testimonial-area pb-40 fix">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-area text-center">
                            <span class="section-subtitle tp_fade_left">Testimonials</span>
                            <h2 class="section-title tp_title_slideup mb-0">Doodle Received  4.8/5 Stars in Over 10,000+ Reviews.</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-active swiper pb-40 pt-50 tp_has_fade_anim" data-fade-from="bottom">
                <div class="swiper-wrapper roll-slider">
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="testimonial-icon">
                                <svg width="48" height="36" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.06">
                                    <path d="M28.6981 18.7847L46.3344 34.5144C46.9789 35.0893 48 34.6318 48 33.7682V1C48 0.447715 47.5523 0 47 0H29.3637C28.8114 0 28.3637 0.447714 28.3637 0.999998V18.0384C28.3637 18.3235 28.4854 18.595 28.6981 18.7847Z" fill="currentColor"/>
                                    <path d="M0.336773 18.7847L17.9731 34.5144C18.6176 35.0893 19.6387 34.6318 19.6387 33.7682V1C19.6387 0.447715 19.191 0 18.6387 0H1.00239C0.450104 0 0.00238991 0.447714 0.00238991 0.999998V18.0384C0.00238991 18.3235 0.124039 18.595 0.336773 18.7847Z" fill="currentColor"/>
                                    </g>
                                </svg>
                            </div>
                            <div class="testimonial-head">
                                <div class="testimonial-head-img">
                                    <img src="{{ asset('assets/images/testimonial/1.png') }}" alt="Image Not Found">
                                </div>
                                <div class="testimonial-head-info">
                                    <h6>Hanson Deck</h6>
                                    <span>Blogger</span>
                                </div>
                            </div>
                            <ul class="testimonial-rating">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-thin fa-star"></i></li>
                            </ul>
                            <p>Maecenas eget ullamcorper dolor placerat ipsum. Aliquam dictum massa eu libero vehicula, id dapibus ligula vulputate. Donec arcu elit</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="testimonial-icon">
                                <svg width="48" height="36" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.06">
                                    <path d="M28.6981 18.7847L46.3344 34.5144C46.9789 35.0893 48 34.6318 48 33.7682V1C48 0.447715 47.5523 0 47 0H29.3637C28.8114 0 28.3637 0.447714 28.3637 0.999998V18.0384C28.3637 18.3235 28.4854 18.595 28.6981 18.7847Z" fill="currentColor"/>
                                    <path d="M0.336773 18.7847L17.9731 34.5144C18.6176 35.0893 19.6387 34.6318 19.6387 33.7682V1C19.6387 0.447715 19.191 0 18.6387 0H1.00239C0.450104 0 0.00238991 0.447714 0.00238991 0.999998V18.0384C0.00238991 18.3235 0.124039 18.595 0.336773 18.7847Z" fill="currentColor"/>
                                    </g>
                                </svg>
                            </div>
                            <div class="testimonial-head">
                                <div class="testimonial-head-img">
                                    <img src="{{ asset('assets/images/testimonial/2.png') }}" alt="Image Not Found">
                                </div>
                                <div class="testimonial-head-info">
                                    <h6>Nigel Nigel</h6>
                                    <span>President of Sales</span>
                                </div>
                            </div>
                            <ul class="testimonial-rating">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-thin fa-star"></i></li>
                            </ul>
                            <p>Maecenas eget ullamcorper dolor placerat ipsum. Aliquam dictum massa eu libero vehicula, id dapibus ligula vulputate. Donec arcu elit</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="testimonial-icon">
                                <svg width="48" height="36" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.06">
                                    <path d="M28.6981 18.7847L46.3344 34.5144C46.9789 35.0893 48 34.6318 48 33.7682V1C48 0.447715 47.5523 0 47 0H29.3637C28.8114 0 28.3637 0.447714 28.3637 0.999998V18.0384C28.3637 18.3235 28.4854 18.595 28.6981 18.7847Z" fill="currentColor"/>
                                    <path d="M0.336773 18.7847L17.9731 34.5144C18.6176 35.0893 19.6387 34.6318 19.6387 33.7682V1C19.6387 0.447715 19.191 0 18.6387 0H1.00239C0.450104 0 0.00238991 0.447714 0.00238991 0.999998V18.0384C0.00238991 18.3235 0.124039 18.595 0.336773 18.7847Z" fill="currentColor"/>
                                    </g>
                                </svg>
                            </div>
                            <div class="testimonial-head">
                                <div class="testimonial-head-img">
                                    <img src="{{ asset('assets/images/testimonial/3.png') }}" alt="Image Not Found">
                                </div>
                                <div class="testimonial-head-info">
                                    <h6>Max Conversion</h6>
                                    <span>SEO Contain Writer</span>
                                </div>
                            </div>
                            <ul class="testimonial-rating">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-thin fa-star"></i></li>
                            </ul>
                            <p>Maecenas eget ullamcorper dolor placerat ipsum. Aliquam dictum massa eu libero vehicula, id dapibus ligula vulputate. Donec arcu elit</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="testimonial-icon">
                                <svg width="48" height="36" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.06">
                                    <path d="M28.6981 18.7847L46.3344 34.5144C46.9789 35.0893 48 34.6318 48 33.7682V1C48 0.447715 47.5523 0 47 0H29.3637C28.8114 0 28.3637 0.447714 28.3637 0.999998V18.0384C28.3637 18.3235 28.4854 18.595 28.6981 18.7847Z" fill="currentColor"/>
                                    <path d="M0.336773 18.7847L17.9731 34.5144C18.6176 35.0893 19.6387 34.6318 19.6387 33.7682V1C19.6387 0.447715 19.191 0 18.6387 0H1.00239C0.450104 0 0.00238991 0.447714 0.00238991 0.999998V18.0384C0.00238991 18.3235 0.124039 18.595 0.336773 18.7847Z" fill="currentColor"/>
                                    </g>
                                </svg>
                            </div>
                            <div class="testimonial-head">
                                <div class="testimonial-head-img">
                                    <img src="{{ asset('assets/images/testimonial/4.png') }}" alt="Image Not Found">
                                </div>
                                <div class="testimonial-head-info">
                                    <h6>Nathaneal Down</h6>
                                    <span>Blogger</span>
                                </div>
                            </div>
                            <ul class="testimonial-rating">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-thin fa-star"></i></li>
                            </ul>
                            <p>Maecenas eget ullamcorper dolor placerat ipsum. Aliquam dictum massa eu libero vehicula, id dapibus ligula vulputate. Donec arcu elit</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-active-2 swiper pb-100 tp_has_fade_anim" data-fade-from="bottom" data-delay=".8">
                <div class="swiper-wrapper roll-slider">
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="testimonial-icon">
                                <svg width="48" height="36" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.06">
                                    <path d="M28.6981 18.7847L46.3344 34.5144C46.9789 35.0893 48 34.6318 48 33.7682V1C48 0.447715 47.5523 0 47 0H29.3637C28.8114 0 28.3637 0.447714 28.3637 0.999998V18.0384C28.3637 18.3235 28.4854 18.595 28.6981 18.7847Z" fill="currentColor"/>
                                    <path d="M0.336773 18.7847L17.9731 34.5144C18.6176 35.0893 19.6387 34.6318 19.6387 33.7682V1C19.6387 0.447715 19.191 0 18.6387 0H1.00239C0.450104 0 0.00238991 0.447714 0.00238991 0.999998V18.0384C0.00238991 18.3235 0.124039 18.595 0.336773 18.7847Z" fill="currentColor"/>
                                    </g>
                                </svg>
                            </div>
                            <div class="testimonial-head">
                                <div class="testimonial-head-img">
                                    <img src="{{ asset('assets/images/testimonial/5.png') }}" alt="Image Not Found">
                                </div>
                                <div class="testimonial-head-info">
                                    <h6>Russell Sprout</h6>
                                    <span>Blog Writer</span>
                                </div>
                            </div>
                            <ul class="testimonial-rating">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-thin fa-star"></i></li>
                            </ul>
                            <p>Maecenas eget ullamcorper dolor placerat ipsum. Aliquam dictum massa eu libero vehicula, id dapibus ligula vulputate. Donec arcu elit</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="testimonial-icon">
                                <svg width="48" height="36" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.06">
                                    <path d="M28.6981 18.7847L46.3344 34.5144C46.9789 35.0893 48 34.6318 48 33.7682V1C48 0.447715 47.5523 0 47 0H29.3637C28.8114 0 28.3637 0.447714 28.3637 0.999998V18.0384C28.3637 18.3235 28.4854 18.595 28.6981 18.7847Z" fill="currentColor"/>
                                    <path d="M0.336773 18.7847L17.9731 34.5144C18.6176 35.0893 19.6387 34.6318 19.6387 33.7682V1C19.6387 0.447715 19.191 0 18.6387 0H1.00239C0.450104 0 0.00238991 0.447714 0.00238991 0.999998V18.0384C0.00238991 18.3235 0.124039 18.595 0.336773 18.7847Z" fill="currentColor"/>
                                    </g>
                                </svg>
                            </div>
                            <div class="testimonial-head">
                                <div class="testimonial-head-img">
                                    <img src="{{ asset('assets/images/testimonial/6.png') }}" alt="Image Not Found">
                                </div>
                                <div class="testimonial-head-info">
                                    <h6>Hanson Deck</h6>
                                    <span>Blogger</span>
                                </div>
                            </div>
                            <ul class="testimonial-rating">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-thin fa-star"></i></li>
                            </ul>
                            <p>Maecenas eget ullamcorper dolor placerat ipsum. Aliquam dictum massa eu libero vehicula, id dapibus ligula vulputate. Donec arcu elit</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="testimonial-icon">
                                <svg width="48" height="36" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.06">
                                    <path d="M28.6981 18.7847L46.3344 34.5144C46.9789 35.0893 48 34.6318 48 33.7682V1C48 0.447715 47.5523 0 47 0H29.3637C28.8114 0 28.3637 0.447714 28.3637 0.999998V18.0384C28.3637 18.3235 28.4854 18.595 28.6981 18.7847Z" fill="currentColor"/>
                                    <path d="M0.336773 18.7847L17.9731 34.5144C18.6176 35.0893 19.6387 34.6318 19.6387 33.7682V1C19.6387 0.447715 19.191 0 18.6387 0H1.00239C0.450104 0 0.00238991 0.447714 0.00238991 0.999998V18.0384C0.00238991 18.3235 0.124039 18.595 0.336773 18.7847Z" fill="currentColor"/>
                                    </g>
                                </svg>
                            </div>
                            <div class="testimonial-head">
                                <div class="testimonial-head-img">
                                    <img src="{{ asset('assets/images/testimonial/7.png') }}" alt="Image Not Found">
                                </div>
                                <div class="testimonial-head-info">
                                    <h6>Nathaneal Down</h6>
                                    <span>Blogger</span>
                                </div>
                            </div>
                            <ul class="testimonial-rating">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-thin fa-star"></i></li>
                            </ul>
                            <p>Maecenas eget ullamcorper dolor placerat ipsum. Aliquam dictum massa eu libero vehicula, id dapibus ligula vulputate. Donec arcu elit</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="testimonial-icon">
                                <svg width="48" height="36" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.06">
                                    <path d="M28.6981 18.7847L46.3344 34.5144C46.9789 35.0893 48 34.6318 48 33.7682V1C48 0.447715 47.5523 0 47 0H29.3637C28.8114 0 28.3637 0.447714 28.3637 0.999998V18.0384C28.3637 18.3235 28.4854 18.595 28.6981 18.7847Z" fill="currentColor"/>
                                    <path d="M0.336773 18.7847L17.9731 34.5144C18.6176 35.0893 19.6387 34.6318 19.6387 33.7682V1C19.6387 0.447715 19.191 0 18.6387 0H1.00239C0.450104 0 0.00238991 0.447714 0.00238991 0.999998V18.0384C0.00238991 18.3235 0.124039 18.595 0.336773 18.7847Z" fill="currentColor"/>
                                    </g>
                                </svg>
                            </div>
                            <div class="testimonial-head">
                                <div class="testimonial-head-img">
                                    <img src="{{ asset('assets/images/testimonial/8.png') }}" alt="Image Not Found">
                                </div>
                                <div class="testimonial-head-info">
                                    <h6>Russell Sprout</h6>
                                    <span>Blog Writer</span>
                                </div>
                            </div>
                            <ul class="testimonial-rating">
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-solid fa-star"></i></li>
                                <li><i class="fa-thin fa-star"></i></li>
                            </ul>
                            <p>Maecenas eget ullamcorper dolor placerat ipsum. Aliquam dictum massa eu libero vehicula, id dapibus ligula vulputate. Donec arcu elit</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial area end -->

        <!-- blog area start -->
        <section class="blog-area pt-140 pb-110">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-area text-center mb-50">
                            <span class="section-subtitle tp_fade_left">Our Blog</span>
                            <h2 class="section-title tp_title_slideup mb-0">Watch Our Latest Blog News</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left">
                        <div class="blog-item mb-30">
                            <div class="blog-img">
                                <a href="{{ url('blog-details') }}"><img src="{{ asset('assets/images/blog/home1/1.png') }}" alt="Image Not Found"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-content-meta">
                                    <a href="#">Creative</a>
                                    <span><i class="fa-light fa-calendar-days"></i>April 18, 2024</span>
                                </div>
                                <h4 class="blog-content-title">
                                    <a href="{{ url('blog-details') }}">Exploring The Power Of AI Text Generator</a>
                                </h4>
                                <a href="{{ url('blog-details') }}" class="blog-content-btn">Learn More<i class="fa-light fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay=".8">
                        <div class="blog-item mb-30">
                            <div class="blog-img">
                                <a href="{{ url('blog-details') }}"><img src="{{ asset('assets/images/blog/home1/2.png') }}" alt="Image Not Found"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-content-meta">
                                    <a href="#">Animation</a>
                                    <span><i class="fa-light fa-calendar-days"></i>June 18, 2024</span>
                                </div>
                                <h4 class="blog-content-title">
                                    <a href="{{ url('blog-details') }}">The 6 Types Of Menus For Your Business</a>
                                </h4>
                                <a href="{{ url('blog-details') }}" class="blog-content-btn">Learn More<i class="fa-light fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.1">
                        <div class="blog-item mb-30">
                            <div class="blog-img">
                                <a href="{{ url('blog-details') }}"><img src="{{ asset('assets/images/blog/home1/3.png') }}" alt="Image Not Found"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-content-meta">
                                    <a href="#">Creative</a>
                                    <span><i class="fa-light fa-calendar-days"></i>April 18, 2024</span>
                                </div>
                                <h4 class="blog-content-title">
                                    <a href="{{ url('blog-details') }}">Exploring The Power Of AI Text Generator</a>
                                </h4>
                                <a href="{{ url('blog-details') }}" class="blog-content-btn">Learn More<i class="fa-light fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog area end -->

        <!-- brand area start -->
        <section class="brand-area pb-140">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-10">
                        <div class="section-area text-center mb-50">
                            <h2 class="section-title tp_title_slideup mb-0">Trusted by 20,000+
                                Marketing Departments.</h2>
                        </div>
                    </div>
                </div>
                <div class="brand-wrap">
                    <div class="brand-item tp_fade_bottom">
                        <img src="{{ asset('assets/images/brand/1.png') }}" alt="Image Not Found">
                    </div>
                    <div class="brand-item tp_fade_bottom">
                        <img src="{{ asset('assets/images/brand/2.png') }}" alt="Image Not Found">
                    </div>
                    <div class="brand-item tp_fade_bottom">
                        <img src="{{ asset('assets/images/brand/3.png') }}" alt="Image Not Found">
                    </div>
                    <div class="brand-item tp_fade_bottom">
                        <img src="{{ asset('assets/images/brand/4.png') }}" alt="Image Not Found">
                    </div>
                    <div class="brand-item tp_fade_bottom">
                        <img src="{{ asset('assets/images/brand/5.png') }}" alt="Image Not Found">
                    </div>
                    <div class="brand-item tp_fade_bottom">
                        <img src="{{ asset('assets/images/brand/6.png') }}" alt="Image Not Found">
                    </div>
                    <div class="brand-item tp_fade_bottom">
                        <img src="{{ asset('assets/images/brand/7.png') }}" alt="Image Not Found">
                    </div>
                    <div class="brand-item tp_fade_bottom">
                        <img src="{{ asset('assets/images/brand/8.png') }}" alt="Image Not Found">
                    </div>
                    <div class="brand-item tp_fade_bottom">
                        <img src="{{ asset('assets/images/brand/9.png') }}" alt="Image Not Found">
                    </div>
                </div>
            </div>
        </section>
        <!-- brand area end -->
    </main>
@endsection

@section('footer')
    <footer class="footer-area">
        <div class="container">
            <div class="footer-top pt-140 pb-55">
                <div class="row justify-content-between">
                    <div class="col-xl-5 col-lg-4 tp_has_fade_anim" data-fade-from="left">
                        <div class="footer-left mb-50">
                            <div class="footer-logo">
                                <a href="{{ url('index') }}"><img src="{{ asset('assets/images/logo/logo-w.png') }}" alt="Image Not Found"></a>
                            </div>
                            <div class="footer-newsletter">
                                <h5>Newsletter Signup</h5>
                                <form action="#">
                                    <input type="email" placeholder="Enter Your Email Address">
                                    <button type="submit"><i class="fa-light fa-arrow-right"></i></button>
                                </form>
                                <div class="footer-newsletter-condition">
                                    <label class="condition-checkbox">
                                        I agree to the <a href="#">Privacy Policy.</a>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7 tp_has_fade_anim" data-fade-from="right" data-delay=".8">
                        <div class="footer-right mb-10">
                            <h3 class="footer-right-title">AI Art Tips From The Finest Doodle Artists.</h3>
                            <div class="footer-widget-wrap">
                                <div class="footer-widget mb-40">
                                    <h5>Socials</h5>
                                    <ul>
                                        <li><a href="#">Facebook</a></li>
                                        <li><a href="#">Twitter</a></li>
                                        <li><a href="#">Dribble</a></li>
                                        <li><a href="#">Instagram</a></li>
                                    </ul>
                                </div>
                                <div class="footer-widget mb-40">
                                    <h5>Menu</h5>
                                    <ul>
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Community</a></li>
                                        <li><a href="#">Career’s</a></li>
                                        <li><a href="#">Affiliate Program</a></li>
                                    </ul>
                                </div>
                                <div class="footer-widget mb-40">
                                    <h5>Contact Info</h5>
                                    <ul>
                                        <li><a href="mailto:example@gmail.com">example@gmail.com</a></li>
                                        <li><a href="tel:+880-1345-85965">+880 1345 85965</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom tp_fade_bottom_footer">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="footer-bottom-copyright d-flex justify-content-center justify-content-md-start">
                            <p>&copy; 2023 Doodle All Rights Reserved by site</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-bottom-menu d-flex justify-content-center justify-content-md-end">
                            <ul>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Term of Service</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection
