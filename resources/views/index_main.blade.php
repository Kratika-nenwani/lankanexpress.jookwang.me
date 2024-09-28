<!DOCTYPE html>
<html lang="en" data-bs-theme="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('assets/favicon/fav.png') }}" type="image/x-icon">
    
    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/libs.bundle.css') }}">
    
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.bundle.css') }}">

    
    <style>body { display: none; }</style>
    
    <!-- Title -->
    <title>Lanka Express</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-156446909-1"></script><script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag("js", new Date());gtag("config", "UA-156446909-1");</script>
    @yield('csscontent')
  </head>
  <body>
    
    
    
    

    <!-- NAVIGATION -->
    <div data-bs-theme="">
      <nav class="navbar navbar-vertical fixed-start navbar-expand-md" id="sidebar">
        <div class="container-fluid">
      
          <!-- Toggler -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      
          <!-- Brand -->
          <a class="navbar-brand" >
            <img src="{{ asset('assets/img/lankaexpress.jpg') }}" class="navbar-brand-img mx-auto" alt="..."style="height:800px; width:180px;">
          </a>
      
      
          <!-- Collapse -->
          <div class="collapse navbar-collapse" id="sidebarCollapse">
      
            <!-- Navigation -->
            <ul class="navbar-nav">
            
                @if (Auth::check() && Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index_main') }}" >
                      <i class="fe fe-home"></i> Dashboards
                    </a>
                </li>
                @endif
               
                @if (Auth::check() && strtolower(Auth::user()->role) == 'call agent')
                <li class="nav-item">
                  <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fe fe-home"></i>&nbsp; Dashboard
                  </a>
              </li>
                <li class="nav-item">
                    <a href="{{ route('assign') }}" class="nav-link">
                        <i class="fas fa-shopping-cart"></i>&nbsp; Assign Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('quote_form') }}" class="nav-link">
                        <i class="fas fa-clipboard-list"></i>&nbsp; Quote Form
                    </a>
                </li>
                @endif

                @if (Auth::check() && strtolower(Auth::user()->role) == 'operation')
                <li class="nav-item">
                  <a href="{{ route('operation-dashboard') }}" class="nav-link">
                    <i class="fe fe-home"></i>&nbsp; Dashboard
                  </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('assignquotes') }}" class="nav-link">
                      <i class="fas fa-quote-right"></i>&nbsp; Assign quotes
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('add-checkpoints') }}" class="nav-link">
                      <i class="fas fa-globe"></i>&nbsp; Add Checkpoints
                    </a>
                </li>
                @endif
            

                @if (Auth::check() && Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a href="{{ route('role') }}" class="nav-link">
                      <i class="fas fa-quote-right"></i>&nbsp; Assign Role
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('quote') }}" class="nav-link">
                      <i class="fas fa-quote-right"></i>&nbsp; Quotes
                    </a>
                  </li>
                <!--<li class="nav-item">-->
                <!--    <a href="{{ route('country') }}" class="nav-link">-->
                <!--      <i class="fas fa-globe"></i>&nbsp; Country-->
                <!--    </a>-->
                <!--  </li>-->
                <li class="nav-item">
                    <a href="{{ route('drop-of-points') }}" class="nav-link">
                      <i class="fas fa-map-marker-alt"></i>&nbsp; Drop Off Points
                    </a>
                  </li>
                <li class="nav-item">
                    <a href="{{ route('plan') }}" class="nav-link">
                      <i class="fas fa-clipboard-list"></i>&nbsp; Plans
                    </a>
                  </li>
                <li class="nav-item">
                    <a href="{{ route('thought') }}" class="nav-link">
                      <i class="fas fa-lightbulb"></i>&nbsp; Thoughts
                    </a>
                  </li>
                <li class="nav-item">
                    <a href="{{ route('promotions') }}" class="nav-link">
                      <i class="fas fa-bullhorn"></i>&nbsp; Promotions
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('send-notification') }}" class="nav-link">
                      <i class="fas fa-message"></i>&nbsp; Send Notification
                    </a>
                  </li>
                @endif
                 
                  
               
              
                
                <!--  <div class="collapse " id="sidebarPages">-->
                <!--  <ul class="nav nav-sm flex-column">-->
                    
                    
                <!--    <li class="nav-item">-->
                <!--      <a href="{{route('orders')}}" class="nav-link ">-->
                <!--        Orders-->
                <!--      </a>-->
                <!--    </li>-->
                <!--    <li class="nav-item">-->
                <!--      <a href="{{route('quote')}}" class="nav-link ">-->
                <!--        quotes-->
                <!--      </a>-->
                <!--    </li>-->

                <!--    <li class="nav-item">-->
                <!--      <a href="{{route('country')}}" class="nav-link ">-->
                <!--        Country-->
                <!--      </a>-->
                <!--    </li>-->

                <!--    <li class="nav-item">-->
                <!--      <a href="{{route('drop-of-points')}}" class="nav-link ">-->
                <!--        Drop of Points-->
                <!--      </a>-->
                <!--    </li>-->

                <!--    <li class="nav-item">-->
                <!--      <a href="{{route('plan')}}" class="nav-link ">-->
                <!--        Plans-->
                <!--      </a>-->
                <!--    </li>-->

                <!--    <li class="nav-item">-->
                <!--      <a href="{{route('thought')}}" class="nav-link ">-->
                <!--        Thoughts-->
                <!--      </a>-->
                <!--    </li>-->

                <!--    <li class="nav-item">-->
                <!--      <a href="{{route('promotions')}}" class="nav-link ">-->
                <!--        Promotions-->
                <!--      </a>-->
                <!--    </li>-->

                <!--    <li class="nav-item">-->
                <!--      <a href="{{route('invoice')}}" class="nav-link ">-->
                <!--        Invoice-->
                <!--      </a>-->
                <!--    </li>-->
                  
                <!--  </ul>-->
                <!--</div>-->
                
                
                
                
                
                @auth
                <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>&nbsp;Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">
                        <i class="fas fa-sign-in-alt"></i>&nbsp;Login
                    </a>
                </li>
                <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">
                            <i class="fas fa-user-plus"></i>&nbsp;Register
                        </a>
                    </li>
                @endauth
                  
            </ul>
          </div>
              
              <!-- Divider -->
          <hr class="navbar-divider my-3">
      
      
              <!-- Push content down -->
          <div class="mt-auto"></div>
      
              <!-- Customize -->
          <!--<div class="mb-4" id="popoverDemo">-->
          <!--      <a class="btn w-100 btn-primary" data-bs-toggle="offcanvas" href="#offcanvasDemo" aria-controls="offcanvasDemo">-->
          <!--        <i class="fe fe-sliders me-2"></i> Customize-->
          <!--      </a>-->
          <!--</div>-->
          <div id="popoverDemoContainer" data-bs-theme="dark"></div>
      
              <!-- User (md) -->
          <div class="navbar-user d-none d-md-flex" id="sidebarUser"></div>
      
      
        </div>
      </nav>
    </div>
    <!--<div data-bs-theme="">-->
    <!--  <nav class="navbar navbar-vertical navbar-vertical-sm fixed-start navbar-expand-md" id="sidebarSmall">-->
    <!--    <div class="container-fluid">-->
      
          <!-- Toggler -->
    <!--      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarSmallCollapse" aria-controls="sidebarSmallCollapse" aria-expanded="false" aria-label="Toggle navigation">-->
    <!--        <span class="navbar-toggler-icon"></span>-->
    <!--      </button>-->
      
          <!-- Brand -->
    <!--      <a class="navbar-brand">-->
    <!--        <img src="{{ asset('assets/img/lankaexpress.jpg') }}" class="navbar-brand-img -->
    <!--        mx-auto" alt="...">-->
    <!--      </a>-->
      
      
          <!-- Collapse -->
    <!--      <div class="collapse navbar-collapse" id="sidebarSmallCollapse">-->
      
      
            <!-- Divider -->
    <!--        <hr class="navbar-divider d-none d-md-block mt-0 mb-3">-->
      
            
      
            <!-- Push content down -->
    <!--        <div class="mt-auto"></div>-->
      
              <!-- Customize -->
    <!--          <div class="mb-4" data-bs-toggle="tooltip" data-bs-placement="right" data-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' title="Customize">-->
    <!--            <a class="btn w-100 btn-primary" data-bs-toggle="offcanvas" href="#offcanvasDemo" aria-controls="offcanvasDemo">-->
    <!--              <i class="fe fe-sliders"></i> <span class="d-md-none ms-2">Customize</span>-->
    <!--            </a>-->
    <!--          </div>-->
      
              <!-- User (md) -->
    <!--          <div class="navbar-user d-none d-md-flex flex-column" id="sidebarSmallUser">-->
      
                <!-- Icon -->
    <!--            <a class="navbar-user-link mb-3" data-bs-toggle="offcanvas" href="#sidebarOffcanvasSearch" aria-controls="sidebarOffcanvasSearch">-->
    <!--              <span class="icon">-->
    <!--                <i class="fe fe-search"></i>-->
    <!--              </span>-->
    <!--            </a>-->
      
                <!-- Icon -->
    <!--            <a class="navbar-user-link mb-3" data-bs-toggle="offcanvas" href="#sidebarOffcanvasActivity" aria-controls="sidebarOffcanvasActivity">-->
    <!--              <span class="icon">-->
    <!--                <i class="fe fe-bell"></i>-->
    <!--              </span>-->
    <!--            </a>-->
      
    <!--          </div>-->
      
    <!--      </div> <!-- / .navbar-collapse -->-->
      
    <!--    </div>-->
    <!--  </nav>-->
    <!--</div>-->
    
    <!-- MAIN CONTENT -->
    <div class="main-content">

    
    
    @yield('content')


    </div><!-- / .main-content -->

    <!-- JAVASCRIPT -->
  
    
    <!-- Vendor JS -->
    <script src="{{ asset('assets/js/vendor.bundle.js') }}"></script>
    
     <!-- Theme JS -->
    <script src="{{ asset('assets/js/theme.bundle.js') }}"></script>
    
   
    @yield('jscontent')

  </body>

</html>
