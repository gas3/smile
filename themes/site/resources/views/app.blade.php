<!DOCTYPE html>
<!--[if IE 9]><html lang="en" class="lte-ie9"><![endif]-->
<!--[if gt IE 9]><html lang="en" class="lte-ie9"><![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @section('seo')
        <meta name="description" content="{{ setting('branding.description') }}">
        <meta name="keywords" content="{{ setting('branding.keywords') }}">
        <meta property="og:site_name" content="{{ setting('branding.title') }}"/>
        <meta property="og:image” content=”https://dishumor.com/preview.png"/>
    @show

    @if (setting('favicon'))
        <link rel="icon" href="{{ media(setting('favicon')) }}">
    @else
        <link rel="apple-touch-icon" sizes="57x57" href="{{ assetTheme('assets/img/favicon/apple-touch-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ assetTheme('assets/img/favicon/apple-touch-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ assetTheme('assets/img/favicon/apple-touch-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ assetTheme('assets/img/favicon/apple-touch-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ assetTheme('assets/img/favicon/apple-touch-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ assetTheme('assets/img/favicon/apple-touch-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ assetTheme('assets/img/favicon/apple-touch-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ assetTheme('assets/img/favicon/apple-touch-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ assetTheme('assets/img/favicon/apple-touch-icon-180x180.png') }}">
        <link rel="icon" type="image/png" href="{{ assetTheme('assets/img/favicon/favicon-32x32.png') }}" sizes="32x32">
        <link rel="icon" type="image/png" href="{{ assetTheme('assets/img/favicon/favicon-194x194.png') }}" sizes="194x194">
        <link rel="icon" type="image/png" href="{{ assetTheme('assets/img/favicon/favicon-96x96.png') }}" sizes="96x96">
        <link rel="icon" type="image/png" href="{{ assetTheme('assets/img/favicon/android-chrome-192x192.png') }}" sizes="192x192">
        <link rel="icon" type="image/png" href="{{ assetTheme('assets/img/favicon/favicon-16x16.png') }}" sizes="16x16">
        <link rel="manifest" href="{{ assetTheme('assets/img/favicon/manifest.json') }}">
    @endif
    <meta name="apple-mobile-web-app-title" content="Smile">
    <meta name="application-name" content="Smile">
    <meta name="msapplication-TileColor" content="#fdfdfd">
    <meta name="msapplication-TileImage" content="{{ assetTheme('assets/img/favicon/mstile-144x144.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="root" content="{{ route('home') }}">
    <meta name="lang.cancel" content="{{ __('Cancel') }}">
    @widget('meta-section')
    <title>
    @section('title')
        {{ setting('branding.title') }}
    @show
    </title>
    <?php 
    $v = uniqid(); 
    ?>
		<!-- Bootstrap Css -->
        <link href="{{ assetTheme('assets/css/bootstrap.min.css') }}" id="bootstrap-stylesheet" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ assetTheme('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ assetTheme('assets/css/app.min.css') }}" id="app-stylesheet" rel="stylesheet" type="text/css" />
	    <!-- Sweet Alert-->
        <link href="{{ assetTheme('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
	        <!-- Plugins js -->
        <script src="{{ assetTheme('assets/libs/katex/katex.min.js') }}"></script>
        <script src="{{ assetTheme('assets/libs/quill/quill.min.js') }}"></script>
        <!-- Plugins css -->
        <link href="{{ assetTheme('assets/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ assetTheme('assets/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ assetTheme('assets/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
        <!-- init js -->
        <script src="{{ assetTheme('assets/js/pages/form-editor.init.js') }}"></script>
    <link rel="stylesheet" href="{{ assetTheme('assets/css/mains.css?ver='.$v) }}">
    @widget('css-section') 

    @yield("css")
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdowns content */

window.Clipboard = (function(window, document, navigator) {
    var textArea,
        copy;

    function isOS() {
        return navigator.userAgent.match(/ipad|iphone/i);
    }

    function createTextArea(text) {
        textArea = document.createElement('textArea');
        textArea.value = text;
        document.body.appendChild(textArea);
    }

    function selectText() {
        var range,
            selection;

        if (isOS()) {
            range = document.createRange();
            range.selectNodeContents(textArea);
            selection = window.getSelection();
            selection.removeAllRanges();
            selection.addRange(range);
            textArea.setSelectionRange(0, 999999);
        } else {
            textArea.select();
        }
    }

    function copyToClipboard() {        
        document.execCommand('copy');
        document.body.removeChild(textArea);
    }

    copy = function(text) {
        createTextArea(text);
        selectText();
        copyToClipboard();
    };

    return {
        copy: copy
    };
})(window, document, navigator);

jQuery(document).ready(function($) {

    $('.copy_text').click(function (e) {
       e.preventDefault();
       var copyText = $(this).attr('href');
       Clipboard.copy(copyText);

       $(".popup-overlays, .popup-content").addClass("active");
       setTimeout(function () {
            $(".popup-overlays, .popup-content").removeClass("active");
       }, 1700);
       
    });


    /*$('.copy_text').click(function (e) {
       e.preventDefault();
       var copyText = $(this).attr('href');

       document.addEventListener('copy', function(e) {
          e.clipboardData.setData('text/plain', copyText);
          e.preventDefault();
       }, true);

       document.execCommand('copy');  
       // console.log('Link copied');
       // alert('Link copied');
       $(".popup-overlays, .popup-content").addClass("active");

       setTimeout(function () {
            $(".popup-overlays, .popup-content").removeClass("active");
       }, 1700);
       
    });*/



    $('.dropbtn').click(function() {
        $(this).parent().parent().parent().parent().find('.mydropdowns').toggleClass('show');
    });
    
});


// Close the dropdowns if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdownss = document.getElementsByClassName("dropdowns-content");
    var i;
    for (i = 0; i < dropdownss.length; i++) {
      var opendropdowns = dropdownss[i];
      if (opendropdowns.classList.contains('show')) {
        opendropdowns.classList.remove('show');
      }
    }
  }
}
</script>
</head>
<body class="no" style="background-color:#fff;" data-layout-size="boxed">
<!-- [if lt IE 9]
<div class="legacy-ie">
    <p>
        <strong>Unsupported browser!</strong> This site was designed for modern browsers and tested with Internet Explorer version 9 and later. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
    </p>
