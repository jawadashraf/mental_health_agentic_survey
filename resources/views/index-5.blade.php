@extends('layouts.layout1')

@section('modal')
    <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <a href="javascript:void(0)" type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
        </a>
        <div class="modal-dialog" role="document">
           <div class="modal-content">
              <form>
                    <input type="text" placeholder="Search here...">
                    <button>
                       <i class="fa fa-search"></i>
                    </button>
              </form>
           </div>
        </div>
    </div>
@endsection

    @section('header')
        <header class="h5_header-area">
            <div class="h5_header-top d-sm-flex align-items-center d-none">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-7">
                            <div class="h5_header-top-text">
                                <p>Create an account to avail a 34% bonus discount at checkout.</p>
                                <a href="#">Learn More<i class="fa-light fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-5 d-none d-lg-block">
                            <div class="h5_header-top-right">
                                <div class="h5_header-top-language">
                                    <select name="select" class="h5_header-top-language-option has-nice-select">
                                        <option value="1">English</option>
                                        <option value="2">Bangla</option>
                                        <option value="3">Arabic</option>
                                        <option value="4">Urdu</option>
                                    </select>
                                </div>
                                <div class="h5_header-top-currency">
                                    <select name="select" class="h5_header-top-currency-option has-nice-select">
                                        <option value="1">$USD</option>
                                        <option value="2">৳Taka</option>
                                        <option value="3">€Euro</option>
                                    </select>
                                </div>
                                <div class="h5_header-top-account">
                                    <a href="#">
                                        <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.0127 8C8.94569 8 10.5127 6.433 10.5127 4.5C10.5127 2.567 8.94569 1 7.0127 1C5.0797 1 3.5127 2.567 3.5127 4.5C3.5127 6.433 5.0797 8 7.0127 8Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M13.026 15C13.026 12.291 10.331 10.1 7.013 10.1C3.695 10.1 1 12.291 1 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        My Account
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="h5_header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-xl-2 col-lg-2 col-4">
                            <div class="h5_header-logo">
                                <a href="{{ url('index') }}"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="Image Not Found"></a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 d-none d-lg-block text-center">
                            <div class="h5_header-menu ">
                                <nav class="h5_header-nav-menu" id="mobile-menu">
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
                        <div class="col-xl-3 col-lg-4 col-8">
                            <div class="h5_header-action-wrap d-flex align-items-center justify-content-end">
                                <div class="h5_header-action d-none d-sm-flex">
                                    <div class="h5_header-action-inner">
                                        <a class="h5_header-action-search" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#search-modal"><i class="fa-light fa-search"></i></a>
                                        <a href="{{ url('cart') }}" class="h5_header-action-cart"><i class="fa-light fa-shopping-bag"></i><span>12</span></a>
                                    </div>
                                    <a href="#" class="h5_header-action-btn">
                                        Get Started<i class="fa-light fa-angle-right"></i>
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
        <section class="h5_banner-area">
            <div class="container custom-container-1">
                <div class="row justify-content-center">
                    <div class="col-xl-9">
                        <div class="h5_banner-single">
                            <div class="h5_banner-content">
                                <h1 class="h5_banner-content-title tp_has_fade_anim">Unleash Your Creativity with Stunning Visuals</h1>
                                <p class="tp_desc_anim">Quisque tempus scelerisque risus faucibus varius. In id vulputate sem. Integer porttitor est <br> rhoncus congue nibh et accumsan lobortis.</p>
                                <div class="row justify-content-center">
                                    <div class="col-xl-9 col-lg-10">
                                        <div class="h5_banner-bottom tp_fade_bottom">
                                            <div class="h5_banner-form mb-30">
                                                <form action="#">
                                                    <input type="text" placeholder="Start with a detailed description">
                                                    <button type="submit">Search</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="h5_banner-bottom tp_fade_bottom d-flex justify-content-center">
                                            <div class="h5_banner-tag">
                                                <span>Trending:</span>
                                                <ul>
                                                    <li><a href="#">Digital Art</a></li>
                                                    <li><a href="#">Creative</a></li>
                                                    <li><a href="#">Business</a></li>
                                                    <li><a href="#">Animation</a></li>
                                                    <li><a href="#">Design</a></li>
                                                    <li><a href="#">Modern AI</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="h5_banner-shape d-none d-md-block">
                <div class="h5_banner-shape-1" data-speed="0.8">
                    <img src="{{ asset('assets/images/banner/home5/1.png') }}" alt="">
                    <p>Research assistant</p>
                </div>
                <div class="h5_banner-shape-2" data-speed="0.7">
                    <img src="{{ asset('assets/images/banner/home5/2.png') }}" alt="">
                    <p>AI Chat</p>
                </div>
                <div class="h5_banner-shape-3" data-speed="0.8">
                    <img src="{{ asset('assets/images/banner/home5/3.png') }}" alt="">
                    <p>Text Citations</p>
                </div>
                <div class="h5_banner-shape-4" data-speed="0.7">
                    <img src="{{ asset('assets/images/banner/home5/4.png') }}" alt="">
                    <p>MLA & APA</p>
                </div>
            </div>
        </section>
        <!-- banner area end -->

        <!-- work area start -->
        <section class="h5_work-area pt-130 pb-130">
            <div class="container">
                <div class="row mb-30 align-items-end">
                    <div class="col-xl-6 col-lg-7 col-md-8 col-sm-9">
                        <div class="section-area mb-20">
                            <h2 class="section-title tp_title_slideup mb-0">Find The Right Photo For Your Projects</h2>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5 col-md-4 col-sm-3">
                        <div class="h5_work-navigation mb-30 tp_fade_left">
                            <div class="h5_work-prev"><i class="fa-light fa-angle-left"></i>
                            </div>
                            <div class="h5_work-next"><i class="fa-light fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper h5_work-active tp_fade_bottom">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="h5_work-item">
                                <img src="{{ asset('assets/images/work/home5/1.png') }}" alt="">
                                <a href="#">Digital Art</a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="h5_work-item">
                                <img src="{{ asset('assets/images/work/home5/2.png') }}" alt="">
                                <a href="#">Creative</a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="h5_work-item">
                                <img src="{{ asset('assets/images/work/home5/3.png') }}" alt="">
                                <a href="#">Business</a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="h5_work-item">
                                <img src="{{ asset('assets/images/work/home5/4.png') }}" alt="">
                                <a href="#">Animation</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- work area end -->

        <!-- shop area start -->
        <section class="h5_shop-area pb-130">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-7 col-md-10">
                        <div class="section-area text-center mb-50">
                            <h2 class="section-title tp_title_slideup mb-0">Popular Stylish Images</h2>
                        </div>
                    </div>
                </div>
                <div class="swiper h5_shop-active">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="h5_shop-wrap">
                                <div class="row">
                                    <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_bottom">
                                        <div class="h5_shop-item mb-30">
                                            <div class="h5_shop-img">
                                                <img src="{{ asset('assets/images/gallery/1.png') }}" alt="">
                                                <div class="h5_shop-premium-icon">
                                                    <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                                        <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                                    </svg>
                                                </div>
                                                <div class="h5_shop-img-icon">
                                                    <a href="#"><i class="fa-light fa-eye"></i></a>
                                                    <a href="#"><i class="fa-light fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="h5_shop-content">
                                                <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                                                <div class="h5_shop-content-bottom">
                                                    <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                                    <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_bottom">
                                        <div class="h5_shop-item mb-30">
                                            <div class="h5_shop-img">
                                                <img src="{{ asset('assets/images/gallery/2.png') }}" alt="">
                                                <div class="h5_shop-premium-icon">
                                                    <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                                        <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                                    </svg>
                                                </div>
                                                <div class="h5_shop-img-icon">
                                                    <a href="#"><i class="fa-light fa-eye"></i></a>
                                                    <a href="#"><i class="fa-light fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="h5_shop-content">
                                                <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                                                <div class="h5_shop-content-bottom">
                                                    <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                                    <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_bottom">
                                        <div class="h5_shop-item mb-30">
                                            <div class="h5_shop-img">
                                                <img src="{{ asset('assets/images/gallery/3.png') }}" alt="">
                                                <div class="h5_shop-premium-icon">
                                                    <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                                        <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                                    </svg>
                                                </div>
                                                <div class="h5_shop-img-icon">
                                                    <a href="#"><i class="fa-light fa-eye"></i></a>
                                                    <a href="#"><i class="fa-light fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="h5_shop-content">
                                                <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                                                <div class="h5_shop-content-bottom">
                                                    <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                                    <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_bottom">
                                        <div class="h5_shop-item mb-30">
                                            <div class="h5_shop-img">
                                                <img src="{{ asset('assets/images/gallery/4.png') }}" alt="">
                                                <div class="h5_shop-premium-icon">
                                                    <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                                        <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                                    </svg>
                                                </div>
                                                <div class="h5_shop-img-icon">
                                                    <a href="#"><i class="fa-light fa-eye"></i></a>
                                                    <a href="#"><i class="fa-light fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="h5_shop-content">
                                                <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                                                <div class="h5_shop-content-bottom">
                                                    <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                                    <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_bottom">
                                        <div class="h5_shop-item mb-30">
                                            <div class="h5_shop-img">
                                                <img src="{{ asset('assets/images/gallery/5.png') }}" alt="">
                                                <div class="h5_shop-premium-icon">
                                                    <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                                        <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                                    </svg>
                                                </div>
                                                <div class="h5_shop-img-icon">
                                                    <a href="#"><i class="fa-light fa-eye"></i></a>
                                                    <a href="#"><i class="fa-light fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="h5_shop-content">
                                                <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                                                <div class="h5_shop-content-bottom">
                                                    <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                                    <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_bottom">
                                        <div class="h5_shop-item mb-30">
                                            <div class="h5_shop-img">
                                                <img src="{{ asset('assets/images/gallery/6.png') }}" alt="">
                                                <div class="h5_shop-premium-icon">
                                                    <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                                        <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                                    </svg>
                                                </div>
                                                <div class="h5_shop-img-icon">
                                                    <a href="#"><i class="fa-light fa-eye"></i></a>
                                                    <a href="#"><i class="fa-light fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="h5_shop-content">
                                                <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                                                <div class="h5_shop-content-bottom">
                                                    <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                                    <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_bottom">
                                        <div class="h5_shop-item mb-30">
                                            <div class="h5_shop-img">
                                                <img src="{{ asset('assets/images/gallery/7.png') }}" alt="">
                                                <div class="h5_shop-premium-icon">
                                                    <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                                        <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                                    </svg>
                                                </div>
                                                <div class="h5_shop-img-icon">
                                                    <a href="#"><i class="fa-light fa-eye"></i></a>
                                                    <a href="#"><i class="fa-light fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="h5_shop-content">
                                                <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                                                <div class="h5_shop-content-bottom">
                                                    <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                                    <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_bottom">
                                        <div class="h5_shop-item mb-30">
                                            <div class="h5_shop-img">
                                                <img src="{{ asset('assets/images/gallery/8.png') }}" alt="">
                                                <div class="h5_shop-premium-icon">
                                                    <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                                        <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                                    </svg>
                                                </div>
                                                <div class="h5_shop-img-icon">
                                                    <a href="#"><i class="fa-light fa-eye"></i></a>
                                                    <a href="#"><i class="fa-light fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="h5_shop-content">
                                                <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                                                <div class="h5_shop-content-bottom">
                                                    <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                                    <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_bottom">
                                        <div class="h5_shop-item mb-30">
                                            <div class="h5_shop-img">
                                                <img src="{{ asset('assets/images/gallery/9.png') }}" alt="">
                                                <div class="h5_shop-premium-icon">
                                                    <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                                        <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                                    </svg>
                                                </div>
                                                <div class="h5_shop-img-icon">
                                                    <a href="#"><i class="fa-light fa-eye"></i></a>
                                                    <a href="#"><i class="fa-light fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="h5_shop-content">
                                                <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                                                <div class="h5_shop-content-bottom">
                                                    <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                                    <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_bottom">
                                        <div class="h5_shop-item mb-30">
                                            <div class="h5_shop-img">
                                                <img src="{{ asset('assets/images/gallery/10.png') }}" alt="">
                                                <div class="h5_shop-premium-icon">
                                                    <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                                        <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                                    </svg>
                                                </div>
                                                <div class="h5_shop-img-icon">
                                                    <a href="#"><i class="fa-light fa-eye"></i></a>
                                                    <a href="#"><i class="fa-light fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="h5_shop-content">
                                                <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                                                <div class="h5_shop-content-bottom">
                                                    <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                                    <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_bottom">
                                        <div class="h5_shop-item mb-30">
                                            <div class="h5_shop-img">
                                                <img src="{{ asset('assets/images/gallery/11.png') }}" alt="">
                                                <div class="h5_shop-premium-icon">
                                                    <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                                        <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                                    </svg>
                                                </div>
                                                <div class="h5_shop-img-icon">
                                                    <a href="#"><i class="fa-light fa-eye"></i></a>
                                                    <a href="#"><i class="fa-light fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="h5_shop-content">
                                                <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                                                <div class="h5_shop-content-bottom">
                                                    <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                                    <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_bottom">
                                        <div class="h5_shop-item mb-30">
                                            <div class="h5_shop-img">
                                                <img src="{{ asset('assets/images/gallery/12.png') }}" alt="">
                                                <div class="h5_shop-premium-icon">
                                                    <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                                        <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                                    </svg>
                                                </div>
                                                <div class="h5_shop-img-icon">
                                                    <a href="#"><i class="fa-light fa-eye"></i></a>
                                                    <a href="#"><i class="fa-light fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="h5_shop-content">
                                                <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                                                <div class="h5_shop-content-bottom">
                                                    <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                                    <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="h5_shop-wrap">
                                <div class="row">
                                    <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_bottom">
                                        <div class="h5_shop-item mb-30">
                                            <div class="h5_shop-img">
                                                <img src="{{ asset('assets/images/gallery/1.png') }}" alt="">
                                                <div class="h5_shop-premium-icon">
                                                    <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                                        <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                                    </svg>
                                                </div>
                                                <div class="h5_shop-img-icon">
                                                    <a href="#"><i class="fa-light fa-eye"></i></a>
                                                    <a href="#"><i class="fa-light fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="h5_shop-content">
                                                <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                                                <div class="h5_shop-content-bottom">
                                                    <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                                    <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_bottom">
                                        <div class="h5_shop-item mb-30">
                                            <div class="h5_shop-img">
                                                <img src="{{ asset('assets/images/gallery/2.png') }}" alt="">
                                                <div class="h5_shop-premium-icon">
                                                    <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                                        <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                                    </svg>
                                                </div>
                                                <div class="h5_shop-img-icon">
                                                    <a href="#"><i class="fa-light fa-eye"></i></a>
                                                    <a href="#"><i class="fa-light fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="h5_shop-content">
                                                <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                                                <div class="h5_shop-content-bottom">
                                                    <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                                    <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_bottom">
                                        <div class="h5_shop-item mb-30">
                                            <div class="h5_shop-img">
                                                <img src="{{ asset('assets/images/gallery/3.png') }}" alt="">
                                                <div class="h5_shop-premium-icon">
                                                    <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                                        <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                                    </svg>
                                                </div>
                                                <div class="h5_shop-img-icon">
                                                    <a href="#"><i class="fa-light fa-eye"></i></a>
                                                    <a href="#"><i class="fa-light fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="h5_shop-content">
                                                <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                                                <div class="h5_shop-content-bottom">
                                                    <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                                    <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_bottom">
                                        <div class="h5_shop-item mb-30">
                                            <div class="h5_shop-img">
                                                <img src="{{ asset('assets/images/gallery/4.png') }}" alt="">
                                                <div class="h5_shop-premium-icon">
                                                    <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                                        <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                                    </svg>
                                                </div>
                                                <div class="h5_shop-img-icon">
                                                    <a href="#"><i class="fa-light fa-eye"></i></a>
                                                    <a href="#"><i class="fa-light fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="h5_shop-content">
                                                <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                                                <div class="h5_shop-content-bottom">
                                                    <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                                    <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_bottom">
                                        <div class="h5_shop-item mb-30">
                                            <div class="h5_shop-img">
                                                <img src="{{ asset('assets/images/gallery/5.png') }}" alt="">
                                                <div class="h5_shop-premium-icon">
                                                    <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                                        <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                                    </svg>
                                                </div>
                                                <div class="h5_shop-img-icon">
                                                    <a href="#"><i class="fa-light fa-eye"></i></a>
                                                    <a href="#"><i class="fa-light fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="h5_shop-content">
                                                <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                                                <div class="h5_shop-content-bottom">
                                                    <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                                    <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_bottom">
                                        <div class="h5_shop-item mb-30">
                                            <div class="h5_shop-img">
                                                <img src="{{ asset('assets/images/gallery/6.png') }}" alt="">
                                                <div class="h5_shop-premium-icon">
                                                    <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                                        <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                                    </svg>
                                                </div>
                                                <div class="h5_shop-img-icon">
                                                    <a href="#"><i class="fa-light fa-eye"></i></a>
                                                    <a href="#"><i class="fa-light fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="h5_shop-content">
                                                <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                                                <div class="h5_shop-content-bottom">
                                                    <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                                    <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_bottom">
                                        <div class="h5_shop-item mb-30">
                                            <div class="h5_shop-img">
                                                <img src="{{ asset('assets/images/gallery/7.png') }}" alt="">
                                                <div class="h5_shop-premium-icon">
                                                    <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                                        <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                                    </svg>
                                                </div>
                                                <div class="h5_shop-img-icon">
                                                    <a href="#"><i class="fa-light fa-eye"></i></a>
                                                    <a href="#"><i class="fa-light fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="h5_shop-content">
                                                <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                                                <div class="h5_shop-content-bottom">
                                                    <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                                    <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_bottom">
                                        <div class="h5_shop-item mb-30">
                                            <div class="h5_shop-img">
                                                <img src="{{ asset('assets/images/gallery/8.png') }}" alt="">
                                                <div class="h5_shop-premium-icon">
                                                    <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                                        <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                                    </svg>
                                                </div>
                                                <div class="h5_shop-img-icon">
                                                    <a href="#"><i class="fa-light fa-eye"></i></a>
                                                    <a href="#"><i class="fa-light fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="h5_shop-content">
                                                <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                                                <div class="h5_shop-content-bottom">
                                                    <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                                    <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_bottom">
                                        <div class="h5_shop-item mb-30">
                                            <div class="h5_shop-img">
                                                <img src="{{ asset('assets/images/gallery/9.png') }}" alt="">
                                                <div class="h5_shop-premium-icon">
                                                    <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                                        <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                                    </svg>
                                                </div>
                                                <div class="h5_shop-img-icon">
                                                    <a href="#"><i class="fa-light fa-eye"></i></a>
                                                    <a href="#"><i class="fa-light fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="h5_shop-content">
                                                <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                                                <div class="h5_shop-content-bottom">
                                                    <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                                    <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_bottom">
                                        <div class="h5_shop-item mb-30">
                                            <div class="h5_shop-img">
                                                <img src="{{ asset('assets/images/gallery/10.png') }}" alt="">
                                                <div class="h5_shop-premium-icon">
                                                    <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                                        <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                                    </svg>
                                                </div>
                                                <div class="h5_shop-img-icon">
                                                    <a href="#"><i class="fa-light fa-eye"></i></a>
                                                    <a href="#"><i class="fa-light fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="h5_shop-content">
                                                <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                                                <div class="h5_shop-content-bottom">
                                                    <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                                    <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_bottom">
                                        <div class="h5_shop-item mb-30">
                                            <div class="h5_shop-img">
                                                <img src="{{ asset('assets/images/gallery/11.png') }}" alt="">
                                                <div class="h5_shop-premium-icon">
                                                    <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                                        <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                                    </svg>
                                                </div>
                                                <div class="h5_shop-img-icon">
                                                    <a href="#"><i class="fa-light fa-eye"></i></a>
                                                    <a href="#"><i class="fa-light fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="h5_shop-content">
                                                <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                                                <div class="h5_shop-content-bottom">
                                                    <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                                    <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_bottom">
                                        <div class="h5_shop-item mb-30">
                                            <div class="h5_shop-img">
                                                <img src="{{ asset('assets/images/gallery/12.png') }}" alt="">
                                                <div class="h5_shop-premium-icon">
                                                    <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                                        <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                                    </svg>
                                                </div>
                                                <div class="h5_shop-img-icon">
                                                    <a href="#"><i class="fa-light fa-eye"></i></a>
                                                    <a href="#"><i class="fa-light fa-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="h5_shop-content">
                                                <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                                                <div class="h5_shop-content-bottom">
                                                    <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                                    <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h5_shop-pagination pt-25 text-center"></div>
                </div>
            </div>
        </section>
        <!-- shop area end -->

        <!-- faq area start -->
        <section class="h2_faq-area pb-110">
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

        <!-- instagram area start -->
        <div class="h5_instagram-area">
            <div class="container-fluid pl-30 pr-30">
                <div class="h5_instagram-wrap">
                    <div class="h5_instagram-item tp_fade_bottom " data-fade-from="bottom">
                        <img src="{{ asset('assets/images/instagram/home5/1.jpg') }}" alt="Image Not Found">
                        <div class="h5_instagram-item-content">
                            <a href="#"><svg width="106" height="106" viewBox="0 0 106 106" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M78 3H28C14.1929 3 3 14.1929 3 28V78C3 91.8071 14.1929 103 28 103H78C91.8071 103 103 91.8071 103 78V28C103 14.1929 91.8071 3 78 3Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M73.0005 49.8515C73.6175 54.0127 72.9068 58.2626 70.9693 61.9966C69.0318 65.7306 65.9662 68.7586 62.2086 70.6499C58.451 72.5412 54.1927 73.1995 50.0394 72.5312C45.8861 71.8628 42.0493 69.9019 39.0747 66.9273C36.1001 63.9527 34.1391 60.1159 33.4708 55.9626C32.8025 51.8093 33.4608 47.551 35.3521 43.7934C37.2434 40.0358 40.2714 36.9702 44.0054 35.0327C47.7394 33.0952 51.9893 32.3844 56.1505 33.0015C60.3951 33.6309 64.3247 35.6088 67.359 38.643C70.3932 41.6773 72.3711 45.6069 73.0005 49.8515Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M80.5 25.5H80.55" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg></a>
                        </div>
                    </div>
                    <div class="h5_instagram-item tp_fade_bottom" data-fade-from="bottom" data-delay=".8">
                        <img src="{{ asset('assets/images/instagram/home5/2.jpg') }}" alt="Image Not Found">
                        <div class="h5_instagram-item-content">
                            <a href="#"><svg width="106" height="106" viewBox="0 0 106 106" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M78 3H28C14.1929 3 3 14.1929 3 28V78C3 91.8071 14.1929 103 28 103H78C91.8071 103 103 91.8071 103 78V28C103 14.1929 91.8071 3 78 3Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M73.0005 49.8515C73.6175 54.0127 72.9068 58.2626 70.9693 61.9966C69.0318 65.7306 65.9662 68.7586 62.2086 70.6499C58.451 72.5412 54.1927 73.1995 50.0394 72.5312C45.8861 71.8628 42.0493 69.9019 39.0747 66.9273C36.1001 63.9527 34.1391 60.1159 33.4708 55.9626C32.8025 51.8093 33.4608 47.551 35.3521 43.7934C37.2434 40.0358 40.2714 36.9702 44.0054 35.0327C47.7394 33.0952 51.9893 32.3844 56.1505 33.0015C60.3951 33.6309 64.3247 35.6088 67.359 38.643C70.3932 41.6773 72.3711 45.6069 73.0005 49.8515Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M80.5 25.5H80.55" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg></a>
                        </div>
                    </div>
                    <div class="h5_instagram-item tp_fade_bottom" data-fade-from="bottom" data-delay="1.1">
                        <img src="{{ asset('assets/images/instagram/home5/3.jpg') }}" alt="Image Not Found">
                        <div class="h5_instagram-item-content">
                            <a href="#"><svg width="106" height="106" viewBox="0 0 106 106" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M78 3H28C14.1929 3 3 14.1929 3 28V78C3 91.8071 14.1929 103 28 103H78C91.8071 103 103 91.8071 103 78V28C103 14.1929 91.8071 3 78 3Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M73.0005 49.8515C73.6175 54.0127 72.9068 58.2626 70.9693 61.9966C69.0318 65.7306 65.9662 68.7586 62.2086 70.6499C58.451 72.5412 54.1927 73.1995 50.0394 72.5312C45.8861 71.8628 42.0493 69.9019 39.0747 66.9273C36.1001 63.9527 34.1391 60.1159 33.4708 55.9626C32.8025 51.8093 33.4608 47.551 35.3521 43.7934C37.2434 40.0358 40.2714 36.9702 44.0054 35.0327C47.7394 33.0952 51.9893 32.3844 56.1505 33.0015C60.3951 33.6309 64.3247 35.6088 67.359 38.643C70.3932 41.6773 72.3711 45.6069 73.0005 49.8515Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M80.5 25.5H80.55" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg></a>
                        </div>
                    </div>
                    <div class="h5_instagram-item tp_fade_bottom" data-fade-from="bottom" data-delay="1.3">
                        <img src="{{ asset('assets/images/instagram/home5/4.jpg') }}" alt="Image Not Found">
                        <div class="h5_instagram-item-content">
                            <a href="#"><svg width="106" height="106" viewBox="0 0 106 106" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M78 3H28C14.1929 3 3 14.1929 3 28V78C3 91.8071 14.1929 103 28 103H78C91.8071 103 103 91.8071 103 78V28C103 14.1929 91.8071 3 78 3Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M73.0005 49.8515C73.6175 54.0127 72.9068 58.2626 70.9693 61.9966C69.0318 65.7306 65.9662 68.7586 62.2086 70.6499C58.451 72.5412 54.1927 73.1995 50.0394 72.5312C45.8861 71.8628 42.0493 69.9019 39.0747 66.9273C36.1001 63.9527 34.1391 60.1159 33.4708 55.9626C32.8025 51.8093 33.4608 47.551 35.3521 43.7934C37.2434 40.0358 40.2714 36.9702 44.0054 35.0327C47.7394 33.0952 51.9893 32.3844 56.1505 33.0015C60.3951 33.6309 64.3247 35.6088 67.359 38.643C70.3932 41.6773 72.3711 45.6069 73.0005 49.8515Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M80.5 25.5H80.55" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg></a>
                        </div>
                    </div>
                    <div class="h5_instagram-item tp_fade_bottom" data-fade-from="bottom" data-delay="1.5">
                        <img src="{{ asset('assets/images/instagram/home5/5.jpg') }}" alt="Image Not Found">
                        <div class="h5_instagram-item-content">
                            <a href="#"><svg width="106" height="106" viewBox="0 0 106 106" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M78 3H28C14.1929 3 3 14.1929 3 28V78C3 91.8071 14.1929 103 28 103H78C91.8071 103 103 91.8071 103 78V28C103 14.1929 91.8071 3 78 3Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M73.0005 49.8515C73.6175 54.0127 72.9068 58.2626 70.9693 61.9966C69.0318 65.7306 65.9662 68.7586 62.2086 70.6499C58.451 72.5412 54.1927 73.1995 50.0394 72.5312C45.8861 71.8628 42.0493 69.9019 39.0747 66.9273C36.1001 63.9527 34.1391 60.1159 33.4708 55.9626C32.8025 51.8093 33.4608 47.551 35.3521 43.7934C37.2434 40.0358 40.2714 36.9702 44.0054 35.0327C47.7394 33.0952 51.9893 32.3844 56.1505 33.0015C60.3951 33.6309 64.3247 35.6088 67.359 38.643C70.3932 41.6773 72.3711 45.6069 73.0005 49.8515Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M80.5 25.5H80.55" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- instagram area end -->

        <!-- brand area start -->
        <section class="h5_brand-area pb-140 pt-130">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-area text-center mb-50">
                            <h2 class="section-title tp_title_slideup mb-0">Check Our Best Partners</h2>
                        </div>
                    </div>
                </div>
                <div class="h5_brand-wrap">
                    <div class="h5_brand-item tp_has_fade_anim" data-fade-from="bottom">
                        <img src="{{ asset('assets/images/brand/brand-1.png') }}" alt="Image Not Found">
                    </div>
                    <div class="h5_brand-item tp_has_fade_anim" data-fade-from="bottom" data-delay=".8">
                        <img src="{{ asset('assets/images/brand/brand-2.png') }}" alt="Image Not Found">
                    </div>
                    <div class="h5_brand-item tp_has_fade_anim" data-fade-from="bottom" data-delay="1.1">
                        <img src="{{ asset('assets/images/brand/brand-3.png') }}" alt="Image Not Found">
                    </div>

                    <div class="h5_brand-item tp_has_fade_anim" data-fade-from="bottom" data-delay="1.3">
                        <img src="{{ asset('assets/images/brand/brand-4.png') }}" alt="Image Not Found">
                    </div>
                    <div class="h5_brand-item tp_has_fade_anim" data-fade-from="bottom" data-delay="1.5">
                        <img src="{{ asset('assets/images/brand/brand-5.png') }}" alt="Image Not Found">
                    </div>
                </div>
            </div>
        </section>
        <!-- brand area end -->
    </main>
    @endsection

    @section('footer')
    <footer class="h5_footer-area">
        <div class="h5_footer-top pt-120 pb-80">
            <div class="container">
                    <div class="row justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7 tp_has_fade_anim" data-fade-from="left">
                        <div class="h5_footer-widget mb-40">
                            <div class="h5_footer-logo">
                                <a href="{{ url('index') }}"><img src="{{ asset('assets/images/logo/logo.png') }}" alt=""></a>
                            </div>
                            <p class="h5_footer-widget-text">Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                            <div class="h5_footer-widget-social">
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 tp_has_fade_anim" data-fade-from="left" data-delay=".8">
                        <div class="h5_footer-widget mb-35">
                            <h5 class="h5_footer-widget-title">Company</h5>
                            <ul>
                                <li><a href="{{ url('index') }}">Home</a></li>
                                <li><a href="{{ url('about') }}">About Us</a></li>
                                <li><a href="{{ url('about') }}">Community</a></li>
                                <li><a href="{{ url('about') }}">Affiliate Program</a></li>
                                <li><a href="{{ url('about') }}">Career’s</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 d-flex justify-content-lg-center justify-content-xl-start order-sm-3 order-md-2 tp_has_fade_anim" data-fade-from="left" data-delay="1.1">
                        <div class="h5_footer-widget mb-35">
                            <h5 class="h5_footer-widget-title">Use Cases</h5>
                            <ul>
                                <li><a href="{{ url('team') }}">For Teams</a></li>
                                <li><a href="{{ url('contact') }}">For Social Managers</a></li>
                                <li><a href="{{ url('contact') }}">For Blog Writers</a></li>
                                <li><a href="{{ url('faq') }}">FAQ's</a></li>
                                <li><a href="{{ url('contact') }}">For Email Marketers</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-7 order-sm-2 order-md-3 tp_has_fade_anim" data-fade-from="left" data-delay="1.3">
                        <div class="h5_footer-widget mb-35">
                            <h5 class="h5_footer-widget-title">Contact Info</h5>
                            <form action="#">
                                <input type="email" placeholder="Enter Your Email Address">
                                <button type="submit">Subscribe</button>
                            </form>
                            <p class="h5_footer-widget-text">Subscribe our newsletter for future updates. <br>
                                don’t worry we don’t spam your email address</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="h5_footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-md-6">
                        <div class="h5_footer-bottom-copyright d-flex justify-content-center justify-content-md-start">
                            <p>&copy; 2023 Doodle All Rights Reserved by site</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="h5_footer-bottom-menu d-flex justify-content-center justify-content-md-end">
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

