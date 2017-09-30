<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) 
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->foto; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $userdata->nama; ?></p>
        <a href="<?php echo base_url(); ?>assets/#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <!-- Header Menu
      <li class="header">LIST MENU</li>
      -->

      <li <?php if ($page == 'home') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('home'); ?>">
          <i class="fa fa-home"></i>
          <span>Home</span>
        </a>
      </li>
      
      <li <?php if ($page == 'devices') {echo 'class="active"';} ?>>
        <a href="#" class="sidebar-toggle menu_hw">
          <i class="fa fa-laptop"></i>
          <span>Devices</span>
        </a>
        <ul class="nav child_menu menu_hw">
          <?php foreach ($category_hw as $menu_hw) { ?>
            <li>
              <a href="<?php echo base_url('devices/index/category/'.$menu_hw->name); ?>"><?php echo $menu_hw->label ?></a>
            </li>
          <?php } ?>
        </ul>        
      </li>

      <li <?php if ($page == 'software') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('software'); ?>">
          <i class="fa fa-windows"></i>
          <span>Software</span>
        </a>
      </li>

      <li <?php if ($page == 'staff') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('staff'); ?>">
          <i class="fa fa-users"></i>
          <span>Staff</span>
        </a>
      </li>

      <li <?php if ($page == 'supplier') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('supplier'); ?>">
          <i class="fa fa-truck"></i>
          <span>Supplier</span>
        </a>
      </li>

      <li <?php if($page == 'category' || $page == 'users' || $page == 'profile') {echo 'class="active"';} ?>>
        <a href="#" class="sidebar-toggle menu_setting">
          <i class="fa fa-gear"></i>
          <span>Settings</span>
        </a>
        <ul class="nav child_menu menu_setting">
            <li>
              <a href="<?php echo base_url('Profile'); ?>">Profile</a>
            </li>
          <?php if($userdata->role == 'administrator' || $userdata->role == 'management') { ?>
            <li>
              <a href="<?php echo base_url('category/index/usage/hardware'); ?>">Hardware Category</a>
            </li>
          <?php } ?>
          <?php if($userdata->role == 'administrator') { ?>
            <li>
              <a href="<?php echo base_url('users'); ?>">Manage Users</a>
            </li>
          <?php } ?>
            <li>
              <a href="<?php echo base_url('Auth/logout'); ?>">Sign out</a>
            </li>
        </ul> 
      </li>

    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>