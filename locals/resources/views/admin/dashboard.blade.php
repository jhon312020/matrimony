@extends('layouts.admin_layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                  <a href="{{asset('admin/viewUsers')}}"><span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span></a>
                <div class="info-box-content">
                  <span class="info-box-text">User count</span>
                  <span class="info-box-number">{{$userCount}}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                  <a href="{{asset('admin/memberList')}}"> <span class="info-box-icon bg-red"><i class="fa fa-flag-o"></i></span></a>
                <div class="info-box-content">
                  <span class="info-box-text">Member count</span>
                  <span class="info-box-number">{{$memberCount}}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
               <a href="{{asset('admin/paidMemberList')}}">  <span class="info-box-icon bg-green"><i class="fa fa-files-o"></i></span></a>
                <div class="info-box-content">
                    <span class="info-box-text">Revenue</span>
                  <span class="info-box-number">Rs. {{$revenue[0]->total_revenue}}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                  <a href="{{asset('admin/viewPackages')}}">  <span class="info-box-icon bg-aqua">
                  <i class="fa fa-envelope-o"></i></span></a>
                <div class="info-box-content">
                  <span class="info-box-text">Package List</span>
                  <span class="info-box-number">{{$packageCount}}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
              <!-- MAP & BOX PANE -->
             <!-- /.box -->
              <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                </div><!-- /.col -->
              </div><!-- /.row -->

              @if (in_array('memberList',Session::get('role_permission')))
              <!-- TABLE: LATEST ORDERS -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Lists</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>Sl. No.</th>
                          <th>Name</th>
                            <th>Email</th>
                          <th>DOB</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $count = 1; ?>
                      @foreach ($members as $member)
                        <tr>
                          <td>{{$count++}}</td>
                          <td>{{$member->username}}</td>
                          <td>{{$member->email}}</td>
                          <td>{{date('d-m-Y',strtotime($member->date_of_birth))}}</td>
                        </tr>
                      @endforeach 
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <a href="{{asset('admin/memberList')}}" class="btn btn-sm btn-default btn-flat pull-right">View All List</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            @endif

            @if (in_array('paidMemberList',Session::get('role_permission')))
            <div class="col-md-4">
              <!-- PRODUCT LIST -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Recent Payment List</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                @foreach($purchaseList as $paidlist)
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <li class="item">
                      <div class="product-img">
                        @if ($paidlist->avatar && file_exists('assets/profileimages/'.$paidlist->avatar))
                          <img src="{{asset('assets/profileimages/'.$paidlist->avatar)}}" alt="Product Image">
                        @else
                          <img src="{{asset('assets/images/default_profile.jpg')}}" alt="Product Image">
                        @endif
                      </div>
                      <div class="product-info">
                       {{$paidlist->name}} <span class="label label-success pull-right">Rs.{{$paidlist->price}}</span>
                        <span class="product-description">
                          {{date('d-m-Y',strtotime($paidlist->purchase_date))}}
                        </span>
                      </div>
                    </li><!-- /.item -->
                  </ul>
                </div><!-- /.box-body -->
                @endforeach
                <div class="box-footer text-center">
                  <a href="{{asset('admin/paidMemberList')}}" class="uppercase">View All Lists</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            @endif
          </div><!-- /.row -->

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection