<br/>
<div class="basic_1">
  <h3>Location information <i class="fa fa-edit" onclick="toggleForm('location-table','location-table-form')" style="cursor:pointer;"></i></h3>
  @include('frontend.profileview.location_information')
  <form onsubmit="return false;" id="location-table-form" action="{{asset(App::getLocale().'/updateProfile')}}" style="display:none;">
    <div class="col-md-10 basic_1-left">
    <table class="table_working_hours">
      <tbody>
        <tr class="opened_1">
        <td class="day_label" width="30%">Country :</td>
        <td class="day_value">
        <div class="select-block1">
          <select id="country" name="country">
          <option value="" selected>Not Specified</option>
          @foreach ($countries as $value)
            @if ($value == $profile->country)
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
        <td class="day_label">State :</td>
        <td class="day_value">
          <div class="select-block1">
              <select id="state" name="state">
                <option value="" selected>Not Specified</option>
                @if (isset($states[$profile->country])) 
                  @foreach ($states[$profile->country] as $value)
                    @if ($value == $profile->state)
                      <option value="{{$value}}" selected>{{$value}}</option>
                    @else
                      <option value="{{$value}}">{{$value}}</option>
                    @endif
                  @endforeach
                @endif
              </select>
            </div>
        </td>
      </tr>
      <tr class="opened_1">
        <td class="day_label">District :</td>
        <td class="day_value">
          <div class="select-block1">
              <select id="district" name="district">
                <option value="" selected>Not Specified</option>
                @if (isset($districts[$profile->state]))
                  @foreach ($districts[$profile->state] as $value)
                    @if ($value == $profile->district)
                      <option value="{{$value}}" selected>{{$value}}</option>
                    @else
                      <option value="{{$value}}">{{$value}}</option>
                    @endif
                  @endforeach
                @endif
              </select>
            </div>
        </td>
      </tr>
      <tr class="opened_1">
        <td class="day_label">City :</td>
        <td class="day_value">
          <input type="text" value="{{$profile->city}}" class="form-text" name="city" id="city" />
        </td>
      </tr>
      <tr class="opened_1">
        <td class="day_label">Country Of Residence:</td>
        <td class="day_value">
        <div class="select-block1">
          <select id="country_of_residency" name="country_of_residency">
          <option value="" selected>Not Specified</option>
          @foreach ($countries as $value)
            @if ($value == $profile->country_of_residency)
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
    <button onclick="updateProfile('location-table-form')" class="btn_1 submit">Save</button>&nbsp;&nbsp;&nbsp;
    <button onclick="toggleForm('location-table-form','location-table')" class="btn_1 submit">Cancel</button>
    </form>
</div>
<script>
  states = <?php echo json_encode($states); ?>;
  districts = <?php echo json_encode($districts); ?>;
  $(document).ready(function(){
    $('#country').change(function(){
      html = '<option value="">Not Specified</option>';
      for (i=0;i<states[$(this).val()].length;i++) {
        html += '<option value="'+states[$(this).val()][i]+'">'+states[$(this).val()][i]+'</option>';
      }
      $('#state').html(html);
    });

    $('#state').change(function(){
      html = '<option value="">Not Specified</option>';
      for (i=0;i<districts[$(this).val()].length;i++) {  
        html += '<option value="'+districts[$(this).val()][i]+'">'+districts[$(this).val()][i]+'</option>';
      }
      $('#district').html(html);
    });
  });
</script>