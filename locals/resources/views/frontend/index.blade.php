@extends('layouts.front_end_form_layout')

@section('content')
<div class="banner">
  <div class="container">
    <div class="banner_info">
      <h3>Millions of verified Members</h3>
      @if(!Auth::guard('user')->check())
      <a href="{{asset(App::getLocale().'/register')}}" class="hvr-shutter-out-horizontal">Create your Profile</a>
      @endif
    </div>
  </div>
  <div class="profile_search">
    <div class="container wrap_1">
    <form action="{{asset(App::getLocale().'/search')}}" method="POST">
      <div class="search_top">
     <div class="inline-block">
      <label class="gender_1">I am looking for :</label>
      <div class="age_box1" style="max-width: 100%; display: inline-block;">
        <select name="gender">
          @if(Auth::guard('user')->check())
            <option value="{{(Auth::guard('user')->user()->gender == 'Male')?'Female':'Male'}}" selected>{{(Auth::guard('user')->user()->gender == 'Male')?'Female':'Male'}}</option>
          @else
            <option value="">* Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          @endif
        </select>
       </div>
      </div>
        <div class="inline-block">
      <label class="gender_1">Recidency In :</label>
      <div class="age_box1" style="max-width: 100%; display: inline-block;">
          <select name="country_of_residency">
            <option value="">* Select Country</option>
            @foreach ($countries as $country)
              <option value="{{$country}}">{{$country}}</option>
            @endforeach
          </select>
          </div>
        </div>
        <div class="inline-block">
      <label class="gender_1">Star In :</label>
      <div class="age_box1" style="max-width: 100%; display: inline-block;">
        <select name="star_id">
          <option value="">* Select Star</option>
            @foreach ($stars as $id=>$star)
              <option value="{{$id}}">{{$star}}</option>
            @endforeach
          </select>
          </div>
       </div>
     </div>
   <div class="inline-block">
     <div class="age_box2" style="max-width: 220px;">
      <label class="gender_1">Age :</label>
      <input class="transparent" name="age_from" placeholder="From:" style="width: 34%;" type="text" value="">&nbsp;-&nbsp;<input class="transparent" name="age_to" placeholder="To:" style="width: 34%;" type="text" value="">
     </div>
   </div>
       <div class="inline-block">
      <label class="gender_1">Religion :</label>
      <div class="age_box1" style="max-width: 100%; display: inline-block;">
        <select name="religion_id">
          <option value="">* Select Religion</option>
            @foreach ($religions as $id=>$value)
              <option value="{{$id}}">{{$value}}</option>
            @endforeach
        </select>
      </div>
      </div>
    <div class="submit inline-block">
       <input id="submit-btn" class="hvr-wobble-vertical" type="submit" value="Find Matches">
    </div>
     </form>
    </div>
  </div> 
</div> 
<div class="grid_1">
      <div class="container">
        <h1>Featured Profiles</h1>
        <div class="heart-divider">
      <span class="grey-line"></span>
      <i class="fa fa-heart pink-heart"></i>
      <i class="fa fa-heart grey-heart"></i>
      <span class="grey-line"></span>
        </div>
        <ul id="flexiselDemo3">
        @foreach ($featured_members as $member) 
          <li>
              <div class="col_1"><a href="{{asset(App::getLocale().'/profile/'.$member->member->rand_id)}}">
                <div style="width:171px;height:141px;overflow:hidden">
                  @if ($member->member->avatar && file_exists('assets/profileimages/'.$member->member->avatar))
                    <img src="{{asset('assets/profileimages/'.$member->member->avatar)}}" alt="" class="hover-animation image-zoom-in img-responsive" style="width:171px;min-height:141px;" />
                  @else
                    <img src="{{asset('assets/images/default_profile.jpg')}}" alt="" class="hover-animation image-zoom-in img-responsive" style="width:171px;min-height:141px;" />
                  @endif
                </div>
                <div class="layer m_1 hidden-link hover-animation delay1 fade-in">
                  <div class="center-middle">{{($member->member->gender == 'Male')? 'About Him' : 'About Her'}}</div>
                </div>
                <h3>
                    <span class="m_3">Profile ID : {{$member->member->rand_id}}</span>
                    <br>
                    <?php
                      $from_date = new DateTime($member->member->date_of_birth);
                      $to_date = new DateTime('today');
                      echo $to_date->diff($from_date)->y.' Yrs';
                    ?>,
                    {{($member->religion)?$member->religion->name:''}}, {{$member->country}}<br>{{$member->employedin}}
                </h3></a></div>
          </li>
        @endforeach
      </ul>
      <script type="text/javascript">
     $(window).load(function() {
      $("#flexiselDemo3").flexisel({
        visibleItems: 6,
        animationSpeed: 1000,
        autoPlay:false,
        autoPlaySpeed: 3000,        
        pauseOnHover: true,
        enableResponsiveBreakpoints: true,
          responsiveBreakpoints: { 
            portrait: { 
              changePoint:480,
              visibleItems: 1
            }, 
            landscape: { 
              changePoint:640,
              visibleItems: 2
            },
            tablet: { 
              changePoint:768,
              visibleItems: 3
            }
          }
        });
        
    });
     </script>
     <script type="text/javascript" src="{{asset('assets/front-end/js/jquery.flexisel.js')}}"></script>
    </div>
</div>

<div class="bg">
  <div class="container"> 
    <h3>Guest Messages</h3>
    <div class="heart-divider">
      <span class="grey-line"></span>
      <i class="fa fa-heart pink-heart"></i>
      <i class="fa fa-heart grey-heart"></i>
      <span class="grey-line"></span>
    </div>
      <div class="col-sm-6">
        <div class="bg_left">
          <h4>But I must explain</h4>
          <h5>Friend of Bride</h5>
          <p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
           <ul class="team-socials">
              <li><a href="#"><span class="icon-social "><i class="fa fa-facebook"></i></span></a></li>
              <li><a href="#"><span class="icon-social "><i class="fa fa-twitter"></i></span></a></li>
              <li><a href="#"><span class="icon-social"><i class="fa fa-google-plus"></i></span></a></li>
             </ul>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="bg_left">
          <h4>But I must explain</h4>
          <h5>Friend of Groom</h5>
          <p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
           <ul class="team-socials">
              <li><a href="#"><span class="icon-social "><i class="fa fa-facebook"></i></span></a></li>
              <li><a href="#"><span class="icon-social "><i class="fa fa-twitter"></i></span></a></li>
              <li><a href="#"><span class="icon-social"><i class="fa fa-google-plus"></i></span></a></li>
             </ul>
        </div>
      </div>
      <div class="clearfix"> </div>
  </div>
</div>
@endsection