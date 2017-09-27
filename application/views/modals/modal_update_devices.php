<?php 
  if(@$devcat == 'server' || @$devcat == 'pc') {
    include 'update_devices_pc.php';
  }
  else {
    include 'update_devices_common.php';
  }
?>