@extends('layouts.front_end_form_layout')

@section('content')
   <div class="breadcrumb1">
     <ul>
        <a href="javascript:;"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Register</li>
     </ul>
   </div>
   <div class="services">
      <div class="col-sm-6 login_left">
       <form onsubmit="return false;" id="registration-form" action="{{asset(Request::getLocale().'/register')}}">
        <div class="form-group">
          <div id="result_message"></div>
        </div>
        <div class="form-group">
          <label for="edit-name">Username <span class="form-required" title="This field is required.">*</span></label>
          <input type="text" id="username" name="username" value="" size="60" maxlength="60" class="form-text required">
        </div>
        <div class="form-group">
          <label for="edit-pass">Password <span class="form-required" title="This field is required.">*</span></label>
          <input type="password" id="password" name="password" size="60" maxlength="128" class="form-text required">
        </div>
        <div class="form-group">
          <label for="edit-name">Email <span class="form-required" title="This field is required.">*</span></label>
          <input type="text" id="email" name="email" value="" size="60" maxlength="60" class="form-text required">
        </div>
        <div class="form-group">
          <label for="edit-name">Phone number <span class="form-required" title="This field is required.">*</span></label>
          <input type="text" id="phone_number" name="phone_number" value="" size="10" maxlength="10" class="form-text required">
        </div>
        <div class="age_select">
          <label for="edit-pass">Age <span class="form-required" title="This field is required.">*</span></label>
            <div class="age_grid">
             <div class="col-sm-4 form_box">
                  <div class="select-block1">
                    <select id="selected_date">
                      <option value="">Date</option>
                      <?php
                        for ($i=1;$i<=31;$i++) {
                          echo "<option value='$i'>$i</option>";
                        }
                      ?>
                    </select>
                  </div>
            </div>
            <div class="col-sm-4 form_box2">
                   <div class="select-block1">
                    <select id="selected_month">
                      <option value="">Month</option>
                      <?php
                        $months = array('January','February','March','April','May','June','July','August','September','October','November','December');
                        foreach($months as $key=>$month){
                          echo "<option value='".($key+1)."'>$month</option>";
                        }
                      ?>
                    </select>
                  </div>
                 </div>
                 <div class="col-sm-4 form_box1">
                   <div class="select-block1">
                    <select id="selected_year">
                      <option value="">Year</option>
                      <?php
                        $currentYear = date('Y');
                        for ($firstYear=($currentYear-50);$firstYear<=$currentYear;$firstYear++) {
                          echo "<option value='$firstYear'>$firstYear</option>";
                        }
                      ?>
                    </select>
                   </div>
                  </div>
                  <div class="clearfix"> </div>
                 </div>
              </div>
              <div class="form-group form-group1">
                <label class="col-sm-7 control-lable" for="sex">Sex : </label>
                <div class="col-sm-5">
                    <div class="radios">
                <label for="radio-01" class="label_radio">
                    <input type="radio" name="gender" checked value="Male"> Male
                </label>
                <label for="radio-02" class="label_radio">
                    <input type="radio" name="gender" value="Female"> Female
                </label>
                  </div>
                </div>
                <div class="clearfix"> </div>
             </div>
        <!-- <div class="form-group">
           <label for="edit-name">Subject <span class="form-required" title="This field is required.">*</span></label>
         <textarea class="form-control bio" placeholder="" rows="3"></textarea>
        </div> -->
        <div class="form-actions">
          <input type="submit" name="op" value="Submit" class="btn_1 submit">
        </div>
     </form>
    </div>
    <div class="col-sm-6">
       <ul class="sharing">
      <!-- <li><a href="#" class="facebook" title="Facebook"><i class="fa fa-boxed fa-fw fa-facebook"></i> Share on Facebook</a></li>
        <li><a href="#" class="twitter" title="Twitter"><i class="fa fa-boxed fa-fw fa-twitter"></i> Tweet</a></li>
        <li><a href="#" class="google" title="Google"><i class="fa fa-boxed fa-fw fa-google-plus"></i> Share on Google+</a></li>
        <li><a href="#" class="linkedin" title="Linkedin"><i class="fa fa-boxed fa-fw fa-linkedin"></i> Share on LinkedIn</a></li>
        <li><a href="#" class="mail" title="Email"><i class="fa fa-boxed fa-fw fa-envelope-o"></i> E-mail</a></li>
     </ul> -->
    </div>
    <div class="clearfix"> </div>
   </div>
   <script type="text/javascript">
     $(document).ready(function(){
        $('#registration-form').submit(function() {
          data = {
            username : $('#username').val(),
            password : $('#password').val(),
            gender : $('input[name=gender]:checked').val(),
            email : $('#email').val(),
            phone_number : $('#phone_number').val(),
            date_of_birth : $('#selected_month').val()+'/'+$('#selected_date').val()+'/'+$('#selected_year').val()
          };
          $.ajax({
            method: "POST",
            data : data,
            url : $('#registration-form').attr('action'),
            success : function(result) {
              if (result.success == true) {
                $('#result_message').removeClass('alert alert-danger');
                $('#result_message').addClass('alert alert-success');
                $('#result_message').html(result.message);
              } else {
                $('#result_message').removeClass('alert alert-success');
                $('#result_message').addClass('alert alert-danger');
                $('#result_message').html(result.message);
              }
              window.scrollTo(0, 0);
            }
          });
        });
     });
   </script>
@endsection