</div>
<![endif] -->
<!-- Begin page -->
        <div id="wrapper">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="d-none d-sm-block">
                        <form action="{{ route('search') }}" id="main-search" class="app-search">
                            <div class="app-search-box">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q" placeholder="{{ __('search') }}...">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit">
                                            <i class="fe-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </li>
        
                    <li class="dropdown notification-list">
                       @if (auth()->user())
                        <a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="fe-bell noti-icon"></i>
                            <span class="badge badge-danger rounded-circle noti-icon-badge">{{ $notifications->total() }}</span>
                        </a>
						@endif
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="m-0">
                                    <span class="float-right">
                                        @if ($notifications->total())
                <form action="{{ route('notifications.deleteAll') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="delete">
                    <button type="submit"><small>{{ __('Mark all as read') }}</small></button>
                </form>
            @endif
                                    </span>Notifications (<span>{{ $notifications->total() }}</span>)
                                </h5>
                            </div>

                 @if (auth()->check())
                    @include('site::notifications.dropdown')
                @endif

                            <!-- All-->
                            <a href="{{ route('notifications.deleteAll') }}" class="dropdown-item text-center text-primary notify-item notify-all">
                                View all
                                <i class="fi-arrow-right"></i>
                            </a>

                        </div>
                    </li>
                    <li class="dropdown notification-list">
                        <a href="{{ route('random') }}" class="nav-link right-bar-toggle waves-effect">
                            <i class="fas fa-random noti-icon"></i>
                        </a>
                    </li>
					 <li class="dropdown notification-list">
                        <a href="https://dishumor.com/posts/post/add" class="nav-link right-bar-toggle waves-effect">
                            <i class="fas fa-plus-square noti-icon"></i>
                        </a>
                    </li>


                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="{{ route('home') }}" class="logo logo-dark text-center">
                        <span class="logo-lg">
                            <img class="logo-main" src="{{ setting('mobile-logo') ? media(setting('mobile-logo')) : assetTheme('assets/img/logo-mobile.png') }}">
                        </span>
                        <span class="logo-sm">
                            <img src="{{ assetTheme('assets/img/logo-sm.png') }}" alt="" height="45">
                        </span>
                    </a>
                    <a href="index.html" class="logo logo-light text-center">
                        <span class="logo-lg">
                            <img src="assets/images/logo-light.png" alt="" height="16">
                        </span>
                        <span class="logo-sm">
                            <img src="assets/images/logo-sm.png" alt="" height="24">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
                    <li>
                        <button class="button-menu-mobile disable-btn waves-effect">
                            <i class="fe-menu"></i>
                        </button>
					     						<a href="{{ route('home') }}" class="logo logo-dark text-center">
                        <span class="logo-mb">
                            <img class="logo-mob" src="{{ setting('mobile-logo') ? media(setting('mobile-logo')) : assetTheme('assets/img/logo-mobile.png') }}">
                        </span></a>              
                    </li>

                    <li>

                    </li>
        
                </ul>

            </div>
            <!-- end Topbar -->

                      <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">
                <div class="slimscroll-menu">
