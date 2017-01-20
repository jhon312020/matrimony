@extends('layouts.admin_layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     Caste List
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{asset('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Caste List</li>
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
                    <th>Name</th>
                    <th>Manage</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                  $count = 0;
                  foreach ($castes as $caste) {
                    echo '<tr>';
                    echo '<td>'.++$count.'</td>';
                    echo '<td>'.$caste->name.'</td>';
                    echo '<td>';
                 ?>
                    <a href="{{asset('admin/editCaste/'.$caste->id)}}"><i class="fa fa-edit"></i> Edit</a>
                    &nbsp;&nbsp;
                    <a href="javascript:;" class="delete_func" data-href="{{asset('admin/deleteCaste/'.$caste->id)}}"><i class="fa fa fa-trash-o"></i> Delete</a>
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
