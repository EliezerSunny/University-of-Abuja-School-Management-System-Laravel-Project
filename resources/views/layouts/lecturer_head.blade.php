<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Uniabuja integrated portal">
  <title>Dashboard || Uniabuja - Portal</title>
  <link rel="icon" type="image/png" href="{{asset('assets/images/logo/Uniabuja.png')}}">
  <link rel="preconnect" href="{{url('https://fonts.googleapis.com/')}}">
  <link rel="preconnect" href="{{url('https://fonts.gstatic.com/')}}" crossorigin>
  <link href="{{url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;display=swap')}}" rel="stylesheet">
  
  <link rel="stylesheet" href="{{asset('assets/css/rt-plugins.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">

  
  <script src="{{asset('assets/js/store.js')}}"></script>
  

 {{-- <!-- scripts -->
  <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
  <script src="{{asset('assets/js/rt-plugins.js')}}"></script>
  <script src="{{asset('assets/js/app.js')}}"></script> --}}

   <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  
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
        <a class="flex items-center" href="{{('/')}}">
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
          <li class="sidebar-menu-title">MENU</li>
          <li class="">
            <a href="{{('/lecturer/dashboard')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class=" nav-icon" icon="heroicons-outline:home"></iconify-icon>
            <span>Dashboard</span>
              </span>
              {{-- <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon> --}}
            </a>
          </li>

          <li class="">
            <a href="{{url('/lecturer/clearance')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class=" nav-icon" icon="heroicons-outline:view-boards"></iconify-icon>
            <span>Clearance</span>
              </span>
              {{-- <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon> --}}
            </a>
          </li>

          <li class="">
            <a href="{{route('lecturer.get_students.get')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class=" nav-icon" icon="heroicons-outline:view-boards"></iconify-icon>
            <span>Student Result</span>
              </span>
            </a>
          </li>
          {{-- <li class="">
            <a href="{{('#')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class=" nav-icon" icon="heroicons-outline:view-boards"></iconify-icon>
            <span>Hostel Allocation</span>
              </span>
            </a>
          </li>
          <li class="">
            <a href="{{('#')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class=" nav-icon" icon="heroicons-outline:view-boards"></iconify-icon>
            <span>Course Registration</span>
              </span>
            </a>
          </li> --}}
          <li class="">
            <a href="{{('/lecturer/settings_l')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class=" nav-icon" icon="material-symbols:settings-outline-rounded"></iconify-icon>
            <span>Settings</span>
              </span>
            </a>
          </li>
          <li class="">
            <a href="{{route('lecturer.calender.get')}}" class="navItem">
              <span class="flex items-center">
            <iconify-icon class=" nav-icon" icon="heroicons-outline:calendar"></iconify-icon>
            <span>Calender</span>
              </span>
            </a>
          </li>
          {{-- <li class="">
            <a href="javascript:void(0)" class="navItem">
              <span class="flex items-center">
            <iconify-icon class=" nav-icon" icon="heroicons-outline:view-boards"></iconify-icon>
            <span>Utility</span>
              </span>
              <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
            </a>
            <ul class="sidebar-submenu">
              <li>
                <a href="blog.html">Blog</a>
              </li>
              <li>
                <a href="settings.html">Settings</a>
              </li>
              <li>
                <a href="profile.html">Profile</a>
              </li>
            </ul>
          </li> --}}
          
          
          
          
          <li class="">
              
            <form action="{{'/lecturer/logout'}}" method="POST">
                          @csrf
                        <a class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600
                        dark:text-white font-normal font-Inter font-weight:500">
                          <iconify-icon icon="heroicons-outline:login" class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1"></iconify-icon>
                          <button class="font-Inter">Logout</button>
                        </a>
                      </form>
            
          </li>
          
          
          

        </ul>

        
      </div>
    </div>
    <!-- End: Sidebar -->
    <!-- End: Sidebar -->

















    <!-- Settings Toggle Button -->
