@extends('layouts.layout')

<?php
    $title = 'Our Team';
    $subTitle = 'Home';
?>

@section('content')
    <!-- team area start -->
    <section class="inner_team-area pt-140">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5">
                    <div class="inner_team-img mb-30 mb-lg-0">
                        <img src="{{ asset('assets/images/team/1.png') }}" alt="" class="tp_fade_right">
                        <img src="{{ asset('assets/images/team/shape.png') }}" alt="" class="inner_team-img-shape tp_fade_bottom">
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="inner_team-content mb-lg-0 mb-140">
                        <h2 class="inner_team-content-title tp_has_text_reveal_anim">CEO. David Ferry</h2>
                        <h6 class="inner_team-content-subtitle tp_has_text_reveal_anim">I’m David Ferry – AI of SalePush, A leading professional Designer company in NewYork</h6>
                        <p class="tp_fade_bottom">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. you are going to use a passage of Lorem Ipsum.</p>
                        <p class="tp_fade_bottom">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                        <div class="inner_team-signature tp_fade_bottom">
                            <img src="{{ asset('assets/images/team/signature.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="inner_team-shape">
            <img src="{{ asset('assets/images/team/shape-2.png') }}" alt="Image Not Found" class="inner_team-shape-1" data-speed="0.8">
            <img src="{{ asset('assets/images/team/shape-3.png') }}" alt="Image Not Found" class="inner_team-shape-2" data-speed="0.8">
        </div>
    </section>
    <!-- team area end -->

    <!-- team member area start -->
    <section class="inner_team_member-area pt-135 pb-110">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="inner_section-area mb-50 text-center">
                        <span class="inner_section-subtitle tp_subtitle_anim">Team Member</span>
                        <h2 class="inner_section-title tp_title_slideup mb-0">Meet Our Expert Teams</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left">
                    <div class="inner_team_member-item mb-25">
                        <div class="inner_team_member-img">
                            <img src="{{ asset('assets/images/team/2.jpg') }}" alt="">
                            <div class="inner_team_member-social">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="inner_team_member-info">
                            <h5 class="inner_team_member-info-title"><a href="#">James David</a></h5>
                            <span>SEO Contain Writer</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay=".5">
                    <div class="inner_team_member-item mb-25">
                        <div class="inner_team_member-img">
                            <img src="{{ asset('assets/images/team/3.jpg') }}" alt="">
                            <div class="inner_team_member-social">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="inner_team_member-info">
                            <h5 class="inner_team_member-info-title"><a href="#">Robbie Harrison</a></h5>
                            <span>SEO Contain Writer</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay=".6">
                    <div class="inner_team_member-item mb-25">
                        <div class="inner_team_member-img">
                            <img src="{{ asset('assets/images/team/4.jpg') }}" alt="">
                            <div class="inner_team_member-social">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="inner_team_member-info">
                            <h5 class="inner_team_member-info-title"><a href="#">Koen Chegg</a></h5>
                            <span>SEO Contain Writer</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay=".8">
                    <div class="inner_team_member-item mb-25">
                        <div class="inner_team_member-img">
                            <img src="{{ asset('assets/images/team/5.jpg') }}" alt="">
                            <div class="inner_team_member-social">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="inner_team_member-info">
                            <h5 class="inner_team_member-info-title"><a href="#">Warren Daniel</a></h5>
                            <span>SEO Contain Writer</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1">
                    <div class="inner_team_member-item mb-25">
                        <div class="inner_team_member-img">
                            <img src="{{ asset('assets/images/team/6.jpg') }}" alt="">
                            <div class="inner_team_member-social">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="inner_team_member-info">
                            <h5 class="inner_team_member-info-title"><a href="#">Richard Joseph</a></h5>
                            <span>SEO Contain Writer</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.2">
                    <div class="inner_team_member-item mb-25">
                        <div class="inner_team_member-img">
                            <img src="{{ asset('assets/images/team/7.jpg') }}" alt="">
                            <div class="inner_team_member-social">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="inner_team_member-info">
                            <h5 class="inner_team_member-info-title"><a href="#">Robbie Harrison</a></h5>
                            <span>SEO Contain Writer</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.4">
                    <div class="inner_team_member-item mb-25">
                        <div class="inner_team_member-img">
                            <img src="{{ asset('assets/images/team/8.jpg') }}" alt="">
                            <div class="inner_team_member-social">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="inner_team_member-info">
                            <h5 class="inner_team_member-info-title"><a href="#">Douglas Kemp</a></h5>
                            <span>SEO Contain Writer</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.6">
                    <div class="inner_team_member-item mb-25">
                        <div class="inner_team_member-img">
                            <img src="{{ asset('assets/images/team/9.jpg') }}" alt="">
                            <div class="inner_team_member-social">
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="inner_team_member-info">
                            <h5 class="inner_team_member-info-title"><a href="#">Austin Arthur</a></h5>
                            <span>SEO Contain Writer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- team member area end -->

    <!-- bottom img  -->
    <div class="inner_team-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner_team-bottom tp_fade_bottom">
                        <img src="{{ asset('assets/images/team/bg-group.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bottom img  -->
@endsection
