<div class="basic_1">
              <h3>Basics & Lifestyle <i class="fa fa-edit" onclick="toggleForm('basic-detail','basic-detail-form')" style="cursor:pointer;"></i></h3>
                @include('frontend.profileview.basic_information')
                <form onsubmit="return false;" id="basic-detail-form" action="{{asset(App::getLocale().'/updateProfile')}}" style="display:none;">
                  <div class="col-md-6 basic_1-left">
                  <table class="table_working_hours">
                    <tbody>
                  <tr class="opened_1">
                    <td class="day_label">Name :</td>
                    <td class="day_value"><input type="text" class="form-text" id="name" name="name" value="{{$profile->name}}"/></td>
                  </tr>
                    <tr class="opened_1">
                    <td class="day_label">Status :</td>
                    <td class="day_value">
                      <div class="select-block1">
                      <select name="status_id" id="status_id">
                        @foreach($statuses as $key=>$status)
                          @if($profile->status_id == $key)
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
                    <td class="day_label">Height :</td>
                    <td class="day_value"><input type="text" class="form-text" id="height" name="height" value="{{$profile->height}}"></td>
                  </tr>
                    <tr class="opened_1">
                    <td class="day_label">Weight :</td>
                    <td class="day_value"><input type="text" class="form-text" id="weight" name="weight" value="{{$profile->weight}}"></td>
                  </tr>
                    <tr class="opened_1">
                    <td class="day_label">Physical Status :</td>
                    <td class="day_value closed">
                      <div class="select-block1">
                      <select id="physical_status" name="physical_status">
                        <option value="">Not Specified</option>
                        @foreach ($physical_status as $status)
                          @if ($status == $profile->physical_status)
                            <option value="{{$status}}" selected>{{$status}}</option>
                          @else
                            <option value="{{$status}}">{{$status}}</option>
                          @endif
                        @endforeach
                      </select>
                      </div>
                    </td>
                  </tr>
                  <tr class="opened_1">
                    <td class="day_label">Body Type :</td>
                    <td class="day_value">
                      <div class="select-block1">
                      <select id="body_type" name="body_type">
                        <option value="">Not Specified</option>
                        @foreach ($body_types as $value)
                          @if ($value == $profile->body_type)
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
                   <div class="col-md-6 basic_1-left">
                    <table class="table_working_hours">
                    <tbody>
                  <tr class="opened_1">
                    <td class="day_label">Mother Tongue :</td>
                    <td class="day_value">
                      <div class="select-block1">
                      <select id="mother_tongue" name="mother_tongue">
                        <option value="">Not Specified</option>
                        @foreach ($mother_tongue as $tongue)
                          @if ($tongue == $profile->mother_tongue)
                            <option value="{{$tongue}}" selected>{{$tongue}}</option>
                          @else
                            <option value="{{$tongue}}">{{$tongue}}</option>
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
                       <select id="complexion" name="complexion">
                       <option value="">Not Specified</option>
                        @foreach ($complexions as $complex)
                          @if ($complex == $profile->complexion)
                            <option value="{{$complex}}" selected>{{$complex}}</option>
                          @else
                            <option value="{{$complex}}">{{$complex}}</option>
                          @endif
                        @endforeach
                      </select>
                      </div>
                    </td>
                  </tr>
                    <tr class="opened_1">
                    <td class="day_label">Eating Habit :</td>
                    <td class="day_value closed">
                      <div class="select-block1">
                      <select id="eating_habits" name="eating_habits">
                      <option value="">Not Specified</option>
                        @foreach ($eating_habits as $habit)
                          @if ($habit == $profile->eating_habits)
                            <option value="{{$habit}}" selected>{{$habit}}</option>
                          @else
                            <option value="{{$habit}}">{{$habit}}</option>
                          @endif
                        @endforeach
                      </select>
                      </div>
                    </td>
                  </tr>
                    <tr class="opened_1">
                    <td class="day_label">Smoking Habit :</td>
                    <td class="day_value closed">
                      <div class="select-block1">
                       <select id="smoking_habits" name="smoking_habits">
                       <option value="">Not Specified</option>
                        @foreach ($smoking_habits as $habit)
                          @if ($habit == $profile->smoking_habits)
                            <option value="{{$habit}}" selected>{{$habit}}</option>
                          @else
                            <option value="{{$habit}}">{{$habit}}</option>
                          @endif
                        @endforeach
                      </select>
                      </div>
                    </td>
                  </tr>
                  <tr class="opened_1">
                    <td class="day_label">Drinking habit :</td>
                    <td class="day_value closed">
                        <div class="select-block1">
                        <select id="drinking_habit" name="drinking_habit">
                        <option value="">Not Specified</option>
                        @foreach ($drinking_habits as $habit)
                          @if ($habit == $profile->drinking_habit)
                            <option value="{{$habit}}" selected>{{$habit}}</option>
                          @else
                            <option value="{{$habit}}">{{$habit}}</option>
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
                  <button onclick="updateProfile('basic-detail-form')" class="btn_1 submit">Save</button>&nbsp;&nbsp;&nbsp;
                  <button onclick="toggleForm('basic-detail-form','basic-detail')" class="btn_1 submit">Cancel</button>
                </form>
            </div>