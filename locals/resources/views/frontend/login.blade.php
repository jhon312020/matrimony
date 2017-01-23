@extends('layouts.front_end_form_layout')

@section('content')
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="{{asset('/'.App::getLocale())}}"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Login</li>
     </ul>
   </div>
   <div class="services">
      <div class="col-sm-6 login_left">
       <form method='POST' id="login-form" action="{{asset(App::getLocale().'/login')}}">
        <div class="form-item">
          @if($errorMessage)
            <div class="alert alert-danger">{{$errorMessage}}</div>
          @endif
        </div>
        <div class="form-item form-type-textfield form-item-name">
          <label for="edit-name">Username <span class="form-required" title="This field is required.">*</span></label>
          <input type="text" name="username" value="" size="60" maxlength="60" class="form-text required">
        </div>
        <div class="form-item form-type-password form-item-pass">
          <label for="edit-pass">Password <span class="form-required" title="This field is required.">*</span></label>
          <input type="password" name="password" size="60" maxlength="128" class="form-text required">
        </div>
        <div class="form-actions">
          <input type="submit" value="Log in" class="btn_1 submit">
        </div>
       </form>
    </div>
    <div class="clearfix"> </div>
   </div>
  </div>
</div>
@endsection