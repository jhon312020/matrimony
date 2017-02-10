@extends('layouts.front_end_form_layout')

@section('content')
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="{{asset(App::getLocale())}}"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Regular Search</li>
     </ul>
   </div>
<?php $loggedIn =  Auth::guard('user')->check(); ?>
<div class="col-md-9 search_left">
  <form method="POST" action="{{asset(App::getLocale().'/search')}}">
  @if (Auth::guard('user')->check())
    <input type="hidden" value="{{(Auth::guard('user')->user()->gender == 'Male')?'Female':'Male'}}" name="gender" />
  @else
  <div class="form_but1">
    <label class="col-sm-5 control-lable1" for="sex">Gender : </label>
    <div class="col-sm-7 form_radios">
      <?php
        $genders = ['Male','Female'];
      ?>
      @foreach ($genders as $value)
        @if (isset($input['gender']) && $input['gender'] == $value)
          <input type="radio" class="radio_1" name="gender" value="{{$value}}" checked/> {{$value}} &nbsp;&nbsp;
        @else
          <input type="radio" class="radio_1" name="gender" value="{{$value}}" /> {{$value}} &nbsp;&nbsp;
        @endif
      @endforeach
      <!--<hr />
      <p id="sel"></p><br />
      <input id="btnRadio" type="button" value="Get Selected Value" />-->
    </div>
    <div class="clearfix"> </div>
  </div>
  @endif
  @if ($loggedIn || (!$loggedIn && Session::get('settings')->status))
    <div class="form_but1">
    <label class="col-sm-5 control-lable1" for="sex">Status : </label>
    <div class="col-sm-7 form_radios">
      @foreach ($statuses as $key=>$value)
        @if (isset($input['status_id']) && in_array($key,$input['status_id']))
          <input type="checkbox" class="radio_1" name="status_id[]" value="{{$key}}" checked /> {{$value}} &nbsp;&nbsp;
        @else
          <input type="checkbox" class="radio_1" name="status_id[]" value="{{$key}}" /> {{$value}} &nbsp;&nbsp;
        @endif
      @endforeach
    </div>
    <div class="clearfix"> </div>
    </div>
  @endif
  <div class="form_but1">
    <label class="col-sm-5 control-lable1" for="sex">Country : </label>
    <div class="col-sm-7 form_radios">
      <div class="select-block1">
        <select name="country">
            <option value="">Country</option>
            @foreach ($countries as $key=>$value)
              @if (isset($input['country']) && $input['country'] == $value)
                <option value="{{$value}}" selected>{{$value}}</option>
              @else
                <option value="{{$value}}">{{$value}}</option>
              @endif
            @endforeach
        </select>
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>
  <div class="form_but1">
    <label class="col-sm-5 control-lable1">Residency In : </label>
    <div class="col-sm-7 form_radios">
      <div class="select-block1">
        <select name="country_of_residency">
            <option value="">Country</option>
            @foreach ($countries as $key=>$value)
              @if (isset($input['country_of_residency']) && $input['country_of_residency'] == $value)
                <option value="{{$value}}" selected>{{$value}}</option>
              @else
                <option value="{{$value}}">{{$value}}</option>
              @endif
            @endforeach
        </select>
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>
  <div class="form_but1">
    <label class="col-sm-5 control-lable1" for="sex">District: </label>
    <div class="col-sm-7 form_radios">
      <div class="select-block1">
        <select name="district">
            <option value="">District</option>
            @foreach ($districts as $key=>$value)
               @if (isset($input['district']) && $input['district'] == $value)
                <option value="{{$value}}" selected>{{$value}}</option>
              @else
                <option value="{{$value}}">{{$value}}</option>
              @endif
            @endforeach
        </select>
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>
  <div class="form_but1">
    <label class="col-sm-5 control-lable1" for="sex">State : </label>
    <div class="col-sm-7 form_radios">
      <div class="select-block1" >
        <select name="state">
            <option value="">State</option>
            @foreach ($states as $key=>$value)
              @if (isset($input['state']) && $input['state'] == $value)
                <option value="{{$value}}" selected>{{$value}}</option>
              @else
                <option value="{{$value}}">{{$value}}</option>
              @endif
            @endforeach
        </select>
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>

  @if ($loggedIn || (!$loggedIn && Session::get('settings')->religion))
  <div class="form_but1">
    <label class="col-sm-5 control-lable1" for="sex">Religion : </label>
    <div class="col-sm-7 form_radios">
      <div class="select-block1">
        <select name="religion_id">
            <option value="">Religion</option>
            @foreach ($religions as $key=>$value)
              @if (isset($input['religion_id']) && $input['religion_id'] == $value)
                <option value="{{$key}}" selected>{{$value}}</option>
              @else
                <option value="{{$key}}">{{$value}}</option>
              @endif
            @endforeach
        </select>
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>
  @endif

  @if ($loggedIn || (!$loggedIn && Session::get('settings')->graduation))
  <div class="form_but1">
    <label class="col-sm-5 control-lable1" for="sex">Graduation : </label>
    <div class="col-sm-7 form_radios">
      <div class="select-block1">
        <select name="graduation_id">
            <option value="">Graduation</option>
            @foreach ($graduations as $key=>$value)
              @if (isset($input['graduation_id']) && $input['graduation_id'] == $value)
                <option value="{{$key}}" selected>{{$value}}</option>
              @else
                <option value="{{$key}}">{{$value}}</option>
              @endif
            @endforeach
        </select>
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>
  @endif

  
  <div class="form_but1">
    <label class="col-sm-5 control-lable1" for="sex">Star : </label>
    <div class="col-sm-7 form_radios">
      <div class="select-block1">
        <select name="star_id">
            <option value="">Star</option>
            @foreach ($stars as $key=>$value)
              @if (isset($input['star_id']) && $input['star_id'] == $key)
                <option value="{{$key}}" selected>{{$value}}</option>
              @else
                <option value="{{$key}}">{{$value}}</option>
              @endif
            @endforeach
        </select>
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>
  

  @if ($loggedIn || (!$loggedIn && Session::get('settings')->moon_sign))
  <div class="form_but1">
    <label class="col-sm-5 control-lable1" for="sex">Moon sign : </label>
    <div class="col-sm-7 form_radios">
      <div class="select-block1">
        <select name="moonsign_id">
            <option value="">Moon sign</option>
            @foreach ($moonsigns as $key=>$value)
              @if (isset($input['moonsign_id']) && $input['moonsign_id'] == $key)
                <option value="{{$key}}" selected>{{$value}}</option>
              @else
                <option value="{{$key}}">{{$value}}</option>
              @endif
            @endforeach
        </select>
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>
  @endif

  @if ($loggedIn || (!$loggedIn && Session::get('settings')->zodiac_sign))
  <div class="form_but1">
    <label class="col-sm-5 control-lable1" for="sex">Zodiac sign : </label>
    <div class="col-sm-7 form_radios">
      <div class="select-block1">
        <select name="zodiacsign_id">
            <option value="">Zodiac sign</option>
            @foreach ($zodiacsigns as $key=>$value)
              @if (isset($input['zodiacsign_id']) && $input['zodiacsign_id'] == $key)
                <option value="{{$key}}" selected>{{$value}}</option>
              @else
                <option value="{{$key}}">{{$value}}</option>
              @endif
            @endforeach
        </select>
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>
  @endif

  <div class="form_but1">
    <label class="col-sm-5 control-lable1" for="sex">Mother Tongue : </label>
    <div class="col-sm-7 form_radios">
      <div class="select-block1">
        <select name="mother_tongue">
            <option value="">Mother tongue</option>
            @foreach ($mother_tongue as $key=>$value)
               @if (isset($input['mother_tongue']) && $input['mother_tongue'] == $value)
                <option value="{{$value}}" selected>{{$value}}</option>
              @else
                <option value="{{$value}}">{{$value}}</option>
              @endif
            @endforeach
        </select>
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>
  
  <div class="form_but1">
  <label class="col-sm-5 control-lable1" for="sex">Age : </label>
  <div class="col-sm-7 form_radios">
      <div class="col-sm-5 input-group1" style="padding-left:0px;">
        <input class="form-control has-dark-background" name="age_from" type="text" value="{{isset($input['age_from'])?$input['age_from']:'' }}">
      </div>
      <div class="col-sm-5 input-group1">
        <input class="form-control has-dark-background" name="age_to"  type="text" value="{{isset($input['age_to'])?$input['age_to']:'' }}">
      </div>
      <div class="clearfix"> </div>
  </div>
  <div class="clearfix"> </div>
  </div>
  
  <div class="form-actions" style="float:right;padding-right:20px;">
    <input type="submit" value="Search" class="btn_1 submit">
  </div>
  <div class="clearfix"> </div>
 </form>
 <div class="paid_people">
   <h1>People</h1>
   <?php
    $count = 1;
   ?>
   @if ($members->count() == 0)
      <p>No profiles were matched</p>
      <div class="row_1" style="height:200px;">
        <div class="col-sm-6 paid_people-left">
          <div class="clearfix"> </div>
        </div>
        <div class="col-sm-6 paid_people-left">
          <div class="clearfix"> </div>
        </div>
        <div class="clearfix"> </div>
      </div>
   @endif
   @foreach ($members as $member)
      @if ($count%2 == 1)
        <div class="row_1">
      @endif
          <div class="col-sm-6 paid_people-left">
            <ul class="profile_item">
              <a href="{{asset(App::getLocale().'/profile/'.$member->rand_id)}}">
               <li class="profile_item-img">
                  @if ($member->avatar && file_exists('assets/profileimages/'.$member->avatar))
                    <img src="{{asset('assets/profileimages/'.$member->avatar)}}" alt="" class="hover-animation image-zoom-in img-responsive" style="width:122px;height:122px;" />
                  @else
                    <img src="{{asset('assets/images/default_profile.jpg')}}" alt="" class="hover-animation image-zoom-in img-responsive" style="width:122px;height:122px;" />
                  @endif
               </li>
               <li class="profile_item-desc">
                  <h4>{{($member->name)?$member->name:$member->username}} ({{$member->rand_id}})</h4>
                  <p>{{$member->age}} Yrs,
                      {{($member->religion)?$member->religion:''}}, {{$member->country}}
                  </p>
                  <h5>View Full Profile</h5>
               </li>
               <div class="clearfix"> </div>
              </a>
            </ul>
          </div>
      @if ($count == $members->count() || ($count!=1 && $count%2 == 0))
          <div class="clearfix"> </div>
        </div>
      @endif
      <?php $count++; ?>
   @endforeach
   <div style="float:right;padding-right:20px;">
    @if (isset($input) && $input)
      {{$members->appends(['input' =>base64_encode(json_encode($input))])->links()}}
    @else
      {{$members->links()}}
    @endif
   </div>
   </div>
</div>
  <div class="col-md-3 match_right">
  @include('frontend.searchProfileForm')
  </div>
     <div class="clearfix"> </div>
  </div>
</div>
@endsection