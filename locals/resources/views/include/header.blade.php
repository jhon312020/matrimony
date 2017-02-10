<!-- ============================  Navigation Start =========================== -->
 <div class="navbar navbar-inverse-blue navbar">
    <!--<div class="navbar navbar-inverse-blue navbar-fixed-top">-->
      <div class="navbar-inner navbar-inner_1">
        <div class="container">
           <div class="navigation">
             <nav id="colorNav">
         <ul>
        <li class="green">
          <a href="#" class="icon-home"></a>
          <ul>
          @if(Auth::guard('user')->check())
            <li><a href="{{asset(App::getLocale().'/logout')}}">Logout</a></li>
          @else
            <li><a href="{{asset(App::getLocale().'/login')}}">Login</a></li>
            <li><a href="{{asset(App::getLocale().'/register')}}">Register</a></li>
          @endif
          </ul>
        </li>
         </ul>
             </nav>
           </div>
           <a class="brand" href="{{asset(App::getLocale())}}"><img src="{{asset('assets/front-end/images/logo.png')}}" alt="logo"></a>
           <div class="pull-right">
            <nav class="navbar nav_bottom" role="navigation">
 
     <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header nav_2">
          <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">Menu
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>
       </div>

       <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
            <ul class="nav navbar-nav nav_1">
                <li><a href="{{asset(App::getLocale())}}">Home</a></li>
                @if (Auth::guard('user')->check())
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Matches<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="{{asset(App::getLocale().'/matchingProfiles')}}">Matching profiles</a></li>
                      <li><a href="{{asset(App::getLocale().'/viewedMyProfile')}}">Who viewed my profile</a></li>
                    </ul>
                  </li>
                @endif 
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Search<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{asset(App::getLocale().'/search')}}">Regular search</a></li>
                    @if(Auth::guard('user')->check())
                      <li><a href="{{asset(App::getLocale().'/recentlyViewedProfiles')}}">Recently Viewed Profiles</a></li>
                    @endif
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Language<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{asset('ta/changeLanguage/'.App::getLocale())}}">Tamil</a></li>
                    <li><a href="{{asset('en/changeLanguage/'.App::getLocale())}}">English</a></li>
                  </ul>
                </li>
                <li><a href="{{asset(App::getLocale().'/aboutUs')}}">About Us</a></li>
                <li><a href="{{asset(App::getLocale().'/contactUs')}}">Contact Us</a></li>
                @if(Auth::guard('user')->check())
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      @if(Auth::guard('user')->user()->avatar && file_exists('assets/profileimages/'.Auth::guard('user')->user()->avatar))
                        <img src="{{asset('assets/profileimages/'.Auth::guard('user')->user()->avatar)}}" style="border-radius:50%" width="30" height="30" />
                      @else
                        <img src="{{asset('assets/images/default_profile.jpg')}}" style="border-radius:50%" width="30" height="30" />
                      @endif
                      <span class="name_label">
                        @if (Session::get('user.profile')->name)
                          {{Session::get('user.profile')->name}}
                        @else
                          {{Auth::guard('user')->user()->username}}
                        @endif
                      </span>
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="{{asset(App::getLocale().'/profile')}}">View Profile</a></li>
                      <li><a href="{{asset(App::getLocale().'/changePassword')}}">Change Password</a></li>
                      <li><a href="{{asset(App::getLocale().'/logout')}}">Logout</a></li>
                    </ul>
                  </li>
                @else
                  <li><a href="{{asset(App::getLocale().'/login')}}">Login</a></li>
                @endif
            </ul>
         </div><!-- /.navbar-collapse -->
        </nav>
       </div> <!-- end pull-right -->
          <div class="clearfix"> </div>
        </div> <!-- end container -->
      </div> <!-- end navbar-inner -->
    </div> <!-- end navbar-inverse-blue -->
<!-- ============================  Navigation End ============================ -->
