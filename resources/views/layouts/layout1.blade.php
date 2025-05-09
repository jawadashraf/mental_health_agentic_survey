<!DOCTYPE html>
<html lang="en">
  <x-head/>
  <body>

    <!-- Cursor start -->
{{--    <x-cursor/>--}}
    <!-- Cursor end -->

    <!-- back to top start -->
   <x-backtotop/>
    <!-- back to top end -->

    @yield('modal')

    <!-- sidebar-information-area-start -->
    <x-sidebar-information/>
    <!-- sidebar-information-area-end -->

    <div class="has-smooth" id="has_smooth"></div>

    <div id="smooth-wrapper">
        <div id="smooth-content">
            <div class="body-wrapper">

                @yield('header')

                @yield('content')

                @yield('footer')
            </div>
        </div>
    </div>


   <x-scripts/>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/681e09eac66711190f8d750a/1iqqlderj';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
  </body>
</html>
