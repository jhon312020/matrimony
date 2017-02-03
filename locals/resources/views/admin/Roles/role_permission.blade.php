@extends('layouts.admin_layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Role Permission
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{asset('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Role Permission</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
          
          <!-- form start -->
          <form role="form" method="post">
            <div class="box-body">
            @foreach ($pageList as $navigation=>$pages)
                <div class="col-md-4">
                <label>{{$navigation}}</label>
                <div class="checkbox">
                  @foreach ($pages as $page)
                    <label>
                    <input type="checkbox" class="role_checkbox" value="{{$page->id}}" name="inputs[]" {{(in_array($page->id,$inputs))? 'checked':''}} /> {{$page->title}}</label><br/>
                  @endforeach
                </div>
                <br/>
                </div>
            @endforeach
            </div><!-- /.box-body -->
            <div class="box-footer" style="text-align:right">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div><!-- /.box -->
      </div><!--/.col (left) -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection