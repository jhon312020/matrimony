@extends('layouts.admin_layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     Paid Member List
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{asset('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Paied Member List</li>
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
                    <th>Username</th>
                    <th>Gender</th>
                    <th>Date</th>
                    <th>Packagename</th>
                    <th>Period</th>
                    <th>Price</th>
                  </tr>
              </thead>
              <tbody>
                <?php $count = 0; ?>
                @foreach ($paidLists as $paidList)
                    <tr>
                    <td>{{++$count}}</td>
                    <td>{{$paidList->username}}</td>
                    <td>{{$paidList->gender}}</td>
                    <td>{{date('d-m-Y',strtotime($paidList->purchase_date))}}</td>
                    <td>{{$paidList->package_name}}</td>
                    <td>{{$paidList->period}} days</td>
                    <td>Rs.{{$paidList->price}}</td>
                    </tr>
                @endforeach
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
