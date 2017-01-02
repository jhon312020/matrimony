<form role="form" method="post">
  <div class="box-body">
    <div class="form-group">
      <label>Country</label>
      <input type="text" class="form-control" name="country" value="{{$request->country}}" placeholder="Enter country"  required>
    </div>
    <div class="form-group">
      <label>State</label>
      <input type="text" class="form-control" name="state" value="{{$request->state}}" placeholder="Enter state"  required>
    </div>
    <div class="form-group">
      <label>District</label>
      <input type="text" class="form-control" name="district" value="{{$request->district}}" placeholder="Enter district"  required>
    </div>
  </div><!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>