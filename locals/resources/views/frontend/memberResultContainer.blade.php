@foreach ($members as $member)
<div class="profile_top">
  <h2>{{$member->rand_id}} | {{$member->name or $member->username}}</h2>
  <div class="col-sm-3 profile_left-top">
    @if ($member->avatar && file_exists('assets/profileimages/'.$member->avatar))
      <img src="{{asset('assets/profileimages/'.$member->avatar)}}" alt="" class="hover-animation image-zoom-in img-responsive" />
    @else
      <img src="{{asset('assets/images/default_profile.jpg')}}" alt="" class="hover-animation image-zoom-in img-responsive"  />
    @endif
  </div>
  <div class="col-sm-3">
    <ul class="login_details1">
   <li><p>{{ str_limit($member->about_myself, 100, '...')}}</p></li>
  </ul>
  </div>
  <div class="col-sm-6">
    <table class="table_working_hours">
        <tbody>
          <tr class="opened_1">
        <td class="day_label1">Age :</td>
        <td class="day_value">{{$member->age}} Yrs</td>
      </tr>
        <tr class="opened">
        <td class="day_label1">Height :</td>
        <td class="day_value">{{$member->height}} Cm</td>
      </tr>
        <tr class="opened">
        <td class="day_label1">Religion :</td>
        <td class="day_value">{{$member->religion}}</td>
      </tr>
        <tr class="opened">
        <td class="day_label1">Marital Status :</td>
        <td class="day_value">{{$member->status}}</td>
      </tr>
        <tr class="opened">
        <td class="day_label1">Location :</td>
        <td class="day_value">{{$member->country}}</td>
      </tr>
      <tr class="closed">
        <td class="day_label1">Education :</td>
        <td class="day_value closed"><span>{{$member->graduation}}</span></td>
      </tr>
      </tbody>
   </table>
   <div>
      <a href="{{$member->facebook}}" class="facebook_label" style="text-align:center"><i class="fa fa-facebook fa1"></i></a>
      <a href="{{$member->twitter}}" class="twitter_label" style="text-align:center"><i class="fa fa-twitter fa1"></i></a>
      <a href="{{$member->google_plus}}" class="google_plus_label" style="text-align:center"><i class="fa fa-google-plus fa1"></i></a>
   </div>
   <div class="buttons">
     @if (Auth::guard('user')->check())
      @if (!in_array($member->member_id, Session::get('interested_list')))
        <a class="vertical jsendInterest" href="javascript:;" data-target="{{$member->member_id}}" data-action="{{asset(App::getLocale().'/sendInterest')}}" >Send Interest</a>
      @else
        <a class="vertical" href="javascript:;">Interested</a>
      @endif
     @endif
     <a class="vertical" href="{{asset(App::getLocale().'/profile/'.$member->rand_id)}}">View More</a>
   </div>
  </div>
  <div class="clearfix"> </div>
</div>
@endforeach
<div style="float:right;padding-right:20px;">
@if (isset($input) && $input)
  {{$members->appends(['input' =>base64_encode(json_encode($input))])->links()}}
@else
  {{$members->links()}}
@endif
</div>