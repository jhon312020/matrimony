<form role="form" method="post">
  <div class="box-body">
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" name="name" value="{{$request->name}}" readonly>
    </div>
    <div class="form-group">
      <label>Tamil Content</label>
      <textarea name="ta_content" id="editor1" required>{{$request->ta_content}}</textarea>
    </div>
    <div class="form-group">
      <label>English Content</label>
      <textarea name="en_content" id="editor2" required>{{$request->en_content}}</textarea>
    </div>
  </div><!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
@section('script')
<script src="{{asset('assets/admin/plugins/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
  CKEDITOR.replace( 'editor1');
  CKEDITOR.replace( 'editor2');
</script>
@endsection