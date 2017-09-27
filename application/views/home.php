<div class="row">
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-aqua">
      <div class="inner">        <h3><?php echo $total_staff; ?></h3>

        <p>Jumlah Staff <?php //echo CI_VERSION; ?></p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-contact"></i>
      </div>
      <a href="<?php echo base_url('staff') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php echo $total_supplier; ?></h3>
        <p>Jumlah Supplier</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-briefcase-outline"></i>
      </div>
      <a href="<?php echo base_url('supplier') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php echo $total_pc; ?></h3>
        <p>Jumlah PC</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-briefcase-outline"></i>
      </div>
      <a href="<?php echo base_url('devices/index/category/pc') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <?php
  echo "<pre>";
  print_r($userdata);
  echo "<pre>";
  print_r($page);
  
  ?>
</div>

