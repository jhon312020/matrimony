<form role="form" method="post">
  <div class="box-body">
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" name="name" value="{{$request->name}}" required>
    </div>
    <div class="form-group">
      <label>Tamil Content</label>
      <textarea name="en_content" required>{{$request->tl_content}}</textarea>
    </div>
    <div class="form-group">
      <label>English Content</label>
      <textarea name="en_content" required>{{$request->en_content}}</textarea>
    </div>
  </div><!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>