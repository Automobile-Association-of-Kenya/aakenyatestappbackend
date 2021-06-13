<!doctype html>
<html class="no-js " lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    @yield('title')
    <link rel="icon" href="{{asset('assets/images/logo.jpg')}}" type="image/x-icon"> <!-- Favicon-->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/charts-c3/plugin.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/dropify/css/dropify.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/morrisjs/morris.min.css')}}" />
    <script src="{{asset('assets/sweetalert/sweetalert.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/plugins/charts-c3/plugin.css')}}"/>
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
    <style>
        .loader {
            align-content: center;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #F9DD22;
            border-right: 16px solid #055F43;
            border-bottom: 16px solid  #F9DD22;
            border-left: 16px solid #055F43;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 20s linear infinite;
            animation: spin 2s linear infinite;
            margin-left: 45%;
        }

        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
    </head>
    <body class="theme-blush">
    
    <!-- Page Loader -->
     <div class="page-loader-wrapper">
        <div class="loader">
           
        </div>
        Please wait...
    </div> 
    
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    
    <!-- Main Search -->
    {{-- <div id="search">
        <button id="close" type="button" class="close btn btn-primary btn-icon btn-icon-mini btn-round">x</button>
        <form>
          <input type="search" value="" placeholder="Search..." />
          <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div> --}}
    
    <!-- Right Icon menu Sidebar -->
    <div class="navbar-right">
        <ul class="navbar-nav">
            {{-- <li><a href="#search" class="main_search" title="Search..."><i class="zmdi zmdi-search"></i></a></li> --}}
            
            <li class="dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle" title="Notifications" data-toggle="dropdown" role="button"><i class="zmdi zmdi-notifications"></i>
                    <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                </a>
                <ul class="dropdown-menu slideUp2">
                    <li class="header">Notifications</li>
                    <li class="body">
                        <ul class="menu list-unstyled">
                            @forelse (Auth::user()->unReadNotifications as $item)
                                @if ($item->data['type']=='register')
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-blue"><i class="zmdi zmdi-account"></i></div>
                                        <div class="menu-info">
                                            <h4>New user registered</h4>
                                            <p><i class="zmdi zmdi-time"></i> {{$item->created_at->diffForHumans()}} </p>
                                        </div>
                                    </a>
                                </li>
                                @elseif($item->data['type']=='profile')
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-green"><i class="zmdi zmdi-edit"></i></div>
                                        <div class="menu-info">
                                            <h4><b>{{$item->data['name']}}</b> updated profile</h4>
                                            <p><i class="zmdi zmdi-time"></i>{{$item->created_at->diffForHumans()}} </p>
                                        </div>
                                    </a>
                                </li>
                                @elseif($item->data['type']=='test')
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-grey"><i class="zmdi zmdi-comment-text"></i></div>
                                        <div class="menu-info">
                                            <h4><b>{{$item->data['name']}}</b> completed a test</h4>
                                            <p><i class="zmdi zmdi-time"></i> {{$item->created_at->diffForHumans()}} </p>
                                        </div>
                                    </a>
                                </li>
                                @elseif($item->data['type']=='payment')
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-amber"><i class="zmdi zmdi-shopping-cart"></i></div>
                                        <div class="menu-info">
                                            <h4><b>{{$item->data['name']}}</b>made a payment</h4>
                                            <p><i class="zmdi zmdi-time"></i> {{$item->created_at->diffForHumans()}}</p>
                                        </div>
                                    </a>
                                </li>
                                @endif
                            @empty
                            <div class="menu-info">
                                <li><h4>No new notifications</h4></li>
                            </div>
                                
                            @endforelse
                            
                        </ul>
                    </li>
                    <li class="footer"> <a href="{{route('notifications.index')}}">View All Notifications</a> </li>
                </ul>
            </li>
           
            <li><a><form action="{{route('logout')}}" method="post">@csrf<button type="submit"  class="mega-menu bg-transparent border-0" title="Sign Out"><i class="zmdi zmdi-power"></i></button></form></a></li>
        </ul>
    </div>
    
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <div class="navbar-brand">
            <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
            <a href="/home"><img src="{{asset('assets/images/logo.jpg')}}" width="25" alt=""><span class="m-l-10">AA Kenya</span></a>
        </div>
        <div class="menu">
            <ul class="list">
                <li>
                    <div class="user-info">
                        @if (Auth::user()->photo==null)
                            <a class="image" href="/"><i class="zmdi zmdi-account-circle zmdi-hc-5x mr-5 "></i></a>
                        @else
                            <a class="image" href="/"><img src="{{asset('Images/'.Auth::user()->photo)}}" alt=""></a>
                        @endif
                        <div class="detail">
                           @auth
                           <h4>{{Auth::User()->name}}</h4>
                           @endauth
                            <small>{{Auth::user()->role->name}}</small>                        
                        </div>
                    </div>
                </li>
                <li class="{{(request()->is('home')) ? 'active open' : ''}}"><a href="{{route('home')}}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                <li class="{{(request()->is('topics*')) ? 'active open' : ((request()->is('tests*')) ? 'active open' : ((request()->is('essays')) ? 'active open': ''))}}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Tests</span></a>
                    <ul class="ml-menu">
                        <li><a href="{{route('topics.index')}}">Topics</a></li>
                        <li><a href="{{route('tests.create')}}">Add Test</a></li>
                        <li><a href="{{route('tests.index')}}">View Tests</a></li>
                        <li><a href="{{route('essays.index')}}">Mark Test</a></li>
                                 
                    </ul>
                </li>
                <li class="{{(request()->is('videos*') ? 'active open': (request()->is('pdfs*') ? 'active open':''))}}"> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Reference</span></a>
                    <ul class="ml-menu">
                        <li><a href="{{route('videos.index')}}">Videos</a></li>
                        <li><a href="{{route('videos.create')}}">Add Video</a></li>
                        <li><a href="{{route('pdfs.index')}}">PDFs</a></li>
                        <li><a href="{{route('pdfs.create')}}">Add PDF</a></li>
                    </ul>
                </li>
                <li class="{{(request()->is('reports*')) ? 'active open' : ''}}"> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-folder"></i><span>User Reports</span></a>
                    <ul class="ml-menu">
                        <li><a href="{{route('reports.users')}}">Registered Users</a></li>
                        <li><a href="{{route('reports.tests')}}">Tests </a></li>
                        <li><a href="{{route('reports.payments')}}">Payments</a></li>
                        <li><a href="{{route('reports.videos')}}">Videos Watched </a></li>
                        <li><a href="{{route('reports.pdfs')}}">PDFs Read </a></li>
                    </ul>
                </li>
                <li class="{{(request()->is('settings*')) ? 'active open' : ''}}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-lock"></i><span>Account Settings</span></a>
                    <ul class="ml-menu">
                        @can('superadmin')
                            <li><a href="{{route('users.index')}}">Admin Users</a></li>
                        @endcan
                        <li><a href="{{route('profile',Auth::user()->id)}}">Update Profile</a></li>
                        <li><a href="{{route('password')}}">Change Password</a></li>
                        <li class="mr-0" style="margin-left: -2%"><button type="submit" form="logout" class="bg-transparent border-0 m-0" title="Sign Out"><a>Logout</a></button></li>
                        <form id="logout" action="{{route('logout')}}" method="post">@csrf</form>
                    </ul>
                </li>
                
            </ul>
        </div>
    </aside>
    
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs sm">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#chat"><i class="zmdi zmdi-comments"></i></a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="setting">
                <div class="slim_scroll">
                    <div class="card">
                        <h6>Theme Option</h6>
                        <div class="light_dark">
                            <div class="radio">
                                <input type="radio" name="radio1" id="lighttheme" value="light" checked="">
                                <label for="lighttheme">Light Mode</label>
                            </div>
                            <div class="radio mb-0">
                                <input type="radio" name="radio1" id="darktheme" value="dark">
                                <label for="darktheme">Dark Mode</label>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <h6>Color Skins</h6>
                        <ul class="choose-skin list-unstyled">
                            <li data-theme="purple"><div class="purple"></div></li>
                            <li data-theme="blue"><div class="blue"></div></li>
                            <li data-theme="cyan"><div class="cyan"></div></li>
                            <li data-theme="green"><div class="green"></div></li>
                            <li data-theme="orange"><div class="orange"></div></li>
                            <li data-theme="blush" class="active"><div class="blush"></div></li>
                        </ul>                                        
                    </div>
                    <div class="card">
                        <h6>General Settings</h6>
                        <ul class="setting-list list-unstyled">
                            <li>
                                <div class="checkbox">
                                    <input id="checkbox1" type="checkbox">
                                    <label for="checkbox1">Report Panel Usage</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input id="checkbox2" type="checkbox" checked="">
                                    <label for="checkbox2">Email Redirect</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input id="checkbox3" type="checkbox" checked="">
                                    <label for="checkbox3">Notifications</label>
                                </div>                        
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input id="checkbox4" type="checkbox">
                                    <label for="checkbox4">Auto Updates</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input id="checkbox5" type="checkbox" checked="">
                                    <label for="checkbox5">Offline</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input id="checkbox6" type="checkbox" checked="">
                                    <label for="checkbox6">Location Permission</label>
                                </div>
                            </li>
                        </ul>
                    </div>                
                </div>                
            </div>       
            <div class="tab-pane right_chat" id="chat">
                <div class="slim_scroll">
                    <div class="card">
                        <ul class="list-unstyled">
                            <li class="online">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object " src="{{asset('assets/images/xs/avatar4.jpg')}}" alt="">
                                        <div class="media-body">
                                            <span class="name">Sophia <small class="float-right">11:00AM</small></span>
                                            <span class="message">There are many variations of passages of Lorem Ipsum available</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>                            
                            </li>
                            <li class="online">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object " src="{{asset('assets/images/xs/avatar5.jpg')}}" alt="">
                                        <div class="media-body">
                                            <span class="name">Grayson <small class="float-right">11:30AM</small></span>
                                            <span class="message">All the Lorem Ipsum generators on the</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>                            
                            </li>
                            <li class="offline">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object " src="{{asset('assets/images/xs/avatar2.jpg')}}" alt="">
                                        <div class="media-body">
                                            <span class="name">Isabella <small class="float-right">11:31AM</small></span>
                                            <span class="message">Contrary to popular belief, Lorem Ipsum</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>                            
                            </li>
                            <li class="me">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object " src="{{asset('assets/images/xs/avatar1.jpg')}}" alt="">
                                        <div class="media-body">
                                            <span class="name">John <small class="float-right">05:00PM</small></span>
                                            <span class="message">It is a long established fact that a reader</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>                            
                            </li>
                            <li class="online">
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object " src="{{asset('assets/images/xs/avatar3.jpg')}}" alt="">
                                        <div class="media-body">
                                            <span class="name">Alexander <small class="float-right">06:08PM</small></span>
                                            <span class="message">Richard McClintock, a Latin professor</span>
                                            <span class="badge badge-outline status"></span>
                                        </div>
                                    </div>
                                </a>                            
                            </li>                        
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    @yield('content')
    
<!-- Jquery Core Js --> 





<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js --> 
 <script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js --> 

<script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script><!-- Custom Js --> 

{{-- <script src="{{asset('assets/bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js --> --}}

 <script src="{{asset('assets/bundles/sparkline.bundle.js')}}"></script> <!-- Sparkline Plugin Js -->
<script src="{{asset('assets/bundles/c3.bundle.js')}}"></script> 
<script src="{{asset('assets/plugins/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/dropify.js')}}"></script>
 <script src="{{asset('assets/js/pages/blog/blog.js')}}"></script> 
 <script src="{{asset('assets/bundles/morrisscripts.bundle.js')}}"></script> <!-- Morris Plugin Js -->
 

 @yield('scripts')
</body>
</html>