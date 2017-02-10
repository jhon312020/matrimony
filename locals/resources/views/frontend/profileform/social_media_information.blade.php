<br/>
<div class="basic_1">
  <h3>Social information <i class="fa fa-edit" onclick="toggleForm('social-media-table','social-media-table-form')" style="cursor:pointer;"></i></h3>
  <div id="social-media-table">
    <div class="col-md-10 basic_1-left">
      <a href="{{$profile->facebook}}" class="facebook_label" style="text-align:center"><i class="fa fa-facebook fa1"></i></a>
      <a href="{{$profile->twitter}}" class="twitter_label" style="text-align:center"><i class="fa fa-twitter fa1"></i></a>
      <a href="{{$profile->google_plus}}" class="google_plus_label" style="text-align:center"><i class="fa fa-google-plus fa1"></i></a>
    </div>
    <div class="clearfix"> </div>
  </div>
  <form onsubmit="return false;" id="social-media-table-form" action="{{asset(App::getLocale().'/updateProfile')}}" style="display:none;">
    <div class="col-md-10 basic_1-left">
    <table class="table_working_hours">
      <tbody>
      <tr class="opened_1">
        <td class="day_label" width="30%">Facebook :</td>
        <td class="day_value">
          <input type="text" class="form-text" value="{{$profile->facebook}}" name="facebook" id="facebook" />
        </td>
      </tr>
      <tr class="opened_1">
        <td class="day_label" width="30%">Twitter :</td>
        <td class="day_value">
          <input type="text" class="form-text" value="{{$profile->twitter}}" name="twitter" id="twitter" />
        </td>
      </tr>
      <tr class="opened_1">
        <td class="day_label" width="30%">Google Plus :</td>
        <td class="day_value">
          <input type="text" class="form-text" value="{{$profile->google_plus}}" name="google_plus" id="google_plus" />
        </td>
      </tr>
      </tbody>
      </table>
     </div>
    <div class="clearfix"> </div>
    <button onclick="updateProfile('social-media-table-form')" class="btn_1 submit">Save</button>&nbsp;&nbsp;&nbsp;
    <button onclick="toggleForm('social-media-table-form','social-media-table')" class="btn_1 submit">Cancel</button>
    </form>
</div>