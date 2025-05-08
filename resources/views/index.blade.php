@extends('layouts.layout1')
<style>
    .border-pink {
        border-width: 8px !important;
        border-color: #FFC1DD !important; /* optional: custom color */
    }
</style>

@section('header')
    <header class="header-area">
{{--        <div class="header-top d-none d-md-flex">--}}
{{--            <div class="container custom-container-1">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-xl-9 col-lg-9">--}}
{{--                        <div class="header-top-text">--}}
{{--                            <p>New members: get your first 7 days of turitor Premium for free! Unlock discount now!</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-3 col-lg-3 d-none d-lg-block">--}}
{{--                        <div class="header-top-social">--}}
{{--                            <ul>--}}
{{--                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>--}}
{{--                                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>--}}
{{--                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>--}}
{{--                                <li><a href="#"><i class="fa-brands fa-google-plus-g"></i></a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="header-main header-sticky">
            <div class="container custom-container-1">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-2 col-6">
                        <div class="header-logo">
                            <a href="{{ url('index') }}"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="Image Not Found"></a>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 text-center d-none d-lg-block">
                        <div class="header-menu ">
                            <nav class="header-nav-menu" id="mobile-menu">
                                <ul>
                                    <li>
                                        <a href="{{ url('index') }}">Home</a>
{{--                                        <ul class="submenu">--}}
{{--                                            <li><a href="{{ url('index') }}">AI Doodle</a></li>--}}
{{--                                            <li><a href="{{ url('index-2') }}">AI Co-Pilot</a></li>--}}
{{--                                            <li><a href="{{ url('index-3') }}">AI Image Generator</a></li>--}}
{{--                                            <li><a href="{{ url('index-4') }}">AI Text Generator</a></li>--}}
{{--                                            <li><a href="{{ url('index-5') }}">AI Photostock</a></li>--}}
{{--                                        </ul>--}}
                                    </li>
                                    <li><a href="{{ url('about') }}">About</a></li>
                                    <li>
                                        <a href="{{ url('blog') }}">Blog</a>
{{--                                        <ul class="submenu">--}}
{{--                                            <li><a href="{{ url('blog') }}">Blog</a></li>--}}
{{--                                            <li><a href="{{ url('blog-details') }}">Blog Details</a></li>--}}
{{--                                        </ul>--}}
                                    </li>
                                    <li><a href="{{ url('contact') }}">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-6">
                        <div class="header-action-wrap d-flex align-items-center justify-content-end">
                            <div class="header-action d-none d-sm-flex">
{{--                                <a href="#" class="header-action-login">--}}
{{--                                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                        <path d="M7.01172 8C8.94472 8 10.5117 6.433 10.5117 4.5C10.5117 2.567 8.94472 1 7.01172 1C5.07872 1 3.51172 2.567 3.51172 4.5C3.51172 6.433 5.07872 8 7.01172 8Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                        <path d="M13.026 15C13.026 12.291 10.331 10.1 7.013 10.1C3.695 10.1 1 12.291 1 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                    </svg>--}}
{{--                                    Login--}}
{{--                                </a>--}}
                                <a href="{{ route('chat') }}" class="header-action-btn">
                                    Experience It
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
        <section class="banner-area">
            <div class="container custom-container-1">
                <div class="banner-single">
                    <div class="banner-content">
{{--                        <span class="banner-content-subtitle tp_fade_left">Something Special</span>--}}
                        <h1 class="banner-content-title tp_has_text_reveal_anim">SCOPE</h1>
                        <p class="tp_desc_anim">Responsible AI. Smarter Surveys. Stronger Voices.</p>

{{--                         <p>--}}

{{--                            SCOPE is a research-driven initiative that tests how AI-powered conversational agents can be used to –--}}
{{--                            <ul>--}}
{{--                            <li>Create dynamic, human-centred surveys</li>--}}
{{--                                <li>Increase engagement among participants</li>--}}
{{--                                <li>Raise awareness on diverse issues</li>--}}
{{--                                <li>Track inclusivity and underrepresented voices in data collection</li>--}}
{{--                                <li>Inform future ethical AI practices</li>--}}
{{--                            </ul>--}}
{{--                         </p>--}}

                        <div class="inner_feature-content mb-50 mb-md-0">
                            <div class="inner_section-area mb-20">
                                <p class="inner_section-text tp_fade_bottom">
                                    SCOPE is a research-driven initiative that tests how AI-powered conversational agents can be used to
                                </p>
                            </div>

                            <ul class="inner_feature-content-list tp_fade_bottom">
                                <li>Create dynamic, human-centred surveys</li>
                                <li>Increase engagement among participants</li>
                                <li>Raise awareness on diverse issues</li>
                                <li>Track inclusivity and underrepresented voices in data collection</li>
                                <li>Inform future ethical AI practices</li>
                            </ul>
                        </div>
                    </div>
                    <div class="banner-img tp_fade_left img-thumbnail">
                        <img src="{{ asset('assets/images/banner/home1/Clip3Clarifies.gif') }}" alt="Image Not Found">
                    </div>
                </div>
            </div>
{{--            <div class="banner-shape d-none d-lg-block">--}}
{{--                <img src="{{ asset('assets/images/banner/home1/shape-1.png') }}" alt="Image Not Found" class="banner-shape-1" data-speed="0.7">--}}
{{--                <img src="{{ asset('assets/images/banner/home1/shape-2.png') }}" alt="Image Not Found" class="banner-shape-2" data-speed="0.8">--}}
{{--                <img src="{{ asset('assets/images/banner/home1/shape-3.png') }}" alt="Image Not Found" class="banner-shape-3" data-speed="0.8">--}}
{{--                <img src="{{ asset('assets/images/banner/home1/shape-4.png') }}" alt="Image Not Found" class="banner-shape-4" data-speed="0.7">--}}
{{--                <img src="{{ asset('assets/images/banner/home1/shape-5.png') }}" alt="Image Not Found" class="banner-shape-5">--}}
{{--            </div>--}}
        </section>
        <!-- banner area end -->

        <!-- choose area start -->
        <section class="choose-area pt-140">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-6">
                        <div class="h2_about-content mb-40">
                            <div class="inner_section-area mb-40">
                                <span class="inner_section-subtitle tp_subtitle_anim">Why</span>
                                <h2 class="inner_section-title tp_title_slideup inner_section-title
                                tp_title_slideup-big mb-25">Scope</h2>

                                <div class="inner_section-text tp_fade_bottom text-dark">
                                    Surveys are one of the most widely used
                                    tools for understanding communities, but they often fall short. Response rates are
                                    low, participation skews toward certain groups, and static forms rarely reflect the
                                    nuance or complexity of human experiences. These challenges are especially visible
                                    in areas such as mental health, where stigma, confusion, or disengagement can easily
                                    disrupt the data collection process.
                                    <br>
                                    SCOPE explores a new way forward – using AI to make surveys more adaptive and more
                                    inclusive.
                                    <br>
                                    At the heart of the project is a pilot test of an AI-powered conversational agent – a
                                digital tool that leads users through a mental health literacy survey not as a form, but
                                as a conversation. The AI responds to queries, handles confusion, gently redirects
                                digressions, and ensures respectful, accessible dialogue. It adapts to the user, instead
                                    of expecting the user to adapt to it.

                                    <br>

                                But SCOPE is not just about improving one survey <br>

                                This pilot is a proof of concept for a larger idea that AI can be used to create
                                smarter, more meaningful ways of gathering public insight—especially in contexts where
                                traditional surveys fall flat. We are testing whether a conversational agent can –


                                        <ul class="inner_feature-content-list tp_fade_bottom my-4">
                                          <li>
                                            Improve completion rates and engagement
                                          </li>
                                            <li>
                                                Handle real-world ambiguity in user responses
                                            </li>
                                        <li>
                                            Respect boundaries while still collecting useful data
                                        </li>
                                        <li>
                                            Monitor for inclusion and underrepresented voices in real-time
                                        </li>
                                        <li>
                                            Log drop-offs, digressions, and friction points for future refinement
                                        </li>


                                    </ul>

                                Importantly, the agent is not designed to diagnose or advise – it is not a therapeutic
                                tool. Its role is to listen, guide the user through the experience, and help researchers
                                gather cleaner, more reflective data. <br>

                                We are starting with young adults and mental health. But the potential use cases go far
                                beyond—to city councils, schools, community organisations, and anyone who needs to
                                engage people in meaningful, inclusive ways. <br>

                                SCOPE asks the question – What if surveys were not something you filled out… but
                                something you had a conversation with? <br>

                                This pilot is our first step toward answering that!
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12 tp_fade_left" data-fade-from="left">
                                <div class="choose-item mb-10 p-4">
                                    <span class="choose-item-count">01</span>
                                    <div class="choose-item-img">
                                        <img src="{{ asset('assets/images/choose/adaptive_survey.png') }}" alt="Image Not Found">
                                    </div>
                                    <div class="choose-item-content">
                                        <h5 class="choose-item-content-title"><a href="#">Adaptive Surveys</a></h5>
                                        <p>SCOPE uses an AI-powered conversational agent that adapts in real-time to
                                            each participant’s responses. It can clarify questions, handle digressions
                                            gently, and guide the user without breaking the flow – making the experience
                                            feel more like a dialogue than a form.</p>
                                        {{--                                <a href="#" class="choose-item-content-btn">Learn More<i class="fa-light fa-angle-right"></i></a>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 tp_fade_left" data-fade-from="left" data-delay=".8">
                                <div class="choose-item mb-10 p-4">
                                    <span class="choose-item-count">02</span>
                                    <div class="choose-item-img">
                                        <img src="{{ asset('assets/images/choose/increased_engagement.png') }}" alt="Image Not Found">
                                    </div>
                                    <div class="choose-item-content">
                                        <h5 class="choose-item-content-title"><a href="#">Increased Engagement</a></h5>
                                        <p>
                                            By replacing survey forms into a dynamic conversation, SCOPE helps reduce
                                            survey fatigue and increase completion rates. Participants stay more focused
                                            and involved, even when discussing complex or sensitive topics.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 tp_fade_left" data-fade-from="left" data-delay="1.1">
                                <div class="choose-item mb-10 p-4">
                                    <span class="choose-item-count">03</span>
                                    <div class="choose-item-img">
                                        <img src="{{ asset('assets/images/choose/inclusive_data_collection.png') }}" alt="Image Not Found">
                                    </div>
                                    <div class="choose-item-content">
                                        <h5 class="choose-item-content-title"><a href="#">Inclusive Data Collection</a></h5>
                                        <p>SCOPE monitors for underrepresented voices, tracks skipped questions and
                                            digression points, and allows users to opt out – supporting respectful,
                                            inclusive participation across diverse groups.</p>
                                        {{--                                <a href="#" class="choose-item-content-btn">Learn More<i class="fa-light fa-angle-right"></i></a>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 tp_fade_left" data-fade-from="left" data-delay="1.3">
                                <div class="choose-item mb-10 p-4">
                                    <span class="choose-item-count">04</span>
                                    <div class="choose-item-img">
                                        <img src="{{ asset('assets/images/choose/ethics.png') }}" alt="Image Not Found">
                                    </div>
                                    <div class="choose-item-content">
                                        <h5 class="choose-item-content-title"><a href="#">Ethical AI Practices</a></h5>
                                        <p>SCOPE is designed with strict guardrails – no diagnosis, no advice, and no
                                            storage of identifiable personal data. It prioritises care, clarity, and
                                            autonomy – showing how AI can support human-centred research without
                                            overstepping.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- choose area end -->



        <!-- feature area start -->

        <section class="feature-area pt-110 pb-110">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-area text-center mb-50">
                            <span class="section-subtitle tp_fade_left">Our Features</span>
                            <h2 class="section-title tp_title_slideup mb-0">What’s Included: Our Core Features</h2>
                        </div>
                    </div>
                </div>
                <div class="feature-top mb-50 tp_fade_bottom">
                    <div class="feature-item feature-item-1">
                        <h5 class="feature-item-title">Welcome screen</h5>
                        <p>Lorem Ipsum is simply dummy text’s of the one most printing and typesetting is an one of the best.</p>
                    </div>
                    <div class="feature-item feature-item-2">
                        <h5 class="feature-item-title">One-click management</h5>
                        <p>Lorem Ipsum is simply dummy text’s of the one most printing and typesetting is an one of the best.</p>
                    </div>
                    <div class="feature-item feature-item-3">
                        <h5 class="feature-item-title">Custom greetings</h5>
                        <p>Lorem Ipsum is simply dummy text’s of the one most printing and typesetting is an one of the best.</p>
                    </div>
                </div>
                <div class="row align-items-end">
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                        <div class="feature-left-img mb-30 tp_fade_right">
                            <img src="{{ asset('assets/images/banner/home1/ScopeClip1_Integrated.gif') }}" alt="Image Not Found"
                                 class="img-thumbnail border-pink">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                        <div class="feature-right-img mb-30">
                            <img src="{{ asset('assets/images/feature/bg-1.png') }}" alt="Image Not Found" class="f-main-img tp_fade_left">
{{--                            <img src="{{ asset('assets/images/feature/shape-1.png') }}" alt="Image Not Found" class="feature-shape-1" data-speed="0.7">--}}
{{--                            <img src="{{ asset('assets/images/feature/shape-2.png') }}" alt="Image Not Found" class="feature-shape-2" data-speed="0.8">--}}
{{--                            <img src="{{ asset('assets/images/feature/shape-3.png') }}" alt="Image Not Found" class="feature-shape-3" data-speed="0.7">--}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- feature area end -->

        <!-- Gifs area start -->
        <section class="h2_about-area pt-140 pb-100">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-area text-center mb-50">
                        <span class="section-subtitle tp_fade_left">How It Works</span>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="h2_about-img mb-40 pe-1">
                            <img src="{{ asset('assets/images/banner/home1/ScopeClip1_Integrated.gif') }}"
                                 alt="Image Not Found" class="tp_fade_right img-thumbnail">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="h2_about-content mb-40">
                            <div class="inner_section-area mb-40">
                                <span class="inner_section-subtitle tp_subtitle_anim">In-Chat Survey</span>
                                <h2 class="inner_section-title tp_title_slideup inner_section-title tp_title_slideup-big mb-25">Integrated Questions</h2>
                                <p class="inner_section-text tp_fade_bottom">Sed Mattis eros lectors, eu fermentum Felis laborites convallis. Nam Felis arco, sed <br> mi Faubus quips. Fusco id dui nil. Sed ac lorem a dolor incident suscept <br> Poetesqueo.</p>
                                <p class="inner_section-text mt-10 tp_fade_bottom">Sed Mattis eros lectors, eu fermentum Felis laborites convallis. Nam Felis arco, sed <br>  mi Faubus quips. Fusco id dui nil.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-lg-4">
                        <div class="h2_about-content mb-40">
                            <div class="inner_section-area mb-40">
                                <span class="inner_section-subtitle tp_subtitle_anim">Helps</span>
                                <h2 class="inner_section-title tp_title_slideup inner_section-title tp_title_slideup-big mb-25">Helps answering the questions</h2>
                                <p class="inner_section-text tp_fade_bottom">Sed Mattis eros lectors, eu fermentum Felis laborites convallis. Nam Felis arco, sed <br> mi Faubus quips. Fusco id dui nil. Sed ac lorem a dolor incident suscept <br> Poetesqueo.</p>
                                <p class="inner_section-text mt-10 tp_fade_bottom">Sed Mattis eros lectors, eu fermentum Felis laborites convallis. Nam Felis arco, sed <br>  mi Faubus quips. Fusco id dui nil.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8">
                        <div class="h2_about-img mb-40 pe-1">
                            <img src="{{ asset('assets/images/banner/home1/SCOPEClip2HelpsAnswer.gif') }}" alt="Image Not Found" class="inner-img-1 tp_fade_right">
                            {{--                            <img src="{{ asset('assets/images/about/home2/bg-2.png') }}" alt="Image Not Found" class="inner-img-2 tp_fade_bottom">--}}
                            {{--                            <img src="{{ asset('assets/images/about/home2/shape.png') }}" alt="Image Not Found" class="inner-img-shape">--}}
                        </div>
                    </div>

                </div>
            </div>

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="h2_about-img mb-40 pe-1">
                            <img src="{{ asset('assets/images/banner/home1/Clip3Clarifies.gif') }}"
                                 alt="Image Not Found" class="tp_fade_right img-thumbnail">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="h2_about-content mb-40">
                            <div class="inner_section-area mb-40">
                                <span class="inner_section-subtitle tp_subtitle_anim">Clarifies</span>
                                <h2 class="inner_section-title tp_title_slideup inner_section-title tp_title_slideup-big mb-25">Helps understand questions</h2>
                                <p class="inner_section-text tp_fade_bottom">Sed Mattis eros lectors, eu fermentum Felis laborites convallis. Nam Felis arco, sed <br> mi Faubus quips. Fusco id dui nil. Sed ac lorem a dolor incident suscept <br> Poetesqueo.</p>
                                <p class="inner_section-text mt-10 tp_fade_bottom">Sed Mattis eros lectors, eu fermentum Felis laborites convallis. Nam Felis arco, sed <br>  mi Faubus quips. Fusco id dui nil.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-lg-4">
                        <div class="h2_about-content mb-40">
                            <div class="inner_section-area mb-40">
                                <span class="inner_section-subtitle tp_subtitle_anim">Encourages</span>
                                <h2 class="inner_section-title tp_title_slideup inner_section-title tp_title_slideup-big mb-25">Encourages when participant loses motivation</h2>
                                <p class="inner_section-text tp_fade_bottom">Sed Mattis eros lectors, eu fermentum Felis laborites convallis. Nam Felis arco, sed <br> mi Faubus quips. Fusco id dui nil. Sed ac lorem a dolor incident suscept <br> Poetesqueo.</p>
                                <p class="inner_section-text mt-10 tp_fade_bottom">Sed Mattis eros lectors, eu fermentum Felis laborites convallis. Nam Felis arco, sed <br>  mi Faubus quips. Fusco id dui nil.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8">
                        <div class="h2_about-img mb-40 pe-1">
                            <img src="{{ asset('assets/images/banner/home1/Clip4_Empathises.gif') }}" alt="Image Not Found" class="inner-img-1 tp_fade_right">
                            {{--                            <img src="{{ asset('assets/images/about/home2/bg-2.png') }}" alt="Image Not Found" class="inner-img-2 tp_fade_bottom">--}}
                            {{--                            <img src="{{ asset('assets/images/about/home2/shape.png') }}" alt="Image Not Found" class="inner-img-shape">--}}
                        </div>
                    </div>

                </div>
            </div>

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="h2_about-img mb-40 pe-1">
                            <img src="{{ asset('assets/images/banner/home1/Clip5_ContextAware.gif') }}"
                                 alt="Image Not Found" class="tp_fade_right img-thumbnail">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="h2_about-content mb-40">
                            <div class="inner_section-area mb-40">
                                <span class="inner_section-subtitle tp_subtitle_anim">Informs</span>
                                <h2 class="inner_section-title tp_title_slideup inner_section-title tp_title_slideup-big mb-25">Informs about the status</h2>
                                <p class="inner_section-text tp_fade_bottom">Sed Mattis eros lectors, eu fermentum Felis laborites convallis. Nam Felis arco, sed <br> mi Faubus quips. Fusco id dui nil. Sed ac lorem a dolor incident suscept <br> Poetesqueo.</p>
                                <p class="inner_section-text mt-10 tp_fade_bottom">Sed Mattis eros lectors, eu fermentum Felis laborites convallis. Nam Felis arco, sed <br>  mi Faubus quips. Fusco id dui nil.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- Gifs area end -->

        <!-- blog area start -->
        <section class="blog-area pt-140 pb-110">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-area text-center mb-50">
                            <span class="section-subtitle tp_fade_left">Resources</span>
                            <h2 class="section-title tp_title_slideup mb-0">Watch Our Latest Blog News</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left">
                        <div class="blog-item mb-30">
                            <div class="blog-img">
                                <a href="{{ url('blog-details') }}"><img src="{{ asset('assets/images/blog/home1/1.png') }}" alt="Image Not Found"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-content-meta">
                                    <a href="#">Creative</a>
                                    <span><i class="fa-light fa-calendar-days"></i>April 18, 2024</span>
                                </div>
                                <h4 class="blog-content-title">
                                    <a href="{{ url('blog-details') }}">Exploring The Power Of AI Text Generator</a>
                                </h4>
                                <a href="{{ url('blog-details') }}" class="blog-content-btn">Learn More<i class="fa-light fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay=".8">
                        <div class="blog-item mb-30">
                            <div class="blog-img">
                                <a href="{{ url('blog-details') }}"><img src="{{ asset('assets/images/blog/home1/2.png') }}" alt="Image Not Found"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-content-meta">
                                    <a href="#">Animation</a>
                                    <span><i class="fa-light fa-calendar-days"></i>June 18, 2024</span>
                                </div>
                                <h4 class="blog-content-title">
                                    <a href="{{ url('blog-details') }}">The 6 Types Of Menus For Your Business</a>
                                </h4>
                                <a href="{{ url('blog-details') }}" class="blog-content-btn">Learn More<i class="fa-light fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 tp_fade_left" data-fade-from="left" data-delay="1.1">
                        <div class="blog-item mb-30">
                            <div class="blog-img">
                                <a href="{{ url('blog-details') }}"><img src="{{ asset('assets/images/blog/home1/3.png') }}" alt="Image Not Found"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-content-meta">
                                    <a href="#">Creative</a>
                                    <span><i class="fa-light fa-calendar-days"></i>April 18, 2024</span>
                                </div>
                                <h4 class="blog-content-title">
                                    <a href="{{ url('blog-details') }}">Exploring The Power Of AI Text Generator</a>
                                </h4>
                                <a href="{{ url('blog-details') }}" class="blog-content-btn">Learn More<i class="fa-light fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog area end -->

        <!-- About Us start -->
{{--        <section class="blog-area pt-140 pb-110">--}}
{{--            <div class="container">--}}
{{--                <div class="row justify-content-center">--}}
{{--                    <div class="col-12">--}}
{{--                        <div class="section-area text-center mb-50">--}}
{{--                            <span class="section-subtitle tp_fade_left">ABOUT</span>--}}
{{--                            <h2 class="section-title tp_title_slideup mb-0">Our Team</h2>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
        <!-- About Us end -->

        <!-- team area start -->
        <section class="inner_team-area pb-110">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-area text-center mb-50">
                            <span class="section-subtitle tp_fade_left">ABOUT</span>
                            <h2 class="section-title tp_title_slideup mb-0">Our Team</h2>
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

        </section>
        <!-- team area end -->
    </main>
@endsection

@section('footer')
    <x-footer/>
@endsection
