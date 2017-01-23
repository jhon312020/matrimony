<!DOCTYPE HTML>
<html>
<head>
<title>Marital an Wedding Category Flat Bootstarp Resposive Website Template | Register :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Marital Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="{{asset('assets/front-end/css/bootstrap-3.1.1.min.css')}}" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('assets/front-end/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/front-end/js/bootstrap.min.js')}}"></script>
<!-- Custom Theme files -->
<link href="{{asset('assets/front-end/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
<!--font-Awesome-->
<link href="{{asset('assets/front-end/css/font-awesome.css')}}" rel="stylesheet"> 
<!----font-Awesome----->
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
</head>
<body>
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
            <li><a href="{{asset(Request::getLocale().'/logout')}}">Logout</a></li>
          @else
            <li><a href="{{asset(Request::getLocale().'/login')}}">Login</a></li>
            <li><a href="{{asset(Request::getLocale().'/register')}}">Register</a></li>
          @endif
          </ul>
        </li>
         </ul>
             </nav>
           </div>
           <a class="brand" href="{{asset(Request::getLocale())}}"><img src="{{asset('assets/front-end/images/logo.png')}}" alt="logo"></a>
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
                <li><a href="{{asset(Request::getLocale())}}">Home</a></li>
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
<div class="grid_3">
  <div class="container">
    @yield('content')
  </div>
</div>
<!-- <div class="map">
  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3150859.767904157!2d-96.62081048651531!3d39.536794757966845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1408111832978"> </iframe>
</div> -->
<div class="footer">
      <div class="container">
        <div class="col-md-4 col_2">
          <h4>About Us</h4>
          <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris."</p>
        </div>
        <div class="col-md-2 col_2">
          <h4>Help & Support</h4>
          <ul class="footer_links">
            <li><a href="#">24x7 Live help</a></li>
            <li><a href="#">Contact us</a></li>
            <li><a href="#">Feedback</a></li>
            <li><a href="#">FAQs</a></li>
          </ul>
        </div>
        <div class="col-md-2 col_2">
          <h4>Quick Links</h4>
          <ul class="footer_links">
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms and Conditions</a></li>
            <li><a href="#">Services</a></li>
          </ul>
        </div>
        <div class="col-md-2 col_2">
          <h4>Social</h4>
          <ul class="footer_social">
          <li><a href="#"><i class="fa fa-facebook fa1"> </i></a></li>
          <li><a href="#"><i class="fa fa-twitter fa1"> </i></a></li>
          <li><a href="#"><i class="fa fa-google-plus fa1"> </i></a></li>
          <li><a href="#"><i class="fa fa-youtube fa1"> </i></a></li>
          </ul>
        </div>
        <div class="clearfix"> </div>
        <div class="copy">
           <p>Copyright © 2015 Marital . All Rights Reserved  | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
          </div>
      </div>
</div>
</body>
</html>