<div class="user-box text-center">
						                @widget('left-sidebar.before')

                @if (auth()->user())

                @endif
                @if (canContact())
                @endif
                @if ( ! auth()->check())
                    <!-- <li><a href="#" class="modal-trigger" data-target=".modal-log-in">{{ lower(__('Log In')) }}</a></li> -->
	                <a href="{{ route('login_page') }}"><button type="button" class="btn btn-light width-xs waves-effect">Sign In</button></a>
                    <a href="{{ route('register_page') }}"><button type="button" class="btn btn-primary waves-effect width-xs waves-light">Sign Up</button></a>
                @else
                @endif

                @widget('left-sidebar.after')
						@if (auth()->user())
       
        @if ( ! auth()->check())
                    <!-- <li><a href="#" class="modal-trigger" data-target=".modal-log-in">{{ lower(__('Log In')) }}</a></li> -->
					<a href="{{ route('profile.overview', auth()->user()->name) }}"><img src="{{ avatar(auth()->user()->avatar) }}" alt="" class="rounded-circle img-thumbnail avatar-md"></a>
                    <a href="{{ route('login_page') }}">Sign In</a>
                    <a href="{{ route('register_page') }}">Register</a>
                @else
                        <div class="dropdown">
							<a href="#" data-toggle="dropdown"  aria-expanded="false"><img src="{{ avatar(auth()->user()->avatar) }}" class="rounded-circle img-thumbnail avatar-md"></a>
                            <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown"  aria-expanded="false">{{ auth()->user()->name }}</a>
                            <div class="dropdown-menu user-pro-dropdown">

                                <!-- item-->
                                <a href="{{ route('profile.overview', auth()->user()->name) }}" class="dropdown-item notify-item">
                                    <i class="fe-user mr-1"></i>
                                    <span>My Account</span>
                                </a>
    
                                <!-- item-->
                                <a href="{{ route('account.settings') }}" class="dropdown-item notify-item">
                                    <i class="fe-settings mr-1"></i>
                                    <span>Settings</span>
                                </a>
    
                                <!-- item-->
                                <a href="{{ route('logout') }}" class="dropdown-item notify-item">
                                    <i class="fe-log-out mr-1"></i>
                                    <span>{{ lower(__('Log out')) }}</span>
                                </a>
    
                            </div>
                        </div>                @endif
        @endif
						            <ul>

            </ul>
                    </div>
                    <!-- User box -->
                    

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="{{ route('home') }}">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Home </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fab fa-hotjar"></i>
                                    <span> Popular </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('top.weekly') }}">This week</a></li>
                                    <li><a href="{{ route('top.monthly') }}">This month</a></li>
                                    <li><a href="{{ route('top.yearly') }}">This year</a></li>
                                </ul>
                            </li>

                            <li class="menu-title">Meme Categories</li>
                    @foreach ($categories as $pos => $category)
                        @if ($pos < 5)
                        <li @if (activeCategory($category, $pos)) class="active" @endif>
                            <a href="{{ route('home', $category->slug) }}">
                                <i class="t fas fa-circle-notch"></i><span>{{ $category->title }}</span>
                            </a>
                        </li>
                        @endif
                    @endforeach
                    @if ($categories->count() > 4)
                    @endif
                </ul>
                <ul class="more-menu-items hide dropdown">
                    @foreach ($categories as $pos => $category)
                        @if ($pos > 3)

                        @endif
                    @endforeach
                        </ul>
					<li class="menu-title">What's Trending</li>
                    @if( isset($tags) )
                    @include('site::partials.top_tags')
                    @endif
					<li class="menu-title">Follow Us</li>
					<div class="followus">
					<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0&appId=238359550101852&autoLogAppEvents=1" nonce="weoOZtsm"></script>
