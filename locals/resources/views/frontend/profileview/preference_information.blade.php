<div id="preference-table">
<div class="basic_1-left">
  <table class="table_working_hours">
  <tbody>
    <tr class="opened">
      <td class="day_label" width="30%">Age   :</td>
      <td class="day_value"><span class="preference_age_from_label">{{(isset($preference->age_from))?$preference->age_from:0}}</span> to <span class="preference_age_to_label">{{(isset($preference->age_to))?$preference->age_to:0}}</span></td>
    </tr>
  <tr class="opened">
    <td class="day_label">Status :</td>
    <td class="day_value preference_status_id_label">{{(isset($preference->status_id) && isset($statuses[$preference->status_id]))?$statuses[$preference->status_id]:"Doesn't Matter"}}</td>
  </tr>
    <tr class="opened">
    <td class="day_label">Body Type :</td>
    <td class="day_value preference_body_type_label">{{(isset($preference->body_type) && $preference->body_type)?$preference->body_type:"Doesn't matter"}}</td>
  </tr>
    <tr class="opened">
    <td class="day_label">Complexion :</td>
    <td class="day_value preference_complexion_label">{{(isset($preference->complexion) && $preference->complexion)?$preference->complexion:"Doesn't matter"}}</td>
  </tr>
  <tr class="opened">
    <td class="day_label">Above Height :</td>
    <td class="day_value preference_height_label">{{(isset($preference->height) && $preference->height)?$preference->height.' Cm':"Doesn't matter"}}</td>
  </tr>
  <tr class="opened">
    <td class="day_label">Eating habit :</td>
    <td class="day_value preference_eating_habit_label">{{(isset($preference->eating_habit) && $preference->eating_habit)?$preference->complexion:"Doesn't matter"}}</td>
  </tr>
  <tr class="opened">
    <td class="day_label">Religion :</td>
    <td class="day_value preference_religion_id_label">
      {{(isset($preference->religion_id) && isset($religions[$preference->religion_id]))?$religions[$preference->religion_id]:"Doesn't Matter"}}
    </td>
  </tr>
  <tr class="opened">
    <td class="day_label">Caste :</td>
    <td class="day_value preference_caste_id_label">
      {{(isset($preference->caste_id) && isset($castes[$preference->caste_id]))?$castes[$preference->caste_id]:"Doesn't Matter"}}
    </td>
  </tr>
  <tr class="opened">
    <td class="day_label">Mother Tongue :</td>
    <td class="day_value preference_mother_tongue_label">{{(isset($preference->mother_tongue) && $preference->mother_tongue)?$preference->mother_tongue:"Doesn't matter"}}</td>
  </tr>
  <tr class="opened">
    <td class="day_label">Education :</td>
    <td class="day_value preference_graduation_id_label">{{(isset($preference->graduation_id) && isset($educations[$preference->graduation_id]))?$educations[$preference->graduation_id]:"Doesn't Matter"}}</td>
  </tr>
  <tr class="opened">
    <td class="day_label">Country of Residence :</td>
    <td class="day_value preference_country_of_residency_label">{{(isset($preference->country_of_residency) && $preference->country_of_residency)?$preference->country_of_residency:"Doesn't matter"}}</td>
  </tr>
  </tbody>
  </table>
</div>
</div>