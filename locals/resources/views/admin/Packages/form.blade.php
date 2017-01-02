<form role="form" method="post">
  <div class="box-body">
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" name="name" value="{{$request->name}}" placeholder="Enter name"  required>
    </div>
    <div class="form-group">
      <label>No. of days</label>
      <input type="text" class="form-control" name="period" value="{{$request->period}}" placeholder="Enter no. of days"  required>
    </div>
    <div class="form-group">
      <label>Price</label>
      <input type="text" class="form-control" name="price" value="{{$request->price}}" placeholder="Enter price"  required>
    </div>
  </div><!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>