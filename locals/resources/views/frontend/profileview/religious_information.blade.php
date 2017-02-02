<div id="religion-table">
<div class="col-md-6 basic_1-left">
  <table class="table_working_hours" >
    <tbody>
      <tr class="opened_1">
    <td class="day_label">Date of birth :</td>
    <td class="day_value" id="date_of_birth_label">{{date('d-m-Y',strtotime($user->date_of_birth))}}</td>
  </tr>
  <tr class="opened">
    <td class="day_label">Religion :</td>
    <td class="day_value" id="religion_id_label">{{isset($religions[$profile->religion_id])? $religions[$profile->religion_id]:'Not specified' }}</td>
  </tr>
      <tr class="opened">
    <td class="day_label">Caste :</td>
    <td class="day_value" id="caste_id_label">{{isset($castes[$profile->caste_id])? $castes[$profile->caste_id]:'Not specified' }}</td>
  </tr>
  </tbody>
    </table>
   </div>
   <div class="col-md-6 basic_1-left">
    <table class="table_working_hours">
    <tbody>
      <tr class="opened_1">
    <td class="day_label">Star :</td>
    <td class="day_value" id="star_id_label">{{isset($stars[$profile->star_id])? $stars[$profile->star_id]:'Not specified' }}</td>
  </tr>
    <tr class="opened">
    <td class="day_label">Moon sign :</td>
    <td class="day_value" id="moonsign_id_label">{{isset($moonsigns[$profile->moonsign_id])? $moonsigns[$profile->moonsign_id]:'Not specified' }}</td>
  </tr>
    <tr class="opened">
    <td class="day_label">Zodiac sign :</td>
    <td class="day_value" id="zodiacsign_id_label">{{isset($zodiacsigns[$profile->zodiacsign_id])? $zodiacsigns[$profile->zodiacsign_id]:'Not specified' }}</td>
  </tr>
  </tbody>
  </table>
</div>
</div>
<div class="clearfix"> </div>