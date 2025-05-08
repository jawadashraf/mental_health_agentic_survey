<!DOCTYPE html>
<html lang="en">
<x-head/>
  <body>

    <!-- Cursor start -->
    <x-cursor/>
    <!-- Cursor end -->

    <!-- back to top start -->
    <x-backtotop/>
    <!-- back to top end -->

    <!-- modal-search-start -->
    <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <a href="javascript:void(0)" type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
        </a>
        <div class="modal-dialog" role="document">
           <div class="modal-content">
              <form>
                    <input type="text" placeholder="Search here...">
                    <button>
                       <i class="fa fa-search"></i>
                    </button>
              </form>
           </div>
        </div>
    </div>
    <!-- modal-search-end -->

    <!-- sidebar-information-area-start -->
    <x-sidebar-information/>
    <!-- sidebar-information-area-end -->

    <div class="has-smooth" id="has_smooth"></div>

    <div id="smooth-wrapper">
        <div id="smooth-content">
            <div class="body-wrapper">
                <x-header/>
                <main>
                    <!-- breadcrumb area start -->
                    <section class="breadcrumb-area bg-default"
                             data-background="assets/images/breadcrumb/breadcrumb-bg.jpg">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="breadcrumb-content text-center">
                                        <h2 class="breadcrumb-title tp_has_text_reveal_anim">{{$title}}</h2>
                                        <div class="breadcrumb-list tp_fade_left">
                                            <a href="{{ url('index') }}"><i class="fa-light fa-house"></i>{{$subTitle}}</a>
                                            <span>{{$title}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="breadcrumb-shape">
{{--                            <img src="{{ asset('assets/images/breadcrumb/shape-1.png') }}" alt="" class="breadcrumb-shape-1" data-speed="0.9">--}}
{{--                            <img src="{{ asset('assets/images/breadcrumb/shape-2.png') }}" alt="" class="breadcrumb-shape-2" data-speed="0.8">--}}
{{--                            <img src="{{ asset('assets/images/breadcrumb/shape-3.png') }}" alt="" class="breadcrumb-shape-3" data-speed="0.9">--}}
                            <img src="{{ asset('assets/images/breadcrumb/circle.png') }}" alt="" class="breadcrumb-shape-4">
                        </div>
                    </section>
                    <!-- breadcrumb area end -->

                     @yield('content')
                </main>
                <!-- footer area start -->
                <x-footer/>
                <!-- footer area end -->

            </div>
        </div>
    </div>

    <x-scripts/>

  </body>
</html>
