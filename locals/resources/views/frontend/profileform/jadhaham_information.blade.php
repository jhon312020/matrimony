<div class="basic_1">
  <h3>Horoscope <i class="fa fa-edit" onclick="toggleForm('jadhaham-detail','jadhaham-detail-form')" style="cursor:pointer;"></i></h3>
    @include('frontend.profileview.jadhaham_information')
    <form id="jadhaham-detail-form" action="{{asset(App::getLocale().'/updateJadhaham')}}" enctype="multipart/form-data" method="POST" style="display:none;">
      <div class="col-md-8 jadhaham_1-left">
      <table class="table_working_hours">
        <tbody>
      <tr class="opened_1">
        <td class="day_label">Upload Jadhaham :</td>
        <td class="day_value"><input type="file" class="form-text" id="jadhaham" name="jadhaham" /></td>
      </tr>
      </tbody>
      </table>
      </div>
      <div class="clearfix"> </div>
      <button type="submit" class="btn_1 submit">Save</button>&nbsp;&nbsp;&nbsp;
      <button type="button" onclick="toggleForm('jadhaham-detail-form','jadhaham-detail')" class="btn_1 submit">Cancel</button>
    </form>
</div>