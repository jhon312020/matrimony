<form role="form" method="post">
  <div class="box-body">
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" name="name" value="{{$request->name}}" placeholder="Enter name"  required>
    </div>
  </div><!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>