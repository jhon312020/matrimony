<div class="basic_1">
              <h3>Basics & Lifestyle <i class="fa fa-edit" onclick="toggleForm('basic-detail','basic-detail-form')" style="cursor:pointer;"></i></h3>
              <div id="basic-detail">
              <div class="col-md-6 basic_1-left">
                <table class="table_working_hours">
                  <tbody>
                <tr class="opened_1">
                  <td class="day_label">Name :</td>
                  <td class="day_value" id="name_label">{{$profile->name}}</td>
                </tr>
                  <tr class="opened">
                  <td class="day_label">Status :</td>
                  <td class="day_value" id="status_id_label">{{(isset($statuses[$profile->status_id]))? $statuses[$profile->status_id] : ''}}</td>
                </tr>
                  <tr class="opened">
                  <td class="day_label">Height :</td>
                  <td class="day_value"><span id="height_label">{{$profile->height}}</span> cm</td>
                </tr>
                  <tr class="opened">
                  <td class="day_label">Weight :</td>
                  <td class="day_value"><span id="weight_label">{{$profile->weight}}</span> kg</td>
                </tr>
                  <tr class="opened">
                  <td class="day_label">Physical Status :</td>
                  <td class="day_value" id="physical_status_label">{{$profile->physical_status}}</td>
                </tr>
                </tbody>
                  </table>
                 </div>
                 <div class="col-md-6 basic_1-left">
                <table class="table_working_hours">
                <tbody>
                  <tr class="opened_1">
                  <td class="day_label">Mother Tongue :</td>
                  <td class="day_value" id="mother_tongue_label">{{$profile->mother_tongue}}</td>
                </tr>
                  <tr class="opened">
                  <td class="day_label">Complexion :</td>
                  <td class="day_value" id="complexion_label">{{$profile->complexion}}</td>
                </tr>
                  <tr class="closed">
                  <td class="day_label">Eating Habit :</td>
                  <td class="day_value closed" id="eating_habits_label">{{$profile->eating_habits}}</td>
                </tr>
                  <tr class="closed">
                  <td class="day_label">Smoking Habit :</td>
                  <td class="day_value closed" id="smoking_habits_label">{{$profile->smoking_habits}}</td>
                </tr>
                <tr class="opened">
                  <td class="day_label">Drink Habit :</td>
                  <td class="day_value" id="drinking_habit_label">{{$profile->drinking_habit}}</td>
                </tr>
                </tbody>
                </table>
                </div>
                <div class="clearfix"> </div>
                </div>
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