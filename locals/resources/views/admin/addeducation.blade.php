<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Add Education
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{URL::to('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    
      <li class="active">Add Education</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Form</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" id="add_education">
            <div class="box-body">
              <div class="form-group">
                <label>Education</label>
                <input type="text" class="form-control" name="education" placeholder="Enter Education"  required>
              </div>
              <div class="form-group">
                <label>Occupation</label>
                <input type="text" class="form-control" name="occupation" placeholder="Enter Occupation"  required>
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
            <div class="message"></div>
        </div><!-- /.box -->
      </div><!--/.col (left) -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->