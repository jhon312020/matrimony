<div class="basic_1 basic_2">
  <h3>Partner preferences <i class="fa fa-edit" onclick="toggleForm('preference-table','preference-table-form')" style="cursor:pointer;"></i></h3>
  @include('frontend.profileview.preference_information')
  <form onsubmit="return false;" id="preference-table-form" action="{{asset(App::getLocale().'/updatePreference')}}" style="display:none;">
    <div class="clearfix"> </div>
      <div class="col-md-10 basic_1-left">
      <table class="table_working_hours">
      <tbody>
        <tr class="opened_1">
          <td class="day_label" width="30%">Age   :</td>
          <td class="day_value">
            <input type="text" class="form-text" style="width:47%;display:inline" name="preference_age_from" id="preference_age_from" value="{{(isset($preference->age_from))?$preference->age_from:''}}" /> to 
            <input type="text" class="form-text" style="width:47%;display:inline" name="preference_age_to" id="preference_age_to" value="{{(isset($preference->age_to))?$preference->age_to:''}}" />
          </td>
        </tr>
      <tr class="opened_1">
        <td class="day_label">Status :</td>
        <td class="day_value">
          <div class="select-block1">
          <select name="preference_status_id" id="preference_status_id">
          <option value="0">Doesn't Matter</option>
            @foreach($statuses as $key=>$status)
              @if(isset($preference->status_id) && $preference->status_id == $key)
                <option value="{{$key}}" selected>{{$status}}</option>
              @else
                <option value="{{$key}}">{{$status}}</option>
              @endif
            @endforeach
          </select>
          </div>
        </td>
      </tr>
        <tr class="opened_1">
        <td class="day_label">Body Type :</td>
        <td class="day_value closed">
          <div class="select-block1">
          <select id="preference_body_type" name="preference_body_type">
            <option value="">Doesn't Matter</option>
            @foreach ($body_types as $value)
              @if (isset($preference->body_type) && $value == $preference->body_type)
                <option value="{{$value}}" selected>{{$value}}</option>
              @else
                <option value="{{$value}}">{{$value}}</option>
              @endif
            @endforeach
          </select>
          </div>
        </td>
      </tr>
        <tr class="opened_1">
        <td class="day_label">Complexion :</td>
        <td class="day_value">
          <div class="select-block1">
          <select id="preference_complexion" name="preference_complexion">
            <option value="">Doesn't Matter</option>
            @foreach ($complexions as $value)
              @if (isset($preference->complexion) && $value == $preference->complexion)
                <option value="{{$value}}" selected>{{$value}}</option>
              @else
                <option value="{{$value}}">{{$value}}</option>
              @endif
            @endforeach
          </select>
          </div>
        </td>
      </tr>
      <tr class="opened_1">
        <td class="day_label">Above Height :</td>
        <td class="day_value">
          <input type="text" name="preference_height" id="preference_height" class="form-text" value="{{(isset($preference->height))?$preference->height:''}}"
        </td>
      </tr>
      <tr class="opened_1">
        <td class="day_label">Eating habit :</td>
        <td class="day_value closed">
          <div class="select-block1">
          <select id="preference_eating_habit" name="preference_eating_habit">
            <option value="">Doesn't Matter</option>
            @foreach ($eating_habits as $value)
              @if (isset($preference->eating_habit) && $value == $preference->eating_habit)
                <option value="{{$value}}" selected>{{$value}}</option>
              @else
                <option value="{{$value}}">{{$value}}</option>
              @endif
            @endforeach
          </select>
          </div>
        </td>
      </tr>
      <tr class="opened_1">
        <td class="day_label">Religion :</td>
        <td class="day_value closed">
          <div class="select-block1">
          <select name="preference_religion_id" id="preference_religion_id">
          <option value="0">Doesn't Matter</option>
            @foreach($religions as $key=>$religion)
              @if(isset($preference->religion_id) && $preference->religion_id == $key)
                <option value="{{$key}}" selected>{{$religion}}</option>
              @else
                <option value="{{$key}}">{{$religion}}</option>
              @endif
            @endforeach
          </select>
          </div>
        </td>
      </tr>
      <tr class="opened_1">
        <td class="day_label">Caste :</td>
        <td class="day_value closed">
          <div class="select-block1">
          <select name="preference_caste_id" id="preference_caste_id">
          <option value="0">Doesn't Matter</option>
            @foreach($castes as $key=>$caste)
              @if(isset($preference->caste_id) && $preference->caste_id == $key)
                <option value="{{$key}}" selected>{{$caste}}</option>
              @else
                <option value="{{$key}}">{{$caste}}</option>
              @endif
            @endforeach
          </select>
          </div>
        </td>
      </tr>
      <tr class="opened_1">
        <td class="day_label">Mother Tongue :</td>
        <td class="day_value closed">
          <div class="select-block1">
          <select id="preference_mother_tongue" name="preference_mother_tongue">
            <option value="">Doesn't Matter</option>
            @foreach ($mother_tongue as $value)
              @if (isset($preference->mother_tongue) && $value == $preference->mother_tongue)
                <option value="{{$value}}" selected>{{$value}}</option>
              @else
                <option value="{{$value}}">{{$value}}</option>
              @endif
            @endforeach
          </select>
          </div>
        </td>
      </tr>
      <tr class="opened_1">
        <td class="day_label">Education :</td>
        <td class="day_value">
          <div class="select-block1">
          <select name="preference_graduation_id" id="preference_graduation_id">
          <option value="0">Doesn't Matter</option>
            @foreach($educations as $key=>$graduation)
              @if(isset($preference->graduation_id) && $preference->graduation_id == $key)
                <option value="{{$key}}" selected>{{$graduation}}</option>
              @else
                <option value="{{$key}}">{{$graduation}}</option>
              @endif
            @endforeach
          </select>
          </div>
        </td>
      </tr>
      <tr class="opened_1">
        <td class="day_label">Country of Residence :</td>
        <td class="day_value">
          <div class="select-block1">
          <select id="preference_country_of_residency" name="preference_country_of_residency">
          <option value="" selected>Doesn't Matter</option>
          @foreach ($countries as $value)
            @if (isset($preference->country_of_residency) && $value == $preference->country_of_residency)
              <option value="{{$value}}" selected>{{$value}}</option>
            @else
              <option value="{{$value}}">{{$value}}</option>
            @endif
          @endforeach
          </select>
        </div>
        </td>
      </tr>
      </tbody>
      </table>
    </div>
    <div class="clearfix"> </div>
    <button onclick="updateProfile('preference-table-form')" class="btn_1 submit">Save</button>
    &nbsp;&nbsp;&nbsp;
    <button onclick="toggleForm('preference-table-form','preference-table')" class="btn_1 submit">Cancel</button>
  </form>
</div>