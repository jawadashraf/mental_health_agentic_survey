@extends('layouts.layout1')

@section('header')
    <header class="h4_header-area">
        <div class="h4_header-top d-none d-sm-block">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="h4_header-top-text">
                            <p>Create an account to avail a 34% bonus discount at checkout.</p>
                            <a href="#">Learn More<i class="fa-light fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="h4_header-bottom header-sticky">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xxl-3 col-lg-2 col-4">
                        <div class="h4_header-logo">
                            <a href="{{ url('index') }}"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="Image Not Found"></a>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-lg-7 d-none d-lg-block">
                        <div class="h4_header-menu ">
                            <nav class="h4_header-nav-menu" id="mobile-menu">
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
                    <div class="col-xxl-3 col-lg-3 col-8">
                        <div class="h2_header-action-wrap d-flex align-items-center justify-content-end">
                            <div class="h4_header-action d-none d-sm-flex">
                                <a href="#" class="h4_header-action-login">
                                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.01172 8C8.94472 8 10.5117 6.433 10.5117 4.5C10.5117 2.567 8.94472 1 7.01172 1C5.07872 1 3.51172 2.567 3.51172 4.5C3.51172 6.433 5.07872 8 7.01172 8Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M13.026 15C13.026 12.291 10.331 10.1 7.013 10.1C3.695 10.1 1 12.291 1 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    Sing in
                                </a>
                                <a href="#" class="h4_header-action-btn">
                                    Join AI<i class="fa-light fa-angle-right"></i>
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
        <section class="h4_banner-area">
            <div class="h4_banner-single bg-default" data-background="assets/images/banner/home2/bg.jpg">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10">
                            <div class="h4_banner-content">
                                <h1 class="h4_banner-content-title tp_title_anim">Cogito Script The Future
                                    Text Generation.</h1>
                                <p class="tp_desc_anim">Quisque tempus scelerisque risus faucibus varius. In id vulputate sem. Integer porttitor est <br> rhoncus congue nibh et accumsan lobortis.</p>
                                <div class="h4_banner-form tp_fade_bottom">
                                    <div class="h4_banner-form-top">
                                        <h5 class="h4_banner-form-title">Create</h5>
                                        <span>Edit</span>
                                    </div>
                                    <form action="#">
                                        <input type="text" placeholder="Start with a detailed description">
                                        <select name="select" class="h4_banner-form-option has-nice-select">
                                            <option value="1">Art & Design</option>
                                            <option value="2">Graphic Design</option>
                                            <option value="3">Web Design</option>
                                            <option value="4">UX/UI Design</option>
                                        </select>
                                        <button type="submit">
                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.60317 6.1462C8.22549 6.65078 7.86019 7.13949 7.49489 7.62771C7.45028 7.68719 7.40667 7.74716 7.35809 7.80367C7.25153 7.92808 7.11522 7.9712 6.95711 7.93006C6.80742 7.8909 6.71226 7.79029 6.68847 7.63862C6.65278 7.41061 6.62651 7.18162 6.59826 6.95263C6.54175 6.49614 6.48723 6.03914 6.43023 5.56877C6.11599 5.52813 5.81513 5.48748 5.51427 5.4518C5.17871 5.41165 4.84216 5.37745 4.5066 5.33829C4.44118 5.33086 4.37476 5.31946 4.3128 5.29814C4.04366 5.20595 3.96089 4.88526 4.15568 4.67659C4.22259 4.60522 4.30686 4.54921 4.38616 4.48973C4.86744 4.1284 5.34971 3.76806 5.84784 3.39583C5.74425 3.14899 5.64462 2.90761 5.54202 2.66722C5.38639 2.30341 5.23026 1.9396 5.07165 1.57728C4.99284 1.39686 4.97499 1.22536 5.12766 1.07518C5.28081 0.924007 5.45429 0.949781 5.63223 1.02611C6.14721 1.24767 6.6622 1.46873 7.17768 1.6893C7.25995 1.72449 7.34322 1.7567 7.44384 1.79735C7.52166 1.69425 7.59551 1.5971 7.66887 1.49896C7.9955 1.06279 8.32115 0.62612 8.64828 0.190937C8.75484 0.0486844 8.88817 -0.0340897 9.07454 0.013493C9.25892 0.0600844 9.3412 0.193911 9.3749 0.367885C9.37788 0.384241 9.38036 0.400598 9.38234 0.416954C9.45123 1.00678 9.52558 1.59562 9.58506 2.18594C9.60043 2.33959 9.65098 2.3956 9.80761 2.41146C10.3984 2.46995 10.9873 2.5433 11.5766 2.61418C11.7684 2.63698 11.927 2.71133 11.982 2.91951C12.0346 3.11826 11.9364 3.25159 11.7882 3.36262C11.3258 3.70908 10.8633 4.05505 10.4009 4.40151C10.336 4.45008 10.273 4.50113 10.1982 4.55962C10.3142 4.83372 10.4252 5.09839 10.5382 5.36258C10.674 5.68079 10.8088 5.99999 10.9491 6.31671C11.0334 6.50704 11.0913 6.6944 10.9228 6.86688C10.7548 7.03937 10.5714 6.9903 10.3766 6.90505C9.79522 6.65028 9.20985 6.40494 8.60367 6.1462H8.60317Z" fill="currentColor"/>
                                                <path d="M5.88247 7.00379C5.93302 7.12274 5.85372 7.21791 5.7531 7.31803C4.26218 8.80499 2.77373 10.2954 1.2838 11.7839C0.992359 12.0748 0.829289 12.0718 0.532393 11.7769C0.397576 11.6431 0.259289 11.5127 0.130915 11.3725C-0.0440505 11.1811 -0.0420679 10.9918 0.127445 10.7985C0.165611 10.7549 0.208237 10.7157 0.249376 10.6751C1.71502 9.20944 3.18265 7.74528 4.64383 6.27518C4.77221 6.14581 4.89166 6.08187 5.07555 6.11954C5.25249 6.15572 5.43539 6.16613 5.6163 6.18001C5.74666 6.18993 5.80564 6.25287 5.81555 6.38224C5.83092 6.57951 5.85719 6.77579 5.88197 7.00379H5.88247Z" fill="currentColor"/>
                                            </svg>
                                            Generate
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-11 col-lg-11">
                            <div class="h4_banner-bottom-img banner_img_anim">
                                <img src="{{ asset('assets/images/banner/home4/1.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="h4_banner-shape d-none d-xl-block">
                <div class="h4_banner-shape-1" data-speed="0.9">
                    <img src="{{ asset('assets/images/banner/home4/icon-1.png') }}" alt="">
                    <p>Research assistant</p>
                </div>
                <div class="h4_banner-shape-2" data-speed="0.8">
                    <img src="{{ asset('assets/images/banner/home4/icon-2.png') }}" alt="">
                    <p>AI Chat</p>
                </div>
                <div class="h4_banner-shape-3" data-speed="0.7">
                    <img src="{{ asset('assets/images/banner/home4/icon-3.png') }}" alt="">
                    <p>Text Citations</p>
                </div>
                <div class="h4_banner-shape-4" data-speed="0.9">
                    <img src="{{ asset('assets/images/banner/home4/icon-4.png') }}" alt="">
                    <p>MLA & APA Citations</p>
                </div>
                <div class="h4_banner-shape-5" data-speed="0.8">
                    <img src="{{ asset('assets/images/banner/home4/icon-5.png') }}" alt="">
                    <p>Reference Finder</p>
                </div>
                <div class="h4_banner-shape-6" data-speed="0.7">
                    <img src="{{ asset('assets/images/banner/home4/icon-6.png') }}" alt="">
                    <p>AI Feedback</p>
                </div>
            </div>
        </section>
        <!-- banner area end -->

        <!-- service area start -->
        <section class="h4_service-area pt-130 pb-90">
            <div class="container">
                <div class="row mb-30 align-items-end">
                    <div class="col-xl-6 col-lg-7 col-md-8 col-sm-9">
                        <div class="h4_section-area mb-20">
                            <h2 class="h4_section-title tp_title_slideup mb-0">Content Created By Ai
                                Lightning Speed.</h2>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5 col-md-4 col-sm-3">
                        <div class="h4_service-navigation mb-30 tp_fade_left">
                            <div class="h4_service-prev"><i class="fa-light fa-angle-left"></i>
                            </div>
                            <div class="h4_service-next"><i class="fa-light fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper h4_service-active ">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="h4_service-item mb-30 tp_fade_left">
                                <span class="h4_service-item-number">01</span>
                                <div class="h4_service-item-icon">
                                    <img src="{{ asset('assets/images/service/home4/1.png') }}" alt="">
                                </div>
                                <h5 class="h4_service-item-title"><a href="{{ url('service-details') }}">AI Powered Results</a></h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <a href="{{ url('service-details') }}" class="h4_service-item-btn">Learn More<i class="fa-light fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="h4_service-item mb-30 tp_fade_left">
                                <span class="h4_service-item-number">02</span>
                                <div class="h4_service-item-icon">
                                    <img src="{{ asset('assets/images/service/home4/2.png') }}" alt="">
                                </div>
                                <h5 class="h4_service-item-title"><a href="{{ url('service-details') }}">Payment Gateways</a></h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <a href="{{ url('service-details') }}" class="h4_service-item-btn">Learn More<i class="fa-light fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="h4_service-item mb-30 tp_fade_left">
                                <span class="h4_service-item-number">03</span>
                                <div class="h4_service-item-icon">
                                    <img src="{{ asset('assets/images/service/home4/3.png') }}" alt="">
                                </div>
                                <h5 class="h4_service-item-title"><a href="{{ url('service-details') }}">Multi Lingual</a></h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <a href="{{ url('service-details') }}" class="h4_service-item-btn">Learn More<i class="fa-light fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="h4_service-item mb-30 tp_fade_left">
                                <span class="h4_service-item-number">04</span>
                                <div class="h4_service-item-icon">
                                    <img src="{{ asset('assets/images/service/home4/4.png') }}" alt="">
                                </div>
                                <h5 class="h4_service-item-title"><a href="{{ url('service-details') }}">Support Platform</a></h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
                                <a href="{{ url('service-details') }}" class="h4_service-item-btn">Learn More<i class="fa-light fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- service area end -->

        <!-- assistant area start -->
        <section class="h4_assistant-area">
            <div class="container">
                <div class="row g-0">
                    <div class="col-xl-6">
                        <div class="h4_assistant-wrap">
                            <ul class="nav nav-tabs h4_assistant-top" id="myTab" role="tablist">
                                <li class="nav-item tp_has_fade_anim" data-fade-from="bottom" role="presentation">
                                    <a href="#" class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" role="tab" aria-controls="home-tab-pane" aria-selected="true">01. Text Editor</a>
                                </li>
                                <li class="nav-item tp_has_fade_anim" data-fade-from="bottom" data-delay=".8" role="presentation">
                                    <a href="#" class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" role="tab" aria-controls="profile-tab-pane" aria-selected="false">02. TRACK ANALYTICS</a>
                                </li>
                                <li class="nav-item tp_has_fade_anim" data-fade-from="bottom" data-delay="1.1" role="presentation">
                                    <a href="#" class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" role="tab" aria-controls="contact-tab-pane" aria-selected="false">03. LANGUAGES</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                    <div class="h4_assistant-content">
                                        <h3 class="h4_assistant-content-title tp_has_text_reveal_anim">DataPulse Tracking Analytics
                                            For Informed Decisions.</h3>
                                        <p class="tp_fade_bottom">Duis fermentum molestee bandit Phaseolus ut  qualm egret protium Quique in qualm eu sem molestee uptraces Sed vitae Purus denim. Nunc getas locus meatus ramet sem.</p>
                                        <a href="#" class="tp_fade_bottom"><img src="{{ asset('assets/images/assistant/home4/search.png') }}" alt="">Get Started<i class="fa-light fa-angle-right"></i></a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                    <div class="h4_assistant-content">
                                        <h3 class="h4_assistant-content-title tp_has_text_reveal_anim">DataPulse Tracking Analytics
                                            For Informed Decisions.</h3>
                                        <p class="tp_fade_bottom">Duis fermentum molestee bandit Phaseolus ut  qualm egret protium Quique in qualm eu sem molestee uptraces Sed vitae Purus denim. Nunc getas locus meatus ramet sem.</p>
                                        <a href="#" class="tp_fade_bottom"><img src="{{ asset('assets/images/assistant/home4/search.png') }}" alt="">Get Started<i class="fa-light fa-angle-right"></i></a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                                    <div class="h4_assistant-content">
                                        <h3 class="h4_assistant-content-title tp_has_text_reveal_anim">DataPulse Tracking Analytics
                                            For Informed Decisions.</h3>
                                        <p class="tp_fade_bottom">Duis fermentum molestee bandit Phaseolus ut  qualm egret protium Quique in qualm eu sem molestee uptraces Sed vitae Purus denim. Nunc getas locus meatus ramet sem.</p>
                                        <a href="#" class="tp_fade_bottom"><img src="{{ asset('assets/images/assistant/home4/search.png') }}" alt="">Get Started<i class="fa-light fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="h4_assistant-img bg-default" data-background="assets/images/assistant/home4/bg.png">
                            <img src="{{ asset('assets/images/assistant/home4/1.png') }}" alt="" class="tp_fade_left">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- assistant area end -->

        <!-- feature area start -->
        <section class="h4_feature-area pt-130 pb-110">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-5 col-xl-6 col-lg-6 col-md-8">
                        <div class="h4_section-area text-center mb-50">
                            <h2 class="h4_section-title tp_title_slideup mb-0">What Can You Dream
                                Up With Doodle?</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-md-6 tp_has_fade_anim" data-fade-from="left">
                        <div class="h4_feature-item mb-30">
                            <div class="h4_feature-item-img">
                                <img src="{{ asset('assets/images/feature/home4/1.png') }}" alt="">
                            </div>
                            <div class="h4_feature-item-content">
                                <h4 class="h4_feature-item-content-title"><a href="#">Blog Posts</a></h4>
                                <p>Quique tempus solarize rises kaibun ululate
                                    portico est rhonchus cogue nib.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 tp_has_fade_anim" data-fade-from="left" data-delay=".4">
                        <div class="h4_feature-item mb-30">
                            <div class="h4_feature-item-img">
                                <img src="{{ asset('assets/images/feature/home4/2.png') }}" alt="">
                            </div>
                            <div class="h4_feature-item-content">
                                <h4 class="h4_feature-item-content-title"><a href="#">SEO Articles</a></h4>
                                <p>Quique tempus solarize rises kaibun ululate
                                    portico est rhonchus cogue nib.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 tp_has_fade_anim" data-fade-from="left" data-delay=".6">
                        <div class="h4_feature-item mb-30">
                            <div class="h4_feature-item-img">
                                <img src="{{ asset('assets/images/feature/home4/3.png') }}" alt="">
                            </div>
                            <div class="h4_feature-item-content">
                                <h4 class="h4_feature-item-content-title"><a href="#">News Articles</a></h4>
                                <p>Quique tempus solarize rises kaibun ululate
                                    portico est rhonchus cogue nib.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 tp_has_fade_anim" data-fade-from="left" data-delay=".8">
                        <div class="h4_feature-item mb-30">
                            <div class="h4_feature-item-img">
                                <img src="{{ asset('assets/images/feature/home4/4.png') }}" alt="">
                            </div>
                            <div class="h4_feature-item-content">
                                <h4 class="h4_feature-item-content-title"><a href="#">College Essays</a></h4>
                                <p>Quique tempus solarize rises kaibun ululate
                                    portico est rhonchus cogue nib.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 tp_has_fade_anim" data-fade-from="left" data-delay="1">
                        <div class="h4_feature-item mb-30">
                            <div class="h4_feature-item-img">
                                <img src="{{ asset('assets/images/feature/home4/5.png') }}" alt="">
                            </div>
                            <div class="h4_feature-item-content">
                                <h4 class="h4_feature-item-content-title"><a href="#">Press Releases</a></h4>
                                <p>Quique tempus solarize rises kaibun ululate
                                    portico est rhonchus cogue nib.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 tp_has_fade_anim" data-fade-from="left" data-delay="1.2">
                        <div class="h4_feature-item mb-30">
                            <div class="h4_feature-item-img">
                                <img src="{{ asset('assets/images/feature/home4/1.png') }}" alt="">
                            </div>
                            <div class="h4_feature-item-content">
                                <h4 class="h4_feature-item-content-title"><a href="#">Payment Gateways</a></h4>
                                <p>Quique tempus solarize rises kaibun ululate
                                    portico est rhonchus cogue nib.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- feature area end -->

        <!-- testimonial area start -->
        <section class="h4_testimonial-area pb-80 pt-110 bg-default" data-background="assets/images/testimonial/home4_bg.jpg">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-xxl-6 col-xl-7 col-lg-7 col-md-8">
                        <div class="h4_section-area mb-20">
                            <h2 class="h4_section-title tp_title_slideup mb-0">Dependable Feedback<img src="{{ asset('assets/images/testimonial/author.png') }}" alt="">From Clients.</h2>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-5 col-lg-5 col-md-4">
                        <div class="h4_testimonial-top mb-30 tp_fade_left">
                            <div class="h4_testimonial-top-icon">
                                <img src="{{ asset('assets/images/testimonial/google.png') }}" alt="">
                            </div>
                            <div class="h4_testimonial-top-rating">
                                <ul>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                </ul>
                                <p>4.8 Rating on Google</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container custom-container-2">
                <div class="h4_testimonial-active swiper pb-40 pt-30 tp_fade_bottom">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="h4_testimonial-item">
                                <div class="h4_testimonial-item-top">
                                    <ul class="h4_testimonial-rating">
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                    </ul>
                                    <div class="h4_testimonial-icon">
                                        <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.49014 10.9091C2.041 10.3704 2.55055 9.72391 3.01878 8.9697C3.45947 8.21549 3.74867 7.46128 3.88638 6.70707C2.86729 6.70707 2.02723 6.42424 1.3662 5.85859C0.67762 5.29293 0.333332 4.49832 0.333332 3.47475C0.333332 2.47811 0.650078 1.6431 1.28357 0.969695C1.88951 0.323231 2.68826 0 3.67981 0C4.67136 0 5.48388 0.336699 6.11737 1.0101C6.72332 1.71044 7.02629 2.55892 7.02629 3.55555C7.02629 5.22559 6.61314 6.82828 5.78685 8.36364C4.96056 9.92593 3.91393 11.138 2.64695 12L1.49014 10.9091ZM9.46385 10.9091C10.0147 10.3704 10.5243 9.72391 10.9925 8.9697C11.4332 8.21549 11.7224 7.46128 11.8601 6.70707C10.841 6.70707 10.0009 6.42424 9.33991 5.85859C8.65133 5.29293 8.30704 4.49832 8.30704 3.47475C8.30704 2.47811 8.62379 1.6431 9.25728 0.969695C9.86322 0.323231 10.662 0 11.6535 0C12.6451 0 13.4576 0.336699 14.0911 1.0101C14.697 1.71044 15 2.55892 15 3.55555C15 5.22559 14.5869 6.82828 13.7606 8.36364C12.9343 9.92593 11.8876 11.138 10.6207 12L9.46385 10.9091Z" fill="currentColor" fill-opacity="1"/>
                                        </svg>
                                    </div>
                                    <p>Maecenas eget ullamcorper dolor placerat ipsum. Aliquam dictum massa eu libero vehicula, id dapibus ligula vulputate. Donec arcu elit, pulvinar quis orci ut, tincidunt justo consectetur .</p>
                                </div>
                                <div class="h4_testimonial-head">
                                    <div class="h4_testimonial-head-img">
                                        <img src="{{ asset('assets/images/testimonial/1.png') }}" alt="Image Not Found">
                                    </div>
                                    <div class="h4_testimonial-head-info">
                                        <h6>Hanson Deck</h6>
                                        <span>Blogger</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="h4_testimonial-item">
                                <div class="h4_testimonial-item-top">
                                    <ul class="h4_testimonial-rating">
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                    </ul>
                                    <div class="h4_testimonial-icon">
                                        <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.49014 10.9091C2.041 10.3704 2.55055 9.72391 3.01878 8.9697C3.45947 8.21549 3.74867 7.46128 3.88638 6.70707C2.86729 6.70707 2.02723 6.42424 1.3662 5.85859C0.67762 5.29293 0.333332 4.49832 0.333332 3.47475C0.333332 2.47811 0.650078 1.6431 1.28357 0.969695C1.88951 0.323231 2.68826 0 3.67981 0C4.67136 0 5.48388 0.336699 6.11737 1.0101C6.72332 1.71044 7.02629 2.55892 7.02629 3.55555C7.02629 5.22559 6.61314 6.82828 5.78685 8.36364C4.96056 9.92593 3.91393 11.138 2.64695 12L1.49014 10.9091ZM9.46385 10.9091C10.0147 10.3704 10.5243 9.72391 10.9925 8.9697C11.4332 8.21549 11.7224 7.46128 11.8601 6.70707C10.841 6.70707 10.0009 6.42424 9.33991 5.85859C8.65133 5.29293 8.30704 4.49832 8.30704 3.47475C8.30704 2.47811 8.62379 1.6431 9.25728 0.969695C9.86322 0.323231 10.662 0 11.6535 0C12.6451 0 13.4576 0.336699 14.0911 1.0101C14.697 1.71044 15 2.55892 15 3.55555C15 5.22559 14.5869 6.82828 13.7606 8.36364C12.9343 9.92593 11.8876 11.138 10.6207 12L9.46385 10.9091Z" fill="currentColor" fill-opacity="1"/>
                                        </svg>
                                    </div>
                                    <p>Maecenas eget ullamcorper dolor placerat ipsum. Aliquam dictum massa eu libero vehicula, id dapibus ligula vulputate. Donec arcu elit, pulvinar quis orci ut, tincidunt justo consectetur .</p>
                                </div>
                                <div class="h4_testimonial-head">
                                    <div class="h4_testimonial-head-img">
                                        <img src="{{ asset('assets/images/testimonial/2.png') }}" alt="Image Not Found">
                                    </div>
                                    <div class="h4_testimonial-head-info">
                                        <h6>Nigel Nigel</h6>
                                        <span>President of Sales</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="h4_testimonial-item">
                                <div class="h4_testimonial-item-top">
                                    <ul class="h4_testimonial-rating">
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                    </ul>
                                    <div class="h4_testimonial-icon">
                                        <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.49014 10.9091C2.041 10.3704 2.55055 9.72391 3.01878 8.9697C3.45947 8.21549 3.74867 7.46128 3.88638 6.70707C2.86729 6.70707 2.02723 6.42424 1.3662 5.85859C0.67762 5.29293 0.333332 4.49832 0.333332 3.47475C0.333332 2.47811 0.650078 1.6431 1.28357 0.969695C1.88951 0.323231 2.68826 0 3.67981 0C4.67136 0 5.48388 0.336699 6.11737 1.0101C6.72332 1.71044 7.02629 2.55892 7.02629 3.55555C7.02629 5.22559 6.61314 6.82828 5.78685 8.36364C4.96056 9.92593 3.91393 11.138 2.64695 12L1.49014 10.9091ZM9.46385 10.9091C10.0147 10.3704 10.5243 9.72391 10.9925 8.9697C11.4332 8.21549 11.7224 7.46128 11.8601 6.70707C10.841 6.70707 10.0009 6.42424 9.33991 5.85859C8.65133 5.29293 8.30704 4.49832 8.30704 3.47475C8.30704 2.47811 8.62379 1.6431 9.25728 0.969695C9.86322 0.323231 10.662 0 11.6535 0C12.6451 0 13.4576 0.336699 14.0911 1.0101C14.697 1.71044 15 2.55892 15 3.55555C15 5.22559 14.5869 6.82828 13.7606 8.36364C12.9343 9.92593 11.8876 11.138 10.6207 12L9.46385 10.9091Z" fill="currentColor" fill-opacity="1"/>
                                        </svg>
                                    </div>
                                    <p>Maecenas eget ullamcorper dolor placerat ipsum. Aliquam dictum massa eu libero vehicula, id dapibus ligula vulputate. Donec arcu elit, pulvinar quis orci ut, tincidunt justo consectetur .</p>
                                </div>
                                <div class="h4_testimonial-head">
                                    <div class="h4_testimonial-head-img">
                                        <img src="{{ asset('assets/images/testimonial/3.png') }}" alt="Image Not Found">
                                    </div>
                                    <div class="h4_testimonial-head-info">
                                        <h6>Max Conversion</h6>
                                        <span>SEO Contain Writer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="h4_testimonial-item">
                                <div class="h4_testimonial-item-top">
                                    <ul class="h4_testimonial-rating">
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                    </ul>
                                    <div class="h4_testimonial-icon">
                                        <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.49014 10.9091C2.041 10.3704 2.55055 9.72391 3.01878 8.9697C3.45947 8.21549 3.74867 7.46128 3.88638 6.70707C2.86729 6.70707 2.02723 6.42424 1.3662 5.85859C0.67762 5.29293 0.333332 4.49832 0.333332 3.47475C0.333332 2.47811 0.650078 1.6431 1.28357 0.969695C1.88951 0.323231 2.68826 0 3.67981 0C4.67136 0 5.48388 0.336699 6.11737 1.0101C6.72332 1.71044 7.02629 2.55892 7.02629 3.55555C7.02629 5.22559 6.61314 6.82828 5.78685 8.36364C4.96056 9.92593 3.91393 11.138 2.64695 12L1.49014 10.9091ZM9.46385 10.9091C10.0147 10.3704 10.5243 9.72391 10.9925 8.9697C11.4332 8.21549 11.7224 7.46128 11.8601 6.70707C10.841 6.70707 10.0009 6.42424 9.33991 5.85859C8.65133 5.29293 8.30704 4.49832 8.30704 3.47475C8.30704 2.47811 8.62379 1.6431 9.25728 0.969695C9.86322 0.323231 10.662 0 11.6535 0C12.6451 0 13.4576 0.336699 14.0911 1.0101C14.697 1.71044 15 2.55892 15 3.55555C15 5.22559 14.5869 6.82828 13.7606 8.36364C12.9343 9.92593 11.8876 11.138 10.6207 12L9.46385 10.9091Z" fill="currentColor" fill-opacity="1"/>
                                        </svg>
                                    </div>
                                    <p>Maecenas eget ullamcorper dolor placerat ipsum. Aliquam dictum massa eu libero vehicula, id dapibus ligula vulputate. Donec arcu elit, pulvinar quis orci ut, tincidunt justo consectetur .</p>
                                </div>
                                <div class="h4_testimonial-head">
                                    <div class="h4_testimonial-head-img">
                                        <img src="{{ asset('assets/images/testimonial/4.png') }}" alt="Image Not Found">
                                    </div>
                                    <div class="h4_testimonial-head-info">
                                        <h6>Nathaneal Down</h6>
                                        <span>Blogger</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="h4_testimonial-item">
                                <div class="h4_testimonial-item-top">
                                    <ul class="h4_testimonial-rating">
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                    </ul>
                                    <div class="h4_testimonial-icon">
                                        <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.49014 10.9091C2.041 10.3704 2.55055 9.72391 3.01878 8.9697C3.45947 8.21549 3.74867 7.46128 3.88638 6.70707C2.86729 6.70707 2.02723 6.42424 1.3662 5.85859C0.67762 5.29293 0.333332 4.49832 0.333332 3.47475C0.333332 2.47811 0.650078 1.6431 1.28357 0.969695C1.88951 0.323231 2.68826 0 3.67981 0C4.67136 0 5.48388 0.336699 6.11737 1.0101C6.72332 1.71044 7.02629 2.55892 7.02629 3.55555C7.02629 5.22559 6.61314 6.82828 5.78685 8.36364C4.96056 9.92593 3.91393 11.138 2.64695 12L1.49014 10.9091ZM9.46385 10.9091C10.0147 10.3704 10.5243 9.72391 10.9925 8.9697C11.4332 8.21549 11.7224 7.46128 11.8601 6.70707C10.841 6.70707 10.0009 6.42424 9.33991 5.85859C8.65133 5.29293 8.30704 4.49832 8.30704 3.47475C8.30704 2.47811 8.62379 1.6431 9.25728 0.969695C9.86322 0.323231 10.662 0 11.6535 0C12.6451 0 13.4576 0.336699 14.0911 1.0101C14.697 1.71044 15 2.55892 15 3.55555C15 5.22559 14.5869 6.82828 13.7606 8.36364C12.9343 9.92593 11.8876 11.138 10.6207 12L9.46385 10.9091Z" fill="currentColor" fill-opacity="1"/>
                                        </svg>
                                    </div>
                                    <p>Maecenas eget ullamcorper dolor placerat ipsum. Aliquam dictum massa eu libero vehicula, id dapibus ligula vulputate. Donec arcu elit, pulvinar quis orci ut, tincidunt justo consectetur .</p>
                                </div>
                                <div class="h4_testimonial-head">
                                    <div class="h4_testimonial-head-img">
                                        <img src="{{ asset('assets/images/testimonial/5.png') }}" alt="Image Not Found">
                                    </div>
                                    <div class="h4_testimonial-head-info">
                                        <h6>Russell Sprout</h6>
                                        <span>Blog Writer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h4_testimonial-pagination pt-65 text-center"></div>
                </div>
            </div>
        </section>
        <!-- testimonial area end -->

        <!-- price area start -->
        <section class="price-area price-tab pt-140 pb-140">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-7 col-xl-8 col-lg-8 col-md-10">
                        <div class="h4_section-area text-center mb-50">
                            <h2 class="h4_section-title tp_title_slideup mb-0 ">Personalized Pricing Plans
                                Suited to You.</h2>
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
                        <div class="col-xl-3 col-lg-6 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.3">
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
                        <div class="col-xl-3 col-lg-6 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.3">
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

        <!-- brand area start -->
        <section class="h3_brand-area h4_brand-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-6 col-xl-7 col-lg-7 col-md-9">
                        <div class="h4_section-area text-center mb-45">
                            <h2 class="h4_section-title tp_title_slideup mb-0">Trusted by 20,000+
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

        <!-- faq area start -->
        <section class="h4_faq-area pt-130">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-5">
                        <div class="h4_section-area mb-45 text-center text-lg-start">
                            <h2 class="h4_section-title tp_title_slideup mb-0">Frequently
                                asked questions.</h2>
                        </div>
                        <div class="h4_faq-img mb-30 text-center text-lg-start tp_fade_right">
                            <img src="{{ asset('assets/images/faq/home4_faq.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 tp_fade_left">
                        <div class="h4_faq-wrap">
                            <div class="h4_faq-content">
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
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">What Languages Does It Supports?
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
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">How are AI writers impacting the writing industry?
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
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Does Doodle To Write Long Articles?
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#Expp">
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

        <!-- country area start -->
        <section class="h4_country-area pt-100 pb-140">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="h4_section-area text-center mb-50">
                            <h2 class="h4_section-title tp_title_slideup mb-0">Esteemed by Users in <br>
                                63+ Countries.</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-11">
                        <div class="h4_country-map w_img tp_fade_bottom">
                            <img src="{{ asset('assets/images/country/countries.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- country area end -->
    </main>
