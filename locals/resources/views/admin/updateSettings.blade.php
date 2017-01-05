@extends('layouts.admin_layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Update Settings
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{asset('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Update Settings</li>
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
          <form role="form" method="post" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" value="{{$setting->title}}" placeholder="Enter title"  required>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="col-sm-6">
                     <label>Logo</label>
                        <input type="file" name="image" class="form-control" id="catagry_logo" value=""  data-parsley-trigger="change">
                        Please select an image 212px/73px
                    </div>                  
                    <div class="col-sm-6 text-left top5">
                        <?php  if (isset($setting) && $setting->image) { ?>
                          <img src="{{asset('assets/settingsimages/'.$setting->image)}}" width="212" height="73">
                        <?php } ?>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="col-sm-6">
                     <label>Fav icon</label>
                        <input type="file" name="fav_icon" class="form-control" >
                        Please select an image 16px/16px
                    </div>                  
                    <div class="col-sm-6 text-left">
                      <br/>
                        <?php if(isset($setting) && $setting->fav_icon) { ?>
                          <img src="{{asset('assets/settingsimages/'.$setting->fav_icon)}}" width="30" height="30">
                        <?php } ?>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Select Filter Options</label><br>
                <input type="checkbox" name="religion" value="1" {{((bool)$setting->religion)?"checked":""}}>  RELIGION<br>
                <input type="checkbox" name="location" value="1" {{((bool)$setting->place)?"checked":""}}> LOCATION<br>
                <input type="checkbox" name="graduation" value="1" {{((bool)$setting->graduation)?"checked":""}}> GRADUATION<br>
                <input type="checkbox" name="occupation" value="1" {{((bool)$setting->occupation)?"checked":""}}> OCCUPATION<br>
                <input type="checkbox" name="age"  value="1" {{((bool)$setting->age)?"checked":""}}> AGE<br>
                <input type="checkbox" name="star"  value="1" {{((bool)$setting->star)?"checked":""}}> STAR<br>
                <input type="checkbox" name="moon_sign"  value="1" {{((bool)$setting->moon_sign)?"checked":""}}> MOON SIGN<br>
                <input type="checkbox" name="zodiac_sign"  value="1" {{((bool)$setting->zodiac_sign)?"checked":""}}> ZODIAC SIGN<br>
                <input type="checkbox" name="status"  value="1" {{((bool)$setting->status)?"checked":""}}> STATUS<br>
              </div> 


              <div class="form-group">
                <label>Search limit without login</label>
                <input type="text" class="form-control" name="search_limit_without_login" value="{{$setting->search_limit_without_login}}" >
              </div>

              <div class="form-group">
                <label>Contact us email address</label>
                <input type="text" class="form-control" name="contact_us_email" value="{{$setting->contact_us_email}}" >
              </div>

              <div class="form-group">
                <label>SMTP host</label>
                <input type="text" class="form-control" name="smtp_host" value="{{$setting->smtp_host}}" >
              </div>

              <div class="form-group">
                <label>SMTP username</label>
                <input type="text" class="form-control" name="smtp_username" value="{{$setting->smtp_username}}" >
              </div>

              <div class="form-group">
                <label>SMTP password</label>
                <input type="text" class="form-control" name="smtp_password" value="{{$setting->smtp_password}}" >
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