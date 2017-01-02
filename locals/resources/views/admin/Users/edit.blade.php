@extends('layouts.admin_layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit User
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{asset('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Edit User</li>
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
          <form role="form" method="post">
            <div class="box-body">
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address"  
                value="{{$request->email }}" required>
              </div>
              <div class="form-group">
                  <label>Role</label>
                  <select class="form-control"  name="role_id" id="role_id" required>
                    <?php
                      foreach ($roles as $key=>$role) {
                        if ($request->role_id == $key) {
                          echo "<option value='$key' selected>$role</option>";
                        } else {
                          echo "<option value='$key'>$role</option>";
                        }
                      }
                    ?>
                  </select>
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div><!-- /.box -->
      </div><!--/.col (left) -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection