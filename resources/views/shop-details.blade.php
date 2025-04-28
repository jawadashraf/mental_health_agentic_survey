@extends('layouts.layout')

<?php
    $title = 'Shop Details';
    $subTitle = 'Home';
?>

@section('content')
    <!-- shop details area start -->
    <section class="shop_details-area pt-140 pb-140">
        <div class="shop_details-top pb-120">
            <div class="container">
                <div class="shop_details-wrap">
                    <div class="shop_details-img tp_fade_right">
                        <img src="{{ asset('assets/images/shop/common/shop-details.png') }}" alt="">
                    </div>
                    <div class="shop_details-content">
                        <div class="shop_details-head">
                            <div class="shop_details-head-left">
                                <h4 class="shop_details-head-title tp_has_text_reveal_anim">CreatBot Mindful Arts</h4>
                                <div class="shop_details-head-rating tp_fade_bottom">
                                    <ul>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                        <li><i class="fa-solid fa-star"></i></li>
                                    </ul>
                                    <span>(1 Customer review)</span>
                                </div>
                            </div>
                            <div class="shop_details-head-right tp_fade_left">
                                <p>Price : $12.05</p>
                            </div>
                        </div>
                        <p class="shop_details-content-text tp_fade_bottom">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin liter ature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginian in 45 BC.</p>
                        <div class="shop_details-action">
                            <div class="shop_details-action-box quantity-box tp_fade_bottom">
                                <a  href="#0" class="minus"><i class="fa-regular fa-minus"></i></a>
                                <input type="text" readonly name="quantity" value="1">
                                <a href="#0" class="plus"><i class="fa-regular fa-plus"></i></a>
                            </div>
                            <a href="#" class="shop_details-action-cart tp_fade_bottom"><i class="fa-light fa-cart-shopping"></i>Add To Cart</a>
                            <a href="#" class="shop_details-action-buy tp_fade_bottom">Buy Now</a>
                        </div>
                        <div class="shop_details-action-2 tp_fade_bottom">
                            <a href="#"><i class="fa-light fa-heart"></i>Add To Wishlist</a>
                            <a href="#"><i class="fa-light fa-arrow-right-arrow-left"></i>Add To Compare</a>
                        </div>
                        <div class="shop_details-payment tp_fade_bottom">
                            <a href="#"><img src="{{ asset('assets/images/shop/common/visa.png') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('assets/images/shop/common/maestro.png') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('assets/images/shop/common/mastercard.png') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('assets/images/shop/common/cirrus.png') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('assets/images/shop/common/unionpay.png') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('assets/images/shop/common/discover.png') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('assets/images/shop/common/jcb.png') }}" alt=""></a>
                        </div>
                        <div class="shop_details-meta">
                            <span class="tp_fade_left">SKU: <a href="#">Fusce ultrices</a></span>
                            <span class="tp_fade_left">Categories: <a href="#">Suis viverra non</a></span>
                        </div>
                        <div class="shop_details-order">
                            <p class="tp_fade_left">Worldwide Shipping in all order $200</p>
                            <p class="tp_fade_left">Delivery in 3-4 working days Shipping & Return</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shop_details-bottom">
            <div class="container">
                <div class="shop_details-tab">
                    <ul class="nav nav-tabs tp_fade_bottom" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                        <a href="#" class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" role="tab" aria-controls="home-tab-pane" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item" role="presentation">
                        <a href="#" class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Review(5)</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="shop_details-description">
                                <p class="shop_details-description-text tp_fade_bottom">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.All the Lorem Ipsum generators.</p>
                                <p class="shop_details-description-text tp_fade_bottom">All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model.</p>
                                <ul class="shop_details-description-list tp_fade_bottom">
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.6776 0L16.0005 0.466368C14.6373 1.50672 13.0947 3.0852 11.4086 5.27353C9.7225 7.42599 8.43102 9.43496 7.53416 11.3363L6.81667 11.8027C6.20681 12.1973 5.81219 12.5202 5.59695 12.7354C5.5252 12.4484 5.34583 11.9462 5.05883 11.2646L4.77183 10.6188C4.37722 9.72195 4.01847 9.04034 3.6956 8.60985C3.37273 8.17935 2.97811 7.89236 2.5835 7.74886C3.26511 7.03138 3.91085 6.63676 4.48484 6.63676C4.98708 6.63676 5.5252 7.31837 6.13506 8.64572L6.42206 9.32733C7.49829 7.49774 8.89739 5.70403 10.6194 3.98206C12.3772 2.26009 14.0633 0.932733 15.6776 0Z" fill="currentColor"/>
                                            <path d="M12.1973 3.80264C10.7982 2.40354 9.11209 1.72192 7.139 1.72192C5.16591 1.72192 3.47981 2.40354 2.08071 3.80264C0.681614 5.20174 0 6.88783 0 8.86092C0 10.834 0.681614 12.5201 2.08071 13.9192C3.47981 15.3183 5.16591 15.9999 7.139 15.9999C9.11209 15.9999 10.7982 15.3183 12.1973 13.9192C13.5964 12.5201 14.278 10.834 14.278 8.86092C14.278 6.88783 13.5605 5.20174 12.1973 3.80264ZM11.1569 12.8789C10.0448 13.991 8.6816 14.5649 7.10313 14.5649C5.52465 14.5649 4.16143 13.991 3.04932 12.8789C1.93722 11.7667 1.36323 10.4035 1.36323 8.82505C1.36323 7.24658 1.93722 5.88335 3.04932 4.77125C4.16143 3.65914 5.52465 3.08515 7.10313 3.08515C8.6816 3.08515 10.0448 3.65914 11.1569 4.77125C12.269 5.88335 12.843 7.24658 12.843 8.82505C12.843 10.4394 12.269 11.7667 11.1569 12.8789Z" fill="currentColor"/>
                                        </svg>
                                        Many variations of passages of Lorem Ipsum available, but the majority have suffered.</li>
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.6776 0L16.0005 0.466368C14.6373 1.50672 13.0947 3.0852 11.4086 5.27353C9.7225 7.42599 8.43102 9.43496 7.53416 11.3363L6.81667 11.8027C6.20681 12.1973 5.81219 12.5202 5.59695 12.7354C5.5252 12.4484 5.34583 11.9462 5.05883 11.2646L4.77183 10.6188C4.37722 9.72195 4.01847 9.04034 3.6956 8.60985C3.37273 8.17935 2.97811 7.89236 2.5835 7.74886C3.26511 7.03138 3.91085 6.63676 4.48484 6.63676C4.98708 6.63676 5.5252 7.31837 6.13506 8.64572L6.42206 9.32733C7.49829 7.49774 8.89739 5.70403 10.6194 3.98206C12.3772 2.26009 14.0633 0.932733 15.6776 0Z" fill="currentColor"/>
                                            <path d="M12.1973 3.80264C10.7982 2.40354 9.11209 1.72192 7.139 1.72192C5.16591 1.72192 3.47981 2.40354 2.08071 3.80264C0.681614 5.20174 0 6.88783 0 8.86092C0 10.834 0.681614 12.5201 2.08071 13.9192C3.47981 15.3183 5.16591 15.9999 7.139 15.9999C9.11209 15.9999 10.7982 15.3183 12.1973 13.9192C13.5964 12.5201 14.278 10.834 14.278 8.86092C14.278 6.88783 13.5605 5.20174 12.1973 3.80264ZM11.1569 12.8789C10.0448 13.991 8.6816 14.5649 7.10313 14.5649C5.52465 14.5649 4.16143 13.991 3.04932 12.8789C1.93722 11.7667 1.36323 10.4035 1.36323 8.82505C1.36323 7.24658 1.93722 5.88335 3.04932 4.77125C4.16143 3.65914 5.52465 3.08515 7.10313 3.08515C8.6816 3.08515 10.0448 3.65914 11.1569 4.77125C12.269 5.88335 12.843 7.24658 12.843 8.82505C12.843 10.4394 12.269 11.7667 11.1569 12.8789Z" fill="currentColor"/>
                                        </svg>
                                        Many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</li>
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.6776 0L16.0005 0.466368C14.6373 1.50672 13.0947 3.0852 11.4086 5.27353C9.7225 7.42599 8.43102 9.43496 7.53416 11.3363L6.81667 11.8027C6.20681 12.1973 5.81219 12.5202 5.59695 12.7354C5.5252 12.4484 5.34583 11.9462 5.05883 11.2646L4.77183 10.6188C4.37722 9.72195 4.01847 9.04034 3.6956 8.60985C3.37273 8.17935 2.97811 7.89236 2.5835 7.74886C3.26511 7.03138 3.91085 6.63676 4.48484 6.63676C4.98708 6.63676 5.5252 7.31837 6.13506 8.64572L6.42206 9.32733C7.49829 7.49774 8.89739 5.70403 10.6194 3.98206C12.3772 2.26009 14.0633 0.932733 15.6776 0Z" fill="currentColor"/>
                                            <path d="M12.1973 3.80264C10.7982 2.40354 9.11209 1.72192 7.139 1.72192C5.16591 1.72192 3.47981 2.40354 2.08071 3.80264C0.681614 5.20174 0 6.88783 0 8.86092C0 10.834 0.681614 12.5201 2.08071 13.9192C3.47981 15.3183 5.16591 15.9999 7.139 15.9999C9.11209 15.9999 10.7982 15.3183 12.1973 13.9192C13.5964 12.5201 14.278 10.834 14.278 8.86092C14.278 6.88783 13.5605 5.20174 12.1973 3.80264ZM11.1569 12.8789C10.0448 13.991 8.6816 14.5649 7.10313 14.5649C5.52465 14.5649 4.16143 13.991 3.04932 12.8789C1.93722 11.7667 1.36323 10.4035 1.36323 8.82505C1.36323 7.24658 1.93722 5.88335 3.04932 4.77125C4.16143 3.65914 5.52465 3.08515 7.10313 3.08515C8.6816 3.08515 10.0448 3.65914 11.1569 4.77125C12.269 5.88335 12.843 7.24658 12.843 8.82505C12.843 10.4394 12.269 11.7667 11.1569 12.8789Z" fill="currentColor"/>
                                        </svg>
                                        Variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</li>
                                    <li>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.6776 0L16.0005 0.466368C14.6373 1.50672 13.0947 3.0852 11.4086 5.27353C9.7225 7.42599 8.43102 9.43496 7.53416 11.3363L6.81667 11.8027C6.20681 12.1973 5.81219 12.5202 5.59695 12.7354C5.5252 12.4484 5.34583 11.9462 5.05883 11.2646L4.77183 10.6188C4.37722 9.72195 4.01847 9.04034 3.6956 8.60985C3.37273 8.17935 2.97811 7.89236 2.5835 7.74886C3.26511 7.03138 3.91085 6.63676 4.48484 6.63676C4.98708 6.63676 5.5252 7.31837 6.13506 8.64572L6.42206 9.32733C7.49829 7.49774 8.89739 5.70403 10.6194 3.98206C12.3772 2.26009 14.0633 0.932733 15.6776 0Z" fill="currentColor"/>
                                            <path d="M12.1973 3.80264C10.7982 2.40354 9.11209 1.72192 7.139 1.72192C5.16591 1.72192 3.47981 2.40354 2.08071 3.80264C0.681614 5.20174 0 6.88783 0 8.86092C0 10.834 0.681614 12.5201 2.08071 13.9192C3.47981 15.3183 5.16591 15.9999 7.139 15.9999C9.11209 15.9999 10.7982 15.3183 12.1973 13.9192C13.5964 12.5201 14.278 10.834 14.278 8.86092C14.278 6.88783 13.5605 5.20174 12.1973 3.80264ZM11.1569 12.8789C10.0448 13.991 8.6816 14.5649 7.10313 14.5649C5.52465 14.5649 4.16143 13.991 3.04932 12.8789C1.93722 11.7667 1.36323 10.4035 1.36323 8.82505C1.36323 7.24658 1.93722 5.88335 3.04932 4.77125C4.16143 3.65914 5.52465 3.08515 7.10313 3.08515C8.6816 3.08515 10.0448 3.65914 11.1569 4.77125C12.269 5.88335 12.843 7.24658 12.843 8.82505C12.843 10.4394 12.269 11.7667 11.1569 12.8789Z" fill="currentColor"/>
                                        </svg>
                                        Eore variations of passages of Lorem Ipsum available, but the majority have.</li>
                                </ul>
                                <p class="shop_details-description-text mb-0 tp_fade_bottom">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.All the Lorem Ipsum generators All the Lorem Ipsum generators on the Internet.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <div class="shop_details-review">
                                <div class="row">
                                    <div class="col-lg-8 tp_fade_right">
                                        <div class="shop_details-review-left mb-35 mb-lg-0">
                                            <div class="shop_details-review-item mb-25">
                                                <div class="shop_details-review-img">
                                                    <img src="{{ asset('assets/images/shop/common/admin-1.png') }}" alt="">
                                                </div>
                                                <div class="shop_details-review-content">
                                                    <div class="shop_details-review-content-top">
                                                        <h6>Inverness McKenzie</h6>
                                                        <span>May 8, 2023</span>
                                                    </div>
                                                    <ul class="shop_details-review-content-rating">
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                    </ul>
                                                    <p>Lorem ipsum is simply free text used by copytyping refreshing. Neque porro est is a re ipsu mqu isqued inventore veritatis et quasi architecto beatae.</p>
                                                </div>
                                            </div>
                                            <div class="shop_details-review-item mb-25">
                                                <div class="shop_details-review-img">
                                                    <img src="{{ asset('assets/images/shop/common/admin-2.png') }}" alt="">
                                                </div>
                                                <div class="shop_details-review-content">
                                                    <div class="shop_details-review-content-top">
                                                        <h6>Junayed  McKenzie</h6>
                                                        <span>May 8, 2023</span>
                                                    </div>
                                                    <ul class="shop_details-review-content-rating">
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                    </ul>
                                                    <p>Lorem ipsum is simply free text used by copytyping refreshing. Neque porro est is a re ipsu mqu isqued inventore veritatis et quasi architecto beatae.</p>
                                                </div>
                                            </div>
                                            <div class="shop_details-review-item mb-25">
                                                <div class="shop_details-review-img">
                                                    <img src="{{ asset('assets/images/shop/common/admin-3.png') }}" alt="">
                                                </div>
                                                <div class="shop_details-review-content">
                                                    <div class="shop_details-review-content-top">
                                                        <h6>Robert McKenzie</h6>
                                                        <span>June 8, 2023</span>
                                                    </div>
                                                    <ul class="shop_details-review-content-rating">
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                    </ul>
                                                    <p>Lorem ipsum is simply free text used by copytyping refreshing. Neque porro est is a re ipsu mqu isqued inventore veritatis et quasi architecto beatae.</p>
                                                </div>
                                            </div>
                                            <div class="pagination-area pt-25 d-flex justify-content-end">
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
                                    <div class="col-lg-4 tp_fade_left">
                                        <div class="shop_details-review-right">
                                            <h5 class="shop_details-review-right-title">Write A Review</h5>
                                            <div class="shop_details-review-right-rating">
                                                <span>Select Your Rating :</span>
                                                <ul>
                                                    <li><i class="fa-solid fa-star"></i></li>
                                                    <li><i class="fa-solid fa-star"></i></li>
                                                    <li><i class="fa-solid fa-star"></i></li>
                                                    <li><i class="fa-solid fa-star"></i></li>
                                                    <li><i class="fa-solid fa-star"></i></li>
                                                </ul>
                                            </div>
                                            <form action="#" class="shop_details-form">
                                                <div class="shop_details-form-item mb-20">
                                                    <input type="text" placeholder="Your Name">
                                                    <i class="fa-light fa-user"></i>
                                                </div>
                                                <div class="shop_details-form-item mb-20">
                                                    <input type="email" placeholder="Your Email">
                                                    <i class="fa-light fa-envelope"></i>
                                                </div>
                                                <div class="shop_details-form-item mb-25">
                                                    <textarea name="message" placeholder="Write you Message"></textarea>
                                                </div>
                                                <div class="shop_details-form-item">
                                                    <button type="submit">Submit Review</button>
                                                </div>
                                            </form>
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
@endsection