<button class="fixed ltr:md:right-[-29px] ltr:right-0 rtl:left-0 rtl:md:left-[-29px] top-1/2 z-[888] translate-y-1/2 bg-slate-800 text-slate-50 dark:bg-slate-700 dark:text-slate-300 cursor-pointer transform rotate-90 flex items-center text-sm font-medium px-2 py-2 shadow-deep ltr:rounded-b rtl:rounded-t" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas">
  <iconify-icon class="text-slate-50 text-lg animate-spin" icon="material-symbols:settings-outline-rounded"></iconify-icon>
  <span class="hidden md:inline-block ltr:ml-2 rtl:mr-2">Settings</span>
</button>

<!-- BEGIN: Settings Modal -->
<div class="offcanvas offcanvas-end fixed bottom-0 flex flex-col max-w-full bg-white dark:bg-slate-800 invisible bg-clip-padding shadow-sm outline-none transition duration-300 ease-in-out text-gray-700 top-0 ltr:right-0 rtl:left-0 border-none w-96" tabindex="-1" id="offcanvas" aria-labelledby="offcanvas">
  <div class="offcanvas-header flex items-center justify-between p-4 pt-3 border-b border-b-slate-300 dark:border-b-slate-900">
    <div>
      <h3 class="block text-xl font-Inter text-slate-900 font-medium dark:text-[#eee]">
        Theme customizer
      </h3>
      <p class="block text-sm font-Inter font-light text-[#68768A] dark:text-[#eee]">Customize & Preview in Real Time</p>
    </div>
    <button type="button" class="box-content text-2xl w-4 h-4 p-2 pt-0 -my-5 -mr-2 text-black dark:text-white border-none rounded-none opacity-100 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline" data-bs-dismiss="offcanvas"><iconify-icon icon="line-md:close"></iconify-icon></button>
  </div>
  <div class="offcanvas-body flex-grow overflow-y-auto">
    <div class="settings-modal">
      <div class="p-6">

        <h3 class="mt-4">Theme</h3>
        <form class="input-area flex items-center space-x-8 rtl:space-x-reverse" id="themeChanger">
          <div class="input-group flex items-center">
            <input type="radio" id="light" name="theme" value="light" class="themeCustomization-checkInput">
            <label for="light" class="themeCustomization-checkInput-label">Light</label>
          </div>
          <div class="input-group flex items-center">
            <input type="radio" id="dark" name="theme" value="dark" class="themeCustomization-checkInput">
            <label for="dark" class="themeCustomization-checkInput-label">Dark</label>
          </div>
          <div class="input-group flex items-center">
            <input type="radio" id="semiDark" name="theme" value="semiDark" class="themeCustomization-checkInput">
            <label for="semiDark" class="themeCustomization-checkInput-label">Semi Dark</label>
          </div>
        </form>
      </div>
      <div class="divider"></div>
      <div class="p-6">

        <div class="flex items-center justify-between mt-5">
          <h3 class="!mb-0">Rtl</h3>
          <label id="rtl_ltr" class="relative inline-flex h-6 w-[46px] items-center rounded-full transition-all duration-150 cursor-pointer">
            <input type="checkbox" value="" class="sr-only peer">
            <span class="w-11 h-6 bg-gray-200 peer-focus:outline-none ring-0 rounded-full peer dark:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-black-600"></span>
          </label>
        </div>
      </div>
      <div class="divider"></div>
      <div class="p-6">
        <h3>Content Width</h3>
        <div class="input-area flex items-center space-x-8 rtl:space-x-reverse">
          <div class="input-group flex items-center">
            <input type="radio" id="fullWidth" name="content-width" value="fullWidth" class="themeCustomization-checkInput">
            <label for="fullWidth" class="themeCustomization-checkInput-label ">Full Width</label>
          </div>
          <div class="input-group flex items-center">
            <input type="radio" id="boxed" name="content-width" value="boxed" class="themeCustomization-checkInput">
            <label for="boxed" class="themeCustomization-checkInput-label ">Boxed</label>
          </div>
        </div>
        <h3 class="mt-4">Menu Layout</h3>
        <div class="input-area flex items-center space-x-8 rtl:space-x-reverse">
          <div class="input-group flex items-center">
            <input type="radio" id="vertical_menu" name="menu_layout" value="vertical" class="themeCustomization-checkInput">
            <label for="vertical_menu" class="themeCustomization-checkInput-label">Vertical</label>
          </div>
          <div class="input-group flex items-center">
            <input type="radio" id="horizontal_menu" name="menu_layout" value="horizontal" class="themeCustomization-checkInput">
            <label for="horizontal_menu" class="themeCustomization-checkInput-label">Horizontal</label>
          </div>
        </div>
        <div id="menuCollapse" class="hidden xl:flex items-center justify-between mt-5">
          <h3 class="!mb-0">Menu Collapsed</h3>
          <label class="relative inline-flex h-6 w-[46px] items-center rounded-full transition-all duration-150 cursor-pointer">
            <input type="checkbox" value="" class="sr-only peer">
            <span class="w-11 h-6 bg-gray-200 peer-focus:outline-none ring-0 rounded-full peer dark:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-black-500"></span>
          </label>
        </div>
        <div id="menuHidden" class="hidden xl:flex items-center justify-between mt-5">
          <h3 class="!mb-0">Menu Hidden</h3>
          <label id="menuHide" class="relative inline-flex h-6 w-[46px] items-center rounded-full transition-all duration-150 cursor-pointer">
            <input type="checkbox" value="" class="sr-only peer">
            <span class="w-11 h-6 bg-gray-200 peer-focus:outline-none ring-0 rounded-full peer dark:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-black-500"></span>
          </label>
        </div>
      </div>
      <div class="divider"></div>
      <div class="p-6">
        <h3>Navbar Type</h3>
        <div class="input-area flex flex-wrap items-center space-x-4 rtl:space-x-reverse">
          <div class="input-group flex items-center">
            <input type="radio" id="nav_floating" name="navbarType" value="floating" class="themeCustomization-checkInput">
            <label for="nav_floating" class="themeCustomization-checkInput-label ">Floating</label>
          </div>
          <div class="input-group flex items-center">
            <input type="radio" id="nav_sticky" name="navbarType" value="sticky" class="themeCustomization-checkInput">
            <label for="nav_sticky" class="themeCustomization-checkInput-label ">Sticky</label>
          </div>
          <div class="input-group flex items-center">
            <input type="radio" id="nav_static" name="navbarType" value="static" class="themeCustomization-checkInput">
            <label for="nav_static" class="themeCustomization-checkInput-label ">Static</label>
          </div>
          <div class="input-group flex items-center">
            <input type="radio" id="nav_hidden" name="navbarType" value="hidden" class="themeCustomization-checkInput">
            <label for="nav_hidden" class="themeCustomization-checkInput-label ">Hidden</label>
          </div>
        </div>
        <h3 class="mt-4">Footer Type</h3>
        <div class="input-area flex items-center space-x-4 rtl:space-x-reverse">
          <div class="input-group flex items-center">
            <input type="radio" id="footer_sticky" name="footerType" value="sticky" class="themeCustomization-checkInput">
            <label for="footer_sticky" class="themeCustomization-checkInput-label ">Sticky</label>
          </div>
          <div class="input-group flex items-center">
            <input type="radio" id="footer_static" name="footerType" value="static" class="themeCustomization-checkInput">
            <label for="footer_static" class="themeCustomization-checkInput-label ">Static</label>
          </div>
          <div class="input-group flex items-center">
            <input type="radio" id="footer_hidden" name="footerType" value="hidden" class="themeCustomization-checkInput">
            <label for="footer_hidden" class="themeCustomization-checkInput-label ">Hidden</label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END: Settings Modal -->
