<div id="education-table">
  <div class="col-md-10 basic_1-left">
    <table class="table_working_hours">
      <tbody>
        <tr class="opened">
          <td class="day_label" width="30%">Education   :</td>
          <td class="day_value" id="graduation_id_label">{{isset($educations[$profile->graduation_id])? $educations[$profile->graduation_id] : 'Not Specified'}}</td>
        </tr>
        <tr class="opened">
          <td class="day_label">Education Detail :</td>
          <td class="day_value" id="education_in_detail_label">{{($profile->education_in_detail)?$profile->education_in_detail:'Not Specified'}}</td>
        </tr>
        <tr class="opened">
          <td class="day_label">College :</td>
          <td class="day_value" id="college_label">{{($profile->college)?$profile->college:'Not Specified'}}</td>
        </tr>
        <tr class="opened">
          <td class="day_label">Employed In :</td>
          <td class="day_value" id="employedin_label">{{($profile->employedin)?$profile->employedin:'Not Specified'}}</td>
        </tr>
        <tr class="opened">
          <td class="day_label">Occupation :</td>
          <td class="day_value" id="occupation_label">{{($profile->occupation)?$profile->occupation:'Not Specified'}}</td>
        </tr>
        <tr class="opened">
          <td class="day_label">Occupation Detail :</td>
          <td class="day_value" id="occupation_in_detail_label">{{($profile->occupation_in_detail)?$profile->occupation_in_detail:'Not Specified'}}</td>
        </tr>
        <tr class="opened">
          <td class="day_label">Annual Income :</td>
          <td class="day_value">Rs.<span id="annual_income_label">{{($profile->annual_income)?number_format($profile->annual_income):'0'}}</span></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="clearfix"> </div>
</div>