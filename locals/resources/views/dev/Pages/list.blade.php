@extends('layouts.admin_layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     Page List
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{asset('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Page List</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
            <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="data-table table table-bordered table-striped">
              <thead>
                <tr>
                   <th>Sl No.</th>
                    <th>Navigation Title</th>
                    <th>Title</th>
                    <th>Manage</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                  $count = 0;
                  foreach ($pages as $page) {
                    echo '<tr>';
                    echo '<td>'.++$count.'</td>';
                    echo '<td>'.$page->nav_title.'</td>';
                    echo '<td>'.$page->title.'</td>';
                    echo '<td>';
                 ?>
                    <a href="{{asset('dev/pageEdit/'.$page->id)}}"><i class="fa fa-edit"></i> Edit</a>
                    &nbsp;&nbsp;
                    <a href="javascript:;" class="delete_func" data-href="{{asset('dev/deletePage/'.$page->id)}}"><i class="fa fa fa-trash-o"></i> Delete</a>
                  <?php
                    echo '</td>';
                    echo '</tr>';
                  }
                ?>
              </tbody>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- page script -->
@endsection
