@extends('layouts.layout')

<?php
    $title = 'Testimonials';
    $subTitle = 'Home';
?>

@section('content')
    <!-- testimonial area start -->
    <section class="h2_testimonial-area pb-110 pt-140">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left">
                    <div class="h2_testimonial-item mb-30">
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
                <div class="col-xl-4 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay=".5">
                    <div class="h2_testimonial-item mb-30">
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
                <div class="col-xl-4 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay=".8">
                    <div class="h2_testimonial-item mb-30">
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
                <div class="col-xl-4 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.1">
                    <div class="h2_testimonial-item mb-30">
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
                <div class="col-xl-4 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.3">
                    <div class="h2_testimonial-item mb-30">
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
                                <img src="{{ asset('assets/images/testimonial/5.png') }}" alt="Image Not Found">
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
                <div class="col-xl-4 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.5">
                    <div class="h2_testimonial-item mb-30">
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
                                <img src="{{ asset('assets/images/testimonial/6.png') }}" alt="Image Not Found">
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
        </div>
    </section>
    <!-- testimonial area end -->

    <!-- faq area start -->
    <section class="h3_faq-area pt-135 pb-110 inner_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7">
                    <div class="inner_section-area mb-50 text-center">
                        <span class="inner_section-subtitle tp_subtitle_anim">Question & Answerer</span>
                        <h2 class="inner_section-title tp_title_slideup mb-0">We answer your questions</h2>
                    </div>
                </div>
            </div>
            <div class="h3_faq-wrap">
                <div class="h3_faq-content">
                    <div class="accordion" id="Expp">
                        <div class="row">
                            <div class="col-xl-6 tp_fade_left" data-fade-from="bottom">
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
                            <div class="col-xl-6 tp_fade_left" data-fade-from="bottom" data-delay=".8">
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

    <!-- brand area start -->
    <section class="h2_brand-area pb-140 pt-135">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-7 col-xl-9 col-lg-9">
                    <div class="inner_section-area text-center mb-50">
                        <span class="inner_section-subtitle tp_subtitle_anim">Our Client</span>
                        <h2 class="inner_section-title tp_title_slideup mb-0">15,000+ Professionals & Teams Choose Doodle</h2>
                    </div>
                </div>
            </div>
            <div class="h2_brand-wrap tp_fade_bottom">
                <div class="h2_brand-item">
                    <img src="{{ asset('assets/images/brand/1.png') }}" alt="Image Not Found">
                </div>
                <div class="h2_brand-item">
                    <img src="{{ asset('assets/images/brand/2.png') }}" alt="Image Not Found">
                </div>
                <div class="h2_brand-item">
                    <img src="{{ asset('assets/images/brand/3.png') }}" alt="Image Not Found">
                </div>

                <div class="h2_brand-item">
                    <img src="{{ asset('assets/images/brand/4.png') }}" alt="Image Not Found">
                </div>
                <div class="h2_brand-item">
                    <img src="{{ asset('assets/images/brand/5.png') }}" alt="Image Not Found">
                </div>
            </div>
        </div>
    </section>
    <!-- brand area end -->
@endsection