<!-- END: Settings -->














<div class="flex flex-col justify-between min-h-screen">
  <div>











<!-- BEGIN: Header -->
        <!-- BEGIN: Header -->
        <div class="z-[9]" id="app_header">
          <div class="app-header z-[999] bg-white dark:bg-slate-800 shadow-sm dark:shadow-slate-700">
            <div class="flex justify-between items-center h-full">
              <div class="flex items-center md:space-x-4 space-x-4 rtl:space-x-reverse vertical-box">
                <a href="{{('#')}}" class="mobile-logo xl:hidden inline-block">
                  <img src="{{asset('assets/images/logo/banner (1).png')}}" class="black_logo w-1/2" alt="logo">
                    <img src="{{asset('assets/images/logo/banner (1).png')}}" class="white_logo w-1/2" alt="logo">
                </a>
                <button class="smallDeviceMenuController open-sdiebar-controller hidden xl:hidden md:inline-block">
                  <iconify-icon class="leading-none bg-transparent relative text-xl top-[2px] text-slate-900 dark:text-white" icon="heroicons-outline:menu-alt-3"></iconify-icon>
                </button>
                <button class="sidebarOpenButton text-xl text-slate-900 dark:text-white !ml-0 hidden rtl:rotate-180">
                  <iconify-icon icon="ph:arrow-right-bold"></iconify-icon>
                </button>
                <button class="flex items-center xl:text-sm text-lg xl:text-slate-400 text-slate-800 dark:text-slate-300 focus:outline-none focus:shadow-none px-1 space-x-3
        rtl:space-x-reverse search-modal" data-bs-toggle="modal" data-bs-target="#searchModal">
                  <iconify-icon icon="heroicons-outline:search"></iconify-icon>
                  <span class="xl:inline-block hidden">Search...
    </span>
                </button>

              </div>
              <!-- end vertcial -->

              <div class="items-center space-x-4 rtl:space-x-reverse horizental-box">
                <a href="index-2.html" class="leading-0">
                  <span class="xl:inline-block hidden">
                    <img src="{{asset('assets/images/logo/banner (1).png')}}" class="black_logo w-1/2" alt="logo">
                    <img src="{{asset('assets/images/logo/banner (1).png')}}" class="white_logo w-1/2" alt="logo">
    </span>
                  <span class="xl:hidden inline-block">
        <img src="{{asset('assets/images/logo/banner (1).png')}}" class="black_logo w-1/2" alt="logo">
        <img src="{{asset('assets/images/logo/banner (1).png')}}" class="white_logo w-1/2" alt="logo">
    </span>
                </a>
                <button class="smallDeviceMenuController open-sdiebar-controller hidden md:inline-block xl:hidden">
                  <iconify-icon class="leading-none bg-transparent relative text-xl top-[2px] text-slate-900 dark:text-white" icon="heroicons-outline:menu-alt-3"></iconify-icon>
                </button>
                <button class="items-center xl:text-sm text-lg xl:text-slate-400 text-slate-800 dark:text-slate-300 focus:outline-none focus:shadow-none px-1 space-x-3
        rtl:space-x-reverse search-modal inline-flex xl:hidden" data-bs-toggle="modal" data-bs-target="#searchModal">
                  <iconify-icon icon="heroicons-outline:search"></iconify-icon>
                  <span class="xl:inline-block hidden">Search...
    </span>
                </button>

              </div>
              <!-- end horizental -->



              <div class="nav-tools flex items-center lg:space-x-5 space-x-3 rtl:space-x-reverse leading-0">
                <!-- BEGIN: Language Dropdown  -->

                <div class="relative">
                  <button class="text-slate-800 dark:text-white focus:ring-0 focus:outline-none font-medium rounded-lg text-sm text-center
            inline-flex items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <iconify-icon icon="circle-flags:uk" class="mr-0 md:mr-2 rtl:ml-2 text-xl"></iconify-icon>
                    <span class="text-sm md:block hidden font-medium text-slate-600 dark:text-slate-300">
            En</span>
                  </button>
                  <!-- Language Dropdown menu -->
                  <div class="dropdown-menu z-10 hidden bg-white divide-y divide-slate-100 shadow w-44 dark:bg-slate-800 border dark:border-slate-900 !top-[29px] rounded-md
            overflow-hidden">
                    <ul class="py-1 text-sm text-slate-800 dark:text-slate-200">
                      <li>
                        <a href="#" class="flex items-center px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                          <iconify-icon icon="circle-flags:uk" class="ltr:mr-2 rtl:ml-2 text-xl"></iconify-icon>
                          <span class="font-medium">ENG</span>
                        </a>
                      </li>
                      
                    </ul>
                  </div>
                </div>
                <!-- Theme Changer -->
                <!-- END: Language Dropdown -->

                <!-- BEGIN: Toggle Theme -->
                <div>
                  <button id="themeMood" class="h-[28px] w-[28px] lg:h-[32px] lg:w-[32px] lg:bg-gray-500-f7 bg-slate-50 dark:bg-slate-900 lg:dark:bg-slate-900 dark:text-white text-slate-900 cursor-pointer rounded-full text-[20px] flex flex-col items-center justify-center">
                    <iconify-icon class="text-slate-800 dark:text-white text-xl dark:block hidden" id="moonIcon" icon="line-md:sunny-outline-to-moon-alt-loop-transition"></iconify-icon>
                    <iconify-icon class="text-slate-800 dark:text-white text-xl dark:hidden block" id="sunIcon" icon="line-md:moon-filled-to-sunny-filled-loop-transition"></iconify-icon>
                  </button>
                </div>
                <!-- END: TOggle Theme -->

                <!-- BEGIN: grayscal -->
                <div>
                  <button id="grayScale" class="lg:h-[32px] lg:w-[32px] lg:bg-slate-100 lg:dark:bg-slate-900 dark:text-white text-slate-900 cursor-pointer
            rounded-full text-[20px] flex flex-col items-center justify-center">
                    <iconify-icon class="text-slate-800 dark:text-white text-xl" icon="mdi:paint-outline"></iconify-icon>
                  </button>
                </div>
                <!-- END: grayscal -->

                <!-- BEGIN: Message Dropdown -->
                <!-- Mail Dropdown -->
                <div class="relative md:block hidden">
                  <button class="lg:h-[32px] lg:w-[32px] lg:bg-slate-50 lg:dark:bg-slate-900 dark:text-white text-slate-900 cursor-pointer
      rounded-full text-[20px] flex flex-col items-center justify-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <iconify-icon class="text-slate-800 dark:text-white text-xl" icon="heroicons-outline:mail"></iconify-icon>
                    <span class="absolute -right-1 lg:top-0 -top-[6px] h-4 w-4 bg-red-500 text-[8px] font-semibold flex flex-col items-center
        justify-center rounded-full text-white z-[45]">
      1</span>
                  </button>
                  <!-- Mail Dropdown -->
                  <div class="dropdown-menu z-10 hidden bg-white divide-y divide-slate-100 dark:divide-slate-900 shadow w-[335px]
      dark:bg-slate-800 border dark:border-slate-900 !top-[23px] rounded-md overflow-hidden lrt:origin-top-right rtl:origin-top-left">
                    <div class="flex items-center justify-between py-4 px-4">
                      <h3 class="text-sm font-Inter font-medium text-slate-700 dark:text-white">Messages</h3>
                      <a class="text-xs font-Inter font-normal underline text-slate-500 dark:text-white" href="#">See All</a>
                    </div>
                    <div class="divide-y divide-slate-100 dark:divide-slate-900" role="none">

                      <div class="text-slate-600 dark:text-slate-300 block w-full px-4 py-2 text-sm  cursor-pointer">
                        <div class="flex ltr:text-left rtl:text-right space-x-3 rtl:space-x-reverse relative">
                          <div class="flex-none">
                            <div class="h-8 w-8 bg-white dark:bg-slate-700 rounded-full relative">
                              <span class="bg-green-500 w-[10px] h-[10px] rounded-full border border-white dark:border-slate-700 inline-block absolute
                right-0 top-0"></span>
                              <img src="{{asset('assets/images/lecturers/' . Auth::guard('lecturer')->user()->picture)}}" alt="{{Auth::guard('lecturer')->user()->name}}" title="{{Auth::guard('lecturer')->user()->name}}" class="block w-full h-full object-cover rounded-full border hover:border-white border-transparent">
                            </div>
                          </div>
                          <div class="flex-1">
                            <a href="#" class="text-slate-800 dark:text-slate-300 text-sm font-medium mb-1 before:w-full before:h-full before:absolute
                before:top-0 before:left-0">
                {{Auth::guard('lecturer')->user()->name}}</a>
                            <div class="text-xs hover:text-[#68768A] text-slate-600 dark:text-slate-300 mb-1">Hi! How are you doing?.....</div>
                            <div class="text-slate-400 dark:text-slate-400 text-xs">
                              3 min ago
                            </div>
                          </div>
                          <div class="flex-0">
                            <span class="h-4 w-4 bg-danger-500 border border-white rounded-full text-[10px] flex items-center justify-center text-white">
              2</span>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                <!-- END: Message Dropdown -->

                <!-- BEGIN: Notification Dropdown -->
                <!-- Notifications Dropdown area -->
                <div class="relative md:block hidden">
                  <button class="lg:h-[32px] lg:w-[32px] lg:bg-slate-50 lg:dark:bg-slate-900 dark:text-white text-slate-900 cursor-pointer
      rounded-full text-[20px] flex flex-col items-center justify-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <iconify-icon class="animate-tada text-slate-800 dark:text-white text-xl" icon="heroicons-outline:bell"></iconify-icon>
                    <span class="absolute -right-1 lg:top-0 -top-[6px] h-4 w-4 bg-red-500 text-[8px] font-semibold flex flex-col items-center
        justify-center rounded-full text-white z-[99]">
        {{count($notification)}}</span></span>
                  </button>
                  <!-- Notifications Dropdown -->
                  <div class="dropdown-menu z-10 hidden bg-white divide-y divide-slate-100 dark:divide-slate-900 shadow w-[335px]
      dark:bg-slate-800 border dark:border-slate-900 !top-[23px] rounded-md overflow-hidden lrt:origin-top-right rtl:origin-top-left">
                    <div class="flex items-center justify-between py-4 px-4">
                      <h3 class="text-sm font-Inter font-medium text-slate-700 dark:text-white">Notifications</h3>
                      <a class="text-xs font-Inter font-normal underline text-slate-500 dark:text-white" href="{{route('lecturer.clearance')}}">See All</a>
                    </div>

                    @if ($notificationn === 0)

                    <p style="text-align: center" class="text-sm font-Inter font-medium text-slate-700 dark:text-white">No notification here yet!!!</p>
                        
                    @else
                        
                    @foreach ($notification as $notifications)
                    
                    <div class="text-slate-600 dark:text-slate-300 block w-full px-4 py-2 text-sm">
                      <div class="flex ltr:text-left rtl:text-right relative">
                        <div class="flex-none ltr:mr-3 rtl:ml-3">
                          <div class="h-8 w-8 bg-white rounded-full">
                            <img src="{{asset('assets/images/students/' . $notifications->user->picture)}}" alt="{{$notifications->user->name}}" title="{{$notifications->user->name}}" class="border-transparent block w-full h-full object-cover rounded-full border">
                          </div>
                        </div>
                        <div class="flex-1">
                          <a href="#" class="text-slate-600 dark:text-slate-300 text-sm font-medium mb-1 before:w-full before:h-full before:absolute
              before:top-0 before:left-0">
              {{$notifications->user->name}}</a>
                          <div class="text-slate-600 dark:text-slate-300 text-xs leading-4">{{('Awaiting aprroval... ')}}</div>
                          <div class="text-slate-400 dark:text-slate-400 text-xs mt-1">
                            <?php echo time_elapsed_string($notifications->created_at) ?>
                          </div>
                        </div>
                      </div>
                    </div>

                    @endforeach

                    
                    @endif

                  </div>
                </div>
                <!-- END: Notification Dropdown -->

                <!-- BEGIN: Profile Dropdown -->
                <!-- Profile DropDown Area -->
                <div class="md:block hidden w-full">
                  <button class="text-slate-800 dark:text-white focus:ring-0 focus:outline-none font-medium rounded-lg text-sm text-center
      inline-flex items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="lg:h-8 lg:w-8 h-7 w-7 rounded-full flex-1 ltr:mr-[10px] rtl:ml-[10px]">
                      <img src="{{asset('assets/images/lecturers/' . Auth::guard('lecturer')->user()->picture)}}" alt="{{Auth::guard('lecturer')->user()->name}}" title="{{Auth::guard('lecturer')->user()->name}}" class="block w-full h-full object-cover rounded-full">
                    </div>
                    <span class="flex-none text-slate-600 dark:text-white text-sm font-normal items-center lg:flex hidden overflow-hidden text-ellipsis whitespace-nowrap">{{Auth::guard('lecturer')->user()->name}}</span>
                    <svg class="w-[16px] h-[16px] dark:text-white hidden lg:inline-block text-base inline-block ml-[10px] rtl:mr-[10px]" aria-hidden="true" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                  </button>
                  <!-- Dropdown menu -->
                  <div class="dropdown-menu z-10 hidden bg-white divide-y divide-slate-100 shadow w-44 dark:bg-slate-800 border dark:border-slate-700 !top-[23px] rounded-md
      overflow-hidden">
                    <ul class="py-1 text-sm text-slate-800 dark:text-slate-200">
                      
                      <li>
                        <a href="{{('/lecturer/settings_l')}}" class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600
            dark:text-white font-normal">
                          <iconify-icon icon="heroicons-outline:cog" class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1"></iconify-icon>
                          <span class="font-Inter">Settings</span>
                        </a>
                      </li>

                      <li>

                        <form action="{{'/lecturer/logout'}}" method="POST">
                          @csrf
                        <a class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600
                        dark:text-white font-normal font-Inter">
                          <iconify-icon icon="heroicons-outline:login" class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1"></iconify-icon>
                          <button class="font-Inter">Logout</button>
                        </a>
                      </form>

                      </li>
                    </ul>
                  </div>
                </div>
                <!-- END: Header -->
                <button class="smallDeviceMenuController md:hidden block leading-0">
                  <iconify-icon class="cursor-pointer text-slate-900 dark:text-white text-2xl" icon="heroicons-outline:menu-alt-3"></iconify-icon>
                </button>
                <!-- end mobile menu -->
              </div>
              <!-- end nav tools -->
            </div>
          </div>
        </div>

        <!-- END: Header -->
        <!-- END: Header -->
















        <!-- BEGIN: Search Modal -->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto inset-0 bg-slate-900/40 backdrop-filter backdrop-blur-sm backdrop-brightness-10" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
  <div class="modal-dialog relative w-auto pointer-events-none top-1/4">
    <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white dark:bg-slate-900 bg-clip-padding rounded-md outline-none text-current">
      <form>
        <div class="relative">
          <button class="absolute left-0 top-1/2 -translate-y-1/2 w-9 h-full text-xl dark:text-slate-300 flex items-center justify-center">
            <iconify-icon icon="heroicons-solid:search"></iconify-icon>
          </button>
          <input type="text" class="form-control !py-[14px] !pl-10" placeholder="Search" autofocus>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- END: Search Modal -->




