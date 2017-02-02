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
<!-- font-Awesome -->
<script src="{{asset('assets/front-end/js/matrimony.js')}}"></script>
</head>
<body>
    @include('include.header')
    @yield('content')
<!-- <div class="map">
  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3150859.767904157!2d-96.62081048651531!3d39.536794757966845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1408111832978"> </iframe>
</div> -->
@include('include.footer')

<input type="hidden" value="{{asset('/')}}" id="base_url" />
  @if (session('success_message'))
    <input type="hidden" value="{{ session('success_message') }}" id="success_status">
  @endif
  @if (session('error_message'))
    <input type="hidden" value="{{ session('error_message') }}" id="error_status">
  @endif

  <?php
    Request::session()->forget('success_message');
    Request::session()->forget('error_message');
  ?>
  <!-- Modal -->
  <div id="alertModal" class="modal fade" role="dialog">
    <div class="modal-dialog  modal-md">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn_1 submit" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
