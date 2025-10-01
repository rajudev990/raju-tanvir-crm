 <!-- <header id="header" class="header d-flex align-items-center sticky-top {{ Route::is('step1') || Route::is('step2') || Route::is('step3') || Route::is('step4') || Route::is('step5') || Route::is('step6') || Route::is('step7') || Route::is('step8') || Route::is('step9') || Route::is('parents.update') || Route::is('studetn-info-update') ? 'd-none' : ''  }}">
     <div class="container-fluid container-xl position-relative d-flex align-items-center">

         <a href="{{ url('/') }}" class="logo d-flex align-items-center m-auto">
             <img src="{{ asset('frontend/') }}/assets/img/logo.png" alt="">
         </a>

         {{--<nav id="navmenu" class="m-auto navmenu">
             <ul>
                 <li><a target="_blank" href="https://alrushd.co.uk/primary/" class="active">Primary<br></a></li>
                 <li><a target="_blank" href="https://alrushd.co.uk/seconday-school-ks3/">Seconday</a></li>
                 <li><a target="_blank" href="https://alrushd.co.uk/advanced-levels/">Sixth Form</a></li>
                 <li><a target="_blank" href="https://alrushd.co.uk/about-us/">About Us</a></li>
             </ul>
             <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
         </nav>

         <a class="btn-getstarted" target="_blank" href="https://alrushd.co.uk/contact/">ENQUIRE</a>
         <a class="btn-getstarted register" href="{{ url('/') }}">APPLY NOW</a>--}}

     </div>
 </header> -->

 <a href="{{ url('/') }}" class="logo d-flex align-items-center m-auto" style="background: #f6f9fc;padding-top:10px;padding-bottom:10px;">
    <!-- Uncomment the line below if you also wish to use an image logo -->
    <img src="{{ asset('frontend/') }}/assets/img/logo.png" alt="" width="70" style="margin:auto;">
    <!--<span>.</span>-->
</a>