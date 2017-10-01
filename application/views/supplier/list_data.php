<?php
  foreach ($dataSupplier as $supplier) {
    ?>
    <tr>
      <td><?php echo $supplier->name; ?></td>
      <td><?php echo $supplier->email; ?></td>
      <td><?php echo $supplier->phone; ?></td>
      <td><?php echo $supplier->fax; ?></td>
      <td><?php echo $supplier->city; ?></td>
      <td><?php echo $supplier->country; ?></td>
      <td class="text-center" style="letter-spacing: 2px;">
        <a href="#" class="detail-dataSuppHw" data-id="<?php echo $supplier->id_supplier; ?>"><i class="fa fa-laptop"></i></a>
        <a href="#" class="detail-dataSuppSw" data-id="<?php echo $supplier->id_supplier; ?>"><i class="fa fa-windows"></i></a>
      <?php if($userdata->role == 'administrator' || $userdata->role == 'management') { ?>
        <a href="#" class="update-dataSupplier" data-id="<?php echo $supplier->id_supplier; ?>"><i class="fa fa-pencil"></i></a>
        <a href="#" class="konfirmasiHapus-supplier" data-id="<?php echo $supplier->id_supplier; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash"></i></a>
      <?php } else if($userdata->role == 'guest') { ?>
        <a href="#" class="update-dataSupplier" data-id="<?php echo $supplier->id_supplier; ?>"><i class="fa fa-external-link"></i></a>        
      <?php } ?>
      </td>
    </tr>
    <?php
  }
?>