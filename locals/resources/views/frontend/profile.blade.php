@extends('layouts.front_end_form_layout')

@section('content')
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.html"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">View Profile</li>
     </ul>
   </div>
   <div class="profile">
     <div class="col-md-8 profile_left">
      <h2>Profile Id : {{$user->rand_id}}</h2>
      <div class="col_3">
      <div class="col-sm-4 row_2">
          @if ($user->avatar)
            <img src="{{asset('assets/images/default_profile.jpg')}}" width="200" height="200" />
          @else 
            <img src="{{asset('assets/images/default_profile.jpg')}}" width="200" height="200" />
          @endif
      </div>
      <div class="col-sm-8 row_1">
        <table class="table_working_hours">
          <tbody>
            <tr class="opened_1">
              <td class="day_label">Name :</td>
              <td class="day_value">{{$profile->name}}</td>
            </tr>
            <tr class="opened">
              <td class="day_label">Age / Height :</td>
              <td class="day_value">28, 5ft 5in / 163cm</td>
            </tr>
            <tr class="opened">
              <td class="day_label">Religion :</td>
              <td class="day_value">Sikh</td>
            </tr>
            <tr class="opened">
              <td class="day_label">Marital Status :</td>
              <td class="day_value">Single</td>
            </tr>
              <tr class="opened">
              <td class="day_label">Location :</td>
              <td class="day_value">India</td>
            </tr>
              <tr class="closed">
              <td class="day_label">Profile Created by :</td>
              <td class="day_value closed"><span>Self</span></td>
            </tr>
              <tr class="closed">
              <td class="day_label">Education :</td>
              <td class="day_value closed"><span>Engineering</span></td>
            </tr>
            </tbody>
        </table>
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
              <h1>Personal detail <i class="fa fa-edit" onclick="toggleForm('profile-text-area','profile-text-area-form')" style="cursor:pointer;"></i></h1>
              <div id="profile-text-area">
                <span id="about_myself_label">{{$profile->about_myself}}</span>
              </div>
              <form onsubmit="return false;" id="profile-text-area-form" action="{{asset(App::getLocale().'/updateProfile')}}" style="display:none;">
                <textarea class="form-text" id="about_myself" name="about_myself" rows="5" style="width:100%;height:100px;">{{$profile->about_myself}}</textarea>
                <br/>
                <button onclick="toggleForm('profile-text-area-form','profile-text-area')" class="btn_1 submit">Cancel</button>&nbsp;&nbsp;&nbsp;
                <button onclick="updateProfile('profile-text-area-form')" class="btn_1 submit">Save</button>
              </form>
            </div>
            @include('frontend.profileform.basic_information')
            @include('frontend.profileform.religious_information')
            @include('frontend.profileform.education_information')
          </div>
          <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
            <div class="basic_3">
              <h4>Family Details</h4>
              <div class="basic_1 basic_2">
              <h3>Basics</h3>
              <div class="col-md-6 basic_1-left">
                <table class="table_working_hours">
                  <tbody>
                    <tr class="opened">
                  <td class="day_label">Father's Occupation :</td>
                  <td class="day_value">Not Specified</td>
                </tr>
                    <tr class="opened">
                  <td class="day_label">Mother's Occupation :</td>
                  <td class="day_value">Not Specified</td>
                </tr>
                  <tr class="opened">
                  <td class="day_label">No. of Brothers :</td>
                  <td class="day_value closed"><span>Not Specified</span></td>
                </tr>
                  <tr class="opened">
                  <td class="day_label">No. of Sisters :</td>
                  <td class="day_value closed"><span>Not Specified</span></td>
                </tr>
               </tbody>
                  </table>
                 </div>
               </div>
            </div>
         </div>
         <div role="tabpanel" class="tab-pane fade" id="profile1" aria-labelledby="profile-tab1">
            <div class="basic_1 basic_2">
               <div class="basic_1-left">
                <table class="table_working_hours">
                  <tbody>
                    <tr class="opened">
                  <td class="day_label">Age   :</td>
                  <td class="day_value">28 to 35</td>
                </tr>
                    <tr class="opened">
                  <td class="day_label">Marital Status :</td>
                  <td class="day_value">Single</td>
                </tr>
                  <tr class="opened">
                  <td class="day_label">Body Type :</td>
                  <td class="day_value closed"><span>Doesn't matter</span></td>
                </tr>
                  <tr class="opened">
                  <td class="day_label">Complexion :</td>
                  <td class="day_value closed"><span>Doesn't matter</span></td>
                </tr>
                <tr class="opened">
                  <td class="day_label">Height 5ft 9 in / 175cm :</td>
                  <td class="day_value closed"><span>Doesn't matter</span></td>
                </tr>
                <tr class="opened">
                  <td class="day_label">Diet :</td>
                  <td class="day_value closed"><span>Doesn't matter</span></td>
                </tr>
                <tr class="opened">
                  <td class="day_label">Kujadosham / Manglik :</td>
                  <td class="day_value closed"><span>No</span></td>
                </tr>
                <tr class="opened">
                  <td class="day_label">Religion :</td>
                  <td class="day_value closed"><span>Doesn't matter</span></td>
                </tr>
                <tr class="opened">
                  <td class="day_label">Caste :</td>
                  <td class="day_value closed"><span>Doesn't matter</span></td>
                </tr>
                <tr class="opened">
                  <td class="day_label">Mother Tongue :</td>
                  <td class="day_value closed"><span>Doesn't matter</span></td>
                </tr>
                <tr class="opened">
                  <td class="day_label">Education :</td>
                  <td class="day_value closed"><span>Doesn't matter</span></td>
                </tr>
                <tr class="opened">
                  <td class="day_label">Occupation :</td>
                  <td class="day_value closed"><span>Doesn't matter</span></td>
                </tr>
                <tr class="opened">
                  <td class="day_label">Country of Residence :</td>
                  <td class="day_value closed"><span>Doesn't matter</span></td>
                </tr>
                <tr class="opened">
                  <td class="day_label">State :</td>
                  <td class="day_value closed"><span>Doesn't matter</span></td>
                </tr>
                <tr class="opened">
                  <td class="day_label">Residency Status :</td>
                  <td class="day_value closed"><span>Doesn't matter</span></td>
                </tr>
               </tbody>
                  </table>
                </div>
             </div>
         </div>
         </div>
      </div>
     </div>
     </div>
     <div class="col-md-4 profile_right">
      <div class="newsletter">
       <form>
        <input type="text" name="ne" size="30" required="" placeholder="Enter Profile ID :">
        <input type="submit" value="Go">
       </form>
        </div>
        <div class="view_profile">
          <h3>View Similar Profiles</h3>
          <ul class="profile_item">
            <a href="#">
             <li class="profile_item-img">
                <img src="images/p5.jpg" class="img-responsive" alt=""/>
             </li>
             <li class="profile_item-desc">
                <h4>2458741</h4>
                <p>29 Yrs, 5Ft 5in Christian</p>
                <h5>View Full Profile</h5>
             </li>
             <div class="clearfix"> </div>
            </a>
           </ul>
           <ul class="profile_item">
            <a href="#">
             <li class="profile_item-img">
                <img src="images/p6.jpg" class="img-responsive" alt=""/>
             </li>
             <li class="profile_item-desc">
                <h4>2458741</h4>
                <p>29 Yrs, 5Ft 5in Christian</p>
                <h5>View Full Profile</h5>
             </li>
             <div class="clearfix"> </div>
            </a>
           </ul>
           <ul class="profile_item">
            <a href="#">
             <li class="profile_item-img">
                <img src="images/p7.jpg" class="img-responsive" alt=""/>
             </li>
             <li class="profile_item-desc">
                <h4>2458741</h4>
                <p>29 Yrs, 5Ft 5in Christian</p>
                <h5>View Full Profile</h5>
             </li>
             <div class="clearfix"> </div>
            </a>
           </ul>
           <ul class="profile_item">
            <a href="#">
             <li class="profile_item-img">
                <img src="images/p8.jpg" class="img-responsive" alt=""/>
             </li>
             <li class="profile_item-desc">
                <h4>2458741</h4>
                <p>29 Yrs, 5Ft 5in Christian</p>
                <h5>View Full Profile</h5>
             </li>
             <div class="clearfix"> </div>
            </a>
           </ul>
       </div>
       <div class="view_profile view_profile1">
          <h3>Members who viewed this profile also viewed</h3>
          <ul class="profile_item">
            <a href="#">
             <li class="profile_item-img">
                <img src="images/p9.jpg" class="img-responsive" alt=""/>
             </li>
             <li class="profile_item-desc">
                <h4>2458741</h4>
                <p>29 Yrs, 5Ft 5in Christian</p>
                <h5>View Full Profile</h5>
             </li>
             <div class="clearfix"> </div>
            </a>
           </ul>
           <ul class="profile_item">
            <a href="#">
             <li class="profile_item-img">
                <img src="images/p10.jpg" class="img-responsive" alt=""/>
             </li>
             <li class="profile_item-desc">
                <h4>2458741</h4>
                <p>29 Yrs, 5Ft 5in Christian</p>
                <h5>View Full Profile</h5>
             </li>
             <div class="clearfix"> </div>
            </a>
           </ul>
           <ul class="profile_item">
            <a href="#">
             <li class="profile_item-img">
                <img src="images/p11.jpg" class="img-responsive" alt=""/>
             </li>
             <li class="profile_item-desc">
                <h4>2458741</h4>
                <p>29 Yrs, 5Ft 5in Christian</p>
                <h5>View Full Profile</h5>
             </li>
             <div class="clearfix"> </div>
            </a>
           </ul>
           <ul class="profile_item">
            <a href="#">
             <li class="profile_item-img">
                <img src="images/p12.jpg" class="img-responsive" alt=""/>
             </li>
             <li class="profile_item-desc">
                <h4>2458741</h4>
                <p>29 Yrs, 5Ft 5in Christian</p>
                <h5>View Full Profile</h5>
             </li>
             <div class="clearfix"> </div>
            </a>
           </ul>
         </div>
        </div>
       <div class="clearfix"> </div>
    </div>
  </div>
</div>
@endsection