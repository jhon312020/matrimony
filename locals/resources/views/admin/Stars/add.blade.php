@extends('layouts.admin_layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Add Star
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{asset('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Star</li>
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
                <label>Star Name</label>
                <input type="text" class="form-control" name="name" value="{{$request->name}}" id="star_name" placeholder="Enter Star name"  required>
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