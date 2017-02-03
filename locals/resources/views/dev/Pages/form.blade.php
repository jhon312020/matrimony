<form role="form" method="post">
  <div class="box-body">
    <div class="form-group">
      <label>Navigation Title</label>
      <input type="text" class="form-control" name="nav_title" value="{{$request->nav_title}}"  required>
    </div>
  </div><!-- /.box-body -->
  <div class="box-body">
    <div class="form-group">
      <label>Title</label>
      <input type="text" class="form-control" name="title" value="{{$request->title}}"  required>
    </div>
  </div><!-- /.box-body -->
  <div class="box-body">
    <div class="form-group">
      <label>Action name</label>
      <input type="text" class="form-control" name="action" value="{{$request->action}}"  required>
    </div>
  </div><!-- /.box-body -->

  <div class="box-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>