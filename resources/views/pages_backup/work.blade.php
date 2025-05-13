@extends('layouts.layout')

<?php
    $title = 'Portfolio';
    $subTitle = 'Home';
?>

@section('content')
    <!-- portfolio area start -->
    <section class="inner_portfolio-area pt-140 pb-110">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 tp_fade_left" data-fade-from="left">
                    <div class="inner_portfolio-item mb-30">
                        <div class="inner_portfolio-img w_img">
                            <img src="{{ asset('assets/images/portfolio/1.png') }}" alt="">
                        </div>
                        <div class="inner_portfolio-content">
                            <span class="inner_portfolio-content-tag">Branding</span>
                            <h4 class="inner_portfolio-content-title"><a href="#">Cupidatat non proident</a></h4>
                            <p>Contrary to popular belief, Lorem Ipsum is not is simply random text. It has roots in a piece of one classical Latin liter.</p>
                            <a class="inner_portfolio-content-btn" href="#">Learn More<i class="fa-light fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay=".5">
                    <div class="inner_portfolio-item mb-30">
                        <div class="inner_portfolio-img w_img">
                            <img src="{{ asset('assets/images/portfolio/2.png') }}" alt="">
                        </div>
                        <div class="inner_portfolio-content">
                            <span class="inner_portfolio-content-tag">Branding</span>
                            <h4 class="inner_portfolio-content-title"><a href="#">Animation overview</a></h4>
                            <p>Contrary to popular belief, Lorem Ipsum is not is simply random text. It has roots in a piece of one classical Latin liter.</p>
                            <a class="inner_portfolio-content-btn" href="#">Learn More<i class="fa-light fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay=".8">
                    <div class="inner_portfolio-item mb-30">
                        <div class="inner_portfolio-img w_img">
                            <img src="{{ asset('assets/images/portfolio/3.png') }}" alt="">
                        </div>
                        <div class="inner_portfolio-content">
                            <span class="inner_portfolio-content-tag">Branding</span>
                            <h4 class="inner_portfolio-content-title"><a href="#">Smart research</a></h4>
                            <p>Contrary to popular belief, Lorem Ipsum is not is simply random text. It has roots in a piece of one classical Latin liter.</p>
                            <a class="inner_portfolio-content-btn" href="#">Learn More<i class="fa-light fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.1">
                    <div class="inner_portfolio-item mb-30">
                        <div class="inner_portfolio-img w_img">
                            <img src="{{ asset('assets/images/portfolio/4.png') }}" alt="">
                        </div>
                        <div class="inner_portfolio-content">
                            <span class="inner_portfolio-content-tag">Branding</span>
                            <h4 class="inner_portfolio-content-title"><a href="#">Cupidatat non proident</a></h4>
                            <p>Contrary to popular belief, Lorem Ipsum is not is simply random text. It has roots in a piece of one classical Latin liter.</p>
                            <a class="inner_portfolio-content-btn" href="#">Learn More<i class="fa-light fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.3">
                    <div class="inner_portfolio-item mb-30">
                        <div class="inner_portfolio-img w_img">
                            <img src="{{ asset('assets/images/portfolio/5.png') }}" alt="">
                        </div>
                        <div class="inner_portfolio-content">
                            <span class="inner_portfolio-content-tag">Branding</span>
                            <h4 class="inner_portfolio-content-title"><a href="#">Cupidatat non proident</a></h4>
                            <p>Contrary to popular belief, Lorem Ipsum is not is simply random text. It has roots in a piece of one classical Latin liter.</p>
                            <a class="inner_portfolio-content-btn" href="#">Learn More<i class="fa-light fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.5">
                    <div class="inner_portfolio-item mb-30">
                        <div class="inner_portfolio-img w_img">
                            <img src="{{ asset('assets/images/portfolio/6.png') }}" alt="">
                        </div>
                        <div class="inner_portfolio-content">
                            <span class="inner_portfolio-content-tag">Branding</span>
                            <h4 class="inner_portfolio-content-title"><a href="#">Excepteur sint occaecat</a></h4>
                            <p>Contrary to popular belief, Lorem Ipsum is not is simply random text. It has roots in a piece of one classical Latin liter.</p>
                            <a class="inner_portfolio-content-btn" href="#">Learn More<i class="fa-light fa-angle-right"></i></a>
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
    <!-- portfolio area end -->
@endsection
