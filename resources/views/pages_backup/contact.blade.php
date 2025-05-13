@extends('layouts.layout')

<?php
    $title = 'Contacts';
    $subTitle = 'Home';
?>

@section('content')
    <!-- contact area start -->
    <section class="contact-area pt-140 pb-140">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-5 col-xl-6">
                    <div class="inner_section-area mb-50 text-center">
                        <span class="inner_section-subtitle tp_subtitle_anim">LET’S TALK</span>
                        <h2 class="inner_section-title tp_title_slideup mb-30">Engage in conversation with skilled engineers.</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-30 tp_fade_left" data-fade-from="left">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fa-solid fa-message-lines"></i>
                        </div>
                        <div class="contact-content">
                            <h4 class="contact-content-title">Chat with us.</h4>
                            <p>Monday - Friday : 9am to 6pm.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30 tp_fade_left" data-fade-from="left" data-delay=".6">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fa-solid fa-phone-arrow-up-right"></i>
                        </div>
                        <div class="contact-content">
                            <h4 class="contact-content-title">Give us a call</h4>
                            <a href="tel:+480-555-0103">+480-555-0103</a>
                            <a href="tel:+239-555-0108">+239-555-0108</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30 tp_fade_left" data-fade-from="left" data-delay=".9">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fa-solid fa-envelope-open"></i>
                        </div>
                        <div class="contact-content">
                            <h4 class="contact-content-title">Email with us.</h4>
                            <a href="mailto:support.young@example.com">support.young@example.com</a>
                            <a href="mailto:bill.robert@example.com">bill.robert@example.com</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-bottom pt-105">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-bottom-left">
                            <div class="inner_section-area mb-50">
                                <span class="inner_section-subtitle tp_subtitle_anim">GET IN TOUCH</span>
                                <h2 class="inner_section-title tp_title_slideup mb-0">Connect with & ignite <br> the conversation!</h2>
                            </div>
                            <div class="contact-map tp_fade_right">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14599.593481274613!2d90.42342665!3d23.8222127!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1701453167946!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 tp_fade_left">
                        <div class="contact-form mt-40 mt-lg-0">
                            <h3 class="contact-form-title">Fillup the form</h3>
                            <form action="#">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-12 col-md-6">
                                        <div class="contact-form-item mb-25">
                                            <input type="text" placeholder="Fast Name">
                                            <i class="fa-light fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-12 col-md-6">
                                        <div class="contact-form-item mb-25">
                                            <input type="text" placeholder="Last Name">
                                            <i class="fa-light fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="contact-form-item mb-25">
                                            <input type="email" placeholder="Your Email">
                                            <i class="fa-light fa-envelope"></i>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="contact-form-item mb-25">
                                            <input type="text" placeholder="Phone Number">
                                            <i class="fa-light fa-phone"></i>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="contact-form-item">
                                            <select name="select" class="subject-option has-nice-select  mb-25">
                                                <option value="1">Subject</option>
                                                <option value="2">Subject 2</option>
                                                <option value="3">Subject 3</option>
                                                <option value="4">Subject 4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="contact-form-item mb-25">
                                            <textarea name="message" placeholder="Type your message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="contact-form-item pt-10">
                                            <button type="submit">Set In Touch</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact area end -->
@endsection
