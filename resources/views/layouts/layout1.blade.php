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
 
  </body>
</html>
