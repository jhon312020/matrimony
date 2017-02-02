@extends('layouts.front_end_form_layout')

@section('content')
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="{{asset(App::getLocale())}}"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">About</li>
     </ul>
   </div>
   <div class="about">
      <div class="col-md-6 about_left">
        <img src="{{asset('assets/front-end/images/a3.jpg')}}" class="img-responsive" alt=""/>
      </div>
      <div class="col-md-6 about_right">
        <h1>About us</h1>
        @if(App::getLocale() == 'ta')
          <?php echo ucfirst($page->ta_content); ?>
        @else
          <?php echo ucfirst($page->en_content); ?>
        @endif
    </div>
      </div>
      <div class="clearfix"> </div>
   </div>
  </div>
</div>
@endsection