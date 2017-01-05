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
               <a href="javascript:;">  <span class="info-box-icon bg-green"><i class="fa fa-files-o"></i></span></a>
                <div class="info-box-content">
                    <span class="info-box-text">Revenue</span>
                  <span class="info-box-number">0</span>
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

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection