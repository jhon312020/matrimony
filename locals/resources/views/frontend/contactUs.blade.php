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
            <dt>Address :</dt>
            <dd>
                8901 Nulla Pariatur, <br>
                Ipsum, D05 87GR.
            </dd>
        </dl>
        <dl class="grid_4">
            <dt>Telephones :</dt>
            <dd>
                +1 800 245 4578 <br>
                +1 800 789 5478
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
  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3150859.767904157!2d-96.62081048651531!3d39.536794757966845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1408111832978"> </iframe>
</div>
@endsection