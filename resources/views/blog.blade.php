@extends('layouts.layout')

<?php
    $title = 'Our Blog';
    $subTitle = 'Home';
?>

@section('content')
    <!-- blog area start -->
    <section class="h2_blog-area pt-105 pb-140 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="h2_section-area text-center mb-50">
                        <span class="h2_section-subtitle">Our Blog</span>
                        <h2 class="h2_section-title mb-0">Our Latest News</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-6 tp_fade_left" data-fade-from="left" >
                    <div class="h2_blog-item mb-35">
                        <div class="h2_blog-img w_img mb-25">
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
                <div class="col-xl-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay=".4">
                    <div class="h2_blog-item mb-35">
                        <div class="h2_blog-img w_img mb-25">
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
                <div class="col-xl-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay=".6">
                    <div class="h2_blog-item mb-35">
                        <div class="h2_blog-img w_img mb-25">
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
                <div class="col-xl-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay=".8">
                    <div class="h2_blog-item mb-35">
                        <div class="h2_blog-img w_img mb-25">
                            <a href="{{ url('blog-details') }}"><img src="{{ asset('assets/images/blog/home2/4.png') }}" alt="Image Not Found"></a>
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
                <div class="col-xl-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1">
                    <div class="h2_blog-item mb-35">
                        <div class="h2_blog-img w_img mb-25">
                            <a href="{{ url('blog-details') }}"><img src="{{ asset('assets/images/blog/home2/5.png') }}" alt="Image Not Found"></a>
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
                <div class="col-xl-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.2">
                    <div class="h2_blog-item mb-35">
                        <div class="h2_blog-img w_img mb-25">
                            <a href="{{ url('blog-details') }}"><img src="{{ asset('assets/images/blog/home2/6.png') }}" alt="Image Not Found"></a>
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
                <div class="col-xl-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.4">
                    <div class="h2_blog-item mb-35">
                        <div class="h2_blog-img w_img mb-25">
                            <a href="{{ url('blog-details') }}"><img src="{{ asset('assets/images/blog/home2/7.png') }}" alt="Image Not Found"></a>
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
                <div class="col-xl-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.6">
                    <div class="h2_blog-item mb-35">
                        <div class="h2_blog-img w_img mb-25">
                            <a href="{{ url('blog-details') }}"><img src="{{ asset('assets/images/blog/home2/8.png') }}" alt="Image Not Found"></a>
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
                <div class="col-xl-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.8">
                    <div class="h2_blog-item mb-35">
                        <div class="h2_blog-img w_img mb-25">
                            <a href="{{ url('blog-details') }}"><img src="{{ asset('assets/images/blog/home2/9.png') }}" alt="Image Not Found"></a>
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
            <div class="row">
                <div class="col-12">
                    <div class="pagination-area pt-30 d-flex justify-content-center tp_fade_bottom">
                        <span><i class="fa-light fa-arrow-left"></i></span>
                            <ul>
                                <li><a href="#" class="active">01</a></li>
                                <li><a href="#">02</a></li>
                                <li><a href="#">03</a></li>
                            </ul>
                        <span><i class="fa-light fa-arrow-right"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog area end -->
@endsection
