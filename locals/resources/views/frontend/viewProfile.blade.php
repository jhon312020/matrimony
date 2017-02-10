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
      <h2>Profile Id : {{$user->rand_id}}</h2>
      <div class="col_3">
      <div class="col-sm-4 row_2" style="position:relative">
          @if ($user->avatar)
            <img src="{{asset('assets/profileimages/'.$user->avatar)}}" width="200" height="200" />
          @else 
            <img src="{{asset('assets/images/default_profile.jpg')}}" width="200" height="200" />
          @endif
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
          @if (Auth::guard('user')->check())
            @if (!in_array($profile->member_id, Session::get('interested_list')))
              <a class="vertical jsendInterest" href="javascript:;" data-target="{{$profile->member_id}}" data-action="{{asset(App::getLocale().'/sendInterest')}}" >Send Interest</a>
            @else
              <a class="vertical" href="javascript:;">Interested</a>
            @endif
          @endif
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
              <h1>Personal detail</h1>
              <div id="profile-text-area">
                <span id="about_myself_label">{{$profile->about_myself}}</span>
              </div>
            </div>
            <div class="basic_1">
              <h3>Basics & Lifestyle</h3>
              @include('frontend.profileview.basic_information')
            </div>
            <div class="basic_1">
              <h3>Religious / Social & Astro Background</h3>
              @include('frontend.profileview.religious_information')
            </div>
            <div class="basic_1">
              <h3>Education & Career</h3>
              @include('frontend.profileview.education_information')
            </div>
            <div class="basic_1">
              <h3>Location information</h3>
              @include('frontend.profileview.location_information')
            </div>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
            <div class="basic_1">
              <h3>Family information</h3>
              @include('frontend.profileview.family_information')
            </div>
         </div>
         <div role="tabpanel" class="tab-pane fade" id="profile1" aria-labelledby="profile-tab1">
            <div class="basic_1">
              <h3>Partner preferences</h3>
              @include('frontend.profileview.preference_information')
            </div>
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
@endsection