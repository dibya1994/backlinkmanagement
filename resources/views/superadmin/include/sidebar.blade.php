<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
      
        <!-- Light Logo-->
        <a href="{{ url('/') }}" class="logo logo-light">
            <span class="logo-sm" style="background: #fff;padding: 18px 12px;">
                <img src="{{ URL::asset('public/assets/images/logo.png')}}" alt="" height="45">
            </span>
            <span class="logo-lg" style="background: #fff;padding: 18px 12px;">
                <img src="{{ URL::asset('public/assets/images/logo.png')}}" alt="" height="45">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
@php
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$path=explode('/', $actual_link);
$page_name=$path[4];
@endphp
    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu {{$page_name}}</span></li>
                <li class="nav-item">
                    <a class="nav-link {{$page_name=='dashboard'?'active':''}}" href="{{ url('/superadmin/dashboard') }}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li> 

                
                <li class="nav-item">
                    <a class="nav-link {{$page_name=='admin'?'active':''}}" href="{{ url('/superadmin/admin') }}">
                        <i class="fa fa-user-o" aria-hidden="true"></i> <span data-key="t-dashboards">Admin</span>
                    </a>
                </li> 

                <li class="nav-item">
                    <a class="nav-link {{$page_name=='termscondition'?'active':''}}" href="{{ url('/superadmin/termscondition') }}">
                        <i class="fa fa-user-o" aria-hidden="true"></i> <span data-key="t-dashboards">Terms & Conditions</span>
                    </a>
                </li> 

                <li class="nav-item">
                    <a class="nav-link {{$page_name=='privacypolicy'?'active':''}}" href="{{ url('/superadmin/privacypolicy') }}">
                        <i class="fa fa-user-o" aria-hidden="true"></i> <span data-key="t-dashboards">Privacy Policy</span>
                    </a>
                </li> 

                <li class="nav-item">
                    <a class="nav-link {{$page_name=='aboutus'?'active':''}}" href="{{ url('/superadmin/aboutus') }}">
                        <i class="fa fa-user-o" aria-hidden="true"></i> <span data-key="t-dashboards">About Us</span>
                    </a>
                </li> 

                <li class="nav-item">
                    <a class="nav-link {{$page_name=='package'?'active':''}}" href="{{ url('/superadmin/package') }}">
                        <i class="fa fa-user-o" aria-hidden="true"></i> <span data-key="t-dashboards">Package</span>
                    </a>
                </li> 


                {{-- <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Banners</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('/superadmin/company-announcement') }}" class="nav-link {{$page_name=='company-announcement'?'active':''}}" data-key="t-calendar"> Company Announcement </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/superadmin/deals-of-the-day') }}" class="nav-link {{$page_name=='deals-of-the-day'?'active':''}}" data-key="t-chat"> Deals of the day </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/superadmin/recently-viewed') }}" class="nav-link {{$page_name=='recently-viewed'?'active':''}}" data-key="t-chat"> Recently Viewed </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/superadmin/best-discount') }}" class="nav-link {{$page_name=='best-discount'?'active':''}}" data-key="t-chat"> Best Discount </a>
                            </li>
                           
                            
                        </ul>
                    </div>
                </li> --}}

                

                <li class="nav-item">
                    <a class="nav-link {{$page_name=='superadmin_logout'?'active':''}}" href="{{ url('/superadmin/logout') }}">
                        <i class="fa fa-sign-out" aria-hidden="true"></i> <span data-key="t-dashboards">Logout</span>
                    </a>
                </li> 

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>