@yield('all_lecturers')
@yield('all_students')
@yield('calender')
@yield('change_password')
@yield('change_picture')
@yield('check_result')
@yield('clearance_form')
@yield('clearance')
@yield('dashboard')
@yield('get_students_result')
@yield('get_students')
@yield('search_lecturer')
@yield('search_student')
@yield('settings_l')


  </div>

</div>
</main>


  {{-- footer --}}




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
        <a href="{{('/lecturer/change_picture')}}" class="relative bg-white bg-no-repeat backdrop-filter backdrop-blur-[40px] rounded-full footer-bg dark:bg-slate-700
      h-[65px] w-[65px] z-[-1] -mt-[40px] flex justify-center items-center">
          <div class="h-[50px] w-[50px] rounded-full relative left-[0px] hrefp-[0px] custom-dropshadow">
            <img src="{{asset('assets/images/lecturers/' . Auth::guard('lecturer')->user()->picture)}}" alt="{{Auth::guard('lecturer')->user()->name}}" title="{{Auth::guard('lecturer')->user()->name}}" class="w-full h-full rounded-full border-2 border-slate-100">
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





<!-- scripts -->
<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
  <script src="{{asset('assets/js/rt-plugins.js')}}"></script>
  <script src="{{asset('assets/js/app.js')}}"></script>

</script>
  {{-- end footer --}}





</body>

</html>









