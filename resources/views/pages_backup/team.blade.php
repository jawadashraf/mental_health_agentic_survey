@extends('layouts.layout')

<?php
    $title = 'Our Team';
    $subTitle = 'Home';
?>

@section('content')
    <!-- team area start -->
    <section class="inner_team-area pt-140">
        <div class="container mt-5">
            <div class="row">
                <div class="col-xl-5 col-lg-5">
                    <div class="inner_team-img mb-30 mb-lg-0">
                        <img src="{{ asset('assets/images/team/1.png') }}" alt="" class="tp_fade_right">
                        <img src="{{ asset('assets/images/team/shape.png') }}" alt="" class="inner_team-img-shape tp_fade_bottom">
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="inner_team-content mb-lg-0 mb-140">
                        <h2 class="inner_team-content-title tp_has_text_reveal_anim">Project Lead. <br> Dr Swati Virmani</h2>
{{--                        <h6 class="inner_team-content-subtitle tp_has_text_reveal_anim">I’m David Ferry – AI of SalePush, A leading professional Designer company in NewYork</h6>--}}
                        <p class="tp_fade_bottom">
                            is the Deputy Head – Academic at De Montfort University’s London Campus. She is a passionate
                            educator and researcher in Human-Centred AI, Governance, and Digital Transformation,
                            committed to pedagogical innovation and industry-aligned teaching. An Associate of the UK’s
                            Economics Network, she was conferred the title of University Teacher Fellow in 2023. Swati
                            specialises in the strategy and operations of Responsible AI, with a focus on ensuring
                            equitable distribution of benefits of technology. She has advised policy-makers and industry
                            bodies on the ethical use of AI in public and professional settings. As a member of the UK’s
                            Chartered Institute of Public Relations’ AI in PR panel, she has contributed to three major
                            reports assessing the industry’s readiness for an AI-driven future. She speaks nationally
                            and internationally, including at the UK AI Summit, Global Alliance Public Relations (Africa
                            & Europe), and the Institute for Public Relations (New York), on the future of AI in
                            education, communication, and training and upskilling.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row">
                <div class="col-xl-5 col-lg-5">
                    <div class="inner_team-img mb-30 mb-lg-0">
                        <img src="{{ asset('assets/images/team/1.png') }}" alt="" class="tp_fade_right">
                        <img src="{{ asset('assets/images/team/shape.png') }}" alt="" class="inner_team-img-shape tp_fade_bottom">
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="inner_team-content mb-lg-0 mb-140">
                        <h2 class="inner_team-content-title tp_has_text_reveal_anim">Project Lead. <br> Dr Swati Virmani</h2>
                        {{--                        <h6 class="inner_team-content-subtitle tp_has_text_reveal_anim">I’m David Ferry – AI of SalePush, A leading professional Designer company in NewYork</h6>--}}
                        <p class="tp_fade_bottom">
                            is the Deputy Head – Academic at De Montfort University’s London Campus. She is a passionate
                            educator and researcher in Human-Centred AI, Governance, and Digital Transformation,
                            committed to pedagogical innovation and industry-aligned teaching. An Associate of the UK’s
                            Economics Network, she was conferred the title of University Teacher Fellow in 2023. Swati
                            specialises in the strategy and operations of Responsible AI, with a focus on ensuring
                            equitable distribution of benefits of technology. She has advised policy-makers and industry
                            bodies on the ethical use of AI in public and professional settings. As a member of the UK’s
                            Chartered Institute of Public Relations’ AI in PR panel, she has contributed to three major
                            reports assessing the industry’s readiness for an AI-driven future. She speaks nationally
                            and internationally, including at the UK AI Summit, Global Alliance Public Relations (Africa
                            & Europe), and the Institute for Public Relations (New York), on the future of AI in
                            education, communication, and training and upskilling.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row">
                <div class="col-xl-5 col-lg-5">
                    <div class="inner_team-img mb-30 mb-lg-0">
                        <img src="{{ asset('assets/images/team/1.png') }}" alt="" class="tp_fade_right">
                        <img src="{{ asset('assets/images/team/shape.png') }}" alt="" class="inner_team-img-shape tp_fade_bottom">
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="inner_team-content mb-lg-0 mb-140">
                        <h2 class="inner_team-content-title tp_has_text_reveal_anim">Project Lead. <br> Dr Swati Virmani</h2>
                        {{--                        <h6 class="inner_team-content-subtitle tp_has_text_reveal_anim">I’m David Ferry – AI of SalePush, A leading professional Designer company in NewYork</h6>--}}
                        <p class="tp_fade_bottom">
                            is the Deputy Head – Academic at De Montfort University’s London Campus. She is a passionate
                            educator and researcher in Human-Centred AI, Governance, and Digital Transformation,
                            committed to pedagogical innovation and industry-aligned teaching. An Associate of the UK’s
                            Economics Network, she was conferred the title of University Teacher Fellow in 2023. Swati
                            specialises in the strategy and operations of Responsible AI, with a focus on ensuring
                            equitable distribution of benefits of technology. She has advised policy-makers and industry
                            bodies on the ethical use of AI in public and professional settings. As a member of the UK’s
                            Chartered Institute of Public Relations’ AI in PR panel, she has contributed to three major
                            reports assessing the industry’s readiness for an AI-driven future. She speaks nationally
                            and internationally, including at the UK AI Summit, Global Alliance Public Relations (Africa
                            & Europe), and the Institute for Public Relations (New York), on the future of AI in
                            education, communication, and training and upskilling.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="inner_team-shape">
{{--            <img src="{{ asset('assets/images/team/shape-2.png') }}" alt="Image Not Found" class="inner_team-shape-1" data-speed="0.8">--}}
{{--            <img src="{{ asset('assets/images/team/shape-3.png') }}" alt="Image Not Found" class="inner_team-shape-2" data-speed="0.8">--}}
        </div>
    </section>
    <!-- team area end -->

    <!-- bottom img  -->
    <div class="inner_team-bottom-area mt-5 text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner_team-bottom tp_fade_bottom">
                        <img src="{{ asset('assets/images/logo/black_logo_purple_text.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bottom img  -->
@endsection
