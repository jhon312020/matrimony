@extends('layouts.front_end_form_layout')

@section('content')
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="{{asset(App::getLocale())}}"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Contact</li>
     </ul>
   </div>
   <div class="grid_5">
      @if(App::getLocale() == 'ta')
          <?php echo ucfirst($page->ta_content); ?>
        @else
          <?php echo ucfirst($page->en_content); ?>
        @endif
      <address class="addr row">
        <dl class="grid_4">
            <dt style="vertical-align:top">Address :</dt>
            <dd>
                A.S.PRABAGAR, <br/>
                105/4, 5th Street, <br/>
                Lakshmi Nagar, <br/>
                Madipakkam, Chennai - 600 091
            </dd>
        </dl>
        <dl class="grid_4">
            <dt style="vertical-align:top;">Telephones :</dt>
            <dd>
                9840070050 <br>
                9840579526
            </dd>
        </dl>
        <dl class="grid_4">
            <dt>E-mail :</dt>
            <dd><a href="malito:{{Session::get('settings')->contact_us_email}}">{{Session::get('settings')->contact_us_email}}</a></dd>
        </dl>
      </address>
    </div>
   </div>
</div>
<div class="about_middle">
  <div class="container">
   <h2>Contact Form</h2>
    <form id="contact-form" class="contact-form" method="POST" onsubmit="return false" action="{{asset(App::getLocale().'/sendContactMail')}}">
        <fieldset>
          <div id="result_message"></div>
          <input type="text" class="text" placeholder="Name" value="" name="name" />
          <input type="text" class="text" placeholder="Phone number" value="" name="phone_number" />
          <input type="text" class="email" placeholder="Email" value="" name="email" />
          <textarea value="Message" name="message"></textarea>
          <input type="submit" id="contact-form-submit" value="Submit" />
        </fieldset>
      </form>
  </div>
</div>
<div class="map">
  <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3150859.767904157!2d-96.62081048651531!3d39.536794757966845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1408111832978"> </iframe> -->
  


      <iframe src="//www.google.com/maps/embed/v1/place?q=reliable+consultants+madipakkam- Topo,
      &zoom=17
      &key=AIzaSyAGwS0kpJaaIxwmMr8quKeiUFnaOz44qoo">
  </iframe>

<!-- <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=no+20+natesan+street+T.nagar+chennai+17&amp;aq=&amp;sll=13.05735,80.213657&amp;sspn=0.192306,0.338173&amp;ie=UTF8&amp;hq=&amp;hnear=Natesan+St,+Thiyagaraya+Nagar,+Chennai,+Tamil+Nadu&amp;t=m&amp;z=14&amp;ll=13.036456,80.229156&amp;output=embed"></iframe> -->
</div>
@endsection