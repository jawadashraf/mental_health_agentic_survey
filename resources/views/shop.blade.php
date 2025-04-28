@extends('layouts.layout')

<?php
    $title = 'Shop';
    $subTitle = 'Home';
?>

@section('content')
    <!-- shop area start -->
    <section class="h5_shop-area pb-140 pt-140">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_left" data-fade-from="bottom">
                    <div class="h5_shop-item mb-30">
                        <div class="h5_shop-img">
                            <img src="{{ asset('assets/images/gallery/1.png') }}" alt="">
                            <div class="h5_shop-premium-icon">
                                <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                    <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <div class="h5_shop-img-icon">
                                <a href="#"><i class="fa-light fa-eye"></i></a>
                                <a href="#"><i class="fa-light fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="h5_shop-content">
                            <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                            <div class="h5_shop-content-bottom">
                                <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_left" data-fade-from="bottom" data-delay=".2">
                    <div class="h5_shop-item mb-30">
                        <div class="h5_shop-img">
                            <img src="{{ asset('assets/images/gallery/2.png') }}" alt="">
                            <div class="h5_shop-premium-icon">
                                <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                    <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <div class="h5_shop-img-icon">
                                <a href="#"><i class="fa-light fa-eye"></i></a>
                                <a href="#"><i class="fa-light fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="h5_shop-content">
                            <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                            <div class="h5_shop-content-bottom">
                                <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_left" data-fade-from="bottom" data-delay=".4">
                    <div class="h5_shop-item mb-30">
                        <div class="h5_shop-img">
                            <img src="{{ asset('assets/images/gallery/3.png') }}" alt="">
                            <div class="h5_shop-premium-icon">
                                <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                    <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <div class="h5_shop-img-icon">
                                <a href="#"><i class="fa-light fa-eye"></i></a>
                                <a href="#"><i class="fa-light fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="h5_shop-content">
                            <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                            <div class="h5_shop-content-bottom">
                                <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_left" data-fade-from="bottom" data-delay=".6">
                    <div class="h5_shop-item mb-30">
                        <div class="h5_shop-img">
                            <img src="{{ asset('assets/images/gallery/4.png') }}" alt="">
                            <div class="h5_shop-premium-icon">
                                <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                    <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <div class="h5_shop-img-icon">
                                <a href="#"><i class="fa-light fa-eye"></i></a>
                                <a href="#"><i class="fa-light fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="h5_shop-content">
                            <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                            <div class="h5_shop-content-bottom">
                                <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_left" data-fade-from="bottom" data-delay=".8">
                    <div class="h5_shop-item mb-30">
                        <div class="h5_shop-img">
                            <img src="{{ asset('assets/images/gallery/5.png') }}" alt="">
                            <div class="h5_shop-premium-icon">
                                <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                    <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <div class="h5_shop-img-icon">
                                <a href="#"><i class="fa-light fa-eye"></i></a>
                                <a href="#"><i class="fa-light fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="h5_shop-content">
                            <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                            <div class="h5_shop-content-bottom">
                                <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_left" data-fade-from="bottom" data-delay="1">
                    <div class="h5_shop-item mb-30">
                        <div class="h5_shop-img">
                            <img src="{{ asset('assets/images/gallery/6.png') }}" alt="">
                            <div class="h5_shop-premium-icon">
                                <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                    <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <div class="h5_shop-img-icon">
                                <a href="#"><i class="fa-light fa-eye"></i></a>
                                <a href="#"><i class="fa-light fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="h5_shop-content">
                            <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                            <div class="h5_shop-content-bottom">
                                <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_left" data-fade-from="bottom" data-delay="1.2">
                    <div class="h5_shop-item mb-30">
                        <div class="h5_shop-img">
                            <img src="{{ asset('assets/images/gallery/7.png') }}" alt="">
                            <div class="h5_shop-premium-icon">
                                <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                    <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <div class="h5_shop-img-icon">
                                <a href="#"><i class="fa-light fa-eye"></i></a>
                                <a href="#"><i class="fa-light fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="h5_shop-content">
                            <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                            <div class="h5_shop-content-bottom">
                                <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_left" data-fade-from="bottom" data-delay="1.4">
                    <div class="h5_shop-item mb-30">
                        <div class="h5_shop-img">
                            <img src="{{ asset('assets/images/gallery/8.png') }}" alt="">
                            <div class="h5_shop-premium-icon">
                                <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                    <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <div class="h5_shop-img-icon">
                                <a href="#"><i class="fa-light fa-eye"></i></a>
                                <a href="#"><i class="fa-light fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="h5_shop-content">
                            <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                            <div class="h5_shop-content-bottom">
                                <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_left" data-fade-from="bottom" data-delay="1.6">
                    <div class="h5_shop-item mb-30">
                        <div class="h5_shop-img">
                            <img src="{{ asset('assets/images/gallery/9.png') }}" alt="">
                            <div class="h5_shop-premium-icon">
                                <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                    <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <div class="h5_shop-img-icon">
                                <a href="#"><i class="fa-light fa-eye"></i></a>
                                <a href="#"><i class="fa-light fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="h5_shop-content">
                            <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                            <div class="h5_shop-content-bottom">
                                <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_left" data-fade-from="bottom" data-delay="1.8">
                    <div class="h5_shop-item mb-30">
                        <div class="h5_shop-img">
                            <img src="{{ asset('assets/images/gallery/10.png') }}" alt="">
                            <div class="h5_shop-premium-icon">
                                <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                    <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <div class="h5_shop-img-icon">
                                <a href="#"><i class="fa-light fa-eye"></i></a>
                                <a href="#"><i class="fa-light fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="h5_shop-content">
                            <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                            <div class="h5_shop-content-bottom">
                                <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_left" data-fade-from="bottom" data-delay="2">
                    <div class="h5_shop-item mb-30">
                        <div class="h5_shop-img">
                            <img src="{{ asset('assets/images/gallery/11.png') }}" alt="">
                            <div class="h5_shop-premium-icon">
                                <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                    <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <div class="h5_shop-img-icon">
                                <a href="#"><i class="fa-light fa-eye"></i></a>
                                <a href="#"><i class="fa-light fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="h5_shop-content">
                            <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                            <div class="h5_shop-content-bottom">
                                <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 tp_fade_left" data-fade-from="bottom" data-delay="2.1">
                    <div class="h5_shop-item mb-30">
                        <div class="h5_shop-img">
                            <img src="{{ asset('assets/images/gallery/12.png') }}" alt="">
                            <div class="h5_shop-premium-icon">
                                <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.1197 0.0265846C10.0591 0.0482168 9.95525 0.100135 9.88603 0.143399C9.81681 0.190991 9.06832 1.26829 8.04727 2.79554C7.09977 4.21463 6.28206 5.41739 6.22582 5.46931C5.95758 5.71159 5.47301 5.77216 5.17016 5.5991C5.07497 5.54286 4.13612 4.85062 3.08046 4.0632C2.0248 3.27145 1.10326 2.58354 1.02538 2.54027C0.847992 2.43211 0.545138 2.42779 0.346119 2.53595C0.190366 2.61815 0 2.91668 0 3.07676C0 3.18492 1.24603 11.3187 1.27631 11.3966C1.30227 11.4788 19.4649 11.4788 19.4908 11.3966C19.5211 11.3187 20.7672 3.18492 20.7672 3.07676C20.7672 2.91668 20.5768 2.61815 20.421 2.53595C20.2263 2.42779 19.9192 2.43211 19.7461 2.53595C19.6682 2.58354 18.7164 3.28876 17.6218 4.10646C16.5315 4.9285 15.571 5.62074 15.4932 5.64669C15.1773 5.75918 14.775 5.68131 14.5413 5.46931C14.4851 5.41739 13.6631 4.21463 12.7199 2.79554C11.3873 0.801026 10.9633 0.195317 10.8422 0.121767C10.6735 0.0136051 10.3014 -0.0339861 10.1197 0.0265846Z" fill="currentColor"/>
                                    <path d="M1.26298 14.1223C1.27596 15.2212 1.28029 15.2905 1.37114 15.4635C1.48796 15.6842 1.72591 15.8789 1.94224 15.9481C2.1802 16.0173 18.5862 16.0173 18.8242 15.9481C19.0405 15.8789 19.2785 15.6842 19.3953 15.4635C19.4862 15.2905 19.4905 15.2212 19.5035 14.1223L19.5164 12.9671H10.3832H1.25L1.26298 14.1223Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <div class="h5_shop-img-icon">
                                <a href="#"><i class="fa-light fa-eye"></i></a>
                                <a href="#"><i class="fa-light fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="h5_shop-content">
                            <h5 class="h5_shop-content-title"><a href="#">CreatBot Mindful Arts</a></h5>
                            <div class="h5_shop-content-bottom">
                                <a href="#" class="h5_shop-content-price h5_shop-content-bottom-link">$12.05</a>
                                <a href="#" class="h5_shop-content-cart"><i class="fa-light fa-shopping-cart"></i> Add To Cart</a>
                            </div>
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
    <!-- shop area end -->
@endsection
