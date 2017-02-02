<div class="profile_search1">
     <form onsubmit="return false;" id="profile_id_search_form" action="{{asset(App::getLocale().'/profile/')}}">
      <input type="text" class="m_1" id="profile_id" size="30" required="" placeholder="Enter Profile ID :" autocomplete="off">
      <input type="submit" value="Go">
     </form>
</div>
<section class="slider">
   <h3>Happy Marriage</h3>
   <div class="flexslider">
    <ul class="slides">
      <li>
      <img src="{{asset('assets/front-end/images/s2.jpg')}}" alt=""/>
      <h4>Lorem & Ipsum</h4>
      <p>It is a long established fact that a reader will be distracted by the readable</p>
      </li>
      <li>
      <img src="{{asset('assets/front-end/images/s1.jpg')}}" alt=""/>
      <h4>Lorem & Ipsum</h4>
      <p>It is a long established fact that a reader will be distracted by the readable</p>
      </li>
      <li>
      <img src="{{asset('assets/front-end/images/s3.jpg')}}" alt=""/>
      <h4>Lorem & Ipsum</h4>
      <p>It is a long established fact that a reader will be distracted by the readable</p>
      </li>
      </ul>
    </div>
</section>
@if(isset($whoViewedThisProfile) && $whoViewedThisProfile)
<div class="view_profile view_profile2">
  <h3>Members who viewed this profile also viewed</h3>
  @foreach ($whoViewedThisProfile as $member)
    <ul class="profile_item">
      <a href="{{asset(App::getLocale().'/profile/'.$member->rand_id)}}">
       <li class="profile_item-img">
          @if ($member->avatar && file_exists('assets/profileimages/'.$member->avatar))
            <img src="{{asset('assets/profileimages/'.$member->avatar)}}" alt="" class="hover-animation image-zoom-in img-responsive" />
          @else
            <img src="{{asset('assets/images/default_profile.jpg')}}" alt="" class="hover-animation image-zoom-in img-responsive"  />
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
  @endforeach
  </div>
@endif
<!-- FlexSlider -->
  <link href="{{asset('assets/front-end/css/flexslider.css')}}" rel='stylesheet' type='text/css' />
  <script defer src="{{asset('assets/front-end/js/jquery.flexslider.js')}}"></script>
  <script type="text/javascript">
  /*$(function(){
    SyntaxHighlighter.all();
  });*/
  $(window).load(function(){
    $('.flexslider').flexslider({
    animation: "slide",
    start: function(slider){
      $('body').removeClass('loading');
    }
    });
  });
  </script>
<!-- FlexSlider -->