<?php 
  if(@$devcat == 'server' || @$devcat == 'pc') {
    include 'tambah_devices_pc.php';
  }
  else {
    include 'tambah_devices_common.php';
  }
?>