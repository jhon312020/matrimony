<?php
      $action = Route::currentRouteAction();
      $action = substr($action, strpos($action,'@')+1, strlen($action));
?>

<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset('assets/images/default_profile.jpg')}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php //echo $role;?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <?php
        $active_class = '';
        if (in_array($action,array('dashboard'))) {
          $active_class = 'active';
        }
      ?>
      <li class="{{$active_class}}">
        <a href="{{asset('admin/dashboard')}}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li> 
      <?php
        $active_class = '';
        if (in_array($action,array('memberList'))) {
          $active_class = 'active';
        }
      ?>
      <li class="treeview {{$active_class}}">
        <a href="javascript:;">
          <i class="fa fa-book"></i> <span>Members</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ asset('admin/memberList') }}"><i class="fa fa-circle-o"></i> Member list</a></li>
        </ul>
      </li>
      <?php
        $user_active_class = '';
        if (in_array($action,array('viewUsers','addUser','editUser'))) {
          $user_active_class = 'active';
        }
      ?>

      <li class="treeview {{$user_active_class}}">
        <a href="javascript:;">
          <i class="fa fa-user-plus"></i> <span>User Management</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ asset('admin/addUser') }}"><i class="fa fa-circle-o"></i> Add User</a></li>
          <li><a href="{{ asset('admin/viewUsers') }}"><i class="fa fa-circle-o"></i> User List</a></li>
        </ul>
      </li>
      <?php
        $role_active_class = '';
        if (in_array($action,array('viewRoles','addRole','editRole'))) {
          $role_active_class = 'active';
        }
      ?>
      <li class="treeview {{$role_active_class}}">
        <a href="javascript:;">
          <i class="fa fa-user-md"></i> <span>Role Management</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ asset('admin/addRole') }}"><i class="fa fa-circle-o"></i> Add Role</a></li>
          <li><a href="{{ asset('admin/viewRoles') }}"><i class="fa fa-circle-o"></i> Role List</a></li>
        </ul>
      </li>
      <?php
        $star_active_class = '';
        if (in_array($action,array('viewStars','addStar','editStar'))) {
          $star_active_class = 'active';
        }
      ?>
      <li class="treeview {{$star_active_class}}">
        <a href="javascript:;">
          <i class="fa fa-book"></i> <span>Star</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ asset('admin/addStar') }}"><i class="fa fa-circle-o"></i> Add Star</a></li>
          <li><a href="{{ asset('admin/viewStars') }}"><i class="fa fa-circle-o"></i> Star List</a></li>
        </ul>
      </li>
      <?php
        $active_class = '';
        if (in_array($action,array('viewReligions','addReligion','editReligion'))) {
          $active_class = 'active';
        }
      ?>
      <li class="treeview {{$active_class}}">
        <a href="javascript:;">
          <i class="fa fa-book"></i> <span>Religion</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ asset('admin/addReligion') }}"><i class="fa fa-circle-o"></i> Add Religion</a></li>
          <li><a href="{{ asset('admin/viewReligions') }}"><i class="fa fa-circle-o"></i> Religion List</a></li>
        </ul>
      </li>
      <?php
        $active_class = '';
        if (in_array($action,array('viewCastes','addCaste','editCaste'))) {
          $active_class = 'active';
        }
      ?>
      <li class="treeview {{$active_class}}">
        <a href="javascript:;">
          <i class="fa fa-book"></i> <span>Sub Caste</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ asset('admin/addCaste') }}"><i class="fa fa-circle-o"></i> Add Caste</a></li>
          <li><a href="{{ asset('admin/viewCastes') }}"><i class="fa fa-circle-o"></i> Caste List</a></li>
        </ul>
      </li>
      <?php
        $active_class = '';
        if (in_array($action,array('viewLocations','addLocation','editLocation'))) {
          $active_class = 'active';
        }
      ?>
      <li class="treeview {{$active_class}}">
        <a href="javascript:;">
          <i class="fa fa-map-marker"></i> <span>Location</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ asset('admin/addLocation') }}"><i class="fa fa-circle-o"></i> Add Location</a></li>
          <li><a href="{{ asset('admin/viewLocations') }}"><i class="fa fa-circle-o"></i> Location List</a></li>
        </ul>
      </li>
      <?php
        $active_class = '';
        if (in_array($action,array('viewMoonsigns','addMoonsign','editMoonsign'))) {
          $active_class = 'active';
        }
      ?>
      <li class="treeview {{$active_class}}">
        <a href="javascript:;">
          <i class="fa fa-book"></i> <span>Moon sign</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ asset('admin/addMoonsign') }}"><i class="fa fa-circle-o"></i> Add Moon sign</a></li>
          <li><a href="{{ asset('admin/viewMoonsigns') }}"><i class="fa fa-circle-o"></i> Moon sign List</a></li>
        </ul>
      </li>
      <?php
        $active_class = '';
        if (in_array($action,array('viewZodiacsigns','addZodiacsign','editZodiacsign'))) {
          $active_class = 'active';
        }
      ?>
      <li class="treeview {{$active_class}}">
        <a href="javascript:;">
          <i class="fa fa-book"></i> <span>Zodiac sign</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ asset('admin/addZodiacsign') }}"><i class="fa fa-circle-o"></i> Add Zodiac sign</a></li>
          <li><a href="{{ asset('admin/viewZodiacsigns') }}"><i class="fa fa-circle-o"></i> Zodiac sign List</a></li>
        </ul>
      </li>
      <?php
        $active_class = '';
        if (in_array($action,array('viewGraduations','addGraduation','editGraduation'))) {
          $active_class = 'active';
        }
      ?>
      <li class="treeview {{$active_class}}">
        <a href="javascript:;">
          <i class="fa fa-graduation-cap"></i> <span>Graduation</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ asset('admin/addGraduation') }}"><i class="fa fa-circle-o"></i> Add Graduation</a></li>
          <li><a href="{{ asset('admin/viewGraduations') }}"><i class="fa fa-circle-o"></i> Graduation List</a></li>
        </ul>
      </li>
      <?php
        $active_class = '';
        if (in_array($action,array('viewStatus','addStatus','editStatus'))) {
          $active_class = 'active';
        }
      ?>
      <li class="treeview {{$active_class}}">
        <a href="javascript:;">
          <i class="fa fa-book"></i> <span>Status</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ asset('admin/addStatus') }}"><i class="fa fa-circle-o"></i> Add Status</a></li>
          <li><a href="{{ asset('admin/viewStatus') }}"><i class="fa fa-circle-o"></i> Status List</a></li>
        </ul>
      </li>
      <?php
        $active_class = '';
        if (in_array($action,array('viewPackages','addPackage','editPackage'))) {
          $active_class = 'active';
        }
      ?>
      <li class="treeview {{$active_class}}">
        <a href="javascript:;">
          <i class="fa fa-money"></i> <span>Package</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ asset('admin/addPackage') }}"><i class="fa fa-circle-o"></i> Add Package</a></li>
          <li><a href="{{ asset('admin/viewPackages') }}"><i class="fa fa-circle-o"></i> Package List</a></li>
        </ul>
      </li>
      <?php
        $active_class = '';
        if (in_array($action,array('editPage','listPages'))) {
          $active_class = 'active';
        }
      ?>
      <li class="treeview {{$active_class}}">
        <a href="javascript:;">
          <i class="fa fa-money"></i> <span>Pages</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ asset('admin/listPages') }}"><i class="fa fa-circle-o"></i> Page list</a></li>
        </ul>
      </li>
      <li class="treeview {{($action == 'updateSettings')?'active':''}}">
        <a href="javascript:;">
          <i class="fa fa-wrench fa-fw"></i> <span>Settings</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{asset('admin/updateSettings')}}"><i class="fa fa-circle-o"></i> Settings</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>