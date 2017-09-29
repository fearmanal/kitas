<nav class="navbar navbar-static-top" role="navigation">
  <!-- Sidebar toggle button
  <a href="<?php //echo base_url(); ?>assets/#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
  -->

  <!-- Navbar Right Menu -->
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <li class="dropdown user user-menu <?php if($page == 'home') { echo 'active-page'; } ?>">
        <a href="<?php echo base_url('home'); ?>">
          <span class="hidden-xs">Home</span>
        </a>
      </li>
      <li class="dropdown user user-menu menu-main-parent <?php if($page == 'devices') { echo 'active-page'; } ?>">
        <a href="#">
          <span class="hidden-xs">Devices</span>
        </a>
        <ul class="dropdown-menu menu-main-child mid">
          <?php foreach ($category_hw as $menu_hw) { ?>
            <li>
              <a href="<?php echo base_url('devices/index/category/'.$menu_hw->name); ?>" class="btn btn-default btn-flat"><?php echo $menu_hw->label ?></a>
            </li>
          <?php } ?>
        </ul>
      </li>
      <li class="dropdown user user-menu <?php if($page == 'software') { echo 'active-page'; } ?>">
        <a href="<?php echo base_url('software'); ?>">
          <span class="hidden-xs">Software</span>
        </a>
      </li>
      <li class="dropdown user user-menu <?php if($page == 'staff') { echo 'active-page'; } ?>">
        <a href="<?php echo base_url('staff'); ?>">
          <span class="hidden-xs">Staff</span>
        </a>
      </li>
      <li class="dropdown user user-menu <?php if($page == 'supplier') { echo 'active-page'; } ?>">
        <a href="<?php echo base_url('supplier'); ?>">
          <span class="hidden-xs">Supplier</span>
        </a>
      </li>

      <li class="dropdown user user-menu menu-main-parent <?php if($page == 'category' || $page == 'users' || $page == 'profile') { echo 'active-page'; } ?>">
        <a href="#">
          <span class="hidden-xs"><i class="fa fa-power-off"></i></span>
        </a>
        <ul class="dropdown-menu menu-main-child">
            <li>
              <a href="<?php echo base_url('Profile'); ?>" class="btn btn-default btn-flat">Profile</a>
            </li>
          <?php if($userdata->role == 'administrator' || $userdata->role == 'management') { ?>
            <li>
              <a href="<?php echo base_url('category/index/usage/hardware'); ?>" class="btn btn-default btn-flat">Hardware Category</a>
            </li>
          <?php } ?>
          <?php if($userdata->role == 'administrator') { ?>
            <li>
              <a href="<?php echo base_url('users'); ?>" class="btn btn-default btn-flat">Manage Users</a>
            </li>
          <?php } ?>
            <li>
              <a href="<?php echo base_url('Auth/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
            </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>