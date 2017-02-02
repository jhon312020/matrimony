<div id="family-table">
<div class="col-md-10 basic_1-left">
  <table class="table_working_hours">
    <tbody>
      <tr class="opened">
        <td class="day_label" width="30%">Father's Occupation :</td>
        <td class="day_value" id="fathers_status_label">{{($profile->fathers_status)?$profile->fathers_status:'Not Specified'}}</td>
      </tr>
          <tr class="opened">
        <td class="day_label">Mother's Occupation :</td>
        <td class="day_value" id="mothers_status_label">{{($profile->mothers_status)?$profile->mothers_status:'Not Specified'}}</td>
      </tr>
        <tr class="opened">
        <td class="day_label">No. of Brothers :</td>
        <td class="day_value" id="no_of_brothers_label">{{$profile->no_of_brothers}}</td>
      </tr>
        <tr class="opened">
        <td class="day_label">No. of Sisters :</td>
        <td class="day_value" id="no_of_sisters_label">{{$profile->no_of_sisters}}</td>
      </tr>
      <tr class="opened">
        <td class="day_label">About my family</td>
        <td class="day_value" id="about_my_family_label">{{($profile->about_my_family)?$profile->about_my_family:'Not Specified'}}</td>
      </tr>
    </tbody>
  </table>
</div>
</div>