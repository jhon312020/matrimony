@extends('layouts.front_end_form_layout')

@section('content')
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="{{asset(App::getLocale())}}"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">View Profile</li>
     </ul>
   </div>
   <div class="profile">
     <div class="col-md-8 profile_left">
      <h2>Profile Id : {{$user->rand_id}}
        @if (Session::get('purchasedPackage'))
          <span class="blink">{{Session::get('purchasedPackage')->package->name}}</span>
        @endif
      </h2>
      <div class="col_3">
      <div class="col-sm-4 row_2" style="position:relative">
          @if ($user->avatar)
            <img src="{{asset('assets/profileimages/'.$user->avatar)}}" width="200" height="200" />
          @else 
            <img src="{{asset('assets/images/default_profile.jpg')}}" width="200" height="200" />
          @endif
          <span data-toggle="modal" data-target="#uploadImageModal" class="image-upload-overlay">
            <i class="fa fa-camera" style="color:white;font-size:20px;"></i>  <a href="javascript:;" style="color:white;padding-top:10px;">IMAGE UPLOAD</a>
          </span>
      </div>
      <div class="col-sm-8 row_1">
        <table class="table_working_hours">
          <tbody>
            <tr class="opened_1">
              <td class="day_label">Name :</td>
              <td class="day_value name_label" >{{($profile->name)?$profile->name:'Not Specified'}}</td>
            </tr>
            <tr class="opened">
              <td class="day_label">Age :</td>
              <td class="day_value age_label" >
                <?php
                  $from_date = new DateTime($user->date_of_birth);
                  $to_date = new DateTime('today');
                  echo $to_date->diff($from_date)->y.' Yrs';
                ?>
              </td>
            </tr>
            <tr class="opened">
              <td class="day_label">Height :</td>
              <td class="day_value"><span class="height_label">{{($profile->height)?$profile->height:'Not Specified'}}</span> Cm</td>
            </tr>
            <tr class="opened">
              <td class="day_label">Religion :</td>
              <td class="day_value religion_id_label">{{isset($religions[$profile->religion_id]) ? $religions[$profile->religion_id] : 'Not Specified'}}</td>
            </tr>
            <tr class="opened">
              <td class="day_label">Marital Status :</td>
              <td class="day_value status_id_label">{{isset($statuses[$profile->status_id]) ? $statuses[$profile->status_id] : 'Not Specified'}}</td>
            </tr>
              <tr class="opened">
              <td class="day_label">Location :</td>
              <td class="day_value country_label">{{($profile->country)? $profile->country : 'Not Specified'}}</td>
            </tr>
            </tbody>
        </table>
        <div>
          <a href="{{$profile->facebook}}" class="facebook_label" style="text-align:center"><i class="fa fa-facebook fa1"></i></a>
          <a href="{{$profile->twitter}}" class="twitter_label" style="text-align:center"><i class="fa fa-twitter fa1"></i></a>
          <a href="{{$profile->google_plus}}" class="google_plus_label" style="text-align:center"><i class="fa fa-google-plus fa1"></i></a>
        </div>        
      </div>
      <div class="clearfix"> </div>
    </div>
    <div class="col_4">
        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
         <ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist">
          <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">About Myself</a></li>
          <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Family Details</a></li>
          <li role="presentation"><a href="#profile1" role="tab" id="profile-tab1" data-toggle="tab" aria-controls="profile1">Partner Preference</a></li>
         </ul>
         <div id="myTabContent" class="tab-content">
          <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
            <div class="tab_box">
              <h1>Personal detail &nbsp;<i class="fa fa-edit text-primary" onclick="toggleForm('profile-text-area','profile-text-area-form')" style="cursor:pointer;"></i></h1>
              <div id="profile-text-area">
                <span id="about_myself_label">{{$profile->about_myself}}</span>
              </div>
              <form onsubmit="return false;" id="profile-text-area-form" action="{{asset(App::getLocale().'/updateProfile')}}" style="display:none;">
                <textarea class="form-text" id="about_myself" name="about_myself" rows="5" style="width:100%;height:100px;">{{$profile->about_myself}}</textarea>
                <br/>
                <button onclick="updateProfile('profile-text-area-form')" class="btn_1 submit">Save</button>&nbsp;&nbsp;&nbsp;
                <button onclick="toggleForm('profile-text-area-form','profile-text-area')" class="btn_1 submit">Cancel</button>
              </form>
            </div>
            @include('frontend.profileform.jadhaham_information')
            @include('frontend.profileform.basic_information')
            @include('frontend.profileform.religious_information')
            @include('frontend.profileform.education_information')
            @include('frontend.profileform.location_information')
            @include('frontend.profileform.social_media_information')
          </div>
          <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
            @include('frontend.profileform.family_information')
         </div>
         <div role="tabpanel" class="tab-pane fade" id="profile1" aria-labelledby="profile-tab1">
            @include('frontend.profileform.preference_information')
         </div>
         </div>
      </div>
     </div>
     </div>
     <div class="col-md-4 profile_right">
      @include('frontend.searchProfileForm')
        </div>
       <div class="clearfix"> </div>
    </div>
  </div>
</div>
<div class="modal fade" id="uploadImageModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
      <form action="{{asset(App::getLocale().'/uploadProfilePicture')}}" method="POST" enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload Profile Photo</h4>
        </div>
        <div class="modal-body">
            <input type="file" name="avatar" id="avatar" required>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn_1 submit">Save</button>&nbsp;&nbsp;&nbsp;
          <button data-dismiss="modal" class="btn_1 submit" type="button">Cancel</button>
        </div>
      </form>
      </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function(){
  $('.blink').each(function() {
      var elem = $(this);
      $(this).css('color','#ff7700');
      setInterval(function() {
          if (elem.css('visibility') == 'hidden') {
              elem.css('visibility', 'visible');
          } else {
              elem.css('visibility', 'hidden');
          }    
      }, 500);
  });
  $('.fa-edit').before('&nbsp;&nbsp;');
  $('.fa-edit').css('color','#ffa417');
  $('.fa-edit').html(' Edit');
});
</script>
@endsection