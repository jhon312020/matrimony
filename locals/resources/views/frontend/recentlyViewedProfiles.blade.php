@extends('layouts.front_end_form_layout')

@section('content')
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="{{asset(App::getLocale())}}"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Recently viewed profiles</li>
     </ul>
   </div>

   <div class="col-md-9 profile_left2">
    @include('frontend.memberResultContainer')
  </div>
    <div class="col-md-3 match_right">
      @include('frontend.searchProfileForm')
   </div>
   <div class="clearfix"> </div>
  </div> 
</div>
@endsection