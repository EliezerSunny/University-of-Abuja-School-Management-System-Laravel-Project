
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
 
  
    
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Uniabuja integrated portal">
  <title>404 Page Not Found || Uniabuja - Portal</title>
  <link rel="icon" type="image/png" href="{{asset('assets/images/logo/Uniabuja.png')}}">
  <link rel="preconnect" href="{{url('https://fonts.googleapis.com/')}}">
  <link rel="preconnect" href="{{url('https://fonts.gstatic.com/')}}" crossorigin>
  <link href="{{url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;display=swap')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('assets/css/rt-plugins.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">

  
  <script src="{{asset('assets/js/store.js')}}"></script>

 <!-- scripts -->
<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
  <script src="{{asset('assets/js/rt-plugins.js')}}"></script>
  <script src="{{asset('assets/js/app.js')}}"></script> 

  <script>
    var exitTime = {!! json_encode($countDownTime->coursereg_timer) !!};
  </script>

  <script src="{{asset('assets/js/script.js')}}"></script> 
</head>












<body class=" font-inter dashcode-app" id="body_class">
  <!-- [if IE]> <p class="browserupgrade"> You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security. </p> <![endif] -->
  <main class="app-wrapper">



























    <!-- BEGIN: Sidebar -->
    <!-- BEGIN: Sidebar -->
    <div class="sidebar-wrapper group w-0 hidden xl:w-[248px] xl:block">
      <div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden"></div>
      <div class="logo-segment">
          
        <a class="flex items-center" href="{{route('login.get')}}">
          <img src="{{asset('assets/images/logo/banner (1).png')}}" class="black_logo" alt="logo">
          <img src="{{asset('assets/images/logo/banner (1).png')}}" class="white_logo" alt="logo">
          {{-- <span class="ltr:ml-3 rtl:mr-3 text-xl font-Inter font-bold text-slate-900 dark:text-white">Uniabuja</span> --}}
        </a>
        <!-- Sidebar Type Button -->
        <div id="sidebar_type" class="cursor-pointer text-slate-900 dark:text-white text-lg">
          <iconify-icon class="sidebarDotIcon extend-icon text-slate-900 dark:text-slate-200" icon="fa-regular:dot-circle"></iconify-icon>
          <iconify-icon class="sidebarDotIcon collapsed-icon text-slate-900 dark:text-slate-200" icon="material-symbols:circle-outline"></iconify-icon>
        </div>
        <button class="sidebarCloseIcon text-2xl inline-block md:hidden">
          <iconify-icon class="text-slate-900 dark:text-slate-200" icon="clarity:window-close-line"></iconify-icon>
        </button>
      </div>
      <div id="nav_shadow" class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none
      opacity-0"></div>
      <div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] z-50" id="sidebar_menus">
          
        <ul class="sidebar-menu">
          <li class="sidebar-menu-title">404 Page Not Found</li>
          
          
          
          

        </ul>

        
      </div>
    </div>
    <!-- End: Sidebar -->
    <!-- End: Sidebar -->

















    


















<div class="flex flex-col justify-between min-h-screen">
  <div>





  </div>
</div>

 
</main>
  




{{-- Footer --}}

<footer id="footer">
  <div class="site-footer px-6 bg-white dark:bg-slate-800 text-slate-500 dark:text-slate-300 py-4 ltr:ml-[248px] rtl:mr-[248px]">
    <div class="grid md:grid-cols-2 grid-cols-1 md:gap-5">
      <div class="text-center ltr:md:text-start rtl:md:text-right text-sm">
        
        ©
        <span id="thisYear"></span>
        Uniabuja, All rights Reserved
      </div>
      <div class="ltr:md:text-right rtl:md:text-end text-center text-sm">
        Made by
        <a href="{{url('https://twitter.com/eliezersunny')}}" target="_blank" class="text-primary-500 font-semibold">
          Eliezer
        </a>
      </div>
    </div>
  </div>
</footer>



<div class="bg-white bg-no-repeat custom-dropshadow footer-bg dark:bg-slate-700 flex justify-around items-center
  backdrop-filter backdrop-blur-[40px] fixed left-0 bottom-0 w-full z-[9999] bothrefm-0 py-[12px] px-4 md:hidden">
      <a href="{{('/chat')}}">
        <div>
          <span class="relative cursor-pointer rounded-full text-[20px] flex flex-col items-center justify-center mb-1 dark:text-white
        text-slate-900 ">
      <iconify-icon icon="heroicons-outline:mail"></iconify-icon>
      <span class="absolute right-[17px] lg:hrefp-0 -hrefp-2 h-4 w-4 bg-red-500 text-[8px] font-semibold flex flex-col items-center
          justify-center rounded-full text-white z-[99]">
        1
      </span>
          </span>
          <span class="block text-[11px] text-slate-600 dark:text-slate-300">
      Messages
    </span>
        </div>
      </a>
      <a href="{{url('/change_picture')}}" class="relative bg-white bg-no-repeat backdrop-filter backdrop-blur-[40px] rounded-full footer-bg dark:bg-slate-700
    h-[65px] w-[65px] z-[-1] -mt-[40px] flex justify-center items-center">
        <div class="h-[50px] w-[50px] rounded-full relative left-[0px] hrefp-[0px] custom-dropshadow">
          <img src="{{asset('assets/images/students/' . Auth::guard('web')->user()->picture)}}" alt="{{Auth::guard('web')->user()->name}}" title="{{Auth::guard('web')->user()->name}}" class="w-full h-full rounded-full border-2 border-slate-100">
        </div>
      </a>
      <a href="#">
        <div>
          <span class=" relative cursor-pointer rounded-full text-[20px] flex flex-col items-center justify-center mb-1 dark:text-white
        text-slate-900">
      <iconify-icon icon="heroicons-outline:bell"></iconify-icon>
      <span class="absolute right-[19px] lg:hrefp-0 -hrefp-2 h-4 w-4 bg-red-500 text-[8px] font-semibold flex flex-col items-center
          justify-center rounded-full text-white z-[99]">
        1
      </span>
          </span>
          <span class=" block text-[11px] text-slate-600 dark:text-slate-300">
      Notifications
    </span>
        </div>
      </a>
    </div>


    <script src="{{url('https://js.paystack.co/v1/inline.js')}}"></script> 
    <script src="{{asset('assets/js/payment.js')}}">
        
        
        <!-- scripts -->
  <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
  <script src="{{asset('assets/js/rt-plugins.js')}}"></script>
  <script src="{{asset('assets/js/app.js')}}"></script>
  
  
    </script>
    
{{-- Footer --}}
  
</body>



</html>
