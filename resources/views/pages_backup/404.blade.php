@extends('layouts.layout')

<?php
    $title = '404';
    $subTitle = 'Home';
?>

@section('content')
    <!-- error area start -->
    <section class="error-area pt-140 pb-140">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="error-wrap text-center">
                        <div class="error-img mb-60 tp_fade_bottom">
                            <img src="{{ asset('assets/images/bg/404.png') }}" alt="">
                        </div>
                        <div class="error-content">
                            <h2 class="error-content-title tp_has_text_reveal_anim">Opos! Nothing Was Found</h2>
                            <p class="tp_desc_anim">Something went wrong, Looks like this page doesn't <br>
                                exist anymore.</p>
                            <a href="{{ url('index') }}" class="theme-btn-2 tp_fade_bottom">Go Back Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- error area end -->
@endsection
