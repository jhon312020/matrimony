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
      <li class="treeview">
        <a href="javascript:;">
          <i class="fa fa-user-plus"></i> <span>User Management</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ URL::to('admin/newley-registered-mem-list') }}"><i class="fa fa-circle-o"></i> New Users</a></li>
          <li><a href="{{ URL::to('admin/all-users-list') }}"><i class="fa fa-circle-o"></i> All Users List</a></li>
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
      <li class="treeview">
        <a href="javascript:;">
          <i class="fa fa-wrench fa-fw"></i> <span>Settings</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{URL::to('admin/add-settings')}}"><i class="fa fa-circle-o"></i> Settings</a></li>
        </ul>
      </li> 
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>