@endsection

@section('footer')
    <footer class="h4_footer-area">
        <div class="h4_footer-top pt-120 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6 tp_has_fade_anim" data-fade-from="left" data-delay=".8">
                        <div class="h4_footer-widget mb-40">
                            <div class="h4_footer-logo">
                                <a href="{{ url('index') }}"><img src="{{ asset('assets/images/logo/logo.png') }}" alt=""></a>
                            </div>
                            <p class="h4_footer-widget-text">Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                            <div class="h4_footer-widget-social">
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 tp_has_fade_anim" data-fade-from="left" data-delay="1.1">
                        <div class="h4_footer-widget mb-35">
                            <h5 class="h4_footer-widget-title">Utility Pages</h5>
                            <ul>
                                <li><a href="#">Style Guide</a></li>
                                <li><a href="#">Protected Password</a></li>
                                <li><a href="#">404 Not Found</a></li>
                                <li><a href="#">Changelog</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 tp_has_fade_anim" data-fade-from="left" data-delay="1.3">
                        <div class="h4_footer-widget mb-35">
                            <h5 class="h4_footer-widget-title">Company</h5>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Community</a></li>
                                <li><a href="#">Career’s</a></li>
                                <li><a href="#">Affiliate Program</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-5 col-sm-6 tp_has_fade_anim" data-fade-from="left" data-delay="1.5">
                        <div class="h4_footer-widget mb-35">
                            <h5 class="h4_footer-widget-title">Use Cases</h5>
                            <ul>
                                <li><a href="#">For Teams</a></li>
                                <li><a href="#">For Email Marketers</a></li>
                                <li><a href="#">For Blog Writers</a></li>
                                <li><a href="#">For Social Managers</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6 tp_has_fade_anim" data-fade-from="left" data-delay="1.7">
                        <div class="h4_footer-widget mb-35">
                            <h5 class="h4_footer-widget-title">Contact Info</h5>
                            <div class="h4_footer-widget-address">
                                <p>235 Bowery, New York, NY 40882, United States</p>
                                <a href="mailto:example@gmail.com">
                                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 5C1 2.2 2.6 1 5 1H13C15.4 1 17 2.2 17 5V10.6C17 13.4 15.4 14.6 13 14.6H5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M13 5.40039L10.496 7.40015C9.672 8.05607 8.32 8.05607 7.496 7.40015L5 5.40039" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M1 11.4004H5.8" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M1 8.19922H3.4" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    example@gmail.com
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="h4_footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-md-6">
                        <div class="h4_footer-bottom-copyright d-flex justify-content-center justify-content-md-start">
                            <p>&copy; 2023 Doodle All Rights Reserved by site</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="h4_footer-bottom-menu d-flex justify-content-center justify-content-md-end">
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
