<div class="basic_1">
  <h3>Family information <i class="fa fa-edit" onclick="toggleForm('family-table','family-table-form')" style="cursor:pointer;"></i></h3>
  @include('frontend.profileview.family_information')
  <form onsubmit="return false;" id="family-table-form" action="{{asset(App::getLocale().'/updateProfile')}}" style="display:none;">
    <div class="col-md-10 basic_1-left">
    <table class="table_working_hours">
      <tbody>
        <tr class="opened_1">
          <td class="day_label" width="30%">Father's Occupation :</td>
          <td class="day_value"><input type="text" value="{{$profile->fathers_status}}" class="form-text" id="fathers_status" name="fathers_status"/></td>
        </tr>
            <tr class="opened_1">
          <td class="day_label">Mother's Occupation :</td>
          <td class="day_value"><input type="text" value="{{$profile->mothers_status}}" class="form-text" id="mothers_status" name="mothers_status"/></td>
        </tr>
          <tr class="opened_1">
          <td class="day_label">No. of Brothers :</td>
          <td class="day_value"><input type="text" value="{{$profile->no_of_brothers}}" class="form-text" id="no_of_brothers" name="no_of_brothers"/></td>
        </tr>
        <tr class="opened_1">
          <td class="day_label">No. of Sisters :</td>
          <td class="day_value"><input type="text" value="{{$profile->no_of_sisters}}" class="form-text" id="no_of_sisters" name="no_of_sisters"/></td>
        </tr>
        <tr class="opened_1">
          <td class="day_label">About my family :</td>
          <td class="day_value"><textarea id="about_my_family" name="about_my_family" class="form-text" rows="5" style="width:100%;height:100px;">{{$profile->about_my_family}}</textarea></td>
        </tr>
      </tbody>
    </table>
    </div>
    <div class="clearfix"> </div>
    <button onclick="updateProfile('family-table-form')" class="btn_1 submit">Save</button>&nbsp;&nbsp;&nbsp;
    <button onclick="toggleForm('family-table-form','family-table')" class="btn_1 submit">Cancel</button>
  </form>
</div>