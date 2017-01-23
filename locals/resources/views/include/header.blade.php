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
                <li><a href="#">About</a></li>
            <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Matches<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">New Matches</a></li>
                    <li><a href="#">Who Viewed my Profile</a></li>
                    <li><a href="#">Viewed & not Contacted</a></li>
                    <li><a href="#">Premium Members</a></li>
                    <li><a href="#">Shortlisted Profile</a></li>
                  </ul>
                </li>
          <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Search<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Regular Search</a></li>
                    <li><a href="#">Recently Viewed Profiles</a></li>
                    <li><a href="#">Search By Profile ID</a></li>
                    <li><a href="#">Faq</a></li>
                    <li><a href="#">Shortcodes</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Messages<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Inbox</a></li>
                    <li><a href="#">New</a></li>
                    <li><a href="#">Accepted</a></li>
                    <li><a href="#">Sent</a></li>
                    <li><a href="#">Upgrade</a></li>
                  </ul>
                </li>
                <li class="last"><a href="#">Contacts</a></li>
            </ul>
         </div><!-- /.navbar-collapse -->
        </nav>
       </div> <!-- end pull-right -->
          <div class="clearfix"> </div>
        </div> <!-- end container -->
      </div> <!-- end navbar-inner -->
    </div> <!-- end navbar-inverse-blue -->
<!-- ============================  Navigation End ============================ -->
