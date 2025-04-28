
@extends('layouts.layout1')


@section('header')
    <header class="h2_header-area header-sticky">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-2 col-lg-2 col-6">
                <div class="h2_header-logo">
                    <a href="{{ url('index') }}"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="Image Not Found"></a>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 text-center d-none d-lg-block">
                <div class="h2_header-menu d-none d-lg-flex justify-content-center">
                    <nav class="h2_header-nav-menu" id="mobile-menu">
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
            <div class="col-lg-3 col-6">
                <div class="h2_header-action-wrap d-flex align-items-center justify-content-end">
                    <div class="h2_header-action d-none d-sm-flex">
                        <a href="#" class="h2_header-action-login">
                            <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.01172 8C8.94472 8 10.5117 6.433 10.5117 4.5C10.5117 2.567 8.94472 1 7.01172 1C5.07872 1 3.51172 2.567 3.51172 4.5C3.51172 6.433 5.07872 8 7.01172 8Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.026 15C13.026 12.291 10.331 10.1 7.013 10.1C3.695 10.1 1 12.291 1 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Login
                        </a>
                        <a href="#" class="h2_header-action-btn theme-btn-2">
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
    </header>
@endsection

@section('content')
    <main>
        <!-- banner area start -->
        <section class="h2_banner-area">
            <div class="h2_banner-single bg-default" data-background="assets/images/banner/home2/bg.jpg">
                <div class="container">
                    <div class="h2_banner-content">
                        <span class="h2_banner-content-subtitle tp_subtitle_anim">👋 Hey there! We’re Doodle</span>
                        <h1 class="h2_banner-content-title tp_has_text_reveal_anim">Meet the Best Co-Pilot
                            in the World</h1>
                        <p class="tp_fade_bottom">There are many variations of passages of Lorem Ipsum available, but the majority have <br> suffered alteration in some form, by injected humou.</p>
                    </div>
                    <div class="h2_banner-bottom">
                        <img src="{{ asset('assets/images/banner/home2/form_shape.png') }}" alt="" class="h2_banner-bottom-shape tp_fade_right">
                        <div class="h2_banner-form tp_fade_bottom">
                            <h5 class="h2_banner-form-title">How can I help you?</h5>
                            <form action="#">
                                <input type="text" placeholder="Start with a detailed description">
                                <button type="submit"><i class="fa-solid fa-paper-plane"></i>Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="h2_banner-shape">
                <img src="{{ asset('assets/images/banner/home2/shape-1.png') }}" alt="Image Not Found" class="h2_banner-shape-1" data-speed="0.8">
                <img src="{{ asset('assets/images/banner/home2/shape-2.png') }}" alt="Image Not Found" class="h2_banner-shape-2" data-speed="0.7">
                <img src="{{ asset('assets/images/banner/home2/shape-3.png') }}" alt="Image Not Found" class="h2_banner-shape-3" data-speed="0.9">
                <img src="{{ asset('assets/images/banner/home2/shape-4.png') }}" alt="Image Not Found" class="h2_banner-shape-4" data-speed="0.8">
                <img src="{{ asset('assets/images/banner/home2/shape-5.png') }}" alt="Image Not Found" class="h2_banner-shape-5">
            </div>
        </section>
        <!-- banner area end -->

        <!-- brand area start -->
        <section class="h2_brand-area pb-140 pt-135">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-8 col-xl-9 col-lg-9">
                        <div class="h2_section-area text-center mb-50">
                            <span class="h2_section-subtitle tp_subtitle_anim">Our Client</span>
                            <h2 class="h2_section-title tp_title_slideup mb-0">15,000+ Professionals & Teams Choose Doodle</h2>
                        </div>
                    </div>
                </div>
                <div class="h2_brand-wrap">
                    <div class="h2_brand-item tp_fade_bottom">
                        <img src="{{ asset('assets/images/brand/1.png') }}" alt="Image Not Found">
                    </div>
                    <div class="h2_brand-item tp_fade_bottom">
                        <img src="{{ asset('assets/images/brand/2.png') }}" alt="Image Not Found">
                    </div>
                    <div class="h2_brand-item tp_fade_bottom">
                        <img src="{{ asset('assets/images/brand/3.png') }}" alt="Image Not Found">
                    </div>

                    <div class="h2_brand-item tp_fade_bottom">
                        <img src="{{ asset('assets/images/brand/4.png') }}" alt="Image Not Found">
                    </div>
                    <div class="h2_brand-item tp_fade_bottom">
                        <img src="{{ asset('assets/images/brand/5.png') }}" alt="Image Not Found">
                    </div>
                </div>
            </div>
        </section>
        <!-- brand area end -->

        <!-- about area start -->
        <section class="h2_about-area pb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="h2_about-img mb-40">
                            <img src="{{ asset('assets/images/about/home2/bg.png') }}" alt="Image Not Found" class="inner-img-1 tp_fade_right">
                            <img src="{{ asset('assets/images/about/home2/bg-2.png') }}" alt="Image Not Found" class="inner-img-2 tp_fade_bottom">
                            <img src="{{ asset('assets/images/about/home2/shape.png') }}" alt="Image Not Found" class="inner-img-shape">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="h2_about-content mb-40">
                            <div class="h2_section-area mb-40">
                                <span class="h2_section-subtitle tp_subtitle_anim">Who We Are?</span>
                                <h2 class="h2_section-title tp_title_slideup mb-25">What Makes The Doodle
                                    Team Different?</h2>
                                <p class="h2_section-text tp_fade_bottom">Sed Mattis eros lectors, eu fermentum Felis laborites convallis. Nam Felis arco, sed <br> mi Faubus quips. Fusco id dui nil. Sed ac lorem a dolor incident suscept <br> Poetesqueo.</p>
                                <p class="h2_section-text mt-10 tp_fade_bottom">Sed Mattis eros lectors, eu fermentum Felis laborites convallis. Nam Felis arco, sed <br>  mi Faubus quips. Fusco id dui nil.</p>
                            </div>
                            <a href="#" class="theme-btn-2 tp_fade_bottom">Explore Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about area end -->

        <!-- work area start -->
        <section class="h2_work-area bg-default pt-140 pb-140" data-background="assets/images/work/home2/bg.jpg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-5 col-md-6">
                        <div class="h2_work-content mb-50 mb-md-0">
                            <div class="h2_section-area mb-20">
                                <span class="h2_section-subtitle tp_subtitle_anim">Working Process</span>
                                <h2 class="h2_section-title tp_title_slideup mb-30">
                                    Constantly
                                    Improving Itself</h2>
                                <p class="h2_section-text tp_fade_bottom">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humourThere are many variations of passages.</p>
                            </div>
                            <ul class="h2_work-content-list tp_fade_bottom">
                                <li>Learning and Development Ability</li>
                                <li>Ease of Integration</li>
                            </ul>
                            <a href="#" class="theme-btn-2 tp_fade_bottom">Explore More</a>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-6">
                        <div class="h2_work-img tp_fade_left">
                            <img src="{{ asset('assets/images/work/home2/bg.png') }}" alt="Image Not Found">
                        </div>
                    </div>
                </div>
                <div class="h2_work-bottom pt-80">
                    <div class="h2_work-item h2_work-item-1 tp_has_fade_anim" data-fade-from="bottom">
                        <div class="h2_work-item-icon">
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="h2_work-item-info">
                            <span>Data Processing</span>
                        </div>
                    </div>
                    <div class="h2_work-item h2_work-item-2 tp_has_fade_anim" data-fade-from="bottom" data-delay=".8">
                        <div class="h2_work-item-icon">
                            <i class="fa-solid fa-comments"></i>
                        </div>
                        <div class="h2_work-item-info">
                            <span>Generating a Response</span>
                        </div>
                    </div>
                    <div class="h2_work-item h2_work-item-3 tp_has_fade_anim" data-fade-from="bottom" data-delay="1.1">
                        <div class="h2_work-item-icon">
                            <i class="fa-solid fa-rocket-launch"></i>
                        </div>
                        <div class="h2_work-item-info">
                            <span>Integration and implementation</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="h2_work-shape d-none d-md-block">
                <img src="{{ asset('assets/images/work/home2/shape-1.png') }}" alt="Image Not Found" class="h2_work-shape-1" data-speed="0.6">
                <img src="{{ asset('assets/images/work/home2/shape-2.png') }}" alt="Image Not Found" class="h2_work-shape-2" data-speed="0.8">
                <img src="{{ asset('assets/images/work/home2/shape-3.png') }}" alt="Image Not Found" class="h2_work-shape-3" data-speed="0.8">
                <img src="{{ asset('assets/images/work/home2/shape-4.png') }}" alt="Image Not Found" class="h2_work-shape-4" data-speed="0.7">
            </div>
        </section>
        <!-- work area end -->

        <!-- testimonial area start -->
        <section class="h2_testimonial-area pb-95 pt-135">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="h2_section-area text-center">
                            <span class="h2_section-subtitle tp_subtitle_anim">Testimonials</span>
                            <h2 class="h2_section-title tp_title_slideup mb-0">Trusted by 1000+ companies</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="h2_testimonial-active swiper pb-40 pt-50 tp_fade_bottom">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="h2_testimonial-item">
                                        <div class="h2_testimonial-icon">
                                            <svg width="48" height="36" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g opacity="0.06">
                                                <path d="M28.6981 18.7847L46.3344 34.5144C46.9789 35.0893 48 34.6318 48 33.7682V1C48 0.447715 47.5523 0 47 0H29.3637C28.8114 0 28.3637 0.447714 28.3637 0.999998V18.0384C28.3637 18.3235 28.4854 18.595 28.6981 18.7847Z" fill="currentColor"/>
                                                <path d="M0.336773 18.7847L17.9731 34.5144C18.6176 35.0893 19.6387 34.6318 19.6387 33.7682V1C19.6387 0.447715 19.191 0 18.6387 0H1.00239C0.450104 0 0.00238991 0.447714 0.00238991 0.999998V18.0384C0.00238991 18.3235 0.124039 18.595 0.336773 18.7847Z" fill="currentColor"/>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="h2_testimonial-head">
                                            <div class="h2_testimonial-head-img">
                                                <img src="{{ asset('assets/images/testimonial/1.png') }}" alt="Image Not Found">
                                            </div>
                                            <div class="h2_testimonial-head-info">
                                                <h6>Hanson Deck</h6>
                                                <span>Blogger</span>
                                            </div>
                                        </div>
                                        <ul class="h2_testimonial-rating">
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
                                    <div class="h2_testimonial-item">
                                        <div class="h2_testimonial-icon">
                                            <svg width="48" height="36" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g opacity="0.06">
                                                <path d="M28.6981 18.7847L46.3344 34.5144C46.9789 35.0893 48 34.6318 48 33.7682V1C48 0.447715 47.5523 0 47 0H29.3637C28.8114 0 28.3637 0.447714 28.3637 0.999998V18.0384C28.3637 18.3235 28.4854 18.595 28.6981 18.7847Z" fill="currentColor"/>
                                                <path d="M0.336773 18.7847L17.9731 34.5144C18.6176 35.0893 19.6387 34.6318 19.6387 33.7682V1C19.6387 0.447715 19.191 0 18.6387 0H1.00239C0.450104 0 0.00238991 0.447714 0.00238991 0.999998V18.0384C0.00238991 18.3235 0.124039 18.595 0.336773 18.7847Z" fill="currentColor"/>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="h2_testimonial-head">
                                            <div class="h2_testimonial-head-img">
                                                <img src="{{ asset('assets/images/testimonial/2.png') }}" alt="Image Not Found">
                                            </div>
                                            <div class="h2_testimonial-head-info">
                                                <h6>Nigel Nigel</h6>
                                                <span>President of Sales</span>
                                            </div>
                                        </div>
                                        <ul class="h2_testimonial-rating">
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
                                    <div class="h2_testimonial-item">
                                        <div class="h2_testimonial-icon">
                                            <svg width="48" height="36" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g opacity="0.06">
                                                <path d="M28.6981 18.7847L46.3344 34.5144C46.9789 35.0893 48 34.6318 48 33.7682V1C48 0.447715 47.5523 0 47 0H29.3637C28.8114 0 28.3637 0.447714 28.3637 0.999998V18.0384C28.3637 18.3235 28.4854 18.595 28.6981 18.7847Z" fill="currentColor"/>
                                                <path d="M0.336773 18.7847L17.9731 34.5144C18.6176 35.0893 19.6387 34.6318 19.6387 33.7682V1C19.6387 0.447715 19.191 0 18.6387 0H1.00239C0.450104 0 0.00238991 0.447714 0.00238991 0.999998V18.0384C0.00238991 18.3235 0.124039 18.595 0.336773 18.7847Z" fill="currentColor"/>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="h2_testimonial-head">
                                            <div class="h2_testimonial-head-img">
                                                <img src="{{ asset('assets/images/testimonial/3.png') }}" alt="Image Not Found">
                                            </div>
                                            <div class="h2_testimonial-head-info">
                                                <h6>Max Conversion</h6>
                                                <span>SEO Contain Writer</span>
                                            </div>
                                        </div>
                                        <ul class="h2_testimonial-rating">
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
                                    <div class="h2_testimonial-item">
                                        <div class="h2_testimonial-icon">
                                            <svg width="48" height="36" viewBox="0 0 48 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g opacity="0.06">
                                                <path d="M28.6981 18.7847L46.3344 34.5144C46.9789 35.0893 48 34.6318 48 33.7682V1C48 0.447715 47.5523 0 47 0H29.3637C28.8114 0 28.3637 0.447714 28.3637 0.999998V18.0384C28.3637 18.3235 28.4854 18.595 28.6981 18.7847Z" fill="currentColor"/>
                                                <path d="M0.336773 18.7847L17.9731 34.5144C18.6176 35.0893 19.6387 34.6318 19.6387 33.7682V1C19.6387 0.447715 19.191 0 18.6387 0H1.00239C0.450104 0 0.00238991 0.447714 0.00238991 0.999998V18.0384C0.00238991 18.3235 0.124039 18.595 0.336773 18.7847Z" fill="currentColor"/>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="h2_testimonial-head">
                                            <div class="h2_testimonial-head-img">
                                                <img src="{{ asset('assets/images/testimonial/4.png') }}" alt="Image Not Found">
                                            </div>
                                            <div class="h2_testimonial-head-info">
                                                <h6>Nathaneal Down</h6>
                                                <span>Blogger</span>
                                            </div>
                                        </div>
                                        <ul class="h2_testimonial-rating">
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
                            <div class="h2_testimonial-pagination pt-55 text-center"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial area end -->

        <!-- price area start -->
        <section class="price-area h2_price-area price-tab pb-135">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-7 col-md-10">
                        <div class="h2_section-area text-center mb-50">
                            <span class="h2_section-subtitle tp_subtitle_anim">Pricing Plan</span>
                            <h2 class="h2_section-title tp_title_slideup mb-0">Ready to Get Started? We'll Keep You Under Budget</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="price-switch-wrapper tp_fade_bottom">
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
                <div id="hourly" class="wrapper-full hide">
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
                                <div class="price-item-option">
                                    <span>Best Choice</span>
                                </div>
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
                                    <div class="price-item-amount"><del>$99</del><h2 class="price-item-amount-title">$99<span>.8</span></h2><span class="amount-offer">30%</span></div>
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
        </section>
        <!-- price area end -->

        <!-- faq area start -->
        <section class="h2_faq-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-10">
                        <div class="h2_section-area text-center mb-50">
                            <span class="h2_section-subtitle tp_subtitle_anim">Have Any Questions</span>
                            <h2 class="h2_section-title tp_title_slideup mb-0">Frequently Asked Questions
                                (FAQ) on Doodle</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xxl-9 col-xl-10">
                        <div class="h2_faq-wrap tp_fade_bottom">
                            <div class="h2_faq-content">
                                <div class="accordion" id="Expp">
                                    <div class="accordion-item mb-30">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">What is Doodle Content Writing Tool?
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#Expp">
                                            <div class="accordion-body">
                                                <p>
                                                Sed Mattis eros lectors, eu fermentum Felis laborites convallis. Nam Felis arco, sed  mi Faubus quips. Fusco id dui nil. Sed ac lorem a dolor incident suscept quips Purus. Poetesque auctor fugit Elementa. ante ipsum primes in Faubus orca lotus et utricles poseurs cub ilia curare.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item mb-30">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">How is the data security of our chatbots ensured?
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#Expp">
                                            <div class="accordion-body">
                                                <p>
                                                Sed Mattis eros lectors, eu fermentum Felis laborites convallis. Nam Felis arco, sed  mi Faubus quips. Fusco id dui nil. Sed ac lorem a dolor incident suscept quips Purus. Poetesque auctor fugit Elementa. ante ipsum primes in Faubus orca lotus et utricles poseurs cub ilia curare.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item mb-30">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">How does the learning process of AI chatbots work?
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#Expp">
                                            <div class="accordion-body">
                                                <p>
                                                Sed Mattis eros lectors, eu fermentum Felis laborites convallis. Nam Felis arco, sed  mi Faubus quips. Fusco id dui nil. Sed ac lorem a dolor incident suscept quips Purus. Poetesque auctor fugit Elementa. ante ipsum primes in Faubus orca lotus et utricles poseurs cub ilia curare.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item mb-30">
                                        <h2 class="accordion-header" id="headingFour">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">What are the benefits of AI Chatbots to my business?
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#Expp">
                                            <div class="accordion-body">
                                                <p>
                                                Sed Mattis eros lectors, eu fermentum Felis laborites convallis. Nam Felis arco, sed  mi Faubus quips. Fusco id dui nil. Sed ac lorem a dolor incident suscept quips Purus. Poetesque auctor fugit Elementa. ante ipsum primes in Faubus orca lotus et utricles poseurs cub ilia curare.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item mb-30">
                                        <h2 class="accordion-header" id="headingFive">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">How are AI writers impacting the writing industry?
                                            </button>
                                        </h2>
                                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#Expp">
                                            <div class="accordion-body">
                                                <p>
                                                Sed Mattis eros lectors, eu fermentum Felis laborites convallis. Nam Felis arco, sed  mi Faubus quips. Fusco id dui nil. Sed ac lorem a dolor incident suscept quips Purus. Poetesque auctor fugit Elementa. ante ipsum primes in Faubus orca lotus et utricles poseurs cub ilia curare.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item mb-30">
                                        <h2 class="accordion-header" id="headingSix">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">How do our hatbots improve customer support processes?
                                            </button>
                                        </h2>
                                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#Expp">
                                            <div class="accordion-body">
                                                <p>
                                                Sed Mattis eros lectors, eu fermentum Felis laborites convallis. Nam Felis arco, sed  mi Faubus quips. Fusco id dui nil. Sed ac lorem a dolor incident suscept quips Purus. Poetesque auctor fugit Elementa. ante ipsum primes in Faubus orca lotus et utricles poseurs cub ilia curare.</p>
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
        <section class="h2_blog-area pt-105 pb-140">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="h2_section-area text-center mb-50">
                            <span class="h2_section-subtitle tp_subtitle_anim">Our Blog</span>
                            <h2 class="h2_section-title tp_title_slideup mb-0">Our Latest News</h2>
                        </div>
                    </div>
                </div>
                <div class="swiper h2_blog-active">
                    <div class="swiper-wrapper tp_fade_bottom">
                        <div class="swiper-slide">
                            <div class="h2_blog-item">
                                <div class="h2_blog-img w_img mb-35">
                                    <a href="{{ url('blog-details') }}"><img src="{{ asset('assets/images/blog/home2/1.png') }}" alt="Image Not Found"></a>
                                </div>
                                <div class="h2_blog-content">
                                    <div class="h2_blog-content-meta">
                                        <span><a href="#">Creative</a></span>
                                        <span><i class="fa-light fa-calendar-days"></i>April 18, 2024</span>
                                    </div>
                                    <h4 class="h2_blog-content-title">
                                        <a href="{{ url('blog-details') }}">How to choose the right line an app development?</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="h2_blog-item">
                                <div class="h2_blog-img w_img mb-35">
                                    <a href="{{ url('blog-details') }}"><img src="{{ asset('assets/images/blog/home2/2.png') }}" alt="Image Not Found"></a>
                                </div>
                                <div class="h2_blog-content">
                                    <div class="h2_blog-content-meta">
                                        <span><a href="#">Ai</a></span>
                                        <span><i class="fa-light fa-calendar-days"></i>June 18, 2024</span>
                                    </div>
                                    <h4 class="h2_blog-content-title">
                                        <a href="{{ url('blog-details') }}">AI Content Creation Tools: 7 Tools to Supercharge Pro.</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="h2_blog-item">
                                <div class="h2_blog-img w_img mb-35">
                                    <a href="{{ url('blog-details') }}"><img src="{{ asset('assets/images/blog/home2/3.png') }}" alt="Image Not Found"></a>
                                </div>
                                <div class="h2_blog-content">
                                    <div class="h2_blog-content-meta">
                                        <span><a href="#">Animation</a></span>
                                        <span><i class="fa-light fa-calendar-days"></i>April 18, 2024</span>
                                    </div>
                                    <h4 class="h2_blog-content-title">
                                        <a href="{{ url('blog-details') }}">Innovative Developments in AI Chatbot Technologies</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h2_blog-pagination text-center pt-50"></div>
                </div>
            </div>
        </section>
        <!-- blog area end -->

        <!-- instagram area start -->
        <div class="h2_instagram-area">
            <div class="h2_instagram-wrap">
                <div class="h2_instagram-item w_img tp_fade_bottom" data-fade-from="bottom">
                    <img src="{{ asset('assets/images/instagram/home2/1.png') }}" alt="Image Not Found">
                    <div class="h2_instagram-item-content">
                        <h5>Follow Us on</h5>
                        <svg width="106" height="106" viewBox="0 0 106 106" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M78 3H28C14.1929 3 3 14.1929 3 28V78C3 91.8071 14.1929 103 28 103H78C91.8071 103 103 91.8071 103 78V28C103 14.1929 91.8071 3 78 3Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M73.0005 49.8515C73.6175 54.0127 72.9068 58.2626 70.9693 61.9966C69.0318 65.7306 65.9662 68.7586 62.2086 70.6499C58.451 72.5412 54.1927 73.1995 50.0394 72.5312C45.8861 71.8628 42.0493 69.9019 39.0747 66.9273C36.1001 63.9527 34.1391 60.1159 33.4708 55.9626C32.8025 51.8093 33.4608 47.551 35.3521 43.7934C37.2434 40.0358 40.2714 36.9702 44.0054 35.0327C47.7394 33.0952 51.9893 32.3844 56.1505 33.0015C60.3951 33.6309 64.3247 35.6088 67.359 38.643C70.3932 41.6773 72.3711 45.6069 73.0005 49.8515Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M80.5 25.5H80.55" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a href="#">&commat;Doodle_543</a>
                    </div>
                </div>
                <div class="h2_instagram-item w_img tp_fade_bottom" data-fade-from="bottom" data-delay=".8">
                    <img src="{{ asset('assets/images/instagram/home2/2.png') }}" alt="Image Not Found">
                    <div class="h2_instagram-item-content">
                        <h5>Follow Us on</h5>
                        <svg width="106" height="106" viewBox="0 0 106 106" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M78 3H28C14.1929 3 3 14.1929 3 28V78C3 91.8071 14.1929 103 28 103H78C91.8071 103 103 91.8071 103 78V28C103 14.1929 91.8071 3 78 3Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M73.0005 49.8515C73.6175 54.0127 72.9068 58.2626 70.9693 61.9966C69.0318 65.7306 65.9662 68.7586 62.2086 70.6499C58.451 72.5412 54.1927 73.1995 50.0394 72.5312C45.8861 71.8628 42.0493 69.9019 39.0747 66.9273C36.1001 63.9527 34.1391 60.1159 33.4708 55.9626C32.8025 51.8093 33.4608 47.551 35.3521 43.7934C37.2434 40.0358 40.2714 36.9702 44.0054 35.0327C47.7394 33.0952 51.9893 32.3844 56.1505 33.0015C60.3951 33.6309 64.3247 35.6088 67.359 38.643C70.3932 41.6773 72.3711 45.6069 73.0005 49.8515Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M80.5 25.5H80.55" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a href="#">&commat;Doodle_543</a>
                    </div>
                </div>
                <div class="h2_instagram-item w_img tp_fade_bottom" data-fade-from="bottom" data-delay="1.1">
                    <img src="{{ asset('assets/images/instagram/home2/3.png') }}" alt="Image Not Found">
                    <div class="h2_instagram-item-content">
                        <h5>Follow Us on</h5>
                        <svg width="106" height="106" viewBox="0 0 106 106" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M78 3H28C14.1929 3 3 14.1929 3 28V78C3 91.8071 14.1929 103 28 103H78C91.8071 103 103 91.8071 103 78V28C103 14.1929 91.8071 3 78 3Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M73.0005 49.8515C73.6175 54.0127 72.9068 58.2626 70.9693 61.9966C69.0318 65.7306 65.9662 68.7586 62.2086 70.6499C58.451 72.5412 54.1927 73.1995 50.0394 72.5312C45.8861 71.8628 42.0493 69.9019 39.0747 66.9273C36.1001 63.9527 34.1391 60.1159 33.4708 55.9626C32.8025 51.8093 33.4608 47.551 35.3521 43.7934C37.2434 40.0358 40.2714 36.9702 44.0054 35.0327C47.7394 33.0952 51.9893 32.3844 56.1505 33.0015C60.3951 33.6309 64.3247 35.6088 67.359 38.643C70.3932 41.6773 72.3711 45.6069 73.0005 49.8515Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M80.5 25.5H80.55" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a href="#">&commat;Doodle_543</a>
                    </div>
                </div>
                <div class="h2_instagram-item w_img tp_fade_bottom" data-fade-from="bottom" data-delay="1.3">
                    <img src="{{ asset('assets/images/instagram/home2/4.png') }}" alt="Image Not Found">
                    <div class="h2_instagram-item-content">
                        <h5>Follow Us on</h5>
                        <svg width="106" height="106" viewBox="0 0 106 106" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M78 3H28C14.1929 3 3 14.1929 3 28V78C3 91.8071 14.1929 103 28 103H78C91.8071 103 103 91.8071 103 78V28C103 14.1929 91.8071 3 78 3Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M73.0005 49.8515C73.6175 54.0127 72.9068 58.2626 70.9693 61.9966C69.0318 65.7306 65.9662 68.7586 62.2086 70.6499C58.451 72.5412 54.1927 73.1995 50.0394 72.5312C45.8861 71.8628 42.0493 69.9019 39.0747 66.9273C36.1001 63.9527 34.1391 60.1159 33.4708 55.9626C32.8025 51.8093 33.4608 47.551 35.3521 43.7934C37.2434 40.0358 40.2714 36.9702 44.0054 35.0327C47.7394 33.0952 51.9893 32.3844 56.1505 33.0015C60.3951 33.6309 64.3247 35.6088 67.359 38.643C70.3932 41.6773 72.3711 45.6069 73.0005 49.8515Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M80.5 25.5H80.55" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a href="#">&commat;Doodle_543</a>
                    </div>
                </div>
                <div class="h2_instagram-item w_img tp_fade_bottom" data-fade-from="bottom" data-delay="1.5">
                    <img src="{{ asset('assets/images/instagram/home2/5.png') }}" alt="Image Not Found">
                    <div class="h2_instagram-item-content">
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
    <footer class="h2_footer-area">
        <div class="h2_footer-top pt-130 pb-135 bg-default" data-background="assets/images/footer/home2/bg.jpg">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-12">
                        <div class="h2_footer-top-content">
                            <h2 class="h2_footer-top-title tp_fade_bottom">How Can We Help You?</h2>
                            <form action="#" class="tp_fade_bottom">
                                <input type="email" placeholder="Enter Your Email Address">
                                <button type="submit">Subscribe</button>
                            </form>
                            <div class="h2_footer-top-condition tp_fade_bottom">
                                <label class="condition-checkbox">
                                    I agree to the <a href="#">Privacy Policy.</a>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="h2_footer-shape">
                <img src="{{ asset('assets/images/footer/home2/shape-1.png') }}" alt="" class="h2_footer-shape-1" data-speed="0.8">
                <img src="{{ asset('assets/images/footer/home2/shape-2.png') }}" alt="" class="h2_footer-shape-2" data-speed="0.8">
                <img src="{{ asset('assets/images/footer/home2/shape-3.png') }}" alt="" class="h2_footer-shape-3" data-speed="0.8">
                <img src="{{ asset('assets/images/footer/home2/shape-4.png') }}" alt="" class="h2_footer-shape-4" data-speed="0.8">
            </div>
        </div>
        <div class="h2_footer-bottom">
            <div class="container">
                <div class="row justify-content-sm-between align-items-center justify-content-center">
                    <div class="col-xl-4 col-lg-5 col-md-12 order-3 order-lg-0 tp_fade_bottom_footer">
                        <div class="h2_footer-bottom-copyright text-center text-lg-start">
                            <p>&copy; 2023 Doodle All Rights Reserved by site</p>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-sm-6 col-auto tp_fade_bottom_footer">
                        <div class="h2_footer-bottom-logo mb-10 mb-lg-0">
                            <a href="{{ url('index') }}"><img src="{{ asset('assets/images/logo/logo-w.png') }}" alt="Image Not Found"></a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-sm-6 col-auto tp_fade_bottom_footer">
                        <div class="h2_footer-bottom-social mb-10 mb-lg-0">
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
        </div>
    </footer>
@endsection


