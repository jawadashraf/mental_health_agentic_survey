@extends('layouts.layout')

<?php
    $title = 'About Us';
    $subTitle = 'Home';
?>

@section('content')

    <!-- about area start -->
    <section class="h2_about-area pt-140 pb-100">
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
                        <div class="inner_section-area mb-40">
                            <span class="inner_section-subtitle tp_subtitle_anim">Who We Are?</span>
                            <h2 class="inner_section-title tp_title_slideup inner_section-title tp_title_slideup-big mb-25">What Makes The Doodle
                                Team Different?</h2>
                            <p class="inner_section-text tp_fade_bottom">Sed Mattis eros lectors, eu fermentum Felis laborites convallis. Nam Felis arco, sed <br> mi Faubus quips. Fusco id dui nil. Sed ac lorem a dolor incident suscept <br> Poetesqueo.</p>
                            <p class="inner_section-text mt-10 tp_fade_bottom">Sed Mattis eros lectors, eu fermentum Felis laborites convallis. Nam Felis arco, sed <br>  mi Faubus quips. Fusco id dui nil.</p>
                        </div>
                        <a href="#" class="theme-btn-2 tp_fade_bottom">Explore Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about area end -->

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
    <section class="inner_feature-area pt-140 pb-140">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div class="inner_feature-content mb-50 mb-md-0">
                        <div class="inner_section-area mb-20">
                            <span class="inner_section-subtitle tp_subtitle_anim">Features</span>
                            <h2 class="inner_section-title tp_title_slideup mb-30">
                                Start Writing Faster with Doodle tool</h2>
                            <p class="inner_section-text tp_fade_bottom">We've done it carefully and simply. Combined with the ingredients makes for beautiful landings.</p>
                        </div>
                        <ul class="inner_feature-content-list tp_fade_bottom">
                            <li>Seamless Integration</li>
                            <li>Smart Automation</li>
                            <li>Top-notch Security</li>
                        </ul>
                        <a href="#" class="theme-btn-2 tp_fade_bottom">Explore More</a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="inner_feature-img tp_fade_left">
                        <img src="{{ asset('assets/images/feature/innerPage/1.png') }}" alt="Image Not Found">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature area end -->

    <!-- faq area start -->
    <section class="h3_faq-area pt-135 pb-110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7">
                    <div class="inner_section-area text-center mb-50">
                        <h2 class="inner_section-title tp_title_slideup mb-0">We answer your questions</h2>
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

    <!-- testimonial area start -->
    <section class="h2_testimonial-area pb-95 pt-135">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="inner_section-area text-center">
                        <span class="inner_section-subtitle tp_subtitle_anim">Testimonials</span>
                        <h2 class="inner_section-title tp_title_slideup mb-0">Trusted by 1000+ companies</h2>
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

    <!-- blog area start -->
    <section class="h2_blog-area pb-140">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="inner_section-area text-center mb-50">
                        <span class="inner_section-subtitle tp_subtitle_anim">Our Blog</span>
                        <h2 class="inner_section-title tp_title_slideup mb-0 inner_section-title tp_title_slideup-big">Our Latest News</h2>
                    </div>
                </div>
            </div>
            <div class="swiper h2_blog-active tp_fade_bottom">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="h2_blog-item">
                            <div class="h2_blog-img mb-35 w_img">
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
                            <div class="h2_blog-img mb-35 w_img">
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
                            <div class="h2_blog-img mb-35 w_img">
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
@endsection
