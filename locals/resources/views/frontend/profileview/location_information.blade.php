<div id="location-table">
<div class="col-md-10 basic_1-left">
  <table class="table_working_hours" >
    <tbody>
      <tr class="opened_1">
        <td class="day_label" width="30%">Country :</td>
        <td class="day_value" id="country_label">{{($profile->country)?$profile->country:'Not Specified'}}</td>
      </tr>
      <tr class="opened">
        <td class="day_label">State :</td>
        <td class="day_value" id="state_label">{{($profile->state)?$profile->state:'Not Specified'}}</td>
      </tr>
          <tr class="opened">
        <td class="day_label">District :</td>
        <td class="day_value" id="district_label">{{($profile->district)?$profile->district:'Not Specified'}}</td>
      </tr>
      </tr>
      <tr class="opened">
        <td class="day_label">City :</td>
        <td class="day_value" id="city_label">{{($profile->city)?$profile->city:'Not Specified'}}</td>
      </tr>
      <tr class="opened">
        <td class="day_label">Country Of Residence :</td>
        <td class="day_value" id="country_of_residency_label">{{($profile->country_of_residency)?$profile->country_of_residency:'Not Specified'}}</td>
      </tr>
      
     </tbody>
    </table>
  </div>
</div>
<div class="clearfix"> </div>