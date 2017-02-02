<div id="basic-detail">
<div class="col-md-6 basic_1-left">
<table class="table_working_hours">
  <tbody>
<tr class="opened_1">
  <td class="day_label">Name :</td>
  <td class="day_value" id="name_label">{{($profile->name)?$profile->name:'Not Specified'}}</td>
</tr>
  <tr class="opened">
  <td class="day_label">Status :</td>
  <td class="day_value" id="status_id_label">{{(isset($statuses[$profile->status_id]))? $statuses[$profile->status_id] : 'Not Specified'}}</td>
</tr>
  <tr class="opened">
  <td class="day_label">Height :</td>
  <td class="day_value"><span id="height_label">{{($profile->height)?$profile->height:'Not Specified'}}</span> cm</td>
</tr>
  <tr class="opened">
  <td class="day_label">Weight :</td>
  <td class="day_value"><span id="weight_label">{{($profile->weight)?$profile->weight:'Not Specified'}}</span> kg</td>
</tr>
  <tr class="opened">
  <td class="day_label">Physical Status :</td>
  <td class="day_value" id="physical_status_label">{{($profile->physical_status)?$profile->physical_status:'Not Specified'}}</td>
</tr>
<tr class="opened">
  <td class="day_label">Body Type :</td>
  <td class="day_value" id="body_type_label">{{($profile->body_type)?$profile->body_type:'Not Specified'}}</td>
</tr>
</tbody>
  </table>
 </div>
 <div class="col-md-6 basic_1-left">
<table class="table_working_hours">
<tbody>
  <tr class="opened_1">
  <td class="day_label">Mother Tongue :</td>
  <td class="day_value" id="mother_tongue_label">{{($profile->mother_tongue)?$profile->mother_tongue:'Not Specified'}}</td>
</tr>
  <tr class="opened">
  <td class="day_label">Complexion :</td>
  <td class="day_value" id="complexion_label">{{($profile->complexion)?$profile->complexion:'Not Specified'}}</td>
</tr>
  <tr class="closed">
  <td class="day_label">Eating Habit :</td>
  <td class="day_value closed" id="eating_habits_label">{{($profile->eating_habits)?$profile->eating_habits:'Not Specified'}}</td>
</tr>
  <tr class="closed">
  <td class="day_label">Smoking Habit :</td>
  <td class="day_value closed" id="smoking_habits_label">{{($profile->smoking_habits)?$profile->smoking_habits:'Not Specified'}}</td>
</tr>
<tr class="opened">
  <td class="day_label">Drink Habit :</td>
  <td class="day_value" id="drinking_habit_label">{{($profile->drinking_habit)?$profile->drinking_habit:'Not Specified'}}</td>
</tr>
</tbody>
</table>
</div>
<div class="clearfix"> </div>
</div>