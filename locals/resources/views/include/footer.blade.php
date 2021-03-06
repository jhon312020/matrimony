<div class="footer">
      <div class="container">
        <div class="col-md-4 col_2">
          <h4>About Us</h4>
          @if (App::getLocale() == 'en')
            {{ str_limit(strip_tags(Session::get('aboutUs')->en_content),100,'...') }}
          @else
            {{ str_limit(strip_tags(Session::get('aboutUs')->ta_content),100,'...') }}
          @endif
        </div>
        <div class="col-md-2 col_2">
          <h4>Help & Support</h4>
          <ul class="footer_links">
            <li><a href="#">Contact us</a></li>
            <li><a href="#">FAQs</a></li>
          </ul>
        </div>
        <div class="col-md-2 col_2">
          <h4>Quick Links</h4>
          <ul class="footer_links">
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms and Conditions</a></li>
          </ul>
        </div>
        <div class="col-md-2 col_2">
          <h4>Social</h4>
          <ul class="footer_social">
          <li><a href="#"><i class="fa fa-facebook fa1"> </i></a></li>
          <li><a href="#"><i class="fa fa-twitter fa1"> </i></a></li>
          <li><a href="#"><i class="fa fa-google-plus fa1"> </i></a></li>
          <li><a href="#"><i class="fa fa-youtube fa1"> </i></a></li>
          </ul>
        </div>
        <div class="clearfix"> </div>
        <div class="copy">
           <p>Copyright © {{date('Y')}} Tamil Mudaliyar Matrimony. All Rights Reserved  | Design by <a href="http://megamind.com/" target="_blank">Megamind</a> </p>
          </div>
      </div>
</div>
