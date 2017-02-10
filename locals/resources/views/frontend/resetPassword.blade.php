@extends('layouts.front_end_form_layout')

@section('content')
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="{{asset('/'.App::getLocale())}}"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Reset Password</li>
     </ul>
   </div>
   <div class="services">
      <div class="col-sm-6 login_left">
       <form method='POST' id="reset-password-form" >
        <div class="form-item form-type-textfield form-item-name">
          <label for="edit-name">New Password <span class="form-required" title="This field is required.">*</span></label>
          <input type="password" name="new_password" value="" size="60" maxlength="60" class="form-text required">
        </div>
        <div class="form-item form-type-textfield form-item-name">
          <label for="edit-name">Confirm Password <span class="form-required" title="This field is required.">*</span></label>
          <input type="password" name="confirm_password" value="" size="60" maxlength="60" class="form-text required">
        </div>
        <div class="form-actions">
          <input type="submit" value="Submit" class="btn_1 submit">
        </div>
       </form>
    </div>
    <div class="clearfix"> </div>
   </div>
  </div>
</div>
@endsection