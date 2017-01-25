<div class="basic_1 basic_2">
  <h3>Education & Career <i class="fa fa-edit" onclick="toggleForm('education-table','education-table-form')" style="cursor:pointer;"></i></h3>
  <div id="education-table">
    <div class="basic_1-left">
      <table class="table_working_hours">
        <tbody>
          <tr class="opened">
            <td class="day_label" width="30%">Education   :</td>
            <td class="day_value" id="graduation_id_label">{{isset($educations[$profile->graduation_id])? $educations[$profile->graduation_id] : 'Not Specified'}}</td>
          </tr>
          <tr class="opened">
            <td class="day_label">Education Detail :</td>
            <td class="day_value" id="education_in_detail_label">{{$profile->education_in_detail}}</td>
          </tr>
          <tr class="opened">
            <td class="day_label">Occupation :</td>
            <td class="day_value" id="occupation_label">{{$profile->occupation}}</td>
          </tr>
          <tr class="opened">
            <td class="day_label">Occupation Detail :</td>
            <td class="day_value" id="occupation_in_detail_label">{{$profile->occupation_in_detail}}</td>
          </tr>
          <tr class="opened">
            <td class="day_label">Annual Income :</td>
            <td class="day_value">Rs.<span id="annual_income_label">{{$profile->annual_income}}</span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <form onsubmit="return false;" id="education-table-form" action="{{asset(App::getLocale().'/updateProfile')}}" style="display:none;">
    <div class="basic_1-left">
      <table class="table_working_hours">
        <tbody>
          <tr class="opened_1">
            <td class="day_label">Education :</td>
            <td class="day_value">
              <div class="select-block1">
                <select name="graduation_id" id="graduation_id">
                  <option value="0">Not Specified</option>
                  @foreach($educations as $key=>$value)
                    @if($profile->graduation_id == $key)
                      <option value="{{$key}}" selected>{{$value}}</option>
                    @else
                      <option value="{{$key}}">{{$value}}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            </td>
          </tr>
          <tr class="opened_1">
            <td class="day_label">Education Detail :</td>
            <td class="day_value"><textarea class="form-text" id="education_in_detail" name="education_in_detail" rows="5" style="width:100%;height:100px;">{{$profile->education_in_detail}}</textarea></td>
          </tr>
          <tr class="opened_1">
            <td class="day_label">Occupation :</td>
            <td class="day_value"><input type="text" class="form-text" id="occupation" name="occupation" value="{{$profile->occupation}}" /></td>
          </tr>
          <tr class="opened_1">
            <td class="day_label">Occupation Detail :</td>
            <td class="day_value"><textarea class="form-text" id="occupation_in_detail" name="occupation_in_detail" rows="5" style="width:100%;height:100px;">{{$profile->occupation_in_detail}}</textarea></td>
          </tr>
          <tr class="opened_1">
            <td class="day_label">Annual Income :</td>
            <td class="day_value closed"><input type="text" class="form-text" id="annual_income" name="annual_income" value="{{$profile->annual_income}}" /></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="clearfix"> </div>
    <button onclick="updateProfile('education-table-form')" class="btn_1 submit">Save</button>
    &nbsp;&nbsp;&nbsp;
    <button onclick="toggleForm('education-table-form','education-table')" class="btn_1 submit">Cancel</button>
  </form>
  <div class="clearfix"> </div>
</div>