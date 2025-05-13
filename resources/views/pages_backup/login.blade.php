@extends('layouts.layout')

<?php
    $title = 'Login';
    $subTitle = 'Home';
?>

@section('content')

    <!-- login area start -->
    <section class="login-area pt-140 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="login-img tp_fade_right">
                        <img src="{{ asset('assets/images/bg/login-bg.png') }}" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="login-content tp_fade_left">
                        <span class="login-content-subtitle">Welcome Back</span>
                        <h3 class="login-content-title">Log in to Doodle</h3>
                        <form action="#" class="login-form">
                            <div class="login-form-item mb-25">
                                <input type="text" placeholder="Your Name">
                                <i class="fa-light fa-user"></i>
                            </div>
                            <div class="login-form-item mb-10">
                                <input type="email" placeholder="Your Email">
                                <i class="fa-light fa-envelope"></i>
                            </div>
                            <div class="login-condition">
                                <label class="condition-checkbox">
                                    Remember me
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <a href="#">Forget Password?</a>
                            </div>
                            <div class="login-form-item mb-25">
                                <button type="submit">Submit Review</button>
                            </div>
                        </form>
                        <div class="login-content-link">
                            <p>Don’t have an account ?  <a href="{{ url('sign-up') }}">Sign Up for free</a></p>
                        </div>
                        <div class="login-break">
                            <span>OR</span>
                        </div>
                        <div class="login-content-account">
                            <div class="login-content-account-item">
                                <a href="#">
                                    <img src="{{ asset('assets/images/apps/fb.png') }}" alt="">
                                    <span>Continue with Facebook</span>
                                </a>
                            </div>
                            <div class="login-content-account-item">
                                <a href="#">
                                    <img src="{{ asset('assets/images/apps/google.png') }}" alt="">
                                    <span>Continue with Google</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="login-shape d-none d-xl-block">
            <img src="{{ asset('assets/images/bg/login-shpae-1.png') }}" alt="" class="login-shape-1" data-speed="0.8">
            <img src="{{ asset('assets/images/bg/login-shpae-2.png') }}" alt="" class="login-shape-2" data-speed="0.8">
            <img src="{{ asset('assets/images/bg/login-shpae-3.png') }}" alt="" class="login-shape-3" data-speed="0.8">
        </div>
    </section>
    <!-- login area end -->
@endsection
