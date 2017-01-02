@extends('layouts.admin_layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     User List
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{asset('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">User List</li>
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
                    <th>Email</th>
                    <th>Role</th>
                    <th>Manage</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                  $count = 0;
                  foreach ($users as $user) {
                    echo '<tr>';
                    echo '<td>'.++$count.'</td>';
                    echo '<td>'.$user->email.'</td>';
                    if (isset($roles[$user->role_id])) {
                      echo '<td>'.$roles[$user->role_id].'</td>';
                    } else {
                      echo '<td></td>';
                    }
                ?>
                  <td>
                   <a href="{{asset('admin/editUser/'.$user->id)}}"><i class="fa fa-edit"></i> Edit</a>
                    &nbsp;&nbsp;
                    <a href="javascript:;" class="delete_func" data-href="{{asset('admin/deleteUser/'.$user->id)}}"><i class="fa fa fa-trash-o"></i> Delete</a>
                  </td>
                <?php
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
