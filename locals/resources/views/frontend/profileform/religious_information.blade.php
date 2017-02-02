<div class="basic_1">
              <h3>Religious / Social & Astro Background <i class="fa fa-edit" onclick="toggleForm('religion-table','religion-table-form')" style="cursor:pointer;"></i></h3>
                @include('frontend.profileview.religious_information')
                <div class="clearfix"> </div>
                <form onsubmit="return false;" id="religion-table-form" action="{{asset(App::getLocale().'/updateProfile')}}" style="display:none;">
                <div class="col-md-6 basic_1-left">
                <table class="table_working_hours">
                  <tbody>
                    <tr class="opened_1">
                  <td class="day_label">Date of birth :</td>
                  <td class="day_value"><input type="text" class="form-text" id="date_of_birth" name="date_of_birth" value="{{date('d-m-Y',strtotime($user->date_of_birth))}}" /></td>
                </tr>
                <tr class="opened_1">
                  <td class="day_label">Religion :</td>
                  <td class="day_value">
                    <div class="select-block1">
                        <select id="religion_id" name="religion_id">
                        <option value="0" selected>Not Specified</option>
                        @foreach ($religions as $key=>$value)
                          @if ($key == $profile->religion_id)
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
                  <td class="day_label">Caste :</td>
                  <td class="day_value">
                    <div class="select-block1">
                        <select id="caste_id" name="caste_id">
                        <option value="0" selected>Not Specified</option>
                        @foreach ($castes as $key=>$value)
                          @if ($key == $profile->caste_id)
                            <option value="{{$key}}" selected>{{$value}}</option>
                          @else
                            <option value="{{$key}}">{{$value}}</option>
                          @endif
                        @endforeach
                      </select>
                      </div>
                  </td>
                </tr>
               </tbody>
                  </table>
                 </div>
                 <div class="col-md-6 basic_1-left">
                  <table class="table_working_hours">
                  <tbody>
                    <tr class="opened_1">
                  <td class="day_label">Star :</td>
                  <td class="day_value">
                    <div class="select-block1">
                        <select id="star_id" name="star_id">
                        <option value="0" selected>Not Specified</option>
                        @foreach ($stars as $key=>$value)
                          @if ($key == $profile->star_id)
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
                  <td class="day_label">Moon sign :</td>
                  <td class="day_value">
                    <div class="select-block1">
                        <select id="moonsign_id" name="moonsign_id">
                        <option value="0" selected>Not Specified</option>
                        @foreach ($moonsigns as $key=>$value)
                          @if ($key == $profile->moonsign_id)
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
                  <td class="day_label">Zodiac sign :</td>
                  <td class="day_value">
                    <div class="select-block1">
                        <select id="zodiacsign_id" name="zodiacsign_id">
                        <option value="0" selected>Not Specified</option>
                        @foreach ($zodiacsigns as $key=>$value)
                          @if ($key == $profile->zodiacsign_id)
                            <option value="{{$key}}" selected>{{$value}}</option>
                          @else
                            <option value="{{$key}}">{{$value}}</option>
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
                <button onclick="updateProfile('religion-table-form')" class="btn_1 submit">Save</button>&nbsp;&nbsp;&nbsp;
                <button onclick="toggleForm('religion-table-form','religion-table')" class="btn_1 submit">Cancel</button>
                </form>
            </div>