<div class="fb-like" data-href="https://facebook.com/DISHumor" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="false"></div>
					</div>
					<div class="copyright-ft"><span> 2021 &copy; <a href="{{ route('home') }}">DIS Humor</a></span></div>                  
                                           
                                    
                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

<div class="content-page">
                <div class="content">

<!-- Start Content-->
<header class="page-header">

</header>
<div class="container">
    <aside class="col-1"> <!-- left sidebar -->
        
         
        <nav class="global-navigation">
            
            <ul>
                @widget('left-sidebar.before')

                @if (auth()->user())

                @endif
                @if (canContact())
                @endif
                @if ( ! auth()->check())

                @else
                @endif

                @widget('left-sidebar.after')
            </ul>
        </nav>
    </aside> <!-- end left sidebar -->

    <div class="">
       <header class="menu">

         
    
            
        </header> <!-- end of menu -->    

        @yield('content')
    </div> <!-- end main-content -->

    <aside class="col-3">          <!-- right sidebar -->

        @if (setting('social.on', false))
            @include('site::partials.social')
        @endif


    </aside> <!-- right sidebar -->


</div> <!-- end of container -->


<!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Vendor js -->
        <script src="{{ assetTheme('assets/js/vendor.min.js') }}"></script>

        <!-- knob plugin -->
        <script src="{{ assetTheme('assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>

        <!--Morris Chart-->
        <script src="{{ assetTheme('assets/libs/morris-js/morris.min.js') }}"></script>
        <script src="{{ assetTheme('assets/libs/raphael/raphael.min.js') }}"></script>

        <!-- Dashboard init js-->
        <script src="{{ assetTheme('assets/js/pages/dashboard.init.js') }}"></script>

        <!-- App js -->
        <script src="{{ assetTheme('assets/js/app.min.js') }}"></script>
		<script src="{{ assetTheme('assets/js/app.js') }}"></script>
	    <script src="{{ assetTheme('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

        <!-- Sweet alert init js-->
        <script src="{{ assetTheme('assets/js/pages/sweet-alerts.init.js') }}"></script>

	    <!-- Modals -->
@include('site::modals.login')
@include('site::modals.register')
@include('site::modals.upload')

@section('js')
    <script src="{{ assetTheme('assets/vendors/js/libs.js') }}"></script>
    <script src="{{ assetTheme('assets/js/app.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @include('site::partials.social-scripts')

    @if (setting('analytics.code'))
        {!! setting('analytics.code')!!}
    @endif
    @widget('js-section')
@show

</body>
